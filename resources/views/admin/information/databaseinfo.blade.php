@extends('layouts.admin')

@section('content')


<div class="container">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-primary"><b>Database Information </b></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>Info | DB</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<hr>
<section class="container-fluid">
	<div class="row">
		<div class="col-sm-3 info-box bg-warning">
			<span class="info-box-icon">
				<i class="fa fa-tag"></i>
			</span>
			<div class="info-box-content">
				<span class="info-box-text">No of Tables</span>
				<span class="info-box-number"><b>{{ $tablecount }}</b></span>
			</div> 
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 info-box bg-primary">
			<span class="info-box-icon">
				<i class="fa fa-tag"></i>
			</span>
			<div class="info-box-content">
				<span class="info-box-text">No of Tables</span>
				<span class="info-box-number"><b>{{ $tablecount }}</b></span>
			</div> 
		</div>
	</div>
	<div class="row">
		<div class="col-sm-5 info-box bg-secondary">
			<span class="info-box-icon">
				<i class="fa fa-tag"></i>
			</span>
			<div class="info-box-content">
				<span class="info-box-text">No of Tables</span>
				<span class="info-box-number"><b>{{ $tablecount }}</b></span>
			</div> 
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 info-box bg-info">
			<span class="info-box-icon">
				<i class="fa fa-tag"></i>
			</span>
			<div class="info-box-content">
				<span class="info-box-text">No of Tables</span>
				<span class="info-box-number"><b>{{ $tablecount }}</b></span>
			</div> 
		</div>
	</div>
</section>

@endsection()