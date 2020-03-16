@extends('layouts.admin')
@section('content')

<section class="container-fluid"><hr>
	<h3 class="text text-primary">List of Services</h3><hr>
	<div class="container">
		<table class="table table-rounded table-striped">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Service ID</th>
				<th>Http</th>
				<th>Bank Account</th>
				<th>Mobile Banking</th>
				<th>Manage Data</th>
			</tr>
			@foreach( $servicelist as $n)
			<tr>
				<th>{{ $n->id }}</th>
				<th>{{ $n->service_name }}</th>
				<th>{{ $n->service_id }}</th>
				<th>{{ $n->http }}</th>
				<th>{{ $n->bank_account }}</th>
				<th>{{ $n->mobile_bank_id }}</th> 
				<th><a class="btn btn-warning" href="{{ route('admin.service.edit',$n->id)}}">Edit</a>
        <a class="btn btn-info" href="#">Detail</a>
        </th>
			</tr>
  			@endforeach
		</table>
	</div>
</section>

@endsection