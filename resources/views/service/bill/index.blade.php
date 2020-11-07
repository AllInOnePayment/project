@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        
    </div> 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Number</th>
                <th>User number</th>
                <th>User name</th>
                @if(session()->get('service_id')>5)
                    <th>Grade</th>
                    <th>Department</th>
                    <th>Class</th>
                @else
                    <th>User addres</th>
                @endif
                <th>online status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $item)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$item->user_number}}</td>
                    <td>{{$item->user_name}}</td>
                    @if(session()->get('service_id')>5)
                        <td>{{$item->level}}</td>
                        <td>{{$item->department}}</td>
                        <td>{{$item->class}}</td>
                    @else
                    <td>{{$item->addres}}</td>
                    @endif
                    <td>@if($item->status==1)
                            User
                        @else
                            Non user
                        @endif    
                    </td>
                    <td><a href="{{route('ServiceBill.show',$item->id)}}" class="btn btn-info">Bill</a></td>
                        {{-- <form action="{{route('ServiceNews.destroy',$item->id)}}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }} 
                            <a href="{{route('ServiceNews.edit',$item->id)}}" class="btn btn-primary">Edit</a>
                            
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    
                </tr>
                
            @endforeach
        </tbody>
    </table>
    </div>
   
@endsection

