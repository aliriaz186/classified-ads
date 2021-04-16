@extends('layouts.landing')
@section('content')

    <div class="bg-img-hero" style="background-image: url('/images/bg.jpg');">
        <div class="container space-2 space-4-top--lg space-3-bottom--lg">
            <div class="row align-items-lg-center">
                <div class="col-lg-12 mb-lg-0">
                    <!-- Description -->
                    <div class="pr-lg-12 mb-5" style="background: #2e353b96;padding: 30px">
                        <h1 class="display-4 font-size-48--md-down text-white">{{env('APP_NAME')}}</h1>
                        <p class="lead text-white">Find Classified's, Events, Movies and much more in Canada</p>
                    </div>
{{--                    <form class="cflyformtheme cflyformbannersearch">--}}
{{--                        <fieldset>--}}
{{--                            <div class="form-group cflyinputwithicon"> <i class="fas fa-bullhorn"></i>--}}
{{--                                <input type="text" name="customword" class="form-control" placeholder="What are you looking for">--}}
{{--                            </div>--}}
{{--                            <div class="form-group cflyinputwithicon"> <i class="far fa-paper-plane"></i> <a class="cflybtnsharelocation fa fa-crosshairs" href="javascript:void(0);"></a>--}}
{{--                                <input type="text" name="yourlocation" class="form-control" placeholder="Your Location">--}}
{{--                            </div>--}}
{{--                            <div class="form-group cflyinputwithicon"> <i class="fab fa-staylinked"></i>--}}
{{--                                <div class="cflyselect">--}}
{{--                                    <select>--}}
{{--                                        <option value="none">Select Category</option>--}}
{{--                                        <option value="none">Mobiles</option>--}}
{{--                                        <option value="none">Electronics</option>--}}
{{--                                        <option value="none">Vehicles</option>--}}
{{--                                        <option value="none">Bikes</option>--}}
{{--                                        <option value="none">Animals</option>--}}
{{--                                        <option value="none">Furniture</option>--}}
{{--                                        <option value="none">toys</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button class="cflybtn" type="button">Search Now</button>--}}
{{--                        </fieldset>--}}
{{--                    </form>--}}

                    <!-- End Description -->
                </div>
            </div>
        </div>
    </div>


    <div class="whiteBG pt80 pb60">
        <div class="container space-2 space-3--lg">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <h2 class="h3">Browse Classifieds by <strong>Categories</strong></h2>
            </div>
            <!-- End Title -->

            <div class="row">
                @foreach($categories as $item)
                    <div class="col-md-3"
                         style="padding: 30px;background: #383f44;margin-left: 20px;margin-top: 20px;color: white">
                        <h4 style="color: white"><a href="{{url('classified-by-category')}}/{{$item->id}}" style="color: white">{{$item->name}}</a></h4>
                    </div>
                @endforeach

            </div>
            <br>
        </div>
    </div>




    <div class="whiteBG pt80 pb60">
        <div class="container space-2 space-3--lg">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <h2 class="h3">Recent <strong>Classified Ads</strong></h2>
                <div>
                    <a href="{{url('add-classified')}}" style="background: #383f44;color: white" class="btn btn-secondary">Post New Classified</a>
                </div>
            </div>
            <!-- End Title -->

            <div class="row">
                @foreach($classifieds as $item)
                    <div class="col-md-3"
                         style="padding: 30px;background: #383f44;margin-left: 20px;margin-top: 20px;color: white">
                        <h4 style="color: white"><a href="{{url('classified-details')}}/{{$item->id}}" style="color: white">{{$item->title}}</a></h4>
                        <p>Posted on {{$item->created_at}}</p>
                    </div>
                @endforeach

            </div>
            <br>
            <div style="margin: 0 auto;max-width: 200px">

                <a style="text-align: center;color: #383f44" href="{{url('classified')}}">View All Classified Ads</a>

            </div>
        </div>
    </div>


    <div class="whiteBG pt80 pb60">
        <div class="container space-2 space-3--lg">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <h2 class="h3">Recent <strong>Events</strong></h2>
                <div>
                    <a href="{{url('add-events')}}" style="background: #383f44;color: white" class="btn btn-secondary">Post New Event</a>
                </div>
            </div>
            <!-- End Title -->

            <div class="row">
                @foreach($events as $item)
                    <div class="col-md-3"
                         style="padding: 30px;background: #383f44;margin-left: 20px;margin-top: 20px;color: white">
                        <h4 style="color: white"><a href="{{url('event-details')}}/{{$item->id}}" style="color: white">{{$item->title}}</a></h4>
                        <p>Posted on {{$item->created_at}}</p>
                    </div>
                @endforeach

            </div>
            <br>
            <div style="margin: 0 auto;max-width: 200px">
                <a style="text-align: center;color: #383f44" href="{{url('events')}}">View All Events</a>
            </div>
        </div>
    </div>
@endsection
