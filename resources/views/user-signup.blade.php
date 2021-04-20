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
                                <input  type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">
                                <input  type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">
                                <input  type="password" class="form-control" placeholder="password" name="password" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">
                                <input type="password" class="form-control" placeholder="confirm password" name="conpassword" required>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">
                                <label style="color: white">Select languages you can speak or understand</label><br>
                                <input type="checkbox" name="language[]" value="All"> <span style="color: white">All</span>
                                <input type="checkbox" name="language[]" value="Hindi" style="margin-left: 8px"> <span style="color: white">Hindi</span>
                                <input type="checkbox" name="language[]" value="Telugu" style="margin-left: 8px"> <span style="color: white">Telugu</span>
                                <input type="checkbox" name="language[]" value="Tamil" style="margin-left: 8px"> <span style="color: white">Tamil</span>
                                <input type="checkbox" name="language[]" value="Kannada" style="margin-left: 8px"> <span style="color: white">Kannada</span>
                                <input type="checkbox" name="language[]" value="Malayalam" style="margin-left: 8px"> <span style="color: white">Malayalam</span>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <input type="checkbox" name="subscribe[]" value="subscribe"> <span style="color: white">Subscribe to News Letter and email notifications</span>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px">
                                <input type="checkbox" name="terms[]" value="subscribe"> <span style="color: white">I agree to the <a href="#" style="color: white;text-decoration: underline">terms and conditions</a></span>
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
