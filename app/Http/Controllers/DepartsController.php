<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Depart;
use App\User;

class DepartsController extends Controller
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
        $departs = Depart::orderBy('time', 'asc')->paginate(10);

        return view('departs.index')->with('departs', $departs);
        //
    }

    public function history()
    {
        $departs = Depart::orderBy('time', 'asc')->paginate(10);

        return view('departs.history')->with('departs', $departs);
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departs.create');
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
        $this->validate($request, [
           'time' => 'required',
           'destination' => 'required',   
        ]);

        $depart = new Depart;

        $depart->time = $request->input('time');
        $depart->destination = $request->input('destination');
        $depart->user_id = auth()->user()->id;

        $depart->save();

        return redirect('/departs')->with('success', 'Depart has beed added');
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

        $depart = Depart::find($id);

        //Check Auth
        if(auth()->user()->id !== $depart->user_id){
            return redirect('/departs')->with('error', 'Unauthorized');
        }

        return view('departs.edit')->with('depart', $depart);
        //
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
        $this->validate($request, [
           'time' => 'required',
           'destination' => 'required',   
        ]);

        $depart = Depart::find($id);

        $depart->time = $request->input('time');
        $depart->destination = $request->input('destination');

        $depart->save();

        return redirect('/departs')->with('success', 'Depart has beed edited');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depart = Depart::find($id);
        $depart->delete();
        return redirect('/dashboard')->with('success', 'Depart has been deleted');
        //
    }

    public function arrived($id)
    {
        $depart = Depart::find($id);
        $depart->arrived = 1;
        $depart->save();
        return back()->with('success', 'Thank You, Deliver it Quickly');
        //
    }

    public function deleted($id)
    {
        $depart = Depart::find($id);
        $depart->arrived = 9;
        $depart->save();
        return back()->with('success', 'Thank You');
        //
    }
}
