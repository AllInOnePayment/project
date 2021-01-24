@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceNotification.create')}}" class="btn btn-info">Add notifications</a> 
    </div> 
    {{-- <form action="{{route('ServiceNotification.index')}}" method="POST">
        @csrf
        The Date of Payment is : <input type="number" name="date" class="col-sm-1" min=1 max=30 value="5">
        <input type="submit" value="Change Date">
    </form> --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Number</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($notification as $item)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        <form action="{{route('ServiceNotification.destroy',$item->id)}}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }} 
                            <a href="{{route('ServiceNotification.edit',$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('ServiceNotification.show',$item->id)}}" class="btn btn-info">Detail</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    </div>
    
@endsection

