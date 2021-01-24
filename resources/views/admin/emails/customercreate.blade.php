@extends('layouts.admin')

@section('content')

	<br><hr><br>
	<div class="row">
		<div class="col-sm-2"></div>
		 
	</div><br>
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<form action="{{ route('sendmailtocustomer')}}" method="post"> 
      		<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-control">
					<label>Subject</label>
					<input class="form-control" name="subject" type="text">
				</div><br>
				<div class="form-control">
					<label>Message</label>
					<textarea class="form-control" name="message" type="text"></textarea>
				</div><br>
				<div class="form-control">
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<button type="submit" value="save" class="btn btn-outline-primary btn-block btn-flat">Send Email</button>
					</div>
					<div class="col-sm-4"></div>
				</div>  
				</div>
			</form>
		</div>
		<div class="col-sm-2"></div>
	</div>
@endsection
