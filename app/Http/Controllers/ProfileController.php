<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Country;
use App\State;

class ProfileController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $countries = Country::pluck('name', 'id');
        $states = State::where('country_id',$user->country_id)->get();
        // dd($states);
        return view('users.edit', compact('user','countries','states'));
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
        // $validator = Validator::make($request->all(),[
        //     'name' => ['required', 'string', 'max:100'],
        //     'user_name' => ['required', 'string', 'max:50', 'unique:users'],
        //     'email' => ['required','string', 'email:rfc,dns', 'unique:users'],
        //     'image' => ['required', 'image', 'mimes:jpeg,png,jpg',],
        //     'card' => ['required', 'image', 'mimes:jpeg,png,jpg',],
        //     'phone' => ['required','numeric','regex:/(01)[0-2]{1}[0-9]{8}/', 'unique:users'],
        //     'address' =>['required', 'string','max:250'],
        //     'country_id' => ['required'],
        //     'state_id' => ['required'],
        // ]);
        $user = User::find($id);
        if($request->hasFile('image')){
            $image = $request['image'];
            $image_path = $request['image']->store('uploads', 'public');
    
        }
        if($request->hasFile('card')){
            $card = $request['card'];
            $card_path = $request['card']->store('uploads', 'public');
        }
        
        try {
            if ($user->role == 'doctor') {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'user_name' => $request->user_name,
                    'image' => $image_path,
                    'card'=> $card_path,
                    
                ]);
            } else{
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'user_name' => $request->user_name,
                    'image' => $request->$image_path,
                    'card'=> $card_path,
                    'phone' => $request->phone,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'address' => $request->address,
                ]);
            }
                
            return redirect('profile/'.$id)->with('update','Your profile has been updated successfully..');        
        } 
        catch (\Throwable $th) {
            // dd($th);
            return redirect('profile/'.$id)->with('failed',"Your profile hasn't been updated..");        
        }
        
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
}
