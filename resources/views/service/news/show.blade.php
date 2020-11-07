@extends('layouts.service')

@section('content')

    <div class="container">
        <div class="content-header">
            <a href="{{route('ServiceNews.index')}}" class="btn btn-info">Back</a> 
        </div> 
        <div class="row container-fluid">
            <div class="card  col-9">
                <p><label for="title">Title : {{$news->title}}</label></p>
                <p><label for="body">Body : {{$news->news}}</label></p>
                <p><label for="body">posted on : {{$news->start_date}}</label></p>
                <p><label for="body">expired on : {{$news->expire_date}}</label></p>
            </div>
            <div class="col-3"></div>
        </div>
        
    </div>
    
    
@endsection