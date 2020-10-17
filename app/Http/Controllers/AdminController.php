<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.add-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $validatedData = $request->validate([
            'name' => 'required|unique:users|max:255',
            'user_name' => ['required', 'string', 'max:100', 'unique:users'],
            'email' => ['required','string', 'email:rfc,dns', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
            'role' => ['required'],
        ]);
        //store;     
        try {
            DB::beginTransaction();
                if(Auth::user()->role == 'admin')
                {
                    $sub_admin = User::create([
                        "name" => $request->name,
                        'user_name' => $request->user_name,
                        "email"=> $request->email,
                        'password' => Hash::make($request->password),
                        'role' => $request->role,
                        ]);
                }
            Db::commit();
        } 
        catch (\Throwable $th)
        {
            // delete user if an error arises and return server error
            DB::rollBack();
            return abort(500);
        }

        // commit changes if every thing goes ok
        //redircet
        return  redirect()->back()->with('success','Blog has added successfuly');

    }

}
