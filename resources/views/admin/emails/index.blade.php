@extends('layouts.admin')

@section('content')
<section class="container">
	 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Send Email</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
              <li class="breadcrumb-item active"><b>Send|Email</b></li> 
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <a href="{{ route('sendtocustomer')}}" class="btn btn-outline-primary">Send To All Customer</a>
    </div>  <hr> 
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<table class="table table-rounded table-striped">
		      <tr> 
		        <th>Id</th>
		        <th>Name</th>
		        <th>Email</th>
		        <th>Phone</th>
		        <th>Service</th> 
		        <th>Action</th> 
		      </tr>
		      @foreach( $managerlist as $m)
		      <tr>
		        <th>{{ $m->id }}</th>
		        <th>{{ $m->name }}</th>
		        <th>{{ $m->email }}</th>
		        <th>{{ $m->phone }}</th>
		        <th>{{ $m->service->service_name }}</th>  
		        <th><a class="btn btn-warning" href="{{ route('mailmanager',$m->id)}}">Send Mail</a> 
		        </th>
		      </tr>
		        @endforeach
		    </table>
		    <div class="row"><div class="col-sm-4"></div>
		        <div class="col-sm-4">
		          {{ $managerlist->render() }}
		        </div><div class="col-sm-4"></div>
		      </div> 
		</div>
		<div class="col-sm-1"></div>
	</div>



</section>

@endsection