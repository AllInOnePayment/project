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
    	<h3 class="text text-info text-center"><b>{{$servicelist->service_name}}</b></h3><hr>
    <div class="row">
    	<div class="col-sm-3 ml-4" style="border-right: solid 3px seagreen;">
          <img src="{{ asset('storage/logo/'.$servicelist->image)}}" class="img img-circle" style="width: 150px; height: 150px;">
      </div>
    	<div class="col-sm-5 ml-4" style="border-right: solid 3px seagreen;"> 
        <p><b>Name :</b> {{$servicelist->service_name}}</p><hr>
    		<p><b>Http : </b>{{$servicelist->http}}</p><hr>
    		<p><b>Phone :</b> {{$servicelist->bank_account}}</p>  
    	</div>
    	<div class="col-sm-1 ml-4"><br> <hr><a href="javascript:void(0)" 
                    onclick="$(this).parent().find('form').submit()" class="pl-3 btn btn-outline-danger">Delete Account</a><hr>
                    <form action="{{ route('admin.service.destroy', $servicelist->id)}}" method="post">
                        @method('DELETE')
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>
    	</div>
    </div><hr>
    <h4 class="text-center">List of Users</h4><hr>
    <div class="row">
    	<div class="col-sm-1"></div>
    	<div class="col-sm-10"> 
      @if(count($registeredusers)>0)
            <table class="table table-bordered table-striped">
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th> 
                  </tr>            
        @foreach($registeredusers as $ru)
                  <tr>
                      <th>{{ $ru->user_id}}</th>
                      <th>{{ $ru->user->name }}</th>
                      <th>{{ $ru->user->email }}</th> 
                      <th>{{ $ru->user->phone }}</th> 
                  </tr>
        @endforeach 
                </table>
      @else
          <p class="text text-danger">No Users are registered to this service.</p>
      @endif   
                <div class="row"><div class="col-sm-4"></div>
        <div class="col-sm-4">
          {{ $registeredusers->render() }}
        </div><div class="col-sm-4"></div>
      </div>  
    	</div>
    	<div class="col-sm-1"></div>
    </div> 
</section>

@endsection