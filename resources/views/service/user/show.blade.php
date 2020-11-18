@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceUser.index')}}" class="btn btn-info">Back</a> 
    </div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                
                <p><label for="User_number">User number : {{$data->user_number}}</label></p>
                <p><label for="User_name">User name : {{$data->user_name}}</label></p>
                @if(session()->get('service_id')>5)
                    <p><label for="Grade">Grade : {{$data->level}}</label></p>
                    <p><label for="address">Address : {{$data->address}}</label></p>
                    <p><label for="Class">Class : {{$data->class}}</label></p>
                    <p><label for="Transport_status">Transport status :
                        @if($data->transport==1)
                          use Transport
                        @else
                          Don't use Transport
                        @endif    
                    </label></p>
                @else
                    <p><label for="User_addres">User addres : {{$data->addres}}</label></p>
                @endif
                <p><label for="status">online status :
                    @if($data->status==1)
                        User
                    @else
                        Non user
                    @endif  
                </label></p>
                <p><label for="payment_status">payment status :
                    @if ($data->Payment_status==1)
                        Paid
                    @else
                        Not paid    
                    @endif    
                </label></p>
            </div>
            <div class="col-6">
                @if($data->status==1)
                <p><label for="User_number">User Name : {{$data->register->user->name}}</label></p>
                <p><label for="User_name">Phone Number : {{$data->register->user->phone}}</label></p>
                <p><label for="User_name">Email : {{$data->register->user->email}}</label></p>
                @else
                
                <a href="{{route('UserRegister.index',$data->id)}}" class="btn btn-primary">Add Payer</a>
               {{--<a href="{{route('Tests.index',$data->id)}}" class="btn btn-primary">Select User</a>--}} 
                @endif
                
            </div>
            
            <a href="{{route('ServiceUser.edit',$data->id)}}" class="btn btn-primary">Edit User Info</a>
            
            
            <form action="{{route('ServiceUser.destroy',$data->id)}}" method="POST">
                @csrf
                {{ method_field('DELETE') }} 
                <button type="submit" class="btn btn-danger">Delete User</button>
            </form>
            
        </div>
    </div>
    
</div>
    
@endsection