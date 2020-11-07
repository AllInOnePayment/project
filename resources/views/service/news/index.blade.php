@extends('layouts.service')

@section('content')

    <div class="container">
    <div class="content-header">
        <a href="{{route('ServiceNews.create')}}" class="btn btn-info">Send news</a> 
    </div> 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Number</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($news as $item)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        <form action="{{route('ServiceNews.destroy',$item->id)}}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }} 
                            <a href="{{route('ServiceNews.edit',$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('ServiceNews.show',$item->id)}}" class="btn btn-info">Detail</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    </div>

    
@endsection

