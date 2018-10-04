<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>bcrypt('password')
        ]);
        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/noimage.png'
        ]);

        Session::flash('success','You created a user successfully!');
        return redirect()->route('users');
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
        $user = User::find($id);
        $user->delete();
        Session::flash('success','User Deleted successfully!');
        return redirect()->back();
    }
    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        Session::flash('success','You Changed Permisssion to Admin successfully!');
        return redirect()->back();

    }
    public function notadmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        Session::flash('success','You Changed Permisssion to Normal User successfully!');
        return redirect()->back();
    }

}
