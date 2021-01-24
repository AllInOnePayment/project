@extends('layouts.admin')
@section('content')

<div class="container">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><b>User List</b></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>User</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    <!-- SEARCH FORM -->
	<form action="{{ route('FilterUser')}}" method="GET" class="d-inline-flex" >
            @csrf
		<div class="row">
			<div class="col-sm-5">
		   		<div class="form-control">
		        <label>Type of user</label>
		   			<select name="type" class="form-control">
		   					<option class="form-control" value="1">Customer</option>
		   					<option class="form-control" value="2">Admin</option>
		   			</select>
		   		</div>
		   	</div>  
		   	<div class="col-sm-5">
		   		<div class="form-control">
		        <label>Which Service</label>
		   			<select name="service" class="form-control">
		   				@foreach($services as $m)
		   					<option class="form-control" value="{{ $m->id}}">{{$m->service_name}}</option>
		   				@endforeach
		   			</select>
		   		</div>
		   	</div>
		   	<div class="col-sm-2">
		   		<div class="display-center">
		       		<button class="btn btn-outline-primary" type="submit">Display</button>
		   		</div>
		   	</div>
		</div> 
   </form>
<section class="content">
	<div class="container-fluid"><hr>
    <a href="{{ route('admin.user.create')}}" class="btn btn-outline-primary">Add New User</a><hr>
		<table class="table table-bordered table-striped">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Service</th>
				<th>Phone</th>
				<th>More</th>
			</tr>
		@if( $var==0)
			@foreach( $listuser as $c)
		<tr>
			<th>{{ $c->id }}</th>
			<th>{{ $c->name }}</th>
			<th>{{ $c->email }}</th>
			<th>{{ $c->service->service_name}}</th>
			<th>{{ $c->phone }}</th>
		<th><a class="btn btn-outline-warning" href="{{ route('admin.user.edit',$c->id)}}">Edit</a>
      <a class="btn btn-outline-info" href="{{ route('admin.user.show',$c->id)}}">Detail</a>
      </th>
		</tr>
			@endforeach
		@endif
		@if( $var==1)
			@foreach( $listuser as $c)
		<tr>
			<th>{{ $c->id }}</th>
			<th>{{ $c->user->name}}</th>
			<th>{{ $c->user->email }}</th>
			<th>{{ $c->service->service_name}}</th>
			<th>{{ $c->user->phone }}</th>
		<th><a class="btn btn-outline-warning" href="{{ route('admin.user.edit',$c->id)}}">Edit</a>
      <a class="btn btn-outline-info" href="{{ route('admin.user.show',$c->id)}}">Detail</a>
      </th>
		</tr>
			@endforeach
		@endif
		</table>
		<div class="row"><div class="col-sm-4"></div>
		    <div class="col-sm-4">
		    	{{ $listuser->render()}}
		    </div><div class="col-sm-4"></div>
	    </div>  
	</div>	
	
</section>
@endsection