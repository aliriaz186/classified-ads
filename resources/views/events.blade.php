@extends('layouts.landing')
@section('content')

    <div class="whiteBG pt80 pb60">
        <div class="container space-2 space-3--lg">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <h2 class="h3">All <strong>Events</strong></h2>
                <a href="{{url('')}}" style="color:#000;text-decoration: underline">Home</a> > <a href="#" style="color:#000;">All Events</a>

            </div>
            <!-- End Title -->

            <div class="row">
                @foreach($events as $item)
                    <div class="col-md-12"
                         style="padding: 30px;background: #383f44;margin-left: 20px;margin-top: 20px;color: white">
                        <h3 style="color: white"><a href="{{url('event-details')}}/{{$item->id}}" style="color: white">{{$item->title}}</a></h3>
                        <p>{{$item->description}}</p><br>
                        <a href="{{url('event-details')}}/{{$item->id}}" style="color: white;text-decoration: underline">View details</a><br>
                        <br><p style="font-size: 12px">Posted on {{$item->created_at}}</p>
                    </div>
                @endforeach

            </div>
            <br>
        </div>
    </div>

@endsection
