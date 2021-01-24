@extends((Auth::user()->service->group)==1 ? 'layouts.user' : ((Auth::user()->service->group)==2) ? 'layouts.admin' : 'layouts.service'))
  
@section('content')

<div class="container"> 
</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<form action="{{ route('startwithdraw')}}" method="post">
				  <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
				<hr>
				<div class="form-control">
					<label>Select Mobile Bank</label>
           			<select name="bank" class="form-control">
           				@foreach($banklist as $m)
           					<option class="form-control" value="{{ $m->id}}">{{$m->bank_name}}</option>
           				@endforeach
           			</select>
				</div><hr>
				<div class="form-control">
					<label class="text-info">Amount</label>
					<input class="form-control" type="number" name="amount">
				</div><hr>
	           <div class="row">
	             <div class="col-sm-3"></div>	
	            <div class="col-sm-5"> 
	                <button type="submit" value="save" class="btn btn-outline-warning btn-block btn-flat">Withdraw</button> 
	            </div><div class="col-sm-3"></div>
	           </div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>

@endsection