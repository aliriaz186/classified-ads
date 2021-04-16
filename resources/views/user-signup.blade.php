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
            <h2 class="textmain" style="color: white;text-align: center">SIGNUP</h2>
            <div style="margin: 0 auto;max-width: 800px;margin-top: 50px;">
                <div style="margin: 0 auto;max-width: 500px">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h4>{{$errors->first()}}</h4>
                        </div>
                    @endif
                    <form method="post" action="{{url('usersignup')}}">
                        @csrf
                        <div class="row" style="margin-top: 30px">
                            <div class="col-md-12">
                                <input  type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">
                                <input  type="password" class="form-control" placeholder="password" name="password" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">
                                <input type="password" class="form-control" placeholder="confirm password" name="conpassword" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <button class="btn btn-primary">SIGNUP</button>
                            </div>
                        </div>

                        <div style="margin: 0 auto;max-width: 200px;margin-top: 35px">
                            <br>
                            <span style="color: lightgrey">Already a member?</span><a href="{{url('user-login')}}" style="color: white"> Login here!</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>



@endsection
