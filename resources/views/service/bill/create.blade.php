@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceBill.index')}}" class="btn btn-info">Back</a> 
    </div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                
                <form action="{{route('ServiceBill.store')}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="id">User ID :</label>
                        
                        <select name="id" >
                            <option value="{{$data->id}}">{{$data->user_name}} , {{$data->user_number}}</option>
                        </select> 
                    </div>
                    
                    @if(session()->get('group')==4)
                    <div class="form-group">
                        <label for="school_bill">school bill :</label>
                        <input type="text" name="school_bill" value="" required>
                    </div>
                    <div class="form-group">
                            <label for="transport_bill">transport bill : </label>
                            <input type="text" name="transport_bill" value="" required>
                        </div>
                    <div class="form-group">
                        <label for="other_bill">other bill : </label>
                        <input type="text" name="other_bill" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="receipt_number">receipt number : </label>
                        <input type="text" name="receipt_number" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="total_amount">total amount : </label>
                        <input type="text" name="total_amount" value="" required>
                    </div>
                    @else
                    <div class="form-group">
                        <label for="last_reading">last reading : </label>
                        <input type="text" name="last_reading" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="current_reading">current reading : </label>
                        <input type="text" name="current_reading" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="receipt_number">receipt number : </label>
                        <input type="text" name="receipt_number" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="bill_amount">bill amount : </label>
                        <input type="text" name="bill_amount" value="" required>
                    </div>
                    @endif
                    {{-- <div class="form-group">
                        <input type="radio" name="payment_status" value=1>Paid
                        <input type="radio" name="payment_status" value=0 checked>Not paid
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Send Bill</button>
                </form>
            </div>
            
        </div>
    </div>
    
</div>
    
@endsection