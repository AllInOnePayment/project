@extends('layouts.user')
@section('content')
<div class="container">
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
     <hr><b class="text-info">Select Service To Register</b><hr>
 <div class="row"> 
            @foreach($services as $service)
        <div class="col-sm-3">
            <div class="card" style="width: 15rem;">
              <img class="card-img-top" src="{{ asset('storage/logo/'.$service->image)}}" alt="Card image cap" style="border-bottom: solid seagreen 2px; border-left: solid seagreen 2px; border-radius: 20px;">
              <div class="card-body"><hr>
                <h5 class="card-title">{{$service->service_name}}</h5> <hr>
                <a href="{{route('userregister.show',$service->id)}}" class="btn btn-outline-primary">Register</a>
              </div>
            </div> <hr>
        </div>
     <div class="col-sm-1"></div> @endforeach
     </div> 
  </div>
  <div class="col-sm-1"></div>
</div> 
</div>
@endsection

