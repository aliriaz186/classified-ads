@extends('layouts.landingapp')
@section('content')
    <section class="section trend-part" style="margin-bottom: 100px">
        <div class="container">
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
            <div style="float: right">
                <a href="{{url('add-topic')}}" class="btn btn-primary">POST TOPIC</a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-center-heading"><h2>Discussion <span>Forums</span></h2>
                        <a href="{{url('')}}" style="color:#000;text-decoration: underline">Home</a> > <a href="#"
                                                                                                          style="color:#000;">Discussion
                            Forums</a>
                    </div>
                </div>

            </div>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Topic</th>
                        <th>Started By</th>
                        <th>Replies</th>
                        <th>Views</th>
                        <th>Posted on</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($forum as $item)
                        <tr>
                            <td><a href="{{url('topic')}}/{{$item->id}}">{{$item->topic}}</a></td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->replies}}</td>
                            <td>{{$item->adViews}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>

@endsection
