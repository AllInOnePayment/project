@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceNotification.index')}}" class="btn btn-info">Back</a> 
    </div> 
    <div class="row container-fluid">
        <div class="card  col-9">
            <p><label for="title">Title : {{$notification->title}}</label></p>
            <p><label for="body">Body : {{$notification->notification}}</label></p>
        </div>
        <div class="col-3"></div>
    </div>
    
</div>
    
@endsection