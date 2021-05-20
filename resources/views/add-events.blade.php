@extends('layouts.landingapp')
@section('content')

    <div class="p-5 ml-3"  style="margin-left: 20px">
        <h2 style="text-align: center">POST New Event</h2>
    </div>

    <div class="px-5"  style="margin-left: 20px;padding: 30px">
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
        <form action="{{url('save-event')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Title</label> <br>
                <input type="text" name="title" class="form-control" required>
            </div> <br>
            <div>
                <label>Description</label> <br>
                <textarea class="form-control" style="height: 250px;" name="description" required placeholder="Write description..."></textarea>
            </div>
            <br>
            <div>
                <label>Contact Number (optional)</label> <br>
                <input type="text" name="phone" class="form-control">
            </div> <br>
            <div>
                <label>Image (optional)</label> <br>
                <input type="file" name="files[]" class="form-control">
            </div> <br>
            <button class="btn btn-success">POST Event</button>
        </form>
    </div>


@endsection
