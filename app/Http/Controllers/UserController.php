<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where([
            ['role','!=','admin'],
            ['is_verified',1]
            ])->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function doctorUsers()
    {
        $users = User::where([
            ['role','=','doctor'],
            ['is_verified','=',1]
            ])->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function clinicUsers()
    {
        $users = User::where([
            ['role','clinic'],
            ['is_verified',1]
            ])->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function PendingUsers()
    {
        $users = User::where([
            ['role','!=','admin'],
            ['is_verified',0]
            ])->paginate(3);
            // dd($users);
        return view('admin.users.index', compact('users'));
    }

    public function verifyUser($id){
        $user = user::find($id);
        $user->is_verified = 1;
        $user->save();
        return Redirect::to('users/pending');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
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
        // dd($user);
        $user->delete();
        return Redirect::to('users/pending');

    }
}
