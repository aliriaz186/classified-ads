@extends('layouts.landingapp')
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
    <section class="banner-part">
        <div class="container">
            <div class="banner-content">
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
                        <br>
                        <h3 style="color: white">LOGIN</h3>

                    <form method="post" action="{{url('userlogin')}}">
                        @csrf
                        <div class="row" style="margin-top: 30px">
                            <div class="col-md-12">
                                <input  type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">
                                <input  type="password" class="form-control" placeholder="password" name="password" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <button class="btn btn-primary">LOGIN</button>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <span style="color: lightgrey">Forgot Password?</span><a href="{{url('forgot-password')}}" style="color: white"> Click here to reset!</a>
                            </div>

                        </div>

                        <div style="margin: 0 auto;max-width: 200px;margin-top: 35px">
                            <br>
                            <span style="color: lightgrey">New Member?</span><a href="{{url('user-signup')}}" style="color: white"> Register here!</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
{{--    <div class="first-bg">--}}
{{--        <div style=";margin: 0 auto;max-width: 800px;margin-top: 100px;padding: 20px;background: rgb(45 52 58 / 65%);" class="circle">--}}
{{--            <h2 class="textmain" style="color: white;text-align: center">LOGIN</h2>--}}
{{--            <div style="margin: 0 auto;max-width: 800px;margin-top: 50px;">--}}
{{--                <div style="margin: 0 auto;max-width: 500px">--}}
{{--                    @if($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <h4>{{$errors->first()}}</h4>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                        @if(\Illuminate\Support\Facades\Session::has('msg'))--}}
{{--                            <div class="alert alert-success" style="margin-bottom: 0px!important;">--}}
{{--                                <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                    <form method="post" action="{{url('userlogin')}}">--}}
{{--                        @csrf--}}
{{--                        <div class="row" style="margin-top: 30px">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <input  type="email" class="form-control" name="email" placeholder="Email" required>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12" style="margin-top: 10px">--}}
{{--                                <input  type="password" class="form-control" placeholder="password" name="password" required>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12" style="margin-top: 20px">--}}
{{--                                <button class="btn btn-primary">LOGIN</button>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12" style="margin-top: 20px">--}}
{{--                                <span style="color: lightgrey">Forgot Password?</span><a href="{{url('forgot-password')}}" style="color: white"> Click here to reset!</a>--}}
{{--                            </div>--}}

{{--                        </div>--}}




{{--                        <div style="margin: 0 auto;max-width: 200px;margin-top: 35px">--}}
{{--                            <br>--}}
{{--                            <span style="color: lightgrey">New Member?</span><a href="{{url('user-signup')}}" style="color: white"> Register here!</a>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



@endsection
