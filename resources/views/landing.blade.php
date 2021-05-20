@extends('layouts.landingapp')
@section('content')

    <section class="banner-part">
        <div class="container">
            <div class="banner-content"><h1>#ClassifiedAds, #RideShare, #Services, #Movies, #Events, #DiscussionForums and much more.</h1>
                <p>For Desi's in Canada</p><a href="{{url('classified')}}" class="btn btn-outline"><i
                        class="fas fa-eye"></i><span>Show all ads</span></a></div>
        </div>
    </section>
    <section class="suggest-part">
        <div class="container">
            <div class="suggest-slider slider-arrow">
                @foreach($categories as $item)
                    <div class="suggest-card">
                        <div class="suggest-img"><img src="{{url('get-category-photo')}}/{{$item->id}}"></div>
                        <div class="suggest-meta"><h6><a href="{{url('classified-by-category')}}/{{$item->id}}">{{$item->name}}</a></h6>
                            <p>({{$item->count}}) ads</p></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section recomend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading"><h2>Our Recommend <span>Ads</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recomend-slider slider-arrow">
                        @foreach($classifieds as $item)
                            <div class="product-card">
                                <div class="product-head">
                                    <div class="product-img"
                                         style="background:url('{{url('get-classified-photo')}}/{{$item->id}}') no-repeat center; background-size:cover;">
                                        <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">{{$item->category}}</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-tag"><i class="fas fa-tags"></i>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">{{$item->category}}</a></li>
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
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-50"><a href="{{url('classified')}}" class="btn btn-inline"><i
                                class="fas fa-eye"></i><span>view all recommend</span></a></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section recomend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading"><h2>Our Recommend <span>Events</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recomend-slider slider-arrow">
                        @foreach($events as $item)
                            <div class="product-card">
                                <div class="product-head">
                                    <div class="product-img"
                                         style="background:url('{{url('get-event-photo')}}/{{$item->id}}') no-repeat center; background-size:cover;">
                                        <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">Event</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-tag"><i class="fas fa-tags"></i>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Event</a></li>
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
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-50"><a href="{{url('events')}}" class="btn btn-inline"><i
                                class="fas fa-eye"></i><span>view all recommend</span></a></div>
                </div>
            </div>
        </div>
    </section>


    <section class="section recomend-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading"><h2>Our Recommend <span>Movies</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recomend-slider slider-arrow">
                        @foreach($movies as $item)
                            <div class="product-card">
                                <div class="product-head">
                                    <div class="product-img"
                                         style="background:url('{{url('get-movie-photo')}}/{{$item->id}}') no-repeat center; background-size:cover;">
                                        <i class="cross-badge fas fa-bolt"></i><span class="flat-badge sale">Event</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-tag"><i class="fas fa-tags"></i>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Event</a></li>
                                        </ol>
                                    </div>
                                    <div class="product-title"><h5><a href="{{url('movie-details')}}/{{$item->id}}">{{$item->title}}</a></h5>
                                        <ul class="product-location">
                                            <li><i class="fas fa-phone"></i>
                                                <p>{{$item->phone}}</p></li>
                                            <li><i class="fas fa-clock"></i>
                                                <p>{{$item->created_at}}</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-50"><a href="{{url('movies')}}" class="btn btn-inline"><i
                                class="fas fa-eye"></i><span>view all recommend</span></a></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section recomend-part" style="margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading"><h2>Browse Classifieds by <span>Categories</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="suggest-slider slider-arrow">
                        @foreach($categories as $item)
                            <div class="suggest-card">
                                <div class="suggest-img"><img src="{{url('get-category-photo')}}/{{$item->id}}"></div>
                                <div class="suggest-meta"><h6><a href="{{url('classified-by-category')}}/{{$item->id}}">{{$item->name}}</a></h6>
                                    <p>({{$item->count}}) ads</p></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <section class="blog-part" style="margin-bottom: 50px">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="section-center-heading"><h2>Read Our <span>Recent Articles</span></h2>--}}
{{--                       </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="blog-slider slider-arrow">--}}
{{--                        <div class="blog-card">--}}
{{--                            <div class="blog-img"><img src="{{url('')}}/newtheme/images/blog/01.jpg" alt="blog">--}}
{{--                                <div class="blog-overlay"><span class="marketing">Marketing</span></div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-content"><a href="#" class="blog-avatar"><img src="{{url('')}}/newtheme/images/avatar/01.jpg"--}}
{{--                                                                                           alt="avatar"></a>--}}
{{--                                <ul class="blog-meta">--}}
{{--                                    <li><i class="fas fa-user"></i>--}}
{{--                                        <p><a href="#">MironMahmud</a></p></li>--}}
{{--                                    <li><i class="fas fa-clock"></i>--}}
{{--                                        <p>02 Feb 2021</p></li>--}}
{{--                                </ul>--}}
{{--                                <div class="blog-text"><h4><a href="#">Lorem ipsum dolor sit amet eius minus elit cum--}}
{{--                                            quaerat volupt.</a></h4>--}}
{{--                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore--}}
{{--                                        labore laborum perspiciatis...</p></div>--}}
{{--                                <a href="#" class="blog-read"><span>read more</span><i--}}
{{--                                        class="fas fa-long-arrow-alt-right"></i></a></div>--}}
{{--                        </div>--}}
{{--                        <div class="blog-card">--}}
{{--                            <div class="blog-img"><img src="{{url('')}}/newtheme/images/blog/02.jpg" alt="blog">--}}
{{--                                <div class="blog-overlay"><span class="advertise">advertise</span></div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-content"><a href="#" class="blog-avatar"><img src="{{url('')}}/newtheme/images/avatar/02.jpg"--}}
{{--                                                                                           alt="avatar"></a>--}}
{{--                                <ul class="blog-meta">--}}
{{--                                    <li><i class="fas fa-user"></i>--}}
{{--                                        <p><a href="#">LabonnoKhan</a></p></li>--}}
{{--                                    <li><i class="fas fa-clock"></i>--}}
{{--                                        <p>02 Feb 2021</p></li>--}}
{{--                                </ul>--}}
{{--                                <div class="blog-text"><h4><a href="#">Lorem ipsum dolor sit amet eius minus elit cum--}}
{{--                                            quaerat volupt.</a></h4>--}}
{{--                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore--}}
{{--                                        labore laborum perspiciatis...</p></div>--}}
{{--                                <a href="#" class="blog-read"><span>read more</span><i--}}
{{--                                        class="fas fa-long-arrow-alt-right"></i></a></div>--}}
{{--                        </div>--}}
{{--                        <div class="blog-card">--}}
{{--                            <div class="blog-img"><img src="{{url('')}}/newtheme/images/blog/03.jpg" alt="blog">--}}
{{--                                <div class="blog-overlay"><span class="safety">safety</span></div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-content"><a href="#" class="blog-avatar"><img src="{{url('')}}/newtheme/images/avatar/03.jpg"--}}
{{--                                                                                           alt="avatar"></a>--}}
{{--                                <ul class="blog-meta">--}}
{{--                                    <li><i class="fas fa-user"></i>--}}
{{--                                        <p><a href="#">MironMahmud</a></p></li>--}}
{{--                                    <li><i class="fas fa-clock"></i>--}}
{{--                                        <p>02 Feb 2021</p></li>--}}
{{--                                </ul>--}}
{{--                                <div class="blog-text"><h4><a href="#">Lorem ipsum dolor sit amet eius minus elit cum--}}
{{--                                            quaerat volupt.</a></h4>--}}
{{--                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore--}}
{{--                                        labore laborum perspiciatis...</p></div>--}}
{{--                                <a href="#" class="blog-read"><span>read more</span><i--}}
{{--                                        class="fas fa-long-arrow-alt-right"></i></a></div>--}}
{{--                        </div>--}}
{{--                        <div class="blog-card">--}}
{{--                            <div class="blog-img"><img src="{{url('')}}/newtheme/images/blog/04.jpg" alt="blog">--}}
{{--                                <div class="blog-overlay"><span class="security">security</span></div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-content"><a href="#" class="blog-avatar"><img src="{{url('')}}/newtheme/images/avatar/04.jpg"--}}
{{--                                                                                           alt="avatar"></a>--}}
{{--                                <ul class="blog-meta">--}}
{{--                                    <li><i class="fas fa-user"></i>--}}
{{--                                        <p><a href="#">TahminaBonny</a></p></li>--}}
{{--                                    <li><i class="fas fa-clock"></i>--}}
{{--                                        <p>02 Feb 2021</p></li>--}}
{{--                                </ul>--}}
{{--                                <div class="blog-text"><h4><a href="#">Lorem ipsum dolor sit amet eius minus elit cum--}}
{{--                                            quaerat volupt.</a></h4>--}}
{{--                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore--}}
{{--                                        labore laborum perspiciatis...</p></div>--}}
{{--                                <a href="#" class="blog-read"><span>read more</span><i--}}
{{--                                        class="fas fa-long-arrow-alt-right"></i></a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="blog-btn"><a href="blog-list.html" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all blogs</span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <div class="bg-img-hero" style="background-image: url('/images/bg.jpg');">--}}
{{--        <div class="container space-2 space-4-top--lg space-3-bottom--lg">--}}
{{--            <div class="row align-items-lg-center">--}}
{{--                <div class="col-lg-12 mb-lg-0">--}}
{{--                    <!-- Description -->--}}
{{--                    <div class="pr-lg-12 mb-5" style="background: #2e353b96;padding: 30px">--}}
{{--                        <h1 class="display-4 font-size-48--md-down text-white">{{env('APP_NAME')}}</h1>--}}
{{--                        <p class="lead text-white">Find Classified's, Events, Movies and much more in Canada</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}










@endsection
