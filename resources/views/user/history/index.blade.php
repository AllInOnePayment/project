@extends('layouts.user')

@section('content')
<div class="container">
	<br><hr><br>
	@if ($historycount>0)
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"> 
				<table class="table table-bordered table-striped">
				<tr>
				<th>Id</th>
				<th>Amount</th> 
				<th>Service</th>
				<th>Date</th>
				<th>More</th>
				</tr> 
				@foreach( $history as $c)
				<tr>
				<th>{{ $c->id }}</th>
				<th>{{ $c->amount }}</th>
				<th>{{ $c->register->service->service_name }}</th>
				<th>{{ $c->date_payment}}</th> 
				<th> 
				<a class="btn btn-info" href="{{ route('showbill',$c->id)}}">Detail</a>
				</th>
				</tr>
				@endforeach 
				</table>
			</div>
			<div class="col-sm-2"></div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
					<div class="alert alert-secondary alert-block">
						<h5>Sorry, you don't have any Payment history yet.</h5>
					</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
	@endif

</div>
@endsection