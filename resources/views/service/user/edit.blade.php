@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <a href="{{route('ServiceUser.show',$data->id)}}" class="btn btn-outline-info">Back</a> 
    </div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-7 form-control m-3" style="border-radius: 20px;">
                
        <form action="{{route('ServiceUser.update',$data->id)}}" method="POST">
            @csrf 
            {{ method_field('PUT') }} 
            
            <div class="form-group">
                <label for="user_number">User Number:</label>
                <input class="form-control" type="text" name="user_number" value="{{$data->user_number}}" required>
                @error('user_number')
                <p class="alert alert-danger col-4">{{$message}}:</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="user_name">User Name :</label>
                <input class="form-control" type="text" name="user_name" value=" {{$data->user_name}}" required>
                @error('user_name')
                <p class="alert alert-danger col-4">{{$message}}:</p>
                @enderror
            </div>
            
            @if(session()->get('group')==4)
            <div class="form-group">
                <label for="level">Grade : </label>
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
                <input class="form-control" type="text" name="address" value=" {{$data->address}}" required>
            </div>
            <div class="form-group">
                <label for="class">Class : </label>
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
                <label for="transport">Transport : </label>
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
                <label for="addres">User Addres : </label>
                <input class="form-control" type="text" name="addres" value="{{$data->addres}}" required>
                @error('addres')
                <p class="alert alert-danger col-4">{{$message}}:</p>
                @enderror
            </div>
            
            @endif
            <hr>
            <button type="submit" class="btn btn-outline-primary">Update</button>
        </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div> 
</div>
    
@endsection