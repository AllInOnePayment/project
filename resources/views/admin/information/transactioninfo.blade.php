@extends('layouts.admin')

@section('content')

<div class="container">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-primary"><b>Transaction Information</b> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>Info | Tra</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<hr>
<section class="container-fluid">
<div class="row">
	<div class="col-sm-6">
			@foreach($transaction as $tr)
	<div class="card card-info collapsed-card card-outline">
		<div class="card-header">
			<h3 class="card-title">Date : {{ $tr->created_at}}</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
			</div>
			 
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-7 info-box bg-warning">
				<span class="info-box-icon">
					<i class="fa fa-tag"></i>
				</span>
				<div class="info-box-content">
					<span class="info-box-text">Name</span>
					<span class="info-box-number"><b>{{ $tr->user->name }}</b></span>
				</div> 
			    </div> 
		    </div>
		    <div class="row">
				<div class="col-sm-8 info-box bg-primary">
				<span class="info-box-icon">
					<i class="fa fa-tag"></i>
				</span>
				<div class="info-box-content">
					<span class="info-box-text">Mobile Banking</span>
					<span class="info-box-number"><b>{{ $tr->mobilebank->bank_name }}</b></span>
				</div> 
			    </div> 
		    </div>
		    <div class="row">
				<div class="col-sm-9 info-box bg-secondary">
				<span class="info-box-icon">
					<i class="fa fa-tag"></i>
				</span>
				<div class="info-box-content">
					<span class="info-box-text">Amount</span>
					<span class="info-box-number"><b>{{ $tr->amount }}</b></span>
				</div> 
			    </div> 
		    </div>
		</div>
	</div><hr>
		    @endforeach	 
		</div>
	</div>
			
</section>
@endsection()