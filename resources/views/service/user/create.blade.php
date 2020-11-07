@extends('layouts.service')

@section('content')

<div class="container">
    <div class="content-header">
        <h3 align="center">Import New User From Excel File</h3>
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
            <table class="table " >
                <tr>
                    <td>Select File</td>
                    <td><input type="file" name="select_user"></td>
                    <td><input type="submit" name="upload" value="upload"></td>
                </tr>
            </table>
        </form>
    </div> 
    <div class="container-fluid">

        <h2 align="center">Register new user</h2>
        <div class="card">
                <form action="{{route('ServiceUser.store')}}" method="POST">
                @csrf 
                <div class="form-group"></div>
                <div class="form-group">
                    <label for="user_number" class="col-sm-2">user number:</label>
                    <input type="text" name="user_number" class="col-sm-3" value="" required>
                </div>
                <div class="form-group">
                    <label for="user_name" class="col-sm-2">user name :</label>
                    <input type="text" name="user_name" class="col-sm-3" value="" required>
                </div>
                
                @if(session()->get('service_id')>5)
                <div class="form-group">
                    <label for="level" class="col-sm-2">grade : </label>
                    <input type="number" min=-2 max=12 name="level" class="col-sm-3" value="" required>
                </div>
                <div class="form-group">
                    <label for="department" class="col-sm-2">department : </label>
                    <select name="department" class="col-sm-3">
                        <option value="natural" >natural</option>
                        <option value="social" >social</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="class" class="col-sm-2">class : </label>
                    <select name="class" class="col-sm-3">
                        <option value="A" >A</option>
                        <option value="B" >B</option>
                        <option value="C" >C</option>
                        <option value="D" >D</option>
                        <option value="E" >E</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transport" class="col-sm-2">transport : </label>
                    <select name="transport" class="col-sm-3">
                        <option value=0 > does not use transport</option>
                        <option value=1 > transport user </option>
                    </select>
                    
                </div>
                @else
                <div class="form-group">
                    <label for="addres" class="col-sm-2">user addres : </label>
                    <input type="text" name="addres" class="col-sm-3" value="" required>
                </div>
                
                @endif
                {{-- <div class="form-group">
                    <label for="payment_status">patyment status : </label>
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
                <button type="submit" class="btn btn-primary">Register</button>
                <div class="form-group"></div>
            </form>
        </div>
    </div>
    
</div>
    
@endsection