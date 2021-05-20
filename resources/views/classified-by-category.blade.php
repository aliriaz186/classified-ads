@extends('layouts.landingapp')
@section('content')
    <link rel="stylesheet" href="{{url('')}}/newtheme/css/custom/rightbar-details.css">

    <section class="single-banner" style="margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content"><h2>{{$category ?? ''}} Classified Ads</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('classified')}}">All Classifieds</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$category ?? ''}}</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container" style="margin-bottom: 100px">
        <div style="margin-bottom: 20px">
            <a href="{{url('add-classified')}}" class="btn btn-primary">POST CLASSIFIED AD</a>
        </div>
        <div class="row">
            @foreach($classifieds as $item)

                <div class="col-lg-6">
                    <div class="product-card inline">
                        <div class="product-head">
                            <div class="product-img"
                                 style="background:url({{url('get-classified-photo')}}/{{$item->id}}) no-repeat center; background-size:cover;"><i
                                    class="cross-badge fas fa-bolt"></i><span class="flat-badge booking">{{$item->category}}</span>
                                <ul class="product-meta">
                                    <li>
                                        <i class="fas fa-eye"></i>
                                        <p>{{$item->adViews}}</p>
                                    </li>
                                    {{--                                        <li>--}}
                                    {{--                                            <i class="fas fa-mouse"></i>--}}
                                    {{--                                            <p>134</p>--}}
                                    {{--                                        </li>--}}
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <p>{{$item->rating}}/5</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-tag"><i class="fas fa-tags"></i>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{$item->category}}</a></li>
                                    {{--                                        <li class="breadcrumb-item active" aria-current="page">house</li>--}}
                                </ol>
                            </div>
                            <div class="product-title"><h5><a href="{{url('classified-details')}}/{{$item->id}}">{{$item->title}}</a></h5>
                                <ul class="product-location">
                                    <li><i class="fas fa-phone"></i>
                                        <p>{{$item->phone}}</p></li>
                                    <li><i class="fas fa-clock"></i>
                                        <p>{{$item->created_at}}</p></li>
                                </ul>
                            </div>
                            <div class="product-details">
                                <ul class="product-widget">
                                    <li>
                                        <i class="fas fa-eye" title="Ad Views"></i><span> {{$item->adViews}}</span>

                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                        <span> {{$item->rating}}/5 of {{$item->reviews}} reviews</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


{{--    <div class="whiteBG pt80 pb60" style="margin-bottom: 100px">--}}
{{--        <div class="container space-2 space-3--lg">--}}

{{--            <div class="row">--}}
{{--                @foreach($classifieds as $item)--}}
{{--                    <div class="col-md-12"--}}
{{--                         style="padding: 30px;background: #383f44;margin-left: 20px;margin-top: 20px;color: white">--}}
{{--                        <h2 style="color: white"><a href="{{url('classified-details')}}/{{$item->id}}" style="color: white">{{$item->title}}</a></h2>--}}
{{--                        <p>{{$item->description}}</p><br>--}}
{{--                        <p style="color: white;">Category : {{$item->category}}</p><br>--}}
{{--                        <a class="btn btn-secondary" href="{{url('classified-details')}}/{{$item->id}}" style="color: white;">View details</a><br>--}}
{{--                        <br><p style="font-size: 12px;text-align: right">Posted on {{$item->created_at}}</p>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--            <br>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
