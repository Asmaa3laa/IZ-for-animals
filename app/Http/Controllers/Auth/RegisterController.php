<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\State;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        // dd($request->role);
        if($request->role == 'doctor'){
            return view('auth.doctorRegister');
        }
        elseif ($request->role == 'clinic') {
            $countries = Country::pluck('name', 'id');
            $states = State::pluck('name', 'id');
            return view('auth.clinicRegister', compact('countries','states'));
            // return view('auth.clinicRegister');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['role'] == 'doctor'){   
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'user_name' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                'card' => ['required', 'image', 'mimes:jpeg,png,jpg',],

            ]);
        }

        elseif($data['role'] == 'clinic'){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'user_name' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                'card' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                'phone' => ['required','numeric','regex:/(01)[0-2]{1}[0-9]{8}/', 'unique:users'],
                'address' =>['required', 'string'],
                'location' =>['required', 'string'],
                'country_id' => ['required'],
                'state_id' => ['required'],
            ]); 
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $image = $data['image'];
        $image_path = $data['image']->store('uploads', 'public');

        $card = $data['card'];
        $card_path = $data['card']->store('uploads', 'public');
        if($data['role'] == 'doctor'){
            return User::create([
                'name' => $data['name'],
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image' => $image_path,
                'card'=> $card_path,
                'role'=>$data['role'],
            ]);
        }
        elseif ($data['role'] == 'clinic') {
            return User::create([
                'name' => $data['name'],
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image' => $image_path,
                'card'=> $card_path,
                'role'=>$data['role'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'location' => $data['location'],
                'country_id' => $data['country_id'],
                'state_id' => $data['state_id'],

            ]);
        }
        
    }
}