@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceBill.index')}}" class="btn btn-outline-info">Back</a> 
    </div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-5 form-control" style="border-radius: 20px;">
                <p class="text-info"><b align='center'>User Information</b></p>
                <hr>
                <p><label for="User_number">User Number :<b class="text-info"> {{$data->user_number}}</b></label></p><hr>
                <p><label for="User_name">User Name : <b class="text-info"> {{$data->user_name}}</b></label></p><hr>
                @if(session()->get('group')==4)
                    <p><label for="Grade">Grade : <b class="text-info"> {{$data->level}}</b></label></p><hr>
                    <p><label for="Department">Department :<b class="text-info">  {{$data->department}}</label></b></p><hr>
                    <p><label for="Class">Class : <b class="text-info"> {{$data->class}}</label></p><hr>
                    <p><label for="Transport_status">Transport status :
                        @if($data->transport==1)
                          use Transport
                        @else
                          Don't use Transport
                        @endif    
                    </label></p><hr>
                @else
                    <p><label for="User_addres">User addres : <b class="text-info">{{$data->addres}}</b></label></p><hr>
                @endif
                <p><label for="status">online status : <b class="text-info">
                    @if($data->status==1)
                        User
                    @else
                        Non user
                    @endif  
                </b></label></p><hr>
            </div>
            <div class="col-6 ml-2 form-control" style="border-radius: 20px;">
                @if ($data->register)
                    @if ($data->register->schoolBill || $data->register->serviceProviderBill)
                        
                        @if(session()->get('group')==4)
                            <p class="text-info"><b align='center'>Bill Information</b></p>
                            <hr>
                            <p><label for="school_bill">School Bill : <b class="text-info">{{$data->register->schoolBill->school_bill}}</b></label></p><hr>
                            <p><label for="transport_billt">Transport Bill : <b class="text-info">{{$data->register->schoolBill->transport_bill}}</b></label></p><hr>
                            <p><label for="other_bill">Other Bill : <b class="text-info">{{$data->register->schoolBill->other_bill}}</b></label></p><hr>
                            <p><label for="receipt_number">Receipt Number : <b class="text-info">{{$data->register->schoolBill->receipt_number}}</b></label></p><hr>
                            <p><label for="total_amount">Total Amount : <b class="text-info">{{$data->register->schoolBill->total_amount}}</b></label></p><hr>
                            <p><label for="payment_status">Payment Status :<b class="text-info">
                            @if($data->Payment_status==1)
                                Paid
                            @else
                                Not paid
                            @endif </label></p><hr>
                        @else
                            <p class="text-info"><b align='center'>Bill Information</b></p>
                            <hr>
                            <p><label for="last_reading">Last Reading : <b class="text-info">{{$data->register->serviceProviderBill->last_reading}}</b></label></p><hr>
                            <p><label for="current_reading">Current Reading : <b class="text-info">{{$data->register->serviceProviderBill->current_reading}}</b></label></p><hr>
                            <p><label for="receipt_number">Receipt Number : <b class="text-info">{{$data->register->serviceProviderBill->receipt_number}}</b></label></p><hr>
                            <p><label for="bill_amount">Bill Amount : <b class="text-info">{{$data->register->serviceProviderBill->bill_amount}}</label></p>
                            <p><label for="payment_status">Payment Status :<b class="text-info">
                            @if($data->Payment_status==1)
                                Paid
                            @else
                                Not paid
                            @endif 
                            </b></label></p> <hr>   
                        @endif
                    @else
                        <p>There Is No Bill, To Insert New Bill</p>
                        <a href="{{route('ServiceBill.create', 'id='.$data->id)}}" class="btn btn-outline-info">Insert Bill</a>
                    @endif
                @else 
                    <p>Sorry, no one has been registered to pay for this user account,<br>
                    try to register to this service first.</p>
                @endif    
            </div>
        </div>
            <br>
            <div class="row">
            @if ($data->register)
            @if ($data->register->schoolBill || $data->register->serviceProviderBill)
            
                <div class="col-sm-6"></div>
                <div class="col-sm-3">
                    <a href="{{route('ServiceBill.edit',$data->id)}}" class="btn btn-outline-warning">Edit Bill</a>
                </div>
                <div class="col-sm-3">
                    <form action="{{route('ServiceBill.destroy',$data->id)}}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }} 
                        <button type="submit" class="btn btn-outline-danger">Delete Bill</button>
                    </form>
                </div>
            </div>
            @endif  
            @endif   
    </div>
    
</div>
    
@endsection