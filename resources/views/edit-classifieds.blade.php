@extends('layouts.app')
@section('content')

    <div class="p-5 ml-3"  style="margin-left: 20px">
        <h2 style="text-align: center">Edit Classified</h2>
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
        <form action="{{url('update-classified')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$classified->id ?? ''}}">
            <div>
                <label>Title</label> <br>
                <input value="{{$classified->title ?? ''}}" type="text" name="title" class="form-control" required>
            </div> <br>
            <div>
                <label>Select Category</label> <br>
                <select class="form-control" name="category" required>
                    <option value="">Select Category</option>
                    @foreach(\App\Category::all() as $item)
                        <option value="{{$item->name}}" {{$item->name == $classified->category ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div> <br>
            <div>
                <label>Description</label> <br>
                <textarea  class="form-control" style="height: 250px;" name="description" required placeholder="Write description...">{{$classified->description ?? ''}}</textarea>
            </div>
            <br>
            <div>
                <label>Contact Number (optional)</label> <br>
                <input value="{{$classified->phone ?? ''}}" type="text" name="phone" class="form-control">
            </div> <br>
            <div>
                <label>Change/Add Image (optional)</label> <br>
                <input type="file" name="files[]" class="form-control">
            </div> <br>
            <button class="btn btn-success">POST Classified</button>
        </form>
    </div>


@endsection
