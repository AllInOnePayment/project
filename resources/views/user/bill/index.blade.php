@extends('layouts.user')

@section('content')

<div class="container">
    <br><hr>
    <?php
    $err=0; 
        ?>
    @if ($count==1)
        <div class="row">
            @foreach ($data as $row) 
            @if($row->service->group==3)
                @if($row->serviceProviderBill) 
                <div class="col-sm-1"></div>
                <div class="col-sm-2 justify-content-sm-center">
                    <img class="img-circle" width="120px" height="120px" src="{{ asset('storage/logo/'.$row->service->image)}}">
                </div>
                <div class="col-sm-4" style="border-left:solid seagreen 2px;">
                    <p>Service Name: <b class="text-info">{{$row->service->service_name}}</b></p>
                    <p>User Name : <b class="text-info">{{$row->serviceProvider->user_name}}</b></p>
                    <p>User Number   : <b class="text-info">{{$row->serviceProvider->user_number}}</b></p>
                </div>
                <div class="col-sm-3">
                    <p>Receipt No      : <b class="text-info">{{$row->serviceProviderBill->receipt_number}}</b></p>
                    <p>Current Reading : <b class="text-info">{{$row->serviceProviderBill->current_reading}}</b></p>
                    <p>Bill Amount     : <b class="text-info">{{$row->serviceProviderBill->bill_amount}}</b></p>
                </div>
                <div class="col-sm-1"><br>
                    <a href="{{route('userBill.pay',$row->id)}}" class="btn btn-info">Pay Bill</a>
                </div>
                @php $err=1;    @endphp
                @endif

         <br><hr>
            @else
            <div class="row">
                @if($row->schoolBill)
                    
                <div class="col-sm-1"></div>
                <div class="col-sm-2 justify-content-sm-center">
                    <img class="img-circle" width="120px" height="120px" src="{{ asset('dist/img/user1-128x128.jpg')}}">
                </div>
                <div class="col-sm-4" style="border-left:solid seagreen 2px;">
                    <p>Service Name: <b class="text-info">{{$row->service->service_name}}</b></p>
                    <p>User Name : <b class="text-info">{{$row->school->user_name}}</b></p>
                    <p>User Number   : <b class="text-info">{{$row->school->user_number}}</b></p>
                </div>
                <div class="col-sm-3">
                    <p>Receipt No      : <b class="text-info">{{$row->schoolBill->receipt_number}}</b></p>
                    <p>Current Reading : <b class="text-info">{{$row->schoolBill->other_bill}}</b></p>
                    <p>Bill Amount     : <b class="text-info">{{$row->schoolBill->total_amount}}</b></p>
                </div>
                <div class="col-sm-1"><br>
                    <a href="{{route('userBill.pay',$row->id)}}" class="btn btn-info">Pay Bill</a>
                </div>
                @php $err=1;    @endphp
                @endif
            @endif
            @endforeach 
    </div>
    </div>
    
    @else
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                    <div class="alert alert-secondary alert-block">
                        <h5>Sorry, you don't have any Bills yet.</h5>
                    </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    @endif

    @if ($count==1 && $err==0)
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                    <div class="alert alert-secondary alert-block">
                        <h5>Sorry, you don't have any Bills yet.</h5>
                    </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    @endif
   
</div>
@endsection

