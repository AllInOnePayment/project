@extends('layouts.admin')
@section('content')

<section class="container-fluid">
    <hr>
    @foreach($servicelist as $sl)
    	<h3 class="text text-info text-center"><b>{{$sl->service_name}}</b></h3>
    <div class="row">
    	<div class="col-sm-1"></div>
    	<div class="col-sm-6">
    		<div class="form-control">
    			<h4 class="text-primary">Name : {{$sl->service_name}}</h4>
    		</div>
    		<div class="form-control">
    			<h4 class="text-primary">Http : {{$sl->http}}</h4>
    		</div>
    		<div class="form-control">
    			<h4 class="text-primary">Phone : {{$sl->bank_account}}</h4>
    		</div>
			@endforeach
    	</div>
    	<div class="col-sm-3"><br>
    		<button class="btn btn-warning">Edit Service</button><hr>
    		<button class="btn btn-danger">Delete Service</button>
    	</div>
    </div><hr>
    <h4 class="text-primary">List of Users of the System</h4>
    <div class="row">
    	<div class="col-sm-1"></div>
    	<div class="col-sm-10">
    		<table class="table table-bordered table-striped">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Service</th>
				<th>Phone</th> 
			</tr>

		@foreach($servicelist as $sl)
			@foreach( $sl->user as $c)
		<tr>
			<th>{{ $c->id }}</th>
			<th>{{ $c->name }}</th>
			<th>{{ $c->email }}</th>
			<th>{{ $sl->service_name}}</th>
			<th>{{ $c->phone }}</th> 
		</tr>
			@endforeach
		@endforeach	
		</table> 
    	</div>
    	<div class="col-sm-1"></div>
    </div> 
</section>

@endsection