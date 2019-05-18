<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrust;
use App\Depart;
use App\Transaction;

class EntrustsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // dd($id);

        return view('entrusts.create', compact('id'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $this->validate($request, [
           'something' => 'required',   
        ]);
        $entrust = new Entrust;
        $entrust->something = $request->input('something');
        $entrust->user_id = auth()->user()->id;
        $entrust->save();

        $transaction = new Transaction;
        $transaction->depart_id = $request->input('depart_id');
        $transaction->entrust_id = $entrust->id;
        $transaction->save();

        // $id_entrust = Entrust::max('id');
        // $id_depart = $request->input('depart_id');

        // $depart = Depart::find($id_depart);
        // $depart->entrust_id = $id_entrust;
        // $depart->save();


        return redirect('/departs')->with('success', 'Entrust has beed added');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
