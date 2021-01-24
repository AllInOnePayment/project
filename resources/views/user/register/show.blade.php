@extends('layouts.user')

@section('content')
<div class="section"><br><hr>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="row">
        <div class="col-sm-5">
           <form action="{{route('userregister.display',$id)}}" method="POST">
                    @csrf 
                    <div class="form-control">
                    <input value="2" type="hidden" class="form-control">
                    <label for="user_number" class="">User Number:</label>
                    <input type="number" name="user_number" class="form-control" placeholder="Enter Here" value="" required>
                    <br> <button class="btn btn-outline-info">Find</button>
                    </div>  
            </form> 
        </div>
        <div class="col-sm-7">
            <div class="form-control justify-content-center" style="border-radius: 25px;">
                <form action="{{route('userregister.register',$id)}}">  
                @if($display==1)
                @if($count==1)
                <input name="serviceid" value="{{$userdata->service_id}}" type="hidden" class="col-sm-2">
                <input name="id" value="{{$userdata->id}}" type="hidden" class="col-sm-2"><hr>
                <label for="user_number">User Number:<b class="text-info"> {{$userdata->user_number}}</b></label><hr>
                <label for="user_name">User Name:<b class="text-info"> {{$userdata->user_name}}</b></label><hr>
                <label for="address">Address:<b class="text-info"> {{$userdata->address}}</b></label><hr>
                <br> <button class="btn btn-outline-info">Register</button> 
                @else
                <hr>
                <h3 class="text-info">: Their Is No User By This ID</h3>
                <hr>
                @endif
                @endif
                </form>
            </div> 
        </div></div>  
    </div>
    <div class="col-sm-1"></div>
</div>
</div> 
@endsection