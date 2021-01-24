@extends('layouts.user')

@section('content')

<div class="container">
	 <hr> 
	<div class="row justify-content-center">
		<div class="col-sm-2"></div>
		<div class="col-sm-6">
			<div class="form-control" id="reciept">
				<div class="form-control flex-sm-row">
					<img src="{{ asset('storage/logo/allinone.png')}}" width="20%" height="20%" class="img-circle">
					<h3 class="text-info">All In One | Bill Payment</h3>
				</div><br>
				<div class="form-control">
				<p>To : <b class="text-info">{{$detail->register->service->service_name}}</b></p><hr>
				<p>On : <b class="text-info">{{$detail->date_payment}}</b></p><hr>
				<p>Amount : <b class="text-info">{{$detail->amount}}</b></p><hr>
				
				</div><br>
				<div class="form-control">
					<p>Reciept No: <b class="text-info">{{$detail->receipt_number}}</b></p><hr>
					<p>Balance: <b class="text-info">{{$detail->current_balance}}</b></p>
				</div><br>
			</div>
			<div class="form-control">
					<a href="{{ route('printreceipt',$detail->id)}}" class="btn btn-outline-info">Print Receipt</a> 
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<br><hr>
</div>
@endsection

<script type="text/javascript">
	function printInfo(ele) {
	    var prtContent = document.getElementById("reciept");
		var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
		WinPrint.document.write(prtContent.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print(); 
}
</script>