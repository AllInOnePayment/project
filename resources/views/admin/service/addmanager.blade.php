@extends('layouts.admin')

@section('content')

<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Manager to Service</h1>
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

<section class="container-fluid">
  <hr>
  <a href="{{ route('admin.manager.create')}}" class="btn btn-primary"> Add Manager</a> <hr>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <h3 class="text-info">List of services</h3>
      @foreach($servicelist as $sl)
          <div class="form-control">
            <h4>{{ $sl->service_name }}</h4>
          </div>
      @endforeach    
    </div>
  </div>
</section>


@endsection