@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Manager</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
          <li class="breadcrumb-item active"><b>Manager|edit</b></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header --> 

<section class="container-fluid"><hr> 
	<form method="post" action="{{ route('admin.manager.update',$managers->id)}}">
		@method('PUT')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row"> 
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Manager Name</label>
           			<input type="text" name="name" value="{{ $managers->name}}" class="form-control">
           		</div>
           	</div> 
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Manager Email</label>
           			<input type="Email" name="email" value="{{ $managers->email}}" class="form-control">
           		</div>
           	</div></div><hr>
            <div class="row">
           	<div class="col-sm-6">
           		<div class="form-control">
                <label>Service Name</label>
           			<select name="service" class="form-control">
           				@foreach($service as $sl)
           					<option class="form-control" value="{{ $sl->id}}">{{$sl->service_name}}</option>
           				@endforeach
           			</select>
           		</div>
           	</div> 
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Manager Phone</label>
           			<input type="tel" name="phone" value="{{ $managers->phone}}" class="form-control">
           		</div>
           	</div>
           </div><hr>
           <div class="row">
            <div class="col-sm-6">
              <div class="form-control">
                <label>Manager Password</label>
                <input type="Password" name="pass" value="" class="form-control">
              </div>
            </div>
           	<div class="col-sm-2">
           		<div class="form-control">
           			<button type="submit" value="save" class="btn btn-outline-primary btn-block btn-flat">Update</button>
           		</div>
           	</div>
           	<div class="col-sm-4"></div>
           </div>	 
    </form>  
</section>

@endsection