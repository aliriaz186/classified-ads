@extends('layouts.landingapp')
@section('content')

    <link rel="stylesheet" href="{{url('')}}/newtheme/css/custom/rightbar-details.css">
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content"><h2>{{$forum->topic}}</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('forum')}}">All Topics</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$forum->topic}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ad-details-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
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
                    <div class="ad-details-card">
                        <div class="ad-details-breadcrumb">
                            <ol class="breadcrumb">
                                <li><span class="flat-badge sale">Topic</span></li>
                                {{--                                <li class="breadcrumb-item"><a href="#">Property</a></li>--}}
                                {{--                                <li class="breadcrumb-item active" aria-current="page">house</li>--}}
                            </ol>
                        </div>
                        <div class="ad-details-heading"><h2><a href="#">
                                    {{$forum->topic}}
                                </a></h2></div>
                        <ul class="ad-details-meta">
                            <li><a href="#"><i class="fas fa-eye"></i>
                                    <p>Views<span>({{$adViewed ?? 0}})</span></p></a></li>
                            <li><a href="#"><i class="fas fa-mouse"></i>
                                    <p>click<span>({{$adViewed ?? 0}})</span></p></a></li>
                            <li><a href="#"><i class="fas fa-star"></i>
                                    <p>Replies<span>({{count($forum->replies)}})</span></p></a></li>
                            {{--                            <li><a href="#"><i class="fas fa-heart"></i>--}}
                            {{--                                    <p>bookmark<span>(15)</span></p></a></li>--}}
                        </ul>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title"><h5>description</h5></div>
                        <div class="ad-details-descrip"><p>
                                {{$forum->description}}
                            </p></div>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title"><h5>Replies ({{count($forum->replies)}})</h5></div>
                        <div class="ad-details-review">
                            <ul class="review-list">

                                @foreach($forum->replies as $item)
                                    <li class="review-item">
                                        <div class="review">
                                            <div class="review-head">
                                                <div class="review-author">
                                                    <div class="review-meta"><h6><a href="#">{{\App\User::where('id', $item->user_id)->first()['name']}} -</a><span>{{$item->created_at}}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-content"><p>
                                                    {{ $item->reply}}
                                                </p></div>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                            @if(\Illuminate\Support\Facades\Session::has('userId'))
                                {{--                                <form >--}}

                                {{--                                    <div>--}}
                                {{--                                        <label>Your Comment</label><br>--}}
                                {{--                                        <input type="text" name="comment" class="form-control" required>--}}
                                {{--                                    </div><br>--}}
                                {{--                                    <div>--}}
                                {{--                                        <button class="btn btn-secondary">Send</button>--}}
                                {{--                                    </div>--}}
                                {{--                                </form>--}}
                                <form class="ad-review-form" action="{{url('post-forum-reply')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="forum_id" value="{{$forum->id ?? ''}}">

                                    {{--                                    <div class="ad-review-form-grid">--}}
                                    {{--                                        <div class="form-group"><input type="text" class="form-control" placeholder="Name">--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="form-group"><input type="email" class="form-control" placeholder="Email">--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="form-group"><select class="form-control custom-select">--}}
                                    {{--                                                <option selected>Qoute</option>--}}
                                    {{--                                                <option value="1">delivery system</option>--}}
                                    {{--                                                <option value="2">product quality</option>--}}
                                    {{--                                                <option value="3">payment issue</option>--}}
                                    {{--                                            </select></div>--}}
                                    {{--                                    </div>--}}
                                    <div class="form-group"><textarea class="form-control" name="reply" placeholder="Describe your reply"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-inline"><i class="fas fa-tint"></i><span>Drop your reply</span>
                                    </button>
                                </form>
                            @else
                                <div style="margin-top: 20px">Please <a style="color: blue;text-decoration: underline" href="{{url('user-login')}}">login</a> or <a style="color: blue;text-decoration: underline" href="{{url('user-signup')}}">register</a> to post reply</div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ad-details-price"><h5 style="font-size: 15px">Posted By : {{$forum->user->name}}</h5>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title"><h5>Ad</h5></div>
                        <div class="ad-details-profile">
                            <div>
                                <img src="{{url('')}}/ad.jpg" style="width: 300px">
                            </div>
                        </div>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title"><h5>Ad</h5></div>
                        <div class="ad-details-profile">
                            <div>
                                <img src="{{url('')}}/ad.jpg" style="width: 300px">
                            </div>
                        </div>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title"><h5>Ad</h5></div>
                        <div class="ad-details-profile">
                            <div>
                                <img src="{{url('')}}/ad.jpg" style="width: 300px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
