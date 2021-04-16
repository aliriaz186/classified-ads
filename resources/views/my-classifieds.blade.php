@extends('layouts.app')
@section('content')
    <div class="p-4 ml-3"  style="margin-left: 20px">
        <div class="row">
            <div class="col-md-7 mt-2">
                <h2>My Classifieds</h2>
            </div>
            <div class="col-md-5 mt-2 row">
                <div style="float: right;margin-bottom: 10px">
                    <a class="btn btn-success" style="font-size: 13px" href="{{url('/add-classified')}}">POST New Classified</a>
                </div>
            </div>
        </div>
    </div>

    <div class="px-5"  style="margin-left: 20px">
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
            <div class="table-responsive">

            <table class="table" id="customer-table">
            <thead style="background: #383f44;color: white">
            <tr>
                <th>#</th>
                <th >Title</th>
                <th >Ad Viewed</th>
                <th >Image</th>
                <th >Phone</th>
                <th >Category</th>
                <th >Posted On</th>
                <th>Options</th>
            </tr>
            </thead>
                        <tbody>
                        @if(count($classifieds) != 0)
                            @foreach($classifieds as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td class="text-left">{{$item->title}}</td>
                                    <td class="text-left">{{$item->adViewed}} Times</td>
                                    <td class="text-left"><img src="{{url('/get-classified-photo')}}/{{$item->id}}" style="height: 100px" alt=""></td>
                                    <td class="text-left">{{$item->phone ?? ''}}</td>
                                    <td class="text-left">{{$item->category ?? ''}}</td>
                                    <td class="text-left">{{$item->created_at}}</td>
                                    <td class="text-left">
                                            <a href="{{url('/edit-classified/'.$item->id)}}">
                                                <button class="btn btn-secondary">Edit</button>
                                            </a>
                                            <a href="{{url('/delete-classified/'.$item->id)}}">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td></td>
                                <td>No Data found!</td>
                                <td></td>
                            </tr>
                        @endif
                        </tbody>
        </table>
            </div>
    </div>


@endsection
