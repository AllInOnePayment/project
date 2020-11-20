@extends('layouts.service')

@section('content')

    <div class="container">
        <div class="content-header">
            <a href="{{route('ServiceNews.index')}}" class="btn btn-info">Back</a> 
        </div> 
        <form action="{{route('ServiceNews.update',$news->id)}}" method="POST">
                @csrf  
                {{ method_field('PUT') }} 
                <div class="form-group">
                    <label for="title">Title : </label>
                    <input type="text" name="title" class="form-control" value="{{$news->title}}" required>
                </div>
                <div class="form-group">
                    <label for="body">Body : </label>
                    <textarea name="body" class="form-control" required>{{$news->news}}</textarea>
                </div>
                <div class="form-group">
                    <label for="date">posted date : </label>
                    <input type="date" name="date" class="form-control col-sm-3" value="{{$news->start_date}}" required>
                </div>
                <div class="form-group">
                    <label for="expire">Expired date : </label>
                    <input type="date" name="expire" class="form-control col-sm-3" value="{{$news->expire_date}}" required>
                </div>
                
            
            
            <button type="submit" class="btn btn-info">Edit</button>
        </form>
    </div>

    
@endsection