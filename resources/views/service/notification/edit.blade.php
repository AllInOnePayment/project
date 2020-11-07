@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceNotification.index')}}" class="btn btn-info">Back</a> 
    </div> 
    <form action="{{route('ServiceNotification.update',$notification->id)}}" method="POST">
            @csrf  
            {{ method_field('PUT') }} 
            <div class="form-group">
                <label for="title">Title : </label>
            <input type="text" name="title" class="form-control" value="{{$notification->title}}" required>
            </div>
            <div class="form-group">
                <label for="body">Body : </label>
            <textarea name="body" class="form-control" required>{{$notification->notification}}</textarea>
            </div>
        
        
        <button type="submit" class="btn btn-info">Edit notification</button>
    </form>
</div>
    
@endsection