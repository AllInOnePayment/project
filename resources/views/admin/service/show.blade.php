@extends('layouts.admin')
@section('content')

<section class="container-fluid">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">System Detail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('adminhome')}}">Home</a></li>
            <li class="breadcrumb-item active"><b>System</b></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
    <hr>
    @foreach($servicelist as $sl)
    	<h3 class="text text-info text-center"><b>{{$sl->service_name}}</b></h3>
    <div class="row">
    	<div class="col-sm-1"></div>
    	<div class="col-sm-6">
    		<div class="form-control">
    			<h4 class="text-primary">Name : {{$sl->service_name}}</h4>
    		</div>
    		<div class="form-control">
    			<h4 class="text-primary">Http : {{$sl->http}}</h4>
    		</div>
    		<div class="form-control">
    			<h4 class="text-primary">Phone : {{$sl->bank_account}}</h4>
    		</div>
			@endforeach
    	</div>
    	<div class="col-sm-3"><br> <hr><a href="javascript:void(0)" 
                    onclick="$(this).parent().find('form').submit()" class="pl-3 btn btn-danger">Delete Account</a><hr>
                    <form action="{{ route('admin.service.destroy', $sl->id)}}" method="post">
                        @method('DELETE')
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>
    	</div>
    </div><hr>
    <h4 class="text-center">List of Users of <b> {{$sl->service_name}}</b><small>(sample)</small></h4>
    <div class="row">
    	<div class="col-sm-1"></div>
    	<div class="col-sm-10"> 

        @foreach($servicelist as $sl) 
            @if(count($sl->user) > 0 && count($sl->user) < 15) 
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Service</th>
                    <th>Phone</th> 
                </tr>  
                   @foreach( $sl->user as $c)
                       @if($c->service_id ==  1)
                        <tr>
                            <th>{{ $c->id }}</th>
                            <th>{{ $c->name }}</th>
                            <th>{{ $c->email }}</th>
                            <th>{{ $sl->service_name}}</th>
                            <th>{{ $c->phone }}</th> 
                        </tr>
                       @else
                       <tr>
                           <th>No user </th><th>is registered</th> <th>in <th>{{ $sl->service_name}} </th><th>service</th>
                       </tr>
                         
                       @endif     
                    @endforeach 
            </table>  
            @else 
                <h4 class="text-center">No user is registered in this service</h4>
            @endif

        @endforeach       
    	</div>
    	<div class="col-sm-1"></div>
    </div> 
</section>

@endsection