<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Adview;
use App\Category;
use App\Chat;
use App\ChatParent;
use App\Clasified;
use App\ClassifiedComment;
use App\Customer;
use App\dreams;
use App\Event;
use App\EventComment;
use App\Eventview;
use App\Forum;
use App\ForumReplies;
use App\Movie;
use App\MovieComment;
use App\MovieView;
use App\PaymentHistory;
use App\Staff;
use App\User;
use App\UserLanguage;
use App\WordMeaning;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use services\CSVModal;
use services\email_messages\InvitationMessageBody;
use services\email_messages\UnsubscribeMessage;
use services\email_services\EmailAddress;
use services\email_services\EmailBody;
use services\email_services\EmailMessage;
use services\email_services\EmailSender;
use services\email_services\EmailSubject;
use services\email_services\MailConf;
use services\email_services\PhpMail;
use services\email_services\SendEmailService;
use Twilio\Rest\Client;
use Twilio\TwiML\MessagingResponse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showDashboard()
    {
        $classifiedCount = Clasified::where('user_id', Session::get('userId'))->count();
        $eventCount = Event::where('user_id', Session::get('userId'))->count();
        return view('home')->with(['classifiedCount' => $classifiedCount, 'eventCount' => $eventCount]);
    }
//classified
    public function myClassified(){
        $classifieds = Clasified::where('user_id', Session::get('userId'))->latest()->get();
        foreach ($classifieds as $item){
            $item->adViewed = Adview::where('classified_id', $item->id)->count();
        }
        return view('my-classifieds')->with(['classifieds' => $classifieds]);
    }

    public function myMovies(){
        $movies = Movie::where('user_id', Session::get('userId'))->latest()->get();
        foreach ($movies as $item){
            $item->adViewed = MovieView::where('movie_id', $item->id)->count();
        }
        return view('my-movies')->with(['movies' => $movies]);
    }

    public function deleteClassified($id){
        try {
            $dreams = Clasified::where('id', $id)->first()->delete();
            session()->flash('msg', 'Classified deleted Successfully!');
            return redirect('my-classifieds');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function editClassified($id){
        try {
            $classified = Clasified::where('id', $id)->first();
            return view('edit-classifieds')->with(['classified' => $classified]);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function getClassifiedPhoto($id){
            $img = Clasified::where('id', $id)->first();
            $file =  base_path('/data') . '/classified/' . $img->image;
            $type = mime_content_type($file);
            header('Content-Type:' . $type);
            header('Content-Length: ' . filesize($file));
            return readfile($file);
    }

    public function getCategoryPhoto($id){
        $img = Category::where('id', $id)->first();
        $file =  base_path('/data') . '/categories/' . $img->logo;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function saveClassified(Request $request){
        try {
            $classified = new Clasified();
            $classified->title = $request->title;
            $classified->description = $request->description;
            $classified->phone = $request->phone;
            $classified->category = $request->category;
            $classified->user_id = Session::get('userId');

            if ($request->hasfile('files')) {
                $files = $request->file('files');
                foreach ($files as $file){
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/classified/',  $name);
                    $classified->image = $name;
                }
            }
            $classified->save();
            session()->flash('msg', 'Classified Posted Successfully!');
            return redirect('my-classifieds');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function postClassifiedComment(Request $request){
        try {
            $classified = new ClassifiedComment();
            $classified->user_id = Session::get('userId');
            $classified->comment = $request->comment;
            $classified->rating = $request->rating;
            $classified->classified_id = $request->classified_id;
            $classified->save();
            session()->flash('msg', 'Comment Posted Successfully!');
            return redirect('classified-details' . '/' . $request->classified_id);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function postEventComment(Request $request){
        try {
            $comment = new EventComment();
            $comment->user_id = Session::get('userId');
            $comment->comment = $request->comment;
            $comment->event_id = $request->event_id;
            $comment->rating = $request->rating;
            $comment->save();
            session()->flash('msg', 'Comment Posted Successfully!');
            return redirect('event-details' . '/' . $request->event_id);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function postForumReply(Request $request){
        try {
            $reply = new ForumReplies();
            $reply->user_id = Session::get('userId');
            $reply->reply = $request->reply;
            $reply->forum_id = $request->forum_id;
            $reply->save();
            session()->flash('msg', 'Reply Posted Successfully!');
            return redirect('topic' . '/' . $request->forum_id);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function postMovieComment(Request $request){
        try {
            $comment = new MovieComment();
            $comment->user_id = Session::get('userId');
            $comment->comment = $request->comment;
            $comment->movie_id = $request->movie_id;
            $comment->rating = $request->rating;
            $comment->save();
            session()->flash('msg', 'Comment Posted Successfully!');
            return redirect('movie-details' . '/' . $request->movie_id);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function sendMessageToAdvertiser(Request $request){
        try {
            $classified = Clasified::where('id', $request->classified_id)->first();
            $userEmail = User::where('id', $classified->user_id)->first()['email'];
            $subject = new SendEmailService(new EmailSubject($request->name . " has mailed you regarding your classified Ad on " . env('APP_NAME')));
            $mailTo = new EmailAddress($userEmail);
            $invitationMessage = new InvitationMessageBody();
            $emailBody = $invitationMessage->invitationMessageBody($request, $classified);
            $body = new EmailBody($emailBody);
            $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
            $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
            $result = $sendEmail->send($emailMessage);
            session()->flash('msg', 'Message Sent Successfully!');
            return redirect('classified-details' . '/' . $request->classified_id);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }


    public function updateClassified(Request $request){
        try {
            $classified = Clasified::where('id', $request->id)->first();
            $classified->title = $request->title;
            $classified->description = $request->description;
            $classified->phone = $request->phone;
            $classified->category = $request->category;

            if ($request->hasfile('files')) {
                $files = $request->file('files');
                foreach ($files as $file){
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/classified/',  $name);
                    $classified->image = $name;
                }
            }
            $classified->update();
            session()->flash('msg', 'Classified Updated Successfully!');
            return redirect('my-classifieds');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function addClassified(){
        return view('add-classified');
    }



    //events


    public function myEvents(){
        $events = Event::where('user_id', Session::get('userId'))->latest()->get();
        foreach ($events as $item){
            $item->adViewed = Eventview::where('event_id', $item->id)->count();
        }
        return view('my-events')->with(['events' => $events]);
    }

    public function deleteEvent($id){
        try {
            $dreams = Event::where('id', $id)->first()->delete();
            session()->flash('msg', 'Event deleted Successfully!');
            return redirect('my-events');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function deleteMovie($id){
        try {
            $dreams = Movie::where('id', $id)->first()->delete();
            session()->flash('msg', 'Movie deleted Successfully!');
            return redirect('my-movies');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function editEvent($id){
        try {
            $event = Event::where('id', $id)->first();

            return view('edit-event')->with(['event' => $event]);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function editMovie($id){
        try {
            $movie = Movie::where('id', $id)->first();

            return view('edit-movie')->with(['movie' => $movie]);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function getEventPhoto($id){
        $img = Event::where('id', $id)->first();
        $file =  base_path('/data') . '/event/' . $img->image;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function getMoviePhoto($id){
        $img = Movie::where('id', $id)->first();
        $file =  base_path('/data') . '/movie/' . $img->image;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function saveEvent(Request $request){
        try {
            $event = new Event();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->phone = $request->phone;
            $event->user_id = Session::get('userId');

            if ($request->hasfile('files')) {
                $files = $request->file('files');
                foreach ($files as $file){
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/event/',  $name);
                    $event->image = $name;
                }
            }
            $event->save();
            session()->flash('msg', 'Event Posted Successfully!');
            return redirect('my-events');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function saveMovie(Request $request){
        try {
            $event = new Movie();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->phone = $request->phone;
            $event->user_id = Session::get('userId');

            if ($request->hasfile('files')) {
                $files = $request->file('files');
                foreach ($files as $file){
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/movie/',  $name);
                    $event->image = $name;
                }
            }
            $event->save();
            session()->flash('msg', 'Movie Posted Successfully!');
            return redirect('my-movies');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function saveTopic(Request $request){
        try {
            $forum = new Forum();
            $forum->topic = $request->title;
            $forum->description = $request->description;
            $forum->user_id = Session::get('userId');
            $forum->save();
            session()->flash('msg', 'Topic Posted Successfully!');
            return redirect('forum');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }


    public function updateEvent(Request $request){
        try {
            $event = Event::where('id', $request->id)->first();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->phone = $request->phone;

            if ($request->hasfile('files')) {
                $files = $request->file('files');
                foreach ($files as $file){
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/event/',  $name);
                    $event->image = $name;
                }
            }
            $event->update();
            session()->flash('msg', 'Event Updated Successfully!');
            return redirect('my-events');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function updateMovie(Request $request){
        try {
            $event = Movie::where('id', $request->id)->first();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->phone = $request->phone;

            if ($request->hasfile('files')) {
                $files = $request->file('files');
                foreach ($files as $file){
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/movie/',  $name);
                    $event->image = $name;
                }
            }
            $event->update();
            session()->flash('msg', 'Movie Updated Successfully!');
            return redirect('my-movies');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function addEvent(){
        return view('add-events');
    }

    public function addTopic(){
        return view('add-topic');
    }

    public function addMovie(){
        return view('add-movie');
    }













    public function myPayments(){
        $user = User::where('id', Session::get('userId'))->first();
        $paymentHistory = PaymentHistory::where('user_id', Session::get('userId'))->latest()->get();
        return view('my-payments')->with(['user' => $user, 'paymentHistory' => $paymentHistory]);
    }

    public function endSubscription($id){
        $user = User::where('id', Session::get('userId'))->first();
        $user->active= 0;
        $user->update();
        $subject = new SendEmailService(new EmailSubject("Sad to see you go from dreaming123 community!"));
        $mailTo = new EmailAddress($user->email);
        $invitationMessage = new UnsubscribeMessage();
        $emailBody = $invitationMessage->unsubscribeMessageBody();
        $body = new EmailBody($emailBody);
        $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
        $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
        $result = $sendEmail->send($emailMessage);
        $dreams = dreams::where('user_id', $user->id)->get();
        foreach ($dreams as  $dream){
            $dream->delete();
        }
        $user->delete();
        Session::flush();
        return redirect('');
    }

    public function unsubscribe($token){
        $token = JWT::decode($token, 'secret-2021', array('HS256'));
        if (empty($token)){
            return json_encode("Access Denied");
        }
        $user = User::where('id', $token)->first();
        $user->active= 0;
        $user->update();

        $subject = new SendEmailService(new EmailSubject("Sad to see you go from dreaming123 community!"));
        $mailTo = new EmailAddress($user->email);
        $invitationMessage = new UnsubscribeMessage();
        $emailBody = $invitationMessage->unsubscribeMessageBody();
        $body = new EmailBody($emailBody);
        $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
        $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
        $result = $sendEmail->send($emailMessage);
        $dreams = dreams::where('user_id', $user->id)->get();
        foreach ($dreams as  $dream){
            $dream->delete();
        }
        $user->delete();
        Session::flush();
        return $emailBody;
    }

    public function activateSubscription($id){
        $user = User::where('id', Session::get('userId'))->first();
        $user->active= 1;
        $user->update();
        return redirect()->back();
    }

    public function saveDream(Request $request){
        $dream = new dreams();
        $dream->dream = $request->dream;
        $dream->user_id = Session::get('userId');
        $dream->save();
        return redirect('translate/' . $dream->id);
    }
    public function translate($id){
        if (\App\User::where('id',\Illuminate\Support\Facades\Session::get('userId'))->first()['active'] != 1){
            return redirect()->back();
        }

        $dream = dreams::where('id', $id)->first();
        $dreamStr = $dream->dream;
        $dreamStr = str_replace(',', '', $dreamStr);
        $dreamStr = str_replace('.', '', $dreamStr);

        preg_replace("/\b\S{1,3}\b/", "", $dreamStr);
        $dreamStr = preg_split("/\s+/", $dreamStr);
        $wordMeaning = [];
        foreach ($dreamStr as $word){

          if (WordMeaning::where('word', $word)->exists()){
              $index = WordMeaning::where('word', $word)->first();
              array_push($wordMeaning, $index);
          }
          else if (WordMeaning::where('word', strtolower($word))->exists()){
              $index = WordMeaning::where('word', strtolower($word))->first();
              array_push($wordMeaning, $index);
          }
          else if (WordMeaning::where('word', strtoupper($word))->exists()){
              $index = WordMeaning::where('word', strtoupper($word))->first();
              array_push($wordMeaning, $index);
          }
          else if (WordMeaning::where('word', ucfirst($word))->exists()){
              $index = WordMeaning::where('word', ucfirst($word))->first();
              array_push($wordMeaning, $index);
          }

        }
        return view('translate')->with(['dream' => $dream, 'wordMeaning' => $wordMeaning]);
    }


    public function myProfile(){
        $user = User::where('id',Session::get('userId'))->first();
        $userLang = UserLanguage::where('user_id', $user->id)->get();
        $userLanguages = [];
        foreach ($userLang as $item){
            array_push($userLanguages, $item->language);
        }
        return view('my-profile')->with(['user' => $user, 'userLanguages' => $userLanguages]);
    }

    public function updateprofile(Request $request){
        try {
            $user = User::where('id',Session::get('userId'))->first();
            $user->name = $request->name;
            if (!empty($request->password)){
                $user->password = md5($request->password);
            }
            if (empty($request->subscribe)){
                $user->subscribe = 0;
            }else{
                $user->subscribe = 1;
            }
            $user->update();

            $userLangList = UserLanguage::where('user_id', $user->id)->get();
            foreach ($userLangList as $item){
                $item->delete();
            }

            $languages = $request->language;
            $flag = false;
            if (!empty($languages)){
                foreach ($languages as $language){
                    if ($language == 'All'){
                        $flag = true;
                        break;
                    }
                    $userLang = new UserLanguage();
                    $userLang->language = $language;
                    $userLang->user_id = $user->id;
                    $userLang->save();
                }
            }

//            $userLangList = UserLanguage::where('user_id', $user->id)->get();
//            foreach ($userLangList as $item){
//                $item->delete();
//            }
            if ($flag == true || empty($languages)){
                $allLanguages = ['Hindi','Telugu','Tamil','Kannada','Malayalam'];
                foreach ($allLanguages as $item){
                    $userLang = new UserLanguage();
                    $userLang->language = $item;
                    $userLang->user_id = $user->id;
                    $userLang->save();
                }
            }
            session()->flash('msg', 'Profile Updated Successfully!');
            return redirect('my-profile');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function updatecarddetails(Request $request){
        try {

            $stripe = \Cartalyst\Stripe\Laravel\Facades\Stripe::setApiKey(env('STRIPE_SECRET'));
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->cardNumber,
                    'exp_month' => $request->month,
                    'exp_year' => $request->year,
                    'cvc' => $request->cvv,
                ],
            ]);

            if (!isset($token['id'])) {
                return redirect()->back()->withErrors("Invalid Card! Please try again!");
            }
            $user = User::where('id',Session::get('userId'))->first();
            $user->card = ($request->cardNumber);
            $user->exp_year = ($request->year);
            $user->exp_month = ($request->month);
            $user->cvv = ($request->cvv);
            $user->update();
            session()->flash('msg', 'Card Updated Successfully!');
            return redirect('payment-method');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function paymentMethod(){
        return view('payment-method');
    }

    public function contactUsers(){
        $users = User::where('id','!=',Session::get('userId'))->get();
        foreach ($users as $user){
            $user->newUser = 1;
            if (Chat::where('sender', $user->email)->orWhere('receiver', $user->email)->exists()){
                $user->newUser = 0;
            }
            $user->unread = Chat::where('sender', $user->email)->where('status', 0)->count();
        }
        return view('contact-users')->with(['users' => $users]);
    }

    public function startchat(Request $request){
        $chat = new Chat();
        $chat->sender = User::where('id', Session::get('userId'))->first()['email'];
        $chat->receiver = $request->receiver;
        $chat->message = $request->custom_message;
        $chat->save();
        $receiverId = User::where('email', $request->receiver)->first()['id'];
        return redirect('chat-details/' . $receiverId);
    }

    public function sendMessage(Request $request){
        $chat = new Chat();
        $chat->sender = User::where('id', Session::get('userId'))->first()['email'];
        $chat->receiver = $request->receiver;
        $chat->message = $request->message;
        $chat->save();
        return redirect('chat-details/');
    }

    public function chatDetails(){
        $me = User::where('id', Session::get('userId'))->first();
        $myEmail = $me['email'];


        $chat = Chat::where('id','>',0)->get();
        return view('chat-details')->with(['chat' => $chat, 'myEmail' => $myEmail]);

    }

    public function import(Request $request){
        set_time_limit(360000);
        $csvModal = new CSVModal();
        \Excel::import($csvModal, request()->file('select_file'));
        $dataList = $csvModal->getData();
        foreach ($dataList as $data) {
            $Letter = explode("-", $data['name']);
            $wordMeaning = new WordMeaning();
            $wordMeaning->word =  $Letter[0];
            $wordMeaning->meaning =  $Letter[1];
            $wordMeaning->save();
        }
        return json_encode(['status' => true, 'message' => 'Excel Data Imported successfully.']);
    }
}
