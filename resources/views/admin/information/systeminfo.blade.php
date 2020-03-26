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
                <span class="info-box-text">Services</span>
                <span class="info-box-number">{{ $sc }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-bank"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mobile Banks</span>
                <span class="info-box-number">{{ $bc }}</span>
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
                <span class="info-box-text">Registered</span>
                <span class="info-box-number">{{ $rc }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-cc-visa"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transactions</span>
                <span class="info-box-number">{{ $tc }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <hr>
</section>
<hr> 
<div class="row">
	@foreach($systemlist as $sl)
	<div class="col-md-6">
		<div class="card card-default">
		  <div class="card-header">
		    <h3 class="card-title">
		      <i class="fa fa-bullhorn"></i>
		      <b class="text-primary">{{ $sl->service_name }}</b> 
		    </h3>
		  </div>
		  <!-- /.card-header -->
		  <div class="card-body">
		    <div class="callout callout-info">
		      <h5>Name : <b>{{ $sl->service_name }}</b></h5> 
		      <p><b>{{ $sl->service_name }}</b> is one of the registered services in all-in-one bill payment system</p>
		    </div>
		    <div class="callout callout-info">
		      <h5>Http : <b>{{ $sl->http }}</b></h5> 
		      <p>{{ $sl->service_name }} can be reached using <b>{{ $sl->http }}</b></p>
		    </div>
        <div class="callout callout-info">
          <h5>Users :<b>
          <?php
              $count=0; 
                  foreach ($sl->register as $sr) {
                      $count = $count + 1;
                  }
               echo $count; 
           ?> 
           </b>
          </h5> 
          <p>Their are <?php echo $count ?> user that are registered to pay their bill through our system.</p>
        </div>
		    <div class="callout callout-info">
		      <h5>System ID : <b>{{ $sl->id }}</b></h5> 
		      <p>{{ $sl->id }} This is the systems identification key in our system</p>
		    </div>
		    <div class="callout callout-info">
		      <h5>Mobile Bank : <b>{{ $sl->mobileBank->bank_name }}</b></h5> 
		      <p>{{ $sl->service_name }} uses <b>{{ $sl->mobileBank->bank_name }}</b> for bill payment</p>
		    </div>
		  </div>
		  <!-- /.card-body -->
		</div>
	<!-- /.card -->
	</div>
	@endforeach
</div>


@endsection