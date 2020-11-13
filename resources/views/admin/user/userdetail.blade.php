@extends('layouts.admin')

@section('content')
 

<div class="container">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-primary"><b>Detailed</b> User Information</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>User | detail</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<hr>
<section class="container">
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
	      <div class="widget-user-header bg-secondary">  	
	        <h5 class="widget-user-desc text-white"><b>Registered In</b></h5>
	      </div>
	      <div class="card-footer p-0">
	        <ul class="nav flex-column">
	        	@if(count($user->register)>0)
		        	@foreach($user->register as $r)
		        	<li class="nav-item">
			            <a href="#" class="nav-link"><b>
			              {{ $r->service->service_name}}</b> <span class="float-right badge bg-primary">{{ $r->service->id}}</span>
			            </a>
		            </li>
		            @endforeach
	            @else
				<li class="nav-item">
		            <a href="#" class="nav-link"><b>
		              Not Registered in any service</b> <span class="float-right badge bg-danger">No</span>
		            </a>
	            </li>	
	            @endif  
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
	      <div class="widget-user-header bg-secondary">
	        
	        <h5 class="widget-user-desc text-white"><b>Payment</b></h5>
	      </div>
	      <div class="card-footer p-0">
	        <ul class="nav flex-column">
	          @foreach($bank as $b)	
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              {{$b->bank_name}} <span class="float-right badge bg-primary">{{$b->id}}</span>
	            </a>
	          </li>
	          @endforeach
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
	      <div class="widget-user-header bg-secondary">
	        
	        <h5 class="widget-user-desc text-white"><b>Transaction</b></h5>
	      </div>
	      <div class="card-footer p-0">
	        <ul class="nav flex-column">
	    @if(count($user->transaction)>0 && count($user->transaction)<5)
	        @foreach($user->transaction as $t)      	
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              {{$t->mobileBank->bank_name}} <span class="float-right badge bg-primary">Amount : {{$t->amount}}</span>
	            </a>
	          </li>
	        @endforeach
	    @else  
	          <li class="nav-item">
	            <a href="#" class="nav-link">
	              No Transactions have been made <span class="float-right badge bg-info">5</span>
	            </a>
	          </li>
	    @endif     
	        </ul>
	      </div>
	    </div>
	    <!-- /.widget-user -->
	  </div>
	</div>
</section>
@endsection