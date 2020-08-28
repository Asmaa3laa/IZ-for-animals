<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Route;
use App\Country;
use App\State;
use App\User;
use App\Blog;


class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = User::where(['role'=>'clinic','is_verified'=>'1'])->paginate(12);
        // dd($clinics);
        return view('clinic.index',compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');
        $states = State::pluck('name', 'id');

        return view('auth.clinicRegister', compact('countries','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clinic= Clinic::create($request->except(['_token','password_confirmation']));
        // return Route::get('/');
        return view('welcome');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clinic = User::findOrFail($id);
        $blogs =  Blog::where(['user_id'=>$clinic->id,'is_verified'=>'1'])->get();
        return view('clinic.profile',compact('clinic','blogs'));
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
        //
    }
    public function search()
    {
        // if($request->ajax()) //this condition will check if this method receive ajax request or not
        // {
        //     $input = $request->get('input');
        //     if($input != '')
        //     {
        //         $data = DB::table("countries")
        //                     ->where("name" ,"like", "%".$input."%")
        //                     ->orderBy("id","asc")
        //                     ->select("id","name")->get();
        //     }
        //     // else
            // {
        //         $data = DB::table("users")->join("profiles","users.id","=","profiles.user_id")
        //                     ->where(["role"=>$role,"profiles.is_verified"=>$state])
        //                     ->orderBy("id","asc")
        //                     ->select("users.id","name","email","website","image")->paginate(2);
            // }
        //     return view('search', compact('data'));

    //     $q = Input::get ( 'q' );
	// $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
	// if (count ( $user ) > 0)
	// 	return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
	// else
	// 	return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
    // 
    }
}
