@extends('layouts.admin')

@section('content')

<section class="container">
	<br><hr><br>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<table class="table table-rounded table-striped">
		      <tr> 
		        <th>Id</th>
		        <th>Name</th>
		        <th>Email</th>
		        <th>Phone</th>
		        <th>Service</th> 
		        <th>Action</th> 
		      </tr>
		      @foreach( $managerlist as $m)
		      <tr>
		        <th>{{ $m->id }}</th>
		        <th>{{ $m->name }}</th>
		        <th>{{ $m->email }}</th>
		        <th>{{ $m->phone }}</th>
		        <th>{{ $m->service->service_name }}</th>  
		        <th><a class="btn btn-warning" href="{{ route('mailmanager',$m->id)}}">Send Mail</a> 
		        </th>
		      </tr>
		        @endforeach
		    </table>
		    <div class="row"><div class="col-sm-4"></div>
		        <div class="col-sm-4">
		          {{ $managerlist->render() }}
		        </div><div class="col-sm-4"></div>
		      </div> 
		</div>
		<div class="col-sm-2"></div>
	</div>



</section>

@endsection