@extends('layouts.admin')

@section('content')

<div class="container">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Mobile Banking List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>Banking</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<section class="content">
	<div class="container-fluid"><hr>
    <a href="{{ route('admin.bank.create')}}" class="btn btn-outline-primary">Add Mobile Banking</a><hr>
		<table class="table table-bordered table-striped">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Http</th>
				<th>More</th>
			</tr>
			@foreach( $banking as $c)
		<tr>
			<th>{{ $c->id }}</th>
			<th>{{ $c->bank_name }}</th>
			<th>{{ $c->http }}</th>
			<th><a class="btn btn-outline-warning" href="{{ route('admin.bank.edit',$c->id)}}">Edit</a>
      <a class="btn btn-outline-info" href="{{ route('admin.bank.show',$c->id)}}">Detail</a>
      </th>
		</tr>
			@endforeach
		</table>

        <div class="row"><div class="col-sm-4"></div>
            <div class="col-sm-4"> 
                    {{ $banking->render()}} 
            </div><div class="col-sm-4"></div>
        </div> 
	</div>	
	
</section>

@endsection