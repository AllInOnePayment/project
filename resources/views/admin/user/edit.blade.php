@extends('layouts.admin')

@section('content')

<section class="container-fluid"><br>

	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-5">
			<!-- SEARCH FORM -->
		    <form class="form-inline ml-3">
		      <div class="input-group input-group-sm">
		        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
		        <div class="input-group-append">
		          <button class="btn btn-navbar" type="submit">
		            <i class="fa fa-search"></i>
		          </button>
		        </div>
		      </div>
		    </form> 
		    <hr>
		</div>
	</div>
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
					onclick="$(this).parent().find('form').submit()" class="pl-3 btn btn-danger">Delete Account</a><hr>
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
        <input type="password" name="pass" class="form-control" value="{{ $user->password}}">
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="file" name="photo">
      </div>
      <div class="col-4">
        <button type="submit" value="save" class="btn btn-primary btn-block btn-flat">Update</button>
        </div>
    </form>
		</div>
	</div><br><hr>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-5">
			<h3 class="text text-primary">Registered In</h3>
			<div class="info-box mb-3 bg-success">
			<span class="info-box-icon"><i class="fa fa-heart-o"></i></span>
			<h4>Farus primary School</h4>
			<h4>AtseYohanes School</h4>
			<!-- /.info-box-content -->
			</div>
		</div>
		<div class="col-sm-6">
			<h3 class="text-primary">Payment In</h3>
			<div class="info-box mb-3 bg-warning">
			<span class="info-box-icon"><i class="fa fa-heart-o"></i></span>

			<div class="info-box-content">
				<ul>
				   <li>HelloCash</li>
				   <li>CBE</li>
			    </ul>  
			</div>
			<!-- /.info-box-content -->
			</div>
			
		</div>
	</div>
</section>

@endsection