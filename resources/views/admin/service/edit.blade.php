@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Service</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
          <li class="breadcrumb-item active"><b>Edit Service</b></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header --> 

<section class="container-fluid"><hr>
@foreach($serviceinfo as $s)
	<form method="post" action="{{ route('admin.service.update',$s->id)}}">
		@method('PUT')
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row"> 
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Service Account</label>
           			<input type="tel" name="account" value="{{ $s->bank_account}}" class="form-control">
           		</div>
           	</div> 
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Service Name</label>
           			<input type="text" name="name" value="{{ $s->service_name}}" class="form-control">
           		</div>
           	</div></div><hr>
            <div class="row">
           	<div class="col-sm-6">
           		<div class="form-control">
                <label>Mobile Bank Name</label>
           			<select name="mobilelist" class="form-control">
           				@foreach($mobilelist as $m)
           					<option class="form-control" value="{{ $m->id}}">{{$m->bank_name}}</option>
           				@endforeach
           			</select>
           		</div>
           	</div> 
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Service Http</label>
           			<input type="text" name="http" value="{{ $s->http}}" class="form-control">
           		</div>
           	</div>
           </div><hr>
           <div class="row">
           	<div class="col-sm-5"></div>
           	<div class="col-sm-2">
           		<div class="form-control">
           			<button type="submit" value="save" class="btn btn-outline-primary btn-block btn-flat">Update</button>
           		</div>
           	</div>
           	<div class="col-sm-5"></div>
           </div>	 
    </form> 
    @endforeach 
</section>

@endsection