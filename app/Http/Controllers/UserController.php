<?php
namespace App\Http\Controllers;

use App\Adview;
use App\Category;
use App\Clasified;
use App\ClassifiedComment;
use App\dreams;
use App\Event;
use App\EventComment;
use App\Eventview;
use App\Forum;
use App\ForumReplies;
use App\ForumView;
use App\Http\Controllers\Controller;
use App\Movie;
use App\MovieComment;
use App\MovieView;
use App\PaymentHistory;
use App\UserLanguage;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use services\email_messages\ForgotPasswordMessage;
use services\email_messages\InvitationMessageBody;
use services\email_services\EmailAddress;
use services\email_services\EmailBody;
use services\email_services\EmailMessage;
use services\email_services\EmailSender;
use services\email_services\EmailSubject;
use services\email_services\MailConf;
use services\email_services\PhpMail;
use services\email_services\SendEmailService;

class UserController extends Controller
{
    public function get(Request $request)
    {
        $user_id = $request->get("uid", 0);
        $user = User::find($user_id);
        return $user;
    }

    public function home(){
        $classifieds = Clasified::where('id','>',0)->orderBy('id', 'DESC')->limit(5)->get();
        $events = Event::where('id','>',0)->orderBy('id', 'DESC')->limit(3)->get();
        $movies = Movie::where('id','>',0)->orderBy('id', 'DESC')->limit(3)->get();
        $categories = Category::all();
        foreach ($categories as $category){
            $category->count = Clasified::where('category', $category->name)->count();
        }
        return view('landing')->with(['classifieds' => $classifieds, 'events' => $events,'categories' => $categories, 'movies' => $movies]);
    }

    public function classified(){
        $classifieds = Clasified::where('id','>',0)->orderBy('id', 'DESC')->get();
        foreach ($classifieds as $item){
            $item->adViews = Adview::where('classified_id', $item->id)->count();
            $item->comments = ClassifiedComment::where('classified_id', $item->id)->get();
            $rating = 0;
            $count = 0;
            foreach ($item->comments as $comment){
                if ((int)$comment->rating > 0){
                    $rating = $rating + (int)$comment->rating;
                    $count++;
                }
            }
            if ($rating > 0){
                $rating = $rating / $count;
            }else{
                $rating =  5;
            }
            $item->rating = round($rating, 1);
            $item->reviews = $count;
        }
        return view('classified')->with(['classifieds' => $classifieds]);
    }

    public function classifiedDetails($id){
        $classified = Clasified::where('id',$id)->first();
        $classified->email = User::where('id', $classified->user_id)->first()['email'];
        $classified->comments = ClassifiedComment::where('classified_id', $classified->id)->get();

        try {
            if(!Adview::where('ip', request()->ip())->where('useragent', request()->userAgent())->where('classified_id', $classified->id)->exists()) {

                $adview = new Adview();
                $adview->ip = request()->ip();
                $adview->useragent = request()->userAgent();
                $adview->classified_id = $classified->id;
                $adview->save();
            }
        }catch (\Exception $exception){

        }
        $adViewed = Adview::where('classified_id', $classified->id)->count();
        return view('classified-details')->with(['classified' => $classified, 'adViewed' => $adViewed]);
    }

    public function eventDetails($id){
        $event = Event::where('id',$id)->first();
        $event->email = User::where('id', $event->user_id)->first()['email'];
        $event->comments = EventComment::where('event_id', $event->id)->get();

        try {
            if(!Eventview::where('ip', request()->ip())->where('useragent', request()->userAgent())->where('event_id', $event->id)->exists()){
                $eventview = new Eventview();
                $eventview->ip = request()->ip();
                $eventview->useragent = request()->userAgent();
                $eventview->event_id = $event->id;
                $eventview->save();
            }

        }catch (\Exception $exception){

        }
        $adViewed = Eventview::where('event_id', $event->id)->count();
        return view('event-details')->with(['event' => $event, 'adViewed' => $adViewed]);
    }

    public function movieDetails($id){
        $movie = Movie::where('id',$id)->first();
        $movie->email = User::where('id', $movie->user_id)->first()['email'];
        $movie->comments = MovieComment::where('movie_id', $movie->id)->get();

        try {
            if(!MovieView::where('ip', request()->ip())->where('useragent', request()->userAgent())->where('movie_id', $movie->id)->exists()){
                $movieView = new MovieView();
                $movieView->ip = request()->ip();
                $movieView->useragent = request()->userAgent();
                $movieView->movie_id = $movie->id;
                $movieView->save();
            }

        }catch (\Exception $exception){

        }
        $adViewed = MovieView::where('movie_id', $movie->id)->count();
        return view('movie-details')->with(['movie' => $movie, 'adViewed' => $adViewed]);
    }


    public function classifiedByCategory($id){
        $category = Category::where('id', $id)->first()['name'];
        $classifieds = Clasified::where('category',$category)->orderBy('id', 'DESC')->get();
        foreach ($classifieds as $item){
            $item->adViews = Adview::where('classified_id', $item->id)->count();
            $item->comments = ClassifiedComment::where('classified_id', $item->id)->get();
            $rating = 0;
            $count = 0;
            foreach ($item->comments as $comment){
                if ((int)$comment->rating > 0){
                    $rating = $rating + (int)$comment->rating;
                    $count++;
                }
            }
            if ($rating > 0){
                $rating = $rating / $count;
            }else{
                $rating =  5;
            }
            $item->rating = round($rating, 1);
            $item->reviews = $count;
        }
        return view('classified-by-category')->with(['classifieds' => $classifieds, 'category' => $category]);
    }

    public function events(){
        $events = Event::where('id','>',0)->orderBy('id', 'DESC')->get();
        foreach ($events as $item){
            $item->adViews = Eventview::where('event_id', $item->id)->count();
            $item->comments = EventComment::where('event_id', $item->id)->get();
            $rating = 0;
            $count = 0;
            foreach ($item->comments as $comment){
                if ((int)$comment->rating > 0){
                    $rating = $rating + (int)$comment->rating;
                    $count++;
                }
            }
            if ($rating > 0){
                $rating = $rating / $count;
            }else{
                $rating =  5;
            }
            $item->rating = round($rating, 1);
            $item->reviews = $count;
        }
        return view('events')->with(['events' => $events]);
    }

    public function forum(){
        $forum = Forum::where('id','>',0)->orderBy('id', 'DESC')->get();
        foreach ($forum as $item){
            $item->adViews = ForumView::where('forum_id', $item->id)->count();
            $item->replies = ForumReplies::where('forum_id', $item->id)->count();
            $item->user = User::where('id', $item->user_id)->first();
        }
        return view('forum')->with(['forum' => $forum]);
    }

    public function topic($id){
        $forum = Forum::where('id',$id)->first();
        $forum->user = User::where('id', $forum->user_id)->first();
        $forum->replies = ForumReplies::where('forum_id', $forum->id)->get();

        try {
            if(!ForumView::where('ip', request()->ip())->where('useragent', request()->userAgent())->where('forum_id', $forum->id)->exists()){
                $forumView = new ForumView();
                $forumView->ip = request()->ip();
                $forumView->useragent = request()->userAgent();
                $forumView->forum_id = $forum->id;
                $forumView->save();
            }

        }catch (\Exception $exception){

        }
        $adViewed = ForumView::where('forum_id', $forum->id)->count();
        return view('forum-details')->with(['forum' => $forum, 'adViewed' => $adViewed]);
    }

    public function movies(){
        $movies = Movie::where('id','>',0)->orderBy('id', 'DESC')->get();
        foreach ($movies as $item){
            $item->adViews = MovieView::where('movie_id', $item->id)->count();
            $item->comments = MovieComment::where('movie_id', $item->id)->get();
            $rating = 0;
            $count = 0;
            foreach ($item->comments as $comment){
                if ((int)$comment->rating > 0){
                    $rating = $rating + (int)$comment->rating;
                    $count++;
                }
            }
            if ($rating > 0){
                $rating = $rating / $count;
            }else{
                $rating =  5;
            }
            $item->rating = round($rating, 1);
            $item->reviews = $count;
        }
        return view('movies')->with(['movies' => $movies]);
    }

    public function sendEmail(Request $request){
        $msg = "Name : " .$request->name . "<br>". "Email : " .$request->email . "<br>" . "Message : " .$request->message . "<br>";
        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        // send email
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <'.$request->email.'>' . "\r\n";
        mail("me.aliriaz007@gmail.com",$request->subject,$msg, $headers);
        return redirect()->back();
    }

    public function openPayment(Request $request){
        $dream = $request->dream;
        $dreamTable = new dreams();
        $dreamTable->user_id = md5(rand(0,5000));
        $dreamTable->dream = $dream;
        $dreamTable->save();
        return redirect('complete-payment/' . $dreamTable->user_id);
    }

    public function completePaymentView($userId){
        return view('complete-payment')->with(['userId' => $userId]);
    }

    public function completeRegistration(Request $request){
        try {
            if (User::where('email',$request->email)->exists()){
                return redirect()->back()->withErrors("Email Already Exists!");
            }
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
                return redirect()->back()->withErrors("Token Id does not Exists! Please try again!");
            }



            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => 'GBP',
                'amount' => 1.99,
                'description' => 'wallet',
            ]);

            if ($charge['status'] == 'succeeded') {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = md5($request->password);
                $user->card = ($request->cardNumber);
                $user->exp_year = ($request->year);
                $user->exp_month = ($request->month);
                $user->cvv = ($request->cvv);
                $user->last_payment = date('Y-m-d');
                $user->save();

                if (dreams::where('user_id', $request->userId)->exists()){
                    $dream = dreams::where('user_id', $request->userId)->first();
                    $dream->user_id = $user->id;
                    $dream->update();
                }


                $paymentHistory = new PaymentHistory();
                $paymentHistory->user_id = $user->id;
                $paymentHistory->amount = 1.99;
                $paymentHistory->date = date('Y-m-d');
                $paymentHistory->save();

                Session::put('userId', $user->id);
                $dreamId = dreams::where('user_id', $user->id)->latest()->first()['id'];
                $userEncodedId = JWT::encode($user->id, 'secret-2021');
                $subject = new SendEmailService(new EmailSubject("Your account has been created on Dreaming123 Community"));
                $mailTo = new EmailAddress($user->email);
                $invitationMessage = new InvitationMessageBody();
                $emailBody = $invitationMessage->invitationMessageBody($userEncodedId);
                $body = new EmailBody($emailBody);
                $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
                $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
                $result = $sendEmail->send($emailMessage);


                return redirect('translate/' . $dreamId);


            } else {
                return redirect()->back()->withErrors("Payment unsuccessfull! Please try again!");

            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function userpostlogin(Request $request){
        if (User::where('email', $request->email)->where('password', md5($request->password))->exists()){
            $user = User::where('email', $request->email)->where('password', md5($request->password))->first();
            if ($user->active == 0){
                return redirect()->back()->withErrors("You are blocked by admin.");
            }
            Session::put('userId', $user->id);
            return redirect('home');
        }else{
            return redirect()->back()->withErrors("Invalid Credentials! Please try again!");
        }
    }

    public function userpostSignup(Request $request){
        try {
            if (empty($request->terms)){
                return redirect()->back()->withErrors("Please accept the term and conditions to continue");
            }
            if (!User::where('email', $request->email)->exists()){
                if ($request->password != $request->conpassword){
                    return redirect()->back()->withErrors("Password mismatch!");
                }
                if (strlen($request->password) < 5){
                    return redirect()->back()->withErrors("Password must contains 5 characters atleast!");
                }
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = md5($request->password);
                if (empty($request->subscribe)){
                    $user->subscribe = 0;
                }else{
                    $user->subscribe = 1;
                }
                $user->save();

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

                if ($flag == true || empty($languages)){
                    $allLanguages = ['Hindi','Telugu','Tamil','Kannada','Malayalam'];
                    foreach ($allLanguages as $item){
                        $userLang = new UserLanguage();
                        $userLang->language = $item;
                        $userLang->user_id = $user->id;
                        $userLang->save();
                    }
                }

                Session::put('userId', $user->id);
//                $subject = new SendEmailService(new EmailSubject("Your account has been created on Community"));
//                $mailTo = new EmailAddress($user->email);
//                $invitationMessage = new InvitationMessageBody();
//                $emailBody = $invitationMessage->invitationMessageBody();
//                $body = new EmailBody($emailBody);
//                $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
//                $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
//                $result = $sendEmail->send($emailMessage);
                return redirect('home');
            }else{
                return redirect()->back()->withErrors("Email Already Exists!");
            }
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());

        }

    }

    public function userLogin(){
        return view('user-login');
    }

    public function forgotPassword(){
        return view('forgot-password');
    }

    public function sendresetpasswordlink(Request $request){
        if (!User::where('email', $request->email)->exists()){
            return redirect()->back()->withErrors("Email not Exists!");
        }
        try {
            $subject = new SendEmailService(new EmailSubject("Reset Password Link from " . env('APP_NAME')));
            $mailTo = new EmailAddress($request->email);
            $invitationMessage = new ForgotPasswordMessage();
            $token = JWT::encode($request->email, 'Secret-2021');
            $emailBody = $invitationMessage->invitationMessageBody($token);
            $body = new EmailBody($emailBody);
            $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
            $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
            $result = $sendEmail->send($emailMessage);
            session()->flash('msg', 'Link Sent Successfully! Please check your inbox.');
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());

        }

    }


    public function resetpasswordBackend(Request $request){
        if (!User::where('email', $request->email)->exists()){
            return redirect()->back()->withErrors("Email not Exists!");
        }
        if ($request->password != $request->confirmpassword){
            return redirect()->back()->withErrors("Password Mismatched!");

        }
        try {
            $user = User::where('email', $request->email)->first();
            $user->password = md5($request->password);
            $user->update();
            session()->flash('msg', 'Password Updated! Please login now!');
            return redirect('user-login');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());

        }

    }

    public function resetPassword($token){
        $token = JWT::decode($token, 'Secret-2021', array('HS256'));
        if (empty($token)){
            return json_encode("Access Denied");
        }
        return view('reset-password')->with(['email' => $token]);
    }

    public function userSignup(){
        return view('user-signup');
    }
}
