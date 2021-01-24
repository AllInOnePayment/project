@extends('layouts.admin')

@section('content')

<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of all managers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
              <li class="breadcrumb-item active"><b>Manager</b></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</div>


<section class="container-fluid"><hr>
    <a href="{{ route('admin.manager.create')}}" class="btn btn-outline-primary">Add Manager</a><hr>
  <div class="container">
    <table class="table table-rounded table-striped">
      <tr> 
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Service</th> 
        <th>Action</th> 
      </tr>
      @foreach( $managers as $m)
      <tr>
        <th>{{ $m->id }}</th>
        <th>{{ $m->name }}</th>
        <th>{{ $m->email }}</th>
        <th>{{ $m->phone }}</th>
        <th>{{ $m->service->service_name }}</th>  
        <th><a class="btn btn-outline-warning" href="{{ route('admin.manager.edit',$m->id)}}">Edit</a> 
        </th>
      </tr>
        @endforeach
    </table>
      <div class="row"><div class="col-sm-4"></div>
        <div class="col-sm-4">
          {{ $managers->render() }}
        </div><div class="col-sm-4"></div>
      </div> 
  </div>
</section>
@endsection