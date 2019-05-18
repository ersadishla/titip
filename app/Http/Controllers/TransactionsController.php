<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Entrust;
use Illuminate\Support\Facades\DB;
class TransactionsController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
    {
        $transactions = Transaction::all();

        return view('trans.index')->with('transactions', $transactions);
        //
    }

    public function history()
    {
        $transactions = Transaction::orderBy('id', 'desc')->paginate(10);

        return view('trans.history')->with('transactions', $transactions);
        //
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $entrust_id = $transaction->entrust_id;
        $entrust = Entrust::find($entrust_id);

        $transaction->delete();
        $entrust->delete();
        
        return back()->with('success', 'Thank You');
        //
    }

    public function deleted($id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 9;
        $transaction->save();
        return back()->with('success', 'Thank You');
        //
    }
    //
}
