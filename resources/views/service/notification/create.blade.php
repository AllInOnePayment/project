@extends('layouts.service')

@section('content')

<div class="container">
    <form action="{{route('ServiceNotification.store')}}" method="POST">
            @csrf 
            <div class="form-group">
                <label for="title">Title : </label>
               <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="body">Body : </label>
               <textarea name="body" class="form-control" required></textarea>
            </div>
           
           
           <button type="submit" class="btn btn-primary">Send notification</button>
           <a href="{{route('ServiceNotification.index')}}" class="btn btn-warning">Cancel</a> 
        </form>
    </div>
    
    
@endsection