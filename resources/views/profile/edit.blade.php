@extends(($profile->service->group)==1 ? 'layouts.user' : (($profile->service->group)==2) ? 'layouts.admin' : 'layouts.service'))
  
@section('content')
 
<div class="section"><br><hr>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-9">
			<form action="{{ route('updateuserprofile',$profile->id)}}" method="post"> 
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
		    <label>User Name</label>
		    <input  type="text" name="name" class="form-control" value="{{$profile->name}}"> 
		  </div> 
		  <div class="form-group">
		    <label>Phone</label>
		    <input type="number" name="phone" class="form-control"  value="{{$profile->phone}}">
		  </div>
				</div> <div class="col-sm-1"></div>
					<div class="col-sm-3 flex-row">
			<img class="img-circle mt-4 justify-content-sm-center" height="150px" src="{{ asset('storage/avator/'.$profile->image)}}">
			<input class="form-control mt-1" type="file" name="customerphoto">
                <label>Profile Photo</label>
				</div> 
			</div>		
			<input type="submit" name="Update" class="btn btn-info" value="Update"><br><hr>
			<a href="{{ route('changepassword')}}">Change Password</a>
		</form>
		</div>
		<div class="col-sm-1"></div> 
	</div>
</div> 
@endsection