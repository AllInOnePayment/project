@extends('layouts.admin')

@section('content')

@foreach($bankinfo as $c)
<section class="container-fluid"><hr>
	<h3 class="text text-info"> Edit <b>Mobile</b> Banking</h3> <hr>
	<div class="row">
		<div class="col-sm-5">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-control bg-primary">
					    <h4>Id :</h4>
					</div>
					<div class="form-control bg-warning">
					    <h4>Name :</h4>
					</div>
					<div class="form-control bg-success">
					    <h4>Http :</h4>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="form-control">
						<h4 class="text text-primary"><b>{{$c->id}}</b></h4>
					</div>
					<div class="form-control">
						<h4 class="text text-warning"><b>{{$c->bank_name}}</b></h4>
					</div>
					<div class="form-control">
						<h4 class="text text-success"><b>{{$c->http}}</b></h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-5">
		<form method="post" action="{{ route('admin.bank.update',$c->id)}}">
					@method('PUT')
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input class="form-control mt-1" type="text" name="id" value="{{$c->id}}">
					<input class="form-control mt-2" type="text" name="name" value="{{$c->bank_name}}">
					<input class="form-control mt-2" type="text" name="http" value="{{$c->http}}">
                    <button class="btn btn-outline-primary mt-2" type="submit">Update</button>
			</form>
		</div>
		<div class="col-sm-1"></div>
	</div>
</section>
@endforeach


@endsection