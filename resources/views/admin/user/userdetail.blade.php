@extends('layouts.admin')

@section('content')

<section class="container-fluid">
<h3 class="mt-4 mb-4 text text-primary">Detailed User Information </h3><hr>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form> 
    <hr>
	<div class="row">
	  <!-- /.col -->
	  <div class="col-md-6">
	    <!-- Widget: user widget style 1 -->
	    <div class="card card-widget widget-user">
	      <!-- Add the bg color to the header using any of the bg-* classes -->
	      <div class="widget-user-header bg-info-active">
	        <h3 class="widget-user-username text-primary">{{$user->name}}</h3>
	        <h5 class="widget-user-desc">Memeber Of All In | ONE</h5>
	      </div>
	      <div class="widget-user-image">
	        <img class="img-circle elevation-2" src="{{ asset('storage/avator/'.$user->image)}}" alt="User Avatar">
	      </div>
	      <div class="card-footer">
	        <div class="row">
	          <div class="col-sm-4 border-right">
	            <div class="description-block">
	              <h5 class="description-header">Email</h5>
	              <span class="description-text text-primary">{{$user->email}}</span>
	            </div>
	            <!-- /.description-block -->
	          </div>
	          <!-- /.col -->
	          <div class="col-sm-4 border-right">
	            <div class="description-block">
	              <h5 class="description-header">Phone</h5>
	              <span class="description-text text-primary">{{$user->phone}}</span>
	            </div>
	            <!-- /.description-block -->
	          </div>
	          <!-- /.col -->
	          <div class="col-sm-4">
	            <div class="description-block">
	              <h5 class="description-header">Id</h5>
	              <span class="description-text text-primary">{{$user->id}}</span>
	            </div>
	            <!-- /.description-block -->
	          </div>
	          <!-- /.col -->
	        </div>
	        <!-- /.row -->
	      </div>
	    </div>
	    <!-- /.widget-user -->
	  </div>
	  <div class="col-md-6">
	    <!-- Widget: user widget style 2 -->
	    <div class="card card-widget widget-user-2">
	      <!-- Add the bg color to the header using any of the bg-* classes -->
	      <div class="widget-user-header bg-warning">
	        
	        <h5 class="widget-user-desc text-primary"><b>Registered In</b></h5>
	      </div>
	      <div class="card-footer p-0">
	        <ul class="nav flex-column">
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Projects <span class="float-right badge bg-primary">31</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Tasks <span class="float-right badge bg-info">5</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Completed Projects <span class="float-right badge bg-success">12</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Followers <span class="float-right badge bg-danger">842</span>
	            </a>
	          </li>
	        </ul>
	      </div>
	    </div>
	    <!-- /.widget-user -->
	  </div>
	 
	  <!-- /.col -->
	</div>
	<hr>
	<div class="row">
	  <div class="col-md-6">
	    <!-- Widget: user widget style 2 -->
	    <div class="card card-widget widget-user-2">
	      <!-- Add the bg color to the header using any of the bg-* classes -->
	      <div class="widget-user-header bg-warning">
	        
	        <h5 class="widget-user-desc text-primary"><b>Payment</b></h5>
	      </div>
	      <div class="card-footer p-0">
	        <ul class="nav flex-column">
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Projects <span class="float-right badge bg-primary">31</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Tasks <span class="float-right badge bg-info">5</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Completed Projects <span class="float-right badge bg-success">12</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Followers <span class="float-right badge bg-danger">842</span>
	            </a>
	          </li>
	        </ul>
	      </div>
	    </div>
	    <!-- /.widget-user -->
	  </div>
	 
	  <!-- /.col -->
	   <div class="col-md-6">
	    <!-- Widget: user widget style 2 -->
	    <div class="card card-widget widget-user-2">
	      <!-- Add the bg color to the header using any of the bg-* classes -->
	      <div class="widget-user-header bg-warning">
	        
	        <h5 class="widget-user-desc text-primary"><b>Activities</b></h5>
	      </div>
	      <div class="card-footer p-0">
	        <ul class="nav flex-column">
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Projects <span class="float-right badge bg-primary">31</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Tasks <span class="float-right badge bg-info">5</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Completed Projects <span class="float-right badge bg-success">12</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              Followers <span class="float-right badge bg-danger">842</span>
	            </a>
	          </li>
	        </ul>
	      </div>
	    </div>
	    <!-- /.widget-user -->
	  </div>
	</div>
</section>
@endsection