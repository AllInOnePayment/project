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
<div class="row">
	<div class="col-sm-5">
		<form class="form-inline ml-3">
	      <div class="input-group input-group-sm">
	        <input class="form-control form-control-navbar" type="search" placeholder="Search Here" aria-label="Search">
	        <div class="input-group-append">
	          <button class="btn btn-navbar" type="submit">
	            <i class="fa fa-search"></i>
	          </button>
	        </div>
	      </div>
	    </form>
	</div>
</div> 
<section class="content">
	<div class="container-fluid"><hr>
    <a href="{{ route('admin.user.create')}}" class="btn btn-primary text-white">Add New User</a><hr>
		<table class="table table-bordered table-striped">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Service</th>
				<th>Phone</th>
				<th>More</th>
			</tr>
			@foreach( $listuser as $c)
		<tr>
			<th>{{ $c->id }}</th>
			<th>{{ $c->name }}</th>
			<th>{{ $c->email }}</th>
			<th>{{ $c->service_id}}</th>
			<th>{{ $c->phone }}</th>
		<th><a class="btn btn-warning" href="{{ route('admin.user.edit',$c->id)}}">Edit</a>
      <a class="btn btn-info" href="{{ route('admin.user.show',$c->id)}}">Detail</a>
      </th>
		</tr>
			@endforeach
		</table>
		<div class="row"><div class="col-sm-4"></div>
		    <div class="col-sm-4">
		    	{{ $listuser->render()}}
		    </div><div class="col-sm-4"></div>
	    </div>  
	</div>	
	
</section>
@endsection