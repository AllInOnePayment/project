@extends('layouts.admin')

@section('content')


<div class="container">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Information </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>Info</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<section class="container-fluid"> 
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">{{$uc}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-flag-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Registered</span>
                <span class="info-box-number">{{ $rc}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-files-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Payments</span>
                <span class="info-box-number">{{ $sc }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-bank"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transactions</span>
                <span class="info-box-number">{{ $bc }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <hr> 
<div class="row">
	<div class="col-md-6">
		<div class="card card-default">
		  <div class="card-header">
		    <h3 class="card-title">
		      <i class="fa fa-bullhorn"></i> 
		      Numeric Info
		    </h3>
		  </div>

		  <!-- /.card-header --> 
		  <div class="card-body">
		    <div class="callout callout-success">
		      <p> Their are <b>{{ $uc }}</b> users in All In | ONE</p> 
		    </div>
		    <div class="callout callout-success">
		      <p>Their are <b>{{ $rc }}</b> users registered for online payment.</p> 
		    </div>
		    <div class="callout callout-success">
		      <p>Many of them are registered in more than two services.</p> 
		    </div>
		    <div class="callout callout-success">
		      <h5>Their are <b>{{$uc}}</b> registered users</h5>

		      <p>This is a green callout.</p>
		    </div>
		  </div>
		  <!-- /.card-body -->
		</div>
	<!-- /.card -->
	</div>

	<div class="col-md-6">
		<div class="card card-default">
		  <div class="card-header">
		    <h3 class="card-title">
		      <i class="fa fa-bullhorn"></i>
		      User Info
		    </h3>
		  </div>
		  <!-- /.card-header -->
		  <div class="card-body">
		    <div class="callout callout-success">
		      <h5>Their are <b>{{$uc}}</b> Users of our system</h5>

		      <p>All in | ONE now encorporates <b>{{$sc}}</b> different
		      services. All are legaly registered services</p>
		    </div>
		    <div class="callout callout-success">
		      <h5>Their are <b>{{$bc}}</b> registered Mobile banking</h5>

		      <p>Follow the steps to continue to payment.</p>
		    </div>
		    <div class="callout callout-success">
		      <h5>Their are <b>{{$rc}}</b> registered users</h5>

		      <p>Many of them are registered in more than two services.</p>
		    </div>
		    <div class="callout callout-success">
		      <h5>Their are <b>{{$uc}}</b> registered users</h5>

		      <p>This is a green callout.</p>
		    </div>
		  </div>
		  <!-- /.card-body -->
		</div>
	<!-- /.card -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row --> 
</section> 
@endsection