@extends('layouts.service')

@section('content') 
<div class="container">
<hr><br>
<div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            @if($count>0)      
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Date payment</th>
                    <th>Payer Name</th> 
                    <th>User Name</th>  
                    <th>Amount of bill</th>
                    <th>receipt Number</th>  
                </tr>
            </thead>
            <tbody>
            @foreach($datahistory as $dh) 
                @foreach($array as $a)
                   @if($dh->id==$a)
                   <tr> <td>{{$dh->date_payment}}</td> 
                    <td>{{$dh->user->name}}</td>
                    @if(session()->get('group')==4)
                    <td>{{$dh->register->school->user_name}}</td>
                    @else
                    <td>{{$dh->register->serviceProvider->user_name}}</td>
                    @endif
                    <td>{{$dh->amount}}</td>
                    <td>{{$dh->receipt_number}}</td>
                    </tr>
                   @endif
                @endforeach
            @endforeach
            </tbody>
            </table>
        </div>
        <div class="col-sm-1"></div>
</div>
<div class="row" align="center">
    <div class="col-sm-4"></div>
    <div class="col-sm-2"> 
    <button class="btn btn-outline-warning">Print</button> 
    </div>
    <div class="col-sm-5"></div>
</div>
@else
<div align="center">
    <h3 class="text-info">Their are no history for this month</h3>
</div>
@endif
</div> 
@endsection