@extends(($profile->service->group)==1 ? 'layouts.user' : (($profile->service->group)==2) ? 'layouts.admin' : 'layouts.service'))
  
@section('content')
 
<div class="section"><br><hr>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-9">
		<form action="{{ route('updatepassword')}}" method="post"> 
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-sm-6">
				<div class="form-group">
			    <label>Old Password</label>
			    <input  type="password" name="oldpass" class="form-control"> 
			  	</div>  
			  	<div class="form-group">
			    <label>Confirm Password</label>
			    <input  type="password" name="confirmpass" class="form-control"> 
			  	</div>   
				</div>
				<div class="col-sm-6">  
			  	<div class="form-group">
			    <label>New Password</label>
			    <input  type="password" name="newpass" class="form-control"> 
			  	</div>   
				</div> 
				</div>		
			<input type="submit" name="Update" class="btn btn-info" value="Update"><br><hr> 
		</form>
		</div>
		<div class="col-sm-1"></div> 
	</div>
</div> 
@endsection