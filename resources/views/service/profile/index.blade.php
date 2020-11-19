@extends('layouts.service')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <p><label for="name">User Name : {{Auth::user()->name}}</label></p>
                    <p><label for="email">User Email : {{Auth::user()->email}}</label></p>
                    <p><label for="phone">User Phone : {{Auth::user()->phone}}</label></p>
                    <p><label for="service">Service Name : {{session()->get('service_name')}}</label></p>
                    <br>
                    <a href="{{route('ServiceProfile.edit')}}" class="btn btn-primary">Edit Profile</a>
                </div>
                

            </div>
            <div class="col-sm-6">
                <img src="/storage/image/{{Auth::user()->image}}" alt="picture" width="300" height="300">

            <form action="{{ Route('ServiceProfile.picture')}}" method="POST" enctype="multipart/form-data">
                 @csrf 
                <div class="form-group">
                    <label>upload an image</label>
                    <input name="img" type="file" class="btn btn-primary" required>
                    
                </div>
                <div class="form-group">
                    <label></label>
                    <input type="submit" name="submit" value="Change Picture" class="btn btn-info">
                </div>
            </form>
            </div>
        </div>
        <div class="col-sm-6"> 
        <p><label for="name">Account Balance : {{$data->bank->balance}} </label></p>
        <a href="{{route('ServiceProfile.editaccount',1)}}" class="btn btn-primary">WithDraw</a>
        <a href="{{route('ServiceProfile.editaccount',2)}}" class="btn btn-primary">Deposit</a>
        </div>
    </div>
    
@endsection