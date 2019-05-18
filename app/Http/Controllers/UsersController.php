<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user',$user));
    }

    public function update_profile(Request $request){

        $request->validate([
            'prof_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();
        if($request->hasFile('prof_image')){
            $profileName = $user->id.'_profile'.time().'.'.request()->prof_image->getClientOriginalExtension();

            $request->prof_image->storeAs('public/prof_images',$profileName);
        } else {
            $profileName = 'noimage.jpg';
        }
        

        $user->prof_image = $profileName;
        $user->save();

        return redirect('/dashboard')->with('success','You have successfully upload image.');

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return view('users.index')->with('user', $user);
        //
    }

    public function detail($id)
    {
        $user = User::find($id);

        return view('users.detail')->with('user', $user);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
