@extends('layouts.landingapp')
@section('content')

    <div class="p-4 ml-3" style="padding: 100px;margin-top: 100px">
        <div class="row">
            <div class="col-lg-6">
                <h3>Welcome {{\App\User::where('id', \Illuminate\Support\Facades\Session::get('userId'))->first()['name']}}</h3>
            </div>
        </div>
    </div>
    <div class="px-5" style="margin-bottom: 100px">
        <div class="row">
                    <div  class="col-xl-3 col-lg-3 order-lg-3 order-xl-2 ml-3" style="color: #646c9a;margin-left: 20px">
                        <div
                            style=";display: flex;flex-grow: 1;flex-direction: column;box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05);background-color: #080229;color: white;margin-bottom: 20px;border-radius: 4px;">
                            <div style="padding: 25px;">
                                <h4 class="text-center" style="text-decoration: underline;color: white">Total Classified Posted</h4>
                                    <div class="mb-3"><h1 class="text-center" style="color: white">{{$classifiedCount  ?? ''}}+</h1></div>
                                <div class="row" style="padding: 15px;text-align: center;">
                                    <div style="margin: 0 auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <div  class="col-xl-3 col-lg-3 order-lg-3 order-xl-2 ml-3" style="color: #646c9a;margin-left: 20px">
                        <div
                            style=";display: flex;flex-grow: 1;flex-direction: column;box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05);background-color: #080229;color: white;margin-bottom: 20px;border-radius: 4px;">
                            <div style="padding: 25px;">
                                <h4 class="text-center" style="text-decoration: underline;color: white">Total Events Posted</h4>
                                    <div class="mb-3"><h1 class="text-center" style="color: white">{{$eventCount  ?? ''}}+</h1></div>
                                <div class="row" style="padding: 15px;text-align: center;">
                                    <div style="margin: 0 auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




    </div>
    </div>
@endsection
