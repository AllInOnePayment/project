@extends('layouts.admin')
@section('content')

<section class="container-fluid"><br>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-5">
<!-- 			SEARCH FORM  -->		 
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
<!-- 	Row that lists the elements in the profile of the user
	 -->	
	 <div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-4 "><br>
					<img class="img img-circle" src="{{ asset('dist/img/user1-128x128.jpg')}}">
				</div>
				<div class="col-sm-7"><br>
					<p>Name  : <b>{{ $serviceInfo->service_name}}</b></p>
					<p>Id : <b>{{ $serviceInfo->service_id}}</b></p>
					<p>Http : <b>{{ $serviceInfo->http}}</b></p>
					<p>Bank : <b>{{ $serviceInfo->bank_account}}</b></p>
					<p>Mobile : <b>{{ $serviceInfo->mobile_bank_id}}</b></p>
					<hr>
					<a href="javascript:void(0)" 
					onclick="$(this).parent().find('form').submit()" class="pl-3 btn btn-danger">Delete Account</a><hr>
					<form action="#" method="post">
						@method('DELETE')
						      <input type="hidden" name="_token" value="{{ csrf_token() }}">

					</form>
				</div>
			</div>
		</div>
	    <div class="col-sm-1"></div>
		<!-- A row that contains form to edit the profile of the user -->
		<div class="col-sm-5">
	 <form  method="post" action="{{ route('admin.service.update', $serviceInfo->id) }}">
	 	@method('PUT')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback display-flex">
        <input type="text" name="name" class="form-control" value="{{ $serviceInfo->service_name}}"> 
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="text" name="id" class="form-control" value="{{ $serviceInfo->service_id}}"> 
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="text" name="http" class="form-control" value="{{ $serviceInfo->http}}"> 
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="text" name="bank" class="form-control" value="{{ $serviceInfo->bank_account}}"> 
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="text" name="mobile" class="form-control" value="{{ $serviceInfo->mobile_bank_id}}"> 
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

			<div class="info-box-content">
				<ul>
					<li>Farus School</li>
					<li>Mebrat Corporation</li>
				</ul>  
			</div>
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