<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Entrust;
use App\Depart;

class AdminController extends Controller
{
	public function trans()
    {
        $transactions = Transaction::orderBy('id', 'asc')->paginate(10);

        return view('admin.trans')->with('transactions', $transactions);
        //
    }
	public function depart()
    {
        $departs = Depart::orderBy('id', 'asc')->paginate(10);

        return view('admin.depart')->with('departs', $departs);
        //
    }
    //
}
