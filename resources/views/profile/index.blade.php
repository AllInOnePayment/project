@extends($profile->service->group == 1 ? 'layouts.user' : (($profile->service->group==2) ? 'layouts.admin' : 'layouts.service'))
  
@section('content')
 
<div class="section"><br><hr>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10"> 
			<div class="card">
				<div class="row">
					<div class="col-sm-6"> 
					  <h5 class="card-header"> 
						 @if($profile->service_id > 2)   
					  	<img class="img-circle" style="width: 150px; height: 150px;" src="{{ asset('storage/logo/'.$profile->service->image)}}"> <hr>
					  	@else
					  	<img class="img-circle" style="width: 150px; height: 150px;" src="{{ asset('storage/avator/'.$profile->image)}}"> <hr> 
					  	@endif 
					  	<p>Balance : <b class="text-info">{{ $profile->bank->balance}}.00 Birr</b></p> <hr>
						 @if($profile->service_id > 1) 
					    	<a href="{{ route('withdraw')}}" class="btn btn-outline-warning">Withdraw Now</a>
						 @else
						 	<a href="{{ route('deposite')}}" class="btn btn-outline-info">Deposit Now</a>
						 	<a href="{{ route('withdraw')}}" class="btn btn-outline-warning">Withdraw Now</a>
						 @endif 
					  </h5>
					</div> 
					<div class="col-sm-6"> 
					  <div class="card-body"><hr>
					    <h5 class="card-title">Name : <b class="text-info">{{ $profile->name}}</b> </h5><hr>
					    <h5 class="card-title">Email : <b class="text-info">{{ $profile->email}}</b> </h5><hr>
					    <h5 class="card-title">Phone : <b class="text-info">{{ $profile->phone}}</b> </h5> <hr>
					    <a href="{{ route('usereditprofile')}}" class="btn btn-outline-warning">Edit Profile</a>
					  </div>
					</div> 
				</div>
			</div> 
		</div>
		<div class="col-sm-6"></div>
		<div class="col-sm-1"></div>
	</div><hr> 
	
@if($profile->service->group == 3 || $profile->service->group == 4) 
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-4">
			<h3 class="text-info form-group">Service Data</h3><hr>
			<p class="text-info form-control">Id :{{$profile->service->id}}</p>
			<p class="text-info form-control">Name :{{$profile->service->service_name}}</p>
		</div>
		<div class="col-sm-5"><br><br><hr>
			<p class="text-info form-control">Http :{{$profile->service->http}}</p>
			<p class="text-info form-control">Mobile Bank : {{$profile->service->mobileBank->bank_name}}</p>
		</div>
		<div class="col-sm-1"></div>
	</div>
@elseif($profile->service->group == 1)
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-5">
			<h class="text-warning form-control"><b>Registered In</b></h><hr>
			@if($registered->count()>0) 
				@foreach($registered as $row)
			 <b class="text-info form-control">{{$row->service->service_name}}</b><hr>
				@endforeach 
				<hr>
			@else
			   <h4 class="tex-primary">Register To Services</h4>
			@endif	
		</div>
		<div class="col-sm-5">
			<h class="text-warning form-control"><b>Transfered In</b></h><hr>
			@if($profile->transaction->count()>0)
				@foreach($transaction as $row)
					<h3 class="text-info form-control">{{$row->mobileBank->bank_name}}</h3><hr>
				@endforeach
			@endif
		</div>
		<div class="col-sm-1"></div>
	</div>
@endif
	
</div> 
@endsection