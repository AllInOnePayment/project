
@extends('layouts.user')

@section('content')
 
<div class="section"><br><hr>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10"> 
            <div class="card">
                <div class="row">
                    <div class="col-sm-6"> 
                      <h5 class="card-header"> 
                      <img class="img-circle" src="{{ asset('storage/logo/'.$data->image)}}" alt="picture" width="150" height="150">  
                                <form action="{{ Route('ServiceProfile.picture')}}" method="POST" enctype="multipart/form-data">
                                 @csrf 
                                <div class="form-group"> 
                                    <input name="img" type="file" class="btn btn-primary" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" name="submit" value="Change Picture" class="btn btn-info">
                                </div>
                            </form><hr> 
                       <p><label for="name">Account Balance : {{$data->bank->balance}} </label></p>
        <a href="{{route('ServiceProfile.editaccount',1)}}" class="btn btn-primary">WithDraw</a> 
                      </h5>
                    </div> 
                    <div class="col-sm-6"> 
                      <div class="card-body"><hr>
                        <h5 class="card-title">Name : <b class="text-info">{{ $data->name}}</b> </h5><hr>
                        <h5 class="card-title">Email : <b class="text-info">{{ $data->email}}</b> </h5><hr>
                        <h5 class="card-title">Phone : <b class="text-info">{{ $data->phone}}</b> </h5> <hr>
                        <a href="{{route('ServiceProfile.edit')}}" class="btn btn-primary">Edit Profile</a>
                      </div>
                    </div> 
                </div>
            </div> 
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-1"></div>
    </div>
</div> 
@endsection