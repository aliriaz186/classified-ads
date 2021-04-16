<?php

namespace App\Http\Controllers;

use App\admin;
use App\Adview;
use App\Category;
use App\Clasified;
use App\Event;
use App\Eventview;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function loginPage(){
        return view('admin.login');
    }

    public function allUsers(){
        $users = User::all();
        return view('all-users')->with(['users' => $users]);
    }

    public function blockUser($id){
        $user = User::where('id', $id)->first();
        $user->active = 0;
        $user->update();
        session()->flash('msg', 'User blocked Successfully!');
        return redirect('all-users');
    }

    public function allClassifieds(){
        $classifieds = Clasified::all();
        foreach ($classifieds as $item){
            $item->adViewed = Adview::where('classified_id', $item->id)->count();
        }
        return view('all-classified')->with(['classifieds' => $classifieds]);
    }

    public function allEvents(){
        $events = Event::all();
        foreach ($events as $item){
            $item->adViewed = Eventview::where('event_id', $item->id)->count();
        }
        return view('all-events')->with(['events' => $events]);
    }

    public function deleteClassifiedByAdmin($id){
        try {
            $dreams = Clasified::where('id', $id)->first()->delete();
            session()->flash('msg', 'Classified deleted Successfully!');
            return redirect('all-classifieds');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function deleteEventByAdmin($id){
        try {
            $dreams = Event::where('id', $id)->first()->delete();
            session()->flash('msg', 'Event deleted Successfully!');
            return redirect('all-events');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function unBlockUser($id){
        $user = User::where('id', $id)->first();
        $user->active = 1;
        $user->update();
        session()->flash('msg', 'User unBlocked Successfully!');
        return redirect('all-users');
    }

    public function logoutAdmin(){
        Session::flush();
        return redirect('admin');
    }

    public function dashboard(){
        $classifiedCount = Clasified::all()->count();
        $eventCount = Event::all()->count();
        return view('admin.home')->with(['classifiedCount' => $classifiedCount, 'eventCount' => $eventCount]);

    }

    public function adminLogin(Request $request){
        if (admin::where('username', $request->email)->where('password', $request->password)->exists()){
           $admin = admin::where('username', $request->email)->where('password', $request->password)->first();
            Session::put('id', $admin->id);
            return redirect('admin-dashboard');
        }else{
            return redirect()->back()->withErrors(['Invalid Credentials']);
        }

    }
}
