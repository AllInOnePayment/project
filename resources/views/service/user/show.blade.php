@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceUser.index')}}" class="btn btn-outline-info">Back</a> 
    </div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 form-control" style="border-radius: 20px;"><hr> 
                <p><label for="User_number">User number : <b class="text-info">{{$data->user_number}}</b></label></p><hr>
                <p><label for="User_name">User name : <b class="text-info">{{$data->user_name}}</b></label></p><hr>
                @if(session()->get('group')==4)
                    <p><label for="Grade">Grade : <b class="text-info">{{$data->level}}</b></label></p><hr>
                    <p><label for="address">Address : <b class="text-info">{{$data->address}}</b></label></p><hr>
                    <p><label for="Class">Class : <b class="text-info">{{$data->class}}</b></label></p><hr>
                    <p><label for="Transport_status">Transport status :
                        @if($data->transport==1)
                          use Transport
                        @else
                          Don't use Transport
                        @endif    
                    </label></p><hr>
                @else
                    <p><label for="User_addres">User addres : <b class="text-info">{{$data->addres}}</b></label></p><hr>
                @endif
                <p><label for="status">Online Status :
                    @if($data->status==1)
                        <b class="text-info">User</b><hr>
                    @else
                        <b class="text-info">Non user</b><hr>
                    @endif  
                </label></p>
                <p><label for="payment_status">Payment Status :
                    @if ($data->Payment_status==1)
                        <b class="text-info">Paid</b><hr>
                    @else
                        <b class="text-info">Not paid </b> <hr>  
                    @endif    
                </label></p>
            </div>
            <div class="col-sm-6">
                @if($data->status==1)
                <p><label for="User_number">User Name : <b class="text-info">{{$data->register->user->name}}</b></label></p>
                <p><label for="User_name">Phone Number : <b class="text-info">{{$data->register->user->phone}}</b></label></p>
                <p><label for="User_name">Email : <b class="text-info">{{$data->register->user->email}}</b></label></p>
                @else
                
                <a href="{{route('UserRegister.index',$data->id)}}" class="btn btn-outline-primary">Add Payer</a>
               {{--<a href="{{route('Tests.index',$data->id)}}" class="btn btn-outline-primary">Select User</a>--}} 
                @endif 
            </div>
            <a href="{{route('ServiceUser.edit',$data->id)}}"><b  class="btn btn-outline-primary">Edit User Info</b></a> 
            <form action="{{route('ServiceUser.destroy',$data->id)}}" method="POST">
                @csrf
                {{ method_field('DELETE') }} 
                <button type="submit" class="btn btn-outline-danger ml-3">Delete User</button>
            </form>
            
        </div>
    </div>
    
</div>
    
@endsection