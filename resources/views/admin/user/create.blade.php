@extends('layouts.admin')
@section('content')

<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
              <li class="breadcrumb-item active"><b>Add User</b></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-6">
          <div>
          <div class="register-logo">
          <a href="{{route('adminhome')}}"><b>All In |</b>ONE</a>
          </div> 
          <div class="card">
          <div class="card-body"> 

    <form  method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback display-flex">
        <input type="text" name="name" class="form-control" placeholder="Full name">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="tel" name="phone" class="form-control" placeholder="Phone">
        <span class="fa fa-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback display-flex">
        <input type="password" name="repass" class="form-control" placeholder="Retaype Password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div> 
      <div class="form-group has-feedback display-flex">
        <input type="file" name="userphoto">
        <label>Profile Photo</label>
      </div>
      <div class="col-4">
        <button type="submit" value="save" class="btn btn-outline-primary btn-block btn-flat">Register</button>
        </div>           
    </form>
      <!-- 
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="number" name="phone" class="form-control" placeholder="Phone">
        <span class="fa fa-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="repass" class="form-control" placeholder="Retype password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div> -->
       
        
          </div>
          <!-- /.form-box -->
          </div><!-- /.card -->
          </div>
      </div>
      <div class="col-sm-2"></div>
    </div>
<!-- /.register-box -->
  	</div>	
  </section>
@endsection