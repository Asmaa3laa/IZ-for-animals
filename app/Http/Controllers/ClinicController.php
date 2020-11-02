<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Route;
use App\Country;
use App\State;
use App\User;
use App\Blog;
use Illuminate\Support\Facades\DB;


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
        $countries = Country::pluck('name', 'id');
        $states = State::pluck('name', 'id');
        return view('clinic.index',compact('clinics','countries','states'));
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
        $clinic= User::create($request->except(['_token','password_confirmation']));
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
    public function search(Request $request)
    {
            $input = $request->get('searcharea');
            if($input != '')
            {
                $clinics= User::where("user_name" ,"like", "%".$input."%")->where(["role"=>'clinic',"is_verified"=>1])->get();
                $countries = Country::pluck('name', 'id');
                $states = State::pluck('name', 'id');
                return view('clinic.index',compact('clinics','countries','states'));

            }
            else
            {
                return redirect()->back();
            }    
    }


    public function searchByState(Request $request){
        $clinics = User::where(['state_id'=>$request->option, 'is_verified'=>'1'])->get();
        return view('clinic.search_data',compact('clinics'));
    }
}
