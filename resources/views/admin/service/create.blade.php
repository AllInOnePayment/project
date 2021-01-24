@extends('layouts.admin')

@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Service</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
              <li class="breadcrumb-item active"><b>Add Service</b></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10"> 
		<form method="post" action="{{ route('admin.service.store')}}" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row"> 
           	<div class="col-sm-6">
           		<div class="form-control">
           			<label>Service Phone</label>
           			<input type="tel" name="account" class="form-control">
           		</div>
           	</div>
            <div class="col-sm-6">
              <div class="form-control">
                <label>Service Name</label>
                <input type="text" name="name" class="form-control">
              </div>
            </div>
           </div><hr>
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
                <input type="text" name="http" class="form-control">
              </div>
            </div>
           	</div><hr> 
           <div class="row"> 
            <div class="col-sm-3">
              <div class="form-control">
                <label>Payment Start</label>
                <input type="number" name="paymentstart" class="form-control">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-control">
                <label>Payment End</label>
                <input type="number" name="paymentend" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-control">
                <label>Group</label>
                <select name="group" class="form-control"> 
                    <option class="form-control" value="3">Service Provider</option> 
                    <option class="form-control" value="4">School</option> 
                </select>
              </div>
            </div>
          </div><hr>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group has-feedback display-flex">
                <input type="file" class="form-control" onchange="return previewImage(event)" name="servicephoto"> 
              </div>
            </div> 
              <div class="col-sm-6"> 
                <img class="img-circle" width="100px" alt="Company Logo" id="output">
              </div>
            </div><hr> 
           <div class="row">
             <div class="col-sm-3"></div>	
            <div class="col-sm-2">
              <div class="form-control">
                <button type="submit" value="save" class="btn btn-outline-primary btn-block btn-flat">Register</button>
              </div>
            </div><div class="col-sm-4"></div>
           </div>
        </form>  
	</div>
	<div class="col-sm-1"></div>
</div>
<script type="text/javascript">
  function previewImage(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endsection
