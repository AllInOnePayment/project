<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\History;
use PDF;
use Flash;

class PdfController extends Controller
{
    public function index($id)
    {
    	$detail = History::all()->first();
    	$data = [
    		'name' => $detail->user->name,
    		'date' => $detail->date_payment,
    		'to'   => $detail->register->service->service_name,
    		'amount'=> $detail->amount,
    		'receipt' => $detail->receipt_number,
    		'now'   => date('Y-m-d'),
    	];
	    $pdf = PDF::loadView('transaction.receipt', compact('data')); 
		return $pdf->download('ReceiptFile.pdf');  
    }
}
