@extends('layouts.service')

@section('content')

<div class="container"><br>
    <div class="form-control" style="border-left: solid seagreen 2px; border-bottom: solid seagreen 2px; border-radius: 20px;">
        <h3 align="center" class="text-info">Import New User From Excel File</h3>
        @if (count($errors))
            <div class="alert alert-danger">Upload Validation Error<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message= Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong> {{ $message }}</strong>
            </div>
        @endif
        <form action="{{ route('ImportUser')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-2"><b class="text-info">Select File</b></div>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="users">
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-outline-info" name="upload" value="upload">
                </div>
            </div> 
        </form>
    </div> <hr>
    <div class="form-control" style="border-radius: 25px;"> 
        <h2 align="center"><b class="text-info">Register New User</b></h2>
        <div class="col-sm-7">
                <form action="{{route('ServiceUser.store')}}" method="POST">
                @csrf 
                <div class="form-group"></div>
                <div class="form-group d-flex flex-row" >
                    <label for="user_number" class="col-sm-3">User Number:</label>
                    <input type="text" name="user_number" class="form-control" value="" required>
                </div><br>
                <div class="form-group  d-flex flex-row">
                    <label for="user_name" class="col-sm-3">User Name :</label>
                    <input type="text" name="user_name" class="form-control" value="" required>
                </div><br> 
                @if(session()->get('group')==4)
                <div class="form-group">
                    <label for="level" class="col-sm-3">Grade : </label>
                    <select name="level" class="col-sm-2">
                       @for( $i=-2; $i<=$data->grade_max; $i++)
                         
                         <option value="{{$i}}" >{{$i}}</option>
                        
                         @endfor
                    </select>
                    
                </div><br>
                <div class="form-group d-flex flex-row">
                    <label for="address" class="col-sm-3">User Address :</label>
                    <input type="text" name="address" class="col-sm-5" value="" required>
                </div><br>
                <div class="form-group">
                   
                    <label for="class" class="col-sm-3">class : </label>
                    <select name="class" class="col-sm-2">
                             {{$j='A'}}
                       @for( $i=1; $i<=$data->class_max; $i++)
                         
                         <option value="{{$j}}" >{{$j++}}</option>
                         
                         @endfor
                    </select>
                    
                    
                </div><br>
                <div class="form-group">
                    <label for="transport" class="col-sm-3">Transport : </label>
                    <select name="transport" class="col-sm-3">
                        <option value=0 > does not use transport</option>
                        <option value=1 > transport user </option>
                    </select>
                    
                </div><br>
                @else
                <div class="form-group  d-flex flex-row">
                    <label for="addres" class="col-sm-3">User Addres : </label>
                    <input type="text" name="addres" class="col-sm-5 form-control" value="" required>
                </div><br>
                
                @endif
                {{-- <div class="form-group">
                    <label for="payment_status">Patyment Status : </label>
                    <input type="radio" name="payment_status" value=1
                    @if($data->Payment_status==1)
                    checked
                    @endif > :Paid
                    <input type="radio" name="payment_status" value=0
                    @if($data->Payment_status==0)
                    checked
                    @endif > :Not paid
                </div>
                <div class="form-group">
                    <label for="status">status : </label>
                    <input type="radio" name="status" value=1
                    @if($data->status==1)
                    checked
                    @endif > :online user
                    <input type="radio" name="status" value=0
                    @if($data->status==0)
                    checked
                    @endif > :not user
                </div> --}}
                <button type="submit" class="btn btn-outline-primary">Register</button>
                <div class="form-group"></div>
            </form>
        </div>
    </div>
    
</div>
    
@endsection