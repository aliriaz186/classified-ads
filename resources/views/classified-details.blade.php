@extends('layouts.landing')
@section('content')

    <div class="whiteBG pt80 pb60">
        <div class="container space-2 space-3--lg">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <h2 class="h3">{{$classified->title}}</h2>
                <a href="{{url('')}}" style="color:#000;text-decoration: underline">Home</a> > <a href="{{url('classified')}}" style="color:#000;text-decoration: underline">All Classifieds</a>

            </div>
            <!-- End Title -->
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

            <div class="row">
                <div class="col-md-12"
                         style="padding: 30px;background: #383f44;margin-left: 20px;margin-top: 20px;color: white">
                    <p style="float: right">Ad Viewed : {{$adViewed ?? 0}} Times</p><br>
                    <div style="margin-top: 10px">
                        <a  href="{{url('add-classified')}}" style="background: #383f44;color: white;float: right" class="btn btn-secondary">Post New Classified</a>
                    </div><br>
                    <h3 style="color: white;">Category : {{$classified->category}}</h3><br>
                    @if(!empty($classified->image))
                        <a target="_blank" href="{{url('/get-classified-photo')}}/{{$classified->id}}">
                            <img src="{{url('/get-classified-photo')}}/{{$classified->id}}" style="height: 300px;width: 300px" alt="">
                        </a>
                    @endif
                        <br>
                    <br>

                    <p>{{$classified->description}}</p><br>
                    <p>Phone : <a style="color: white" href="tel:{{$classified->phone ?? ''}}">{{$classified->phone ?? ''}}</a></p>
                    <p>Email : <a style="color: white" href="mailto:{{$classified->email ?? ''}}">{{$classified->email ?? ''}}</a></p>
                        <br><p style="font-size: 12px;text-align: right">Posted on {{$classified->created_at}}</p>

                    <div class="row" style="margin-top: 40px">
                        <div class="col-md-6" style="border-right: 1px solid white">
                            <h3 style="color: white;text-align: center">Comments</h3>
                            <div>
                                @if(\Illuminate\Support\Facades\Session::has('userId'))
                                <form action="{{url('post-classified-comment')}}" method="post">
                                    @csrf
                                    <div>
                                        <label>Your Comment</label><br>
                                        <input type="hidden" name="classified_id" value="{{$classified->id ?? ''}}">
                                        <input type="text" name="comment" class="form-control" required>
                                    </div><br>
                                    <div>
                                        <button class="btn btn-secondary">Send</button>
                                    </div>
                                </form>
                                @else
                                    <div>Please <a style="color: white;text-decoration: underline" href="{{url('user-login')}}">login</a> to your post comments</div>
                                @endif
                                <br>
                                <br>
                                    <div style="max-height: 400px;overflow-y: scroll;padding: 10px">
                                        @foreach($classified->comments as $item)
                                            <div style="padding: 10px;border: 1px solid white;color: white;margin-top: 10px">
                                                <h3 style="color: white">{{$item->comment}}</h3>
                                                <p style=";font-size: 12px">Posted on {{$item->created_at}}</p>
                                                <p style=";font-size: 12px">Posted by {{\App\User::where('id', $item->user_id)->first()['email']}}</p>

                                            </div>
                                        @endforeach
                                    </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 style="color: white;text-align: center">Email to Advertiser</h3>
                            <div>
                                <form action="{{url('send-message-to-advertiser')}}" method="post">
                                    @csrf
                                    <div>
                                        <input type="hidden" name="classified_id" value="{{$classified->id ?? ''}}">
                                        <label>Name</label><br>
                                        <input type="text" name="name" class="form-control" required>
                                    </div><br>
                                    <div>
                                        <label>Email</label><br>
                                        <input type="text" name="email" class="form-control" required>
                                    </div><br>
                                    <div>
                                        <label>Phone</label><br>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div><br>
                                    <div>
                                        <label>Message</label><br>
                                        <textarea name="message" class="form-control" required></textarea>
                                    </div><br>
                                    <div>
                                       <button class="btn btn-secondary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    </div>
            </div>
            <br>
        </div>
    </div>

@endsection
