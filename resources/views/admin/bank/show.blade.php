@extends('layouts.admin')

@section('content')

<section class="container-fluid">

<!-- 	Row that lists the elements in the profile of the user
 -->	
 <!-- Content Header (Page header) -->
 <hr>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-info">Mobile Banking Detail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>Banking</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><hr>
 <div class="row ml-1">
     <div class="col-sm-4"style="border-left:3px solid seagreen; border-bottom-left-radius:25px;">
          <div class="col-sm-3 d-center">
          <img src="{{ asset('storage/logo/'.$bankinfo->image)}}" class="img img-circle" style="width: 100px; height: 100px;">
           </div>    
     	<div class="form-control display-flex  mt-2">
     		<label> </label>
     		<h4>ID : {{ $bankinfo->id }}</h4>
     	</div> 
     	<div class="form-control display-flex  mt-2">
     		<label> </label>
     		<h4>Name : {{ $bankinfo->bank_name }}</h4>
     	</div>
     	<div class="form-control display-flex  mt-2">
     		<label> </label>
     		<h4>Http : {{ $bankinfo->http }}</h4>
     	</div>  
     </div>

     <div class="col-sm-4" style="border-left:3px solid seagreen;border-bottom-left-radius:25px;">
     	<h4 class="text-primary">Users of <b>{{ $bankinfo->bank_name }}</b></h4><hr>
     	@foreach($whichservice as $sl)
     	  <div class="form-control mt-2">
     	      <h4>{{ $sl->service_name }}</h4>
     	  </div> 
     	@endforeach   
     </div> 

     <div class="col-sm-4" style="border-left:3px solid seagreen;border-bottom-left-radius:25px;">
     	<h4 class="text-info">List of Bank</h4><hr>
     	@foreach($banklist as $bl)
     	   <a href="{{ route('admin.bank.show',$bl->id)}}">
     	   <div class="form-control mt-2">
     	   	<h4 class="text-info">{{$bl->bank_name}}</h4>
     	   	</div></a>  
     	@endforeach   
     </div>  	 
 </div>
</section>
@endsection