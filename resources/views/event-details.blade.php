@extends('layouts.landing')
@section('content')

    <div class="whiteBG pt80 pb60">
        <div class="container space-2 space-3--lg">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <h2 class="h3">{{$event->title}}</h2>
                <a href="{{url('')}}" style="color:#000;text-decoration: underline">Home</a> > <a href="{{url('events')}}" style="color:#000;text-decoration: underline">All Events</a>

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
                <div class="col-md-12" style="padding: 30px;background: #383f44;margin-left: 20px;margin-top: 20px;color: white">
                    <p style="float: right">Ad Viewed : {{$adViewed ?? 0}} Times</p><br>
                    <div style="margin-top: 10px">
                        <a  href="{{url('add-events')}}" style="background: #383f44;color: white;float: right" class="btn btn-secondary">Post New Event</a>
                    </div><br>
                    @if(!empty($event->image))
                        <a target="_blank" href="{{url('/get-event-photo')}}/{{$event->id}}">
                            <img src="{{url('/get-event-photo')}}/{{$event->id}}" style="height: 300px;width: 300px" alt="">
                        </a>
                    @endif
                    <br>
                    <br>
                    <p>{{$event->description}}</p><br>
                    <p>Phone : <a style="color: white" href="tel:{{$event->phone ?? ''}}">{{$event->phone ?? ''}}</a></p>
                    <p>Email : <a style="color: white" href="mailto:{{$event->email ?? ''}}">{{$event->email ?? ''}}</a></p>
                    <br><p style="font-size: 12px;text-align: right">Posted on {{$event->created_at}}</p>
                    <div class="row" style="margin-top: 40px">
                        <div class="col-md-12" style="border-right: 1px solid white">
                            <h3 style="color: white;text-align: center">Comments</h3>
                            <div>
                                @if(\Illuminate\Support\Facades\Session::has('userId'))
                                    <form action="{{url('post-event-comment')}}" method="post">
                                        @csrf
                                        <div>
                                            <label>Your Comment</label><br>
                                            <input type="hidden" name="event_id" value="{{$event->id ?? ''}}">
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
                                    @foreach($event->comments as $item)
                                        <div style="padding: 10px;border: 1px solid white;color: white;margin-top: 10px">
                                            <h3 style="color: white">{{$item->comment}}</h3>
                                            <p style=";font-size: 12px">Posted on {{$item->created_at}}</p>
                                            <p style=";font-size: 12px">Posted by {{\App\User::where('id', $item->user_id)->first()['email']}}</p>

                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>

@endsection
