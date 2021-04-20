@extends('layouts.landing')
@section('content')
    <style>
        .first-bg {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;;
            height: 900px;
            background-repeat: no-repeat;
            background-image: url('images/bg.jpg');
            padding: 35px;
        }
    </style>
    <div class="first-bg">
        <div style=";margin: 0 auto;max-width: 800px;margin-top: 100px;padding: 20px;background: rgb(45 52 58 / 65%);" class="circle">
            <h2 class="textmain" style="color: white;text-align: center">Reset Password</h2>
            <div style="margin: 0 auto;max-width: 800px;margin-top: 50px;">
                <div style="margin: 0 auto;max-width: 500px">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h4>{{$errors->first()}}</h4>
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('msg'))
                        <div class="alert alert-success" style="margin-bottom: 0px!important;">
                            <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
                        </div>
                    @endif
                    <form method="post" action="{{url('resetpassword')}}">
                        @csrf
                        <div class="row" style="margin-top: 30px">
                            <div class="col-md-12">
                                <input  type="hidden" value="{{$email}}" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <input  type="password" class="form-control" name="password" placeholder="New Password" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">
                                <input  type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <button class="btn btn-primary">Reset</button>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>



@endsection
