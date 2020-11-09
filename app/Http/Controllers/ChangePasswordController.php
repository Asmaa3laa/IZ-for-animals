<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (Auth::user()->role == "clinic" || Auth::user()->role == "doctor") {
            return view('users.changePassword');
        } else {
            return view('admin.users.changePassword');
        }
        
    }

    public function change(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        if (Auth::user()->role == "clinic" || Auth::user()->role == "doctor") {
            // dd('okkkkkkkkkkkk');
            return redirect()->route('profile.show',Auth::id())->with('password','Password has been changed successfully.'); 

        } else {
            return redirect()->route('user.show',Auth::id())->with('password','Password has been changed successfully.'); 
        }
 
        }
}
