@extends('layouts.landing')
@section('content')




    <div class="whiteBG pt80 pb60">
        <div class="container space-2 space-3--lg">
            <!-- Title -->
            <div class="w-md-80 w-lg-60 text-center mx-md-auto mb-9">
                <h2 class="h3"><strong>Classified Ads</strong></h2>
                <a href="{{url('')}}" style="color:#000;text-decoration: underline">Home</a> > <a href="{{url('classified')}}" style="color:#000;text-decoration: underline">All Classifieds</a> > <a href="#" style="color:#000;">{{$category ?? ''}}</a>
            </div>
            <!-- End Title -->

            <div class="row">
                @foreach($classifieds as $item)
                    <div class="col-md-12"
                         style="padding: 30px;background: #383f44;margin-left: 20px;margin-top: 20px;color: white">
                        <h2 style="color: white"><a href="{{url('classified-details')}}/{{$item->id}}" style="color: white">{{$item->title}}</a></h2>
                        <p>{{$item->description}}</p><br>
                        <p style="color: white;">Category : {{$item->category}}</p><br>
                        <a class="btn btn-secondary" href="{{url('classified-details')}}/{{$item->id}}" style="color: white;">View details</a><br>
                        <br><p style="font-size: 12px;text-align: right">Posted on {{$item->created_at}}</p>
                    </div>
                @endforeach

            </div>
            <br>
        </div>
    </div>

@endsection
