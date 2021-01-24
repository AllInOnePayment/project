<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\History;
use App\Transaction;

class HistoryController extends Controller
{
	

	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }

    public function transaction()
    {
        $user = Auth::user()->id;
        $history = Transaction::all()->where('user_id',$user);
        $historycount = Transaction::all()->where('user_id',$user)->count();
        $total = 0;
        foreach ($history as $row) {
            $total = $total + $row->amount;
        }
        return view('user.history.transaction')
                    ->with('transaction',$history)
                    ->with('total',$total)
                    ->with('historycount',$historycount); 
    }

    public function index()
    {
    	$user = Auth::user()->id;
        $history = History::all()->where('user_id',$user);
        $historycount = History::all()->where('user_id',$user)->count();


        return view('user.history.index')
                    ->with('history',$history)
                    ->with('historycount',$historycount);
    }

    public function show($id)
    {
    	$detail = History::find($id);
    	return view('user.history.show')
    				->with('detail',$detail);
    }
}
