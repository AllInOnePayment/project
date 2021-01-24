@extends('layouts.user')

@section('content')

<div class="container"><br><hr>
	<?php
	$err=0;	
		?>

		
	@if($count>0)
	<div class="row">
		@foreach ($user as $item)
			@if(($item->service->payment_start-date('d')==5)||($item->service->payment_start-date('d')==-25)||($item->service->payment_start-date('d')==4)||($item->service->payment_start-date('d')==-26)) 
				@foreach ($item->service->notification as $notify)
					@if ($notify->status==1)
						<div class="col-sm-1"></div>
						<div class="col-sm-10">
							<div class="card alert alert-secondary">
							<h5 class="card-header">
								<div class="row">
									<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
									<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
								</div> 
							</h5>
							<div class="card-body">
								<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
								<p class="card-text">{{ $notify->notification}}</p>
							</div>
							</div><hr>
						</div>
						<div class="col-sm-1"></div> 
						@php $err=1;	@endphp
					@endif
				@endforeach()

			@endif

			@if(($item->service->payment_start-date('d')==3)||($item->service->payment_start-date('d')==-27)||($item->service->payment_start-date('d')==2)||($item->service->payment_start-date('d')==-28)||($item->service->payment_start-date('d')==1)||($item->service->payment_start-date('d')==-29))
				@foreach ($item->service->notification as $notify)
					@if ($notify->status==2)
						<div class="col-sm-1"></div>
						<div class="col-sm-10">
							<div class="card alert alert-secondary">
							<h5 class="card-header">
								<div class="row">
									<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
									<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
								</div> 
							</h5>
							<div class="card-body">
								<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
								<p class="card-text">{{ $notify->notification}}</p>
							</div>
							</div><hr>
						</div>
						<div class="col-sm-1"></div> 
						@php $err=1;	@endphp
					@endif
				@endforeach()
			@endif

			@if($item->service->payment_start < $item->service->payment_end)
				@if($item->service->payment_start<=date('d') && date('d')<=$item->service->payment_end)
					@if ($item->service->group==3)
						@if ($item->serviceProvider->Payment_status==0)
							@foreach ($item->service->notification as $notify)
								@if ($notify->status==3)
									<div class="col-sm-1"></div>
									<div class="col-sm-10">
										<div class="card alert alert-warning">
										<h5 class="card-header">
											<div class="row">
												<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
												<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
											</div> 
										</h5>
										<div class="card-body">
											<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
											<p class="card-text">{{ $notify->notification}}</p>
										</div>
										</div><hr>
									</div>
									<div class="col-sm-1"></div> 
									@php $err=1;	@endphp
								@endif
							@endforeach()
						@endif
					@else
						@if ($item->school->Payment_status==0)
							@foreach ($item->service->notification as $notify)
								@if ($notify->status==3)
									<div class="col-sm-1"></div>
									<div class="col-sm-10">
										<div class="card alert alert-warning">
										<h5 class="card-header">
											<div class="row">
												<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
												<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
											</div> 
										</h5>
										<div class="card-body">
											<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
											<p class="card-text">{{ $notify->notification}}</p>
										</div>
										</div><hr>
									</div>
									<div class="col-sm-1"></div> 
									@php $err=1;	@endphp
								@endif
							@endforeach()	
						@endif
					@endif
				@endif
			@elseif($item->service->payment_start >= $item->service->payment_end)
				@if($item->service->payment_start<=date('d') && date('d')<=31)
					@if ($item->service->group==3)
						@if ($item->serviceProvider->Payment_status==0)
							@foreach ($item->service->notification as $notify)
								@if ($notify->status==3)
									<div class="col-sm-1"></div>
									<div class="col-sm-10">
										<div class="card alert alert-warning">
										<h5 class="card-header">
											<div class="row">
												<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
												<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
											</div> 
										</h5>
										<div class="card-body">
											<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
											<p class="card-text">{{ $notify->notification}}</p>
										</div>
										</div><hr>
									</div>
									<div class="col-sm-1"></div> 
									@php $err=1;	@endphp
								@endif
							@endforeach()
						@endif
					@else
						@if ($item->school->Payment_status==0)
							@foreach ($item->service->notification as $notify)
								@if ($notify->status==3)
									<div class="col-sm-1"></div>
									<div class="col-sm-10">
										<div class="card alert alert-warning">
										<h5 class="card-header">
											<div class="row">
												<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
												<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
											</div> 
										</h5>
										<div class="card-body">
											<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
											<p class="card-text">{{ $notify->notification}}</p>
										</div>
										</div><hr>
									</div>
									<div class="col-sm-1"></div> 
									@php $err=1;	@endphp
								@endif
							@endforeach()		
						@endif
					@endif
				@elseif(1<=date('d') && date('d')<=$item->service->payment_end)
					@if ($item->service->group==3)
						@if ($item->serviceProvider->Payment_status==0)
							@foreach ($item->service->notification as $notify)
								@if ($notify->status==3)
									<div class="col-sm-1"></div>
									<div class="col-sm-10">
										<div class="card alert alert-warning">
										<h5 class="card-header">
											<div class="row">
												<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
												<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
											</div> 
										</h5>
										<div class="card-body">
											<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
											<p class="card-text">{{ $notify->notification}}</p>
										</div>
										</div><hr>
									</div>
									<div class="col-sm-1"></div> 
									@php $err=1;	@endphp
								@endif
							@endforeach()
						@endif
					@else
						@if ($item->school->Payment_status==0)
							@foreach ($item->service->notification as $notify)
								@if ($notify->status==3)
									<div class="col-sm-1"></div>
									<div class="col-sm-10">
										<div class="card alert alert-warning">
										<h5 class="card-header">
											<div class="row">
												<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
												<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
											</div> 
										</h5>
										<div class="card-body">
											<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
											<p class="card-text">{{ $notify->notification}}</p>
										</div>
										</div><hr>
									</div>
									<div class="col-sm-1"></div> 
									@php $err=1;	@endphp
								@endif
							@endforeach()	
						@endif
					@endif
				@endif
			@endif

			@if($item->service->payment_end < (($item->service->payment_end+8)%30))
				@if($item->service->payment_end<=date('d') && date('d')<=($item->service->payment_end+8)%30))
					@foreach ($item->service->notification as $notify)
						@if ($notify->status==4)
							<div class="col-sm-1"></div>
							<div class="col-sm-10">
								<div class="card alert alert-danger">
								<h5 class="card-header">
									<div class="row">
										<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
										<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
									</div> 
								</h5>
								<div class="card-body">
									<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
									<p class="card-text">{{ $notify->notification}}</p>
								</div>
								</div><hr>
							</div>
							<div class="col-sm-1"></div> 
							@php $err=1;	@endphp
						@endif
					@endforeach()	
				@endif
			@elseif($item->service->payment_end >= (($item->service->payment_end+8)%30))
				@if($item->service->payment_end<=date('d') && date('d')<=31)
					@foreach ($item->service->notification as $notify)
						@if ($notify->status==4)
							<div class="col-sm-1"></div>
							<div class="col-sm-10">
								<div class="card alert alert-danger">
								<h5 class="card-header">
									<div class="row">
										<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
										<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
									</div> 
								</h5>
								<div class="card-body">
									<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
									<p class="card-text">{{ $notify->notification}}</p>
								</div>
								</div><hr>
							</div>
							<div class="col-sm-1"></div> 
							@php $err=1;	@endphp
						@endif
					@endforeach()	
				@elseif(1<=date('d') && date('d')<=($item->service->payment_end+8)%30))
					@foreach ($item->service->notification as $notify)
						@if ($notify->status==4)
							<div class="col-sm-1"></div>
							<div class="col-sm-10">
								<div class="card alert alert-danger">
								<h5 class="card-header">
									<div class="row">
										<div class="col-sm-10"><p>{{ $item->service->service_name}}</p></div>
										<div class="col-sm-2"><img class="img-circle" width="40px" height="40px" src="{{ asset('storage/logo/'.$item->service->image)}}"></div>
									</div> 
								</h5>
								<div class="card-body">
									<h5 class="card-title"><b class="text-info">{{ $notify->title}}</b> </h5>
									<p class="card-text">{{ $notify->notification}}</p>
								</div>
								</div><hr>
							</div>
							<div class="col-sm-1"></div> 
							@php $err=1;	@endphp
						@endif
					@endforeach()	
				@endif
			@endif
		@endforeach
	</div>
	@else
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
					<div class="alert alert-secondary alert-block">
						<h5>Sorry, you don't have any Notification yet.</h5>
					</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
	@endif
	@if ($count>0 && $err==0)
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
					<div class="alert alert-secondary alert-block">
						<h5>Sorry, you don't have any Notification yet.</h5>
					</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
	@endif
	
	
</div> 
@endsection