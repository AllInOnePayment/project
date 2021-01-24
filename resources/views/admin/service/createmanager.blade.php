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
  <h3 class="text text-primary" align="center">All In | ONE</h3><hr>
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-9">
      
    <form method="post" action="{{ route('admin.manager.store')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row"> 
            <div class="col-sm-6">
              <div class="form-control">
                <label>Manager Name</label>
                <input type="text" name="name" class="form-control">
              </div>
            </div> 
              <div class="col-sm-6">
                <div class="form-control">
                <label>Manager System</label>
                <select name="service" class="form-control">
                  @foreach($servicelist as $m)
                    <option class="form-control" value="{{ $m->id}}">{{$m->service_name}}</option>
                  @endforeach
                </select></div>
              </div>
            </div><hr>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-control">
                <label>Manager Email</label>
                <input type="Email" name="email" class="form-control">
              </div>
            </div> 
            <div class="col-sm-6">
              <div class="form-control">
                <label>Manager Password</label>
                <input type="Password" name="pass" class="form-control">
              </div>
            </div>
            </div>
            <div class="row">
           </div><hr>
           <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
              <div class="form-control">
                <button type="submit" value="save" class="btn btn-outline-primary btn-block btn-flat">Register</button>
              </div>
            </div>
            <div class="col-sm-5"></div>
           </div>  
        </form>  

    </div>
    <div class="col-sm-2"></div>
  </div>
  <hr>
</section>


@endsection