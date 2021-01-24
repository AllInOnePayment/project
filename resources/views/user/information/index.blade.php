@extends('layouts.user')

@section('content')

<div class="container"><br><hr>
	
		@if ($count>0)
			<div class="row"> 
				@foreach($news as $row)
					<div class="col-sm-5">
						<div class="card">
						<h5 class="card-header">
							<div class="row">
								<div class="col-sm-10"><p>{{ $row->service->service_name}}</p></div>
								<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$row->service->image)}}"></div>
							</div> 
						</h5>
						<div class="card-body">
							<h5 class="card-title"><b class="text-info">{{ $row->title}}</b> </h5>
							<p class="card-text">{{ trim($row->news)}}</p>
							<a href="{{ $row->service->http}}" target="_blank" class="btn btn-primary">Read More</a>
						</div>
						</div><hr>
					</div>
					<div class="col-sm-1"></div>
				@endforeach
			</div>
		@else
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
						<div class="alert alert-secondary alert-block">
							<h5>Sorry, you don't have any News yet.</h5>
						</div>
				</div>
				<div class="col-sm-2"></div>
			</div>
		@endif
		
</div>

@endsection