@extends('layouts.service')

@section('content')
    <div class="container">
        <form action="{{route('ServiceNews.store')}}" method="POST">
            @csrf 
            <div class="form-group">
                <label for="title">Title : </label>
               <input type="text" name="title" class="form-control col-sm-9" required>
            </div>
            <div class="form-group">
                <label for="body">Body : </label>
               <textarea name="body" class="form-control col-sm-9" required></textarea>
            </div>
            <div class="form-group">
                <label for="expire">Expired date : </label>
               <input type="date" name="expire" class="form-control col-sm-3" required>
            </div>
           
           <button type="submit" class="btn btn-primary">Send</button>
           <a href="{{route('ServiceNews.index')}}" class="btn btn-warning">Cancel</a> 
        </form>
    </div>
    
    
    
@endsection