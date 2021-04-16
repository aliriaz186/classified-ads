@extends('layouts.admin-layout')
@section('content')
    <div class="p-4 ml-3"  style="margin-left: 20px">
        <div class="row">
            <div class="col-md-7 mt-2">
                <h2>All Users</h2>
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
                    <th >Email</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @if(count($users) != 0)
                    @foreach($users as $key => $item)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td class="text-left">{{$item->email}}</td>
                            <td class="text-left">
                                @if($item->active == 0)
                                    <a href="{{url('/unblock-user/'.$item->id)}}">
                                        <button class="btn btn-secondary">UnBlock</button>
                                    </a>
                                @else
                                    <a href="{{url('/block-user/'.$item->id)}}">
                                        <button class="btn btn-danger">Block</button>
                                    </a>
                                @endif

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
