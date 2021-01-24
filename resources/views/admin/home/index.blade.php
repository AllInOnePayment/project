@extends('layouts.admin')
 
@section('content')
<div class="container"><hr>
	<div class="row ml-4">
		<div class="col-sm-6">
			<h4 class="text-info ml-4"><b>No of Users In Each Service</b></h4>
		</div>
		<div class="col-sm-6">
			<h4 class="text-info ml-4"><b>No of Users In Each Mobile Banking</b></h4>
		</div>
	</div><hr><br>
	<div class="row ml-2">
		<div class="col-sm-6" style="border-left: solid 3px seagreen; border-radius: 20px;">
			{!! $chart->container() !!}
		</div>
		<div class="col-sm-6" style="border-left: solid 3px seagreen; border-radius: 20px;">
			{!! $chart2->container() !!}
		</div>
	</div><hr><br><br>
		
		{!! $chart->script() !!}  
		{!! $chart2->script() !!} 
</div>
@endsection

