<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\User;
use Mail;
use App\Mail\verifyMail;
use App\Mail\rejectMail;
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
        try {
            DB::beginTransaction();
            $user = user::find($id);
            $name = $user->name;        
       
            Mail::to($user->email)->send(new verifyMail($name));
            $user->is_verified = 1;
            $user->save();
            Db::commit();
            return Redirect::to('users/pending')->with('verify','Email has been send and user has been confirmed successfully!');

        } 
        catch (\Throwable $th) {
            DB::rollBack();
            return Redirect::to('users/pending')->with('failed',"Email address may be not accurate, it can't send email!");
            // return abort(500);        
        }
      
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
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $name = $user->name;        
            Mail::to($user->email)->send(new rejectMail($name));
            $user->delete();
            Db::commit();
            return Redirect::to('users/pending')->with('reject',"Reject email has been send and user has been deleted successfully!");
            } 
        catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            DB::rollBack();
            return Redirect::to('users/pending')->with('failed',"Email address may be not accurate, it can't send email!");

        }
        
    }
}
