@extends('layouts.admin')

@section('content')

<section class="container-fluid"><br>

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-primary"><b>User Edit</b></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>User|Edit</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
 
	<!-- Row that lists the elements in the profile of the user -->
	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-4 "><br>
					<img class="img img-circle" style="width: 160px; height: 160px;" src="{{ asset('storage/avator/'.$user->image)}}">
				</div>
				<div class="col-sm-7"><br>
					<p>Name    : <b>{{ $user->name}}</b></p>
					<p>Phone   : <b>{{ $user->phone}}</b></p>
					<p>Email   : <b>{{ $user->email}}</b></p>
					<p>Service : <b>{{ $servicename->service_name}}</b></p> 
					<hr>
					<a href="javascript:void(0)" 
					onclick="$(this).parent().find('form').submit()" class="pl-3 btn btn-outline-danger">Delete Account</a><hr>
					<form action="{{ route('admin.user.destroy', $user->id)}}" method="post">
						@method('DELETE')
						      <input type="hidden" name="_token" value="{{ csrf_token() }}">

					</form>
				</div>
			</div>
		</div>
	    <div class="col-sm-1"></div>
		<!-- A row that contains form to edit the profile of the user -->
		<div class="col-sm-5">
	 <form  method="post" action="{{ route('admin.user.update', $user->id) }}">
	 	@method('PUT')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback display-flex">
        <input type="text" name="name" class="form-control" value="{{ $user->name}}">
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="email" name="email" class="form-control" value="{{ $user->email}}">
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="number" name="phone" class="form-control" value="{{ $user->phone}}">
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="password" name="pass" class="form-control" value="">
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="file" name="photo">
      </div>
      <div class="col-4">
        <button type="submit" value="save" class="btn btn-outline-primary btn-block btn-flat">Update</button>
        </div>
    </form>
		</div>
	</div><br><hr> 
</section>

@endsection