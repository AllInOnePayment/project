@extends('layouts.admin')

@section('content')

<section class="container-fluid"><br>

	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-5">
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
		</div>
	</div>
<!-- 	Row that lists the elements in the profile of the user
 -->	
 <div class="row ml-1">
     <div class="col-sm-4"style="border-left:3px solid seagreen; border-bottom-left-radius:25px;">
     	   <h3 class="text-danger text-center"><b>{{ $bankinfo->bank_name }}</b> </h3>
     	<div class="form-control display-flex">
     		<label>ID :</label>
     		<h4>{{ $bankinfo->id }}</h4>
     	</div> 
     	<div class="form-control display-flex">
     		<label>Name :</label>
     		<h4>{{ $bankinfo->bank_name }}</h4>
     	</div>
     	<div class="form-control display-flex">
     		<label>Http :</label>
     		<h4>{{ $bankinfo->http }}</h4>
     	</div>  
     </div>

     <div class="col-sm-4" style="border-left:3px solid seagreen;border-bottom-left-radius:25px;">
     	<h4 class="text-primary">Users of <b>{{ $bankinfo->bank_name }}</b></h4><hr>
     	@foreach($whichservice as $sl)
     	  <div class="form-control">
     	      <h4>{{ $sl->service_name }}</h4>
     	  </div><hr>
     	@endforeach   
     </div> 

     <div class="col-sm-4" style="border-left:3px solid seagreen;border-bottom-left-radius:25px;">
     	<h4 class="text-info">List of Bank</h4><hr>
     	@foreach($banklist as $bl)
     	   <a href="{{ route('admin.bank.show',$bl->id)}}">
     	   <div class="form-control">
     	   	<h4 class="text-info">{{$bl->bank_name}}</h4>
     	   	</div></a> 
     	   <hr>
     	@endforeach   
     </div>  	 
 </div>
</section>
@endsection