@extends('layouts.service')

@section('content')

    this is the first page in service administrator.
    @foreach ($data as $d)
       <p> {{ $d->user_number }}</p>
       <p> {{  $d->service_id }}</p>
       <p> {{  $d->user_name }}</p>
       <p> {{  $d->addres }}</p>
    @endforeach
    
@endsection

