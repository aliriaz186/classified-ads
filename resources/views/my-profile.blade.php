@extends('layouts.landingapp')
@section('content')

    <div class="p-4 ml-3"  style="margin-left: 20px">
        <div class="row">
            <div class="col-md-7 mt-2">

            </div>
        </div>
    </div>
    <h2 style="text-align: center">My Profile</h2>

    <div class="px-5"  style="margin-left: 20px">
        @if($errors->any())
            <div class="alert alert-danger">
                <h4 style="color: black;font-size: 14px">{{$errors->first()}}</h4>
            </div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('msg'))
            <div class="alert alert-success" style="margin-bottom: 0px!important;">
                <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
            </div>
        @endif
        <form action="{{url('updateprofile')}}" method="post">
            @csrf
            <div>
                <label>Name</label>
                <input class="form-control" name="name" required value="{{$user->name}}">
            </div><br>
            <div>
                <label>Email</label>
                <input disabled class="form-control" name="email" required value="{{$user->email}}">
            </div><br>
            <div>
                <label>New password <span style="font-size: 12px">(please left it blank if you don't want to change password)</span></label>
                <input class="form-control" name="password" value="">
            </div><br>
            <div style="margin-top: 10px;margin-bottom: 10px">
                <label>Select languages you can speak or understand</label><br>
                <input type="checkbox"  name="language[]" value="All"> <span>All</span>
                <input type="checkbox" {{in_array("Hindi", $userLanguages) ? "checked" : ""}} name="language[]" value="Hindi" style="margin-left: 8px"> <span>Hindi</span>
                <input type="checkbox" {{in_array("Telugu", $userLanguages) ? "checked" : ""}} name="language[]" value="Telugu" style="margin-left: 8px"> <span>Telugu</span>
                <input type="checkbox" {{in_array("Tamil", $userLanguages) ? "checked" : ""}} name="language[]" value="Tamil" style="margin-left: 8px"> <span>Tamil</span>
                <input type="checkbox" {{in_array("Kannada", $userLanguages) ? "checked" : ""}} name="language[]" value="Kannada" style="margin-left: 8px"> <span>Kannada</span>
                <input type="checkbox" {{in_array("Malayalam", $userLanguages) ? "checked" : ""}} name="language[]" value="Malayalam" style="margin-left: 8px"> <span>Malayalam</span>
            </div><br>
            <div style="margin-top: 20px">
                <input type="checkbox" name="subscribe[]" value="subscribe" {{$user->subscribe == 1 ? 'checked' : ''}}> <span>Subscribe to News Letter and email notifications</span>
            </div>
            <br>
            <br>
            <div style="margin-top: 30px">
                <button class="btn btn-success">Update Profile</button>
            </div>
        </form>
    </div>


@endsection
