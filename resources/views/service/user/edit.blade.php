@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceUser.show',$data->id)}}" class="btn btn-info">Back</a> 
    </div> 
    <div class="container-fluid">
        <form action="{{route('ServiceUser.update',$data->id)}}" method="POST">
            @csrf 
            {{ method_field('PUT') }} 
            
            <div class="form-group">
                <label for="user_number">user number:</label>
                <input type="text" name="user_number" value=" {{$data->user_number}}" required>
                @error('user_number')
                <p class="alert alert-danger col-4">{{$message}}:</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="user_name">user name :</label>
                <input type="text" name="user_name" value=" {{$data->user_name}}" required>
                @error('user_name')
                <p class="alert alert-danger col-4">{{$message}}:</p>
                @enderror
            </div>
            
            @if(session()->get('group')==4)
            <div class="form-group">
                <label for="level">grade : </label>
                <select name="level" class="col-sm-2">
                       @for( $i=-2; $i<=$datagrade->grade_max; $i++)
                         
                         <option value="{{$i}}" @if($data->level==$i)
                        selected
                        @endif >{{$i}}</option>
                        
                         @endfor
                    </select>
                
            </div>
            <div class="form-group">
                <label for="address">Address : </label>
                <input type="text" name="address" value=" {{$data->address}}" required>
            </div>
            <div class="form-group">
                <label for="class">class : </label>
                <select name="class" class="col-sm-3">
                {{$j='A'}}
                       @for( $i=1; $i<=$datagrade->class_max; $i++)
                         
                       <option value="{{$j}}" @if($data->class==$j)
                        selected
                        @endif>{{$j++}}</option>
                         
                         @endfor
                   
                    
                </select>
            </div>
            
            <div class="form-group">
                <label for="transport">transport : </label>
                <select name="transport" class="col-sm-3">
                    <option value=0 @if($data->transport==0)
                        selected
                        @endif > does not use transport</option>
                    <option value=1 @if($data->transport==1)
                        selected
                        @endif > transport user </option>
                </select>
            </div>
            @else
            <div class="form-group">
                <label for="addres">user addres : </label>
                <input type="text" name="addres" value="{{$data->addres}}" required>
                @error('addres')
                <p class="alert alert-danger col-4">{{$message}}:</p>
                @enderror
            </div>
            
            @endif
            <div class="form-group">
                <label for="payment_status">payment status : </label>
                <select name="payment_status" class="col-sm-3">
                    <option value=0 @if($data->Payment_status==0)
                        selected
                        @endif > Not paid</option>
                    <option value=1 @if($data->Payment_status==1)
                        selected
                        @endif > Paid </option>
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="status">status : </label>
                <select name="status" class="col-sm-3">
                    <option value=0 @if($data->status==0)
                        selected
                        @endif > not user</option>
                    <option value=1 @if($data->status==1)
                        selected
                        @endif > online user </option>
                </select>
            </div> --}}
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
    
</div>
    
@endsection