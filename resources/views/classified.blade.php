@extends('layouts.landingapp')
@section('content')

    <section class="section trend-part" style="margin-bottom: 100px">
        <div class="container">
            <div style="float: right">
                <a href="{{url('add-classified')}}" class="btn btn-primary">POST CLASSIFIED AD</a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading"><h2>All Classified <span>Ads</span></h2>
                        <a href="{{url('')}}" style="color:#000;text-decoration: underline">Home</a> > <a href="#" style="color:#000;">All Classifieds</a>
                    </div>
                </div>

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
    </section>

@endsection
