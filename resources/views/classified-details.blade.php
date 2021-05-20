@extends('layouts.landingapp')
@section('content')
    <link rel="stylesheet" href="{{url('')}}/newtheme/css/custom/rightbar-details.css">
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content"><h2>{{$classified->title}} details</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('classified')}}">All Classifieds</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$classified->title}}</li>
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
                                <li><span class="flat-badge sale">{{$classified->category}}</span></li>
{{--                                <li class="breadcrumb-item"><a href="#">Property</a></li>--}}
{{--                                <li class="breadcrumb-item active" aria-current="page">house</li>--}}
                            </ol>
                        </div>
                        <div class="ad-details-heading"><h2><a href="#">
                                    {{$classified->title}}
                                </a></h2></div>
                        <ul class="ad-details-meta">
                            <li><a href="#"><i class="fas fa-eye"></i>
                                    <p>Views<span>({{$adViewed ?? 0}})</span></p></a></li>
                            <li><a href="#"><i class="fas fa-mouse"></i>
                                    <p>click<span>({{$adViewed ?? 0}})</span></p></a></li>
                            <li><a href="#"><i class="fas fa-star"></i>
                                    <p>comments<span>({{count($classified->comments)}})</span></p></a></li>
{{--                            <li><a href="#"><i class="fas fa-heart"></i>--}}
{{--                                    <p>bookmark<span>(15)</span></p></a></li>--}}
                        </ul>
                        <div class="ad-details-slider slider-arrow">
                            <div><img src="{{url('/get-classified-photo')}}/{{$classified->id}}" alt="details"></div>
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
                        </div>
{{--                        <div class="ad-thumb-slider">--}}
{{--                            <div><img src="{{url('/get-classified-photo')}}/{{$classified->id}}" alt="details"></div>--}}
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                            <div><img src="images/product/01.jpg" alt="details"></div>--}}
{{--                        </div>--}}
                        <div class="ad-details-action">
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <button type="button"><i class="fas fa-heart"></i><span>bookmark</span></button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button type="button"><i class="fas fa-exclamation-triangle"></i><span>report</span>--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button type="button"><i class="fas fa-share-alt"></i><span>share</span></button>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title"><h5>Specification</h5></div>
                        <div class="ad-details-specific">
                            <ul>
{{--                                <li><h6>price:</h6>--}}
{{--                                    <p>$2,347</p></li>--}}
{{--                                <li><h6>seller type:</h6>--}}
{{--                                    <p>personal</p></li>--}}
                                <li><h6>published:</h6>
                                    <p>{{$classified->created_at}}</p></li>
{{--                                <li><h6>location:</h6>--}}
{{--                                    <p>jalkuri, narayanganj</p></li>--}}
                                <li><h6>category:</h6>
                                    <p>{{$classified->category}}</p></li>
{{--                                <li><h6>condition:</h6>--}}
{{--                                    <p>used</p></li>--}}
{{--                                <li><h6>price type:</h6>--}}
{{--                                    <p>negotiable</p></li>--}}
{{--                                <li><h6>ad type:</h6>--}}
{{--                                    <p>sales</p></li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title"><h5>description</h5></div>
                        <div class="ad-details-descrip"><p>
                                {{$classified->description}}
                            </p></div>
                    </div>
                    <div class="ad-details-card">
                        <div class="ad-details-title"><h5>Comments ({{count($classified->comments)}})</h5></div>
                        <div class="ad-details-review">
                            <ul class="review-list">

                                    @foreach($classified->comments as $item)
                                    <li class="review-item">
                                        <div class="review">
                                            <div class="review-head">
                                                <div class="review-author">
                                                    <div class="review-meta"><h6><a href="#">{{\App\User::where('id', $item->user_id)->first()['name']}} -</a><span>{{$item->created_at}}</span>
                                                        </h6>
                                                        <ul>
                                                            @for($i=0;$i<(int)$item->rating;$i++)
                                                                <li><i class="fas fa-star active"></i></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-content"><p>
                                                   {{ $item->comment}}
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
                                <form class="ad-review-form" action="{{url('post-classified-comment')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="classified_id" value="{{$classified->id ?? ''}}">

                                    <div class="star-rating"><input type="radio" value="5" name="rating" id="star-1"><label
                                            for="star-1"></label><input type="radio" value="4" name="rating" id="star-2"><label
                                            for="star-2"></label><input type="radio" value="3" name="rating" id="star-3"><label
                                            for="star-3"></label><input type="radio" value="2" name="rating" id="star-4"><label
                                            for="star-4"></label><input type="radio" value="1" name="rating" id="star-5"><label for="star-5"></label></div>
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
                                    <div class="form-group"><textarea class="form-control" name="comment" placeholder="Describe your comment"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-inline"><i class="fas fa-tint"></i><span>Drop your review</span>
                                    </button>
                                </form>
                            @else
                                <div style="margin-top: 20px">Please <a style="color: blue;text-decoration: underline" href="{{url('user-login')}}">login</a> or <a style="color: blue;text-decoration: underline" href="{{url('user-signup')}}">register</a> to post comments</div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ad-details-price"><h5 style="font-size: 15px">{{$classified->email}}</h5>
                    </div>
                    <button class="ad-details-number"><i class="fas fa-phone-alt"></i><span>{{$classified->phone}}</span>
                    </button>
                    <div class="ad-details-card">
                        <div class="ad-details-title"><h5>Contact Advertiser</h5></div>
                        <div class="ad-details-profile">

                            @if(\Illuminate\Support\Facades\Session::has('userId'))
                                <div>
                                    <form action="{{url('send-message-to-advertiser')}}" method="post">
                                        @csrf
                                        <div>
                                            <input type="hidden" name="classified_id" value="{{$classified->id ?? ''}}">
                                            <input placeholder="Name" type="text" name="name" class="form-control" required>
                                        </div><br>
                                        <div>
                                            <input placeholder="Email" type="text" name="email" class="form-control" required>
                                        </div><br>
                                        <div>
                                            <input placeholder="Phone" type="text" name="phone" class="form-control" required>
                                        </div><br>
                                        <div>
                                            <textarea placeholder="Message" name="message" class="form-control" required></textarea>
                                        </div><br>
                                        <div>
                                            <button class="btn btn-secondary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div>Please <a style="color: blue;text-decoration: underline" href="{{url('user-login')}}">login</a> or <a style="color: blue;text-decoration: underline" href="{{url('user-signup')}}">register</a> to email the Advertiser</div>
                            @endif
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
