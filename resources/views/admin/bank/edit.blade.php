@extends('layouts.admin')

@section('content')

@foreach($bankinfo as $c)

	<div class="row">
	<div class="col-sm-3">
		<ul>
			<li>{{$c->mobile_bank_id}}</li>
			<li>{{$c->bank_name}}</li>
			<li>{{$c->http}}</li>
		</ul>
	</div>
</div>

@endforeach


@endsection