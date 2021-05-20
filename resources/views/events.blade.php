@extends('layouts.landingapp')
@section('content')

    <section class="section trend-part" style="margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading"><h2>All <span>Events</span></h2>
                        <a href="{{url('')}}" style="color:#000;text-decoration: underline">Home</a> > <a href="#" style="color:#000;">All Events</a>
                    </div>
                    <div style="float: right;margin-bottom: 10px">
                        <a href="{{url('add-events')}}" class="btn btn-primary">POST Event AD</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($events as $item)

                    <div class="col-lg-6">
                        <div class="product-card inline">
                            <div class="product-head">
                                <div class="product-img"
                                     style="background:url({{url('get-event-photo')}}/{{$item->id}}) no-repeat center; background-size:cover;"><i
                                        class="cross-badge fas fa-bolt"></i><span class="flat-badge booking">Event</span>
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
                                        <li class="breadcrumb-item"><a href="#">Event</a></li>
                                        {{--                                        <li class="breadcrumb-item active" aria-current="page">house</li>--}}
                                    </ol>
                                </div>
                                <div class="product-title"><h5><a href="{{url('event-details')}}/{{$item->id}}">{{$item->title}}</a></h5>
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
                                            <i class="fas fa-eye" title="Event Views"></i><span> {{$item->adViews}}</span>

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
    </section>










{{--<div class="whiteBG pt80 pb60">--}}
{{--        <div class="container space-2 space-3--lg">--}}
{{--            <!-- Title -->--}}
{{--            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">--}}
{{--                <h2 class="h3">All <strong>Events</strong></h2>--}}
{{--                <a href="{{url('')}}" style="color:#000;text-decoration: underline">Home</a> > <a href="#" style="color:#000;">All Events</a>--}}

{{--            </div>--}}
{{--            <!-- End Title -->--}}

{{--            <div class="row">--}}
{{--                @foreach($events as $item)--}}
{{--                    <div class="col-md-12"--}}
{{--                         style="padding: 30px;background: #383f44;margin-left: 20px;margin-top: 20px;color: white">--}}
{{--                        <h3 style="color: white"><a href="{{url('event-details')}}/{{$item->id}}" style="color: white">{{$item->title}}</a></h3>--}}
{{--                        <p>{{$item->description}}</p><br>--}}
{{--                        <a href="{{url('event-details')}}/{{$item->id}}" style="color: white;text-decoration: underline">View details</a><br>--}}
{{--                        <br><p style="font-size: 12px">Posted on {{$item->created_at}}</p>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--            <br>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
