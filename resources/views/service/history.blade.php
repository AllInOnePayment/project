@extends('layouts.service')

@section('content')
<div class="container">
<table class="table">
     
                <thead>
                    <tr>
                        <th>date payment</th>
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
        <td>{{$dh->register->service_provider->user_name}}</td>
        @endif
        <td>{{$dh->amount}}</td>
        <td>{{$dh->receipt_number}}</td>
        </tr>
       @endif
    @endforeach
@endforeach

<tbody>
</table>
</div>
@endsection