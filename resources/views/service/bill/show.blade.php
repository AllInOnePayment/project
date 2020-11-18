@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceBill.index')}}" class="btn btn-info">Back</a> 
    </div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                
                <p><label for="User_number">User number : {{$data->user_number}}</label></p>
                <p><label for="User_name">User name : {{$data->user_name}}</label></p>
                @if(session()->get('group')==4)
                    <p><label for="Grade">Grade : {{$data->level}}</label></p>
                    <p><label for="Department">Department : {{$data->department}}</label></p>
                    <p><label for="Class">Class : {{$data->class}}</label></p>
                    <p><label for="Transport_status">Transport status :
                        @if($data->transport==1)
                          use Transport
                        @else
                          Don't use Transport
                        @endif    
                    </label></p>
                @else
                    <p><label for="User_addres">User addres : {{$data->addres}}</label></p>
                @endif
                <p><label for="status">online status :
                    @if($data->status==1)
                        User
                    @else
                        Non user
                    @endif  
                </label></p>
            </div>
            <div class="col-6">
                @if ($data->register)
                    @if ($data->register->schoolBill || $data->register->serviceProviderBill)
                        
                        @if(session()->get('group')==4)
                            <p><label for="school_bill">school bill : {{$data->register->schoolBill->school_bill}}</label></p>
                            <p><label for="transport_billt">transport bill : {{$data->register->schoolBill->transport_bill}}</label></p>
                            <p><label for="other_bill">other bill : {{$data->register->schoolBill->other_bill}}</label></p>
                            <p><label for="receipt_number">receipt number : {{$data->register->schoolBill->receipt_number}}</label></p>
                            <p><label for="total_amount">total amount : {{$data->register->schoolBill->total_amount}}</label></p>
                            <p><label for="payment_status">payment status :
                            @if($data->Payment_status==1)
                                Paid
                            @else
                                Not paid
                            @endif </label></p>
                        @else
                            <p><label for="last_reading">last reading : {{$data->register->serviceProviderBill->last_reading}}</label></p>
                            <p><label for="current_reading">current reading : {{$data->register->serviceProviderBill->current_reading}}</label></p>
                            <p><label for="receipt_number">receipt number : {{$data->register->serviceProviderBill->receipt_number}}</label></p>
                            <p><label for="bill_amount">bill amount : {{$data->register->serviceProviderBill->bill_amount}}</label></p>
                            <p><label for="payment_status">payment status :
                            @if($data->Payment_status==1)
                                Paid
                            @else
                                Not paid
                            @endif 
                            </label></p>    
                        @endif
                    @else
                        <p>there is no bill, to insert new bill</p>
                        <a href="{{route('ServiceBill.create', 'id='.$data->id)}}" class="btn btn-primary">insert Bill</a>
                    @endif
                @else 
                    <p>Sorry, no one has been registered to pay for this user account,<br>
                    try to register to this service first.</p>
                @endif    
            </div>
            @if ($data->register)
            @if ($data->register->schoolBill || $data->register->serviceProviderBill)
            <div class="col-6">
                <a href="{{route('ServiceBill.edit',$data->id)}}" class="btn btn-primary">Edit Bill</a>
            </div>
            <div class="col-6">
                <form action="{{route('ServiceBill.destroy',$data->id)}}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }} 
                    <button type="submit" class="btn btn-danger">Delete Bill</button>
                </form>
            </div>
            @endif  
            @endif  
        </div>
    </div>
    
</div>
    
@endsection