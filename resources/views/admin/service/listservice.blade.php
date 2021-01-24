@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text text-primary">Service List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>Service</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="container-fluid"><hr>
    <a href="{{ route('admin.service.create')}}" class="btn btn-outline-primary">Add Service</a><hr>
	<div class="container">
		<table class="table table-rounded table-striped">
			<tr> 
				<th>Service ID</th>
				<th>Name</th>
				<th>Http</th>
				<th>Bank Account</th>
				<th>Mobile Banking</th>
				<th>Manage Data</th>
			</tr>
			@foreach( $servicelist as $n)
			<tr>
				<th>{{ $n->id }}</th> 
				<th>{{ $n->service_name }}</th>
				<th>{{ $n->http }}</th>
				<th>{{ $n->bank_account }}</th>
				<th>{{ $n->mobilebank->bank_name }}</th> 
				<th><a class="btn btn-outline-warning" href="{{ route('admin.service.edit',$n->id)}}">Edit</a>
        <a class="btn btn-outline-info" href="{{ route('admin.service.show',$n->id)}}">Detail</a>
        </th>
			</tr>
  			@endforeach
		</table>
		<div class="row"><div class="col-sm-4"></div>
		    <div class="col-sm-4">
		    	{{ $servicelist->render() }}
		    </div><div class="col-sm-4"></div>
	    </div> 
	</div>
</section>

@endsection