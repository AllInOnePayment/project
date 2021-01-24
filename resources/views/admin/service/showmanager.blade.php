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
  <a href="{{ route('admin.manager.create')}}" class="btn btn-outline-primary"> Add Manager</a> <hr>
  <div class="row">
    <div class="col-sm-7">
      @foreach($servicelist as $sl)
       @if(count($sl->user)>0)
       <table class="table-bordered table-striped">
         <th>
           <tr>Name</tr>
           <tr>Email</tr>
           <tr>Phone</tr>
           <tr>Service</tr>
         </th> 
          @foreach($sl->user as $ul)
           <tr>
              <th>{{ $ul->name }}</th>
              <th>{{ $ul->email }}</th>
              <th>{{ $ul->phone }}</th>
              <th>{{ $sl->service_name}}</th>
           </tr>  
          @endforeach  
       </table>
       @else
          <h4 class="text-center">No Registered admin for {{$sl->service_name}}</h4>
       @endif
    @endforeach       
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-4">
      <h3 class="text-info">List of services</h3>
      @foreach($servicelist as $sl)
          <a href="{{ route('admin.manager.show',$sl->id)}}">
          <div class="form-control">
            <h4>{{ $sl->service_name }}</h4>
          </div></a>
      @endforeach    
    </div>
  </div>
</section>  
@endsection