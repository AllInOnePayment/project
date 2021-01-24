@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceBill.show',$data->id)}}" class="btn btn-info">Back</a> 
    </div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <p><label for="User number">User number : {{$data->user_number}}</label></p>
                <p><label for="User name">User name : {{$data->user_name}}</label></p>
                <?php
                if(session()->get('group')==4)
                {$id=$data->register->schoolBill->id;}
                else
                {$id=$data->register->serviceProviderBill->id;}
                ?>
                <form action="{{route('ServiceBill.update',$id)}}" method="POST">
                    @csrf 
                    {{ method_field('PUT') }} 
                    @if(session()->get('group')==4)
                    <div class="form-group">
                        <label for="school_bill">school bill :</label>
                        <input type="text" name="school_bill" value=" {{$data->register->schoolBill->school_bill}}">
                    </div>
                    @if ($data->transport==1)
                        <div class="form-group">
                            <label for="transport_bill">transport bill : </label>
                            <input type="text" name="transport_bill" value="{{$data->register->schoolBill->transport_bill}}">
                        </div>
                    @endif
                    
                    <div class="form-group">
                        <label for="other_bill">other bill : </label>
                        <input type="text" name="other_bill" value="{{$data->register->schoolBill->other_bill}}">
                    </div>
                    <div class="form-group">
                        <label for="receipt_number">receipt number : </label>
                        <input type="text" name="receipt_number" value="{{$data->register->schoolBill->receipt_number}}">
                    </div>
                    <div class="form-group">
                        <label for="total_amount">total amount : </label>
                        <input type="text" name="total_amount" value="{{$data->register->schoolBill->total_amount}}">
                    </div>
                    @else
                    <div class="form-group">
                        <label for="last_reading">last reading : </label>
                        <input type="text" name="last_reading" value="{{$data->register->serviceProviderBill->last_reading}}">
                    </div>
                    <div class="form-group">
                        <label for="current_reading">current reading : </label>
                        <input type="text" name="current_reading" value="{{$data->register->serviceProviderBill->current_reading}}">
                    </div>
                    <div class="form-group">
                        <label for="receipt_number">receipt number : </label>
                        <input type="text" name="receipt_number" value="{{$data->register->serviceProviderBill->receipt_number}}">
                    </div>
                    <div class="form-group">
                        <label for="bill_amount">bill amount : </label>
                        <input type="text" name="bill_amount" value="{{$data->register->serviceProviderBill->bill_amount}}">
                    </div>
                    @endif
                    {{-- <div class="form-group">
                        <input type="radio" name="payment_status" value=1
                        @if($data->Payment_status==1)
                        checked
                        @endif >Paid
                        <input type="radio" name="payment_status" value=0
                        @if($data->Payment_status==0)
                        checked
                        @endif >Not paid
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Send Bill</button>
                </form>
            </div>
            
        </div>
    </div>
    
</div>
    
@endsection