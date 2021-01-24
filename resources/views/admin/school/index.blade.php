@extends('layouts.admin')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add School</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
              <li class="breadcrumb-item active"><b>School | Info</b></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</div>
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<div class="form-control">
			<h3 class="text-info" align="center">{{ $school->service_name}}</h3>
		</div>
	</div>
	<div class="col-sm-3"></div>
</div><hr>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10"> 
		<form method="post" action="{{ route('schoolinfostore')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row"> 
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>School Address : </label>
           			<input type="text" name="address" class="form-control">
           		</div>
           	</div>
            <div class="col-sm-6">
              <div class="form-control">
                <label>Service Id : {{ $school->id}}</label>
                <input type="hidden" name="id" class="form-control" value="{{$school->id}}">
              </div>
            </div>
           </div><hr>
           <div class="row">
           	<div class="col-sm-6">
           		<div class="form-control">
                <label>Maximum Grade</label> 
                <input type="number" name="grade" class="form-control">
           		</div>
           	</div>
            <div class="col-sm-6">
              <div class="form-control">
                <label>Maximum Class</label> 
                <input type="text" name="sclass" class="form-control">
              </div>
            </div>
           	</div><hr>   
           <div class="row">
             <div class="col-sm-3"></div>	
            <div class="col-sm-2">
                <button type="submit" value="save" class="btn btn-outline-primary btn-block btn-flat">Register</button> 
            </div><div class="col-sm-4"></div>
           </div>
        </form>  
	</div>
	<div class="col-sm-1"></div>
</div>
@endsection
