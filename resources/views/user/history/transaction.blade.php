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
				<th>From</th>
				<th>Date</th> 
				</tr> 
				@foreach( $transaction as $c)
				<tr>
				<th>{{ $c->id }}</th>
				<th>{{ $c->amount }}</th>
				<th>{{ $c->mobileBank->bank_name }}</th>
				<th>{{ $c->updated_at}}</th>  
				</tr>
				@endforeach 
				</table> 
			</div>
			<div class="col-sm-2"></div>
		</div><hr>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-3"> 
				<h3>Total Amount : <b class="text-info">{{ $total}}</b> </h3>  
			</div>
			<div class="col-sm-3"></div>
			<div class="col-sm-3"></div>
			<div class="col-sm-1"></div>
		</div><hr>
	@else
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
				<div class="alert alert-secondary alert-block">
					<h5>Sorry, you don't have any history transaction of money yet.</h5>
				</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
	@endif

</div>

@endsection