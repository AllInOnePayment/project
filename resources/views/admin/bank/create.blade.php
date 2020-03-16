@extends('layouts.admin')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Mobile Banking</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
              <li class="breadcrumb-item active"><b>Add Banking</b></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<h3 class="text text-primary">All In | ONE</h3><hr>
		<form method="post" action="{{ route('admin.bank.store')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row">
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Mobile Banking Id</label>
           			<input type="text" name="bankid" class="form-control">
           		</div>
           	</div>
           </div><hr>
           <div class="row">
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Mobile Banking Name</label>
           			<input type="text" name="bankname" class="form-control">
           		</div>
           	</div>
           	</div><hr>
           	<div class="row">
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Mobile Banking Http</label>
           			<input type="text" name="bankhttp" class="form-control">
           		</div>
           	</div>
           </div><hr>
           <div class="row">
           	<div class="col-sm-5"></div>
           	<div class="col-sm-2">
           		<div class="form-control">
           			<button type="submit" value="save" class="btn btn-primary btn-block btn-flat">Register</button>
           		</div>
           	</div>
           	<div class="col-sm-5"></div>
           </div>	 
        </form>  
	</div>
	<div class="col-sm-1"></div>
</div>


@endsection