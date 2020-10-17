<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Country;
use App\State;
use App\Tag;
use App\Blog;
use Auth;
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
        $tags=Tag::all();
        $user = User::find($id);
        $countries = Country::pluck('name', 'id');
        $states = State::where('country_id',$user->country_id)->get();
        $blogs = Blog::where('user_id',Auth::id())->paginate(10);
        return view('users.profile', compact('user','countries','states','tags','blogs'));
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
        $user = User::find($id);
            if ($user->role == 'doctor') {
                $validator = Validator::make($request->all(),[
                    'name' => ['required', 'string', 'max:100'],
                    'user_name' => ['required', 'string', 'max:50', 'unique:users'],
                    'email' => ['required','string', 'email:rfc,dns', 'unique:users'],
                    'image' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                    'card' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                    
                ]);

                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'user_name' => $request->user_name,
                    
                ]);
            } else{
                $validator = Validator::make($request->all(),[
                    'name' => ['required', 'string', 'max:100'],
                    'user_name' => ['required', 'string', 'max:50', 'unique:users'],
                    'email' => ['required','string', 'email:rfc,dns', 'unique:users'],
                    'image' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                    'card' => ['required', 'image', 'mimes:jpeg,png,jpg',],
                    'phone' => ['required','numeric','regex:/[0-9]{11}/', 'unique:users'],
                    'address' =>['required', 'string','max:250'],
                    'location' =>['required', 'string', 'max:500'],
                    'location_lat' =>['required', 'numeric'],
                    'location_lon' =>['required', 'numeric'],
                    'country_id' => ['required'],
                    'state_id' => ['required'],
                ]);

                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'user_name' => $request->user_name,
                    'phone' => $request->phone,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'address' => $request->address,
                    'location' => $request->location,
                    'location_lat' => $request->location_lat,
                    'location_lon' => $request->location_lon,
                ]);
            }
            if($request->hasFile('image')){
                $image = $request['image'];
                $image_path = $request['image']->store('uploads', 'public');
                $user->image = $image_path;
                $user->save();
            }
            if($request->hasFile('card')){
                $card = $request['card'];
                $card_path = $request['card']->store('uploads', 'public');
                $user->card = $card_path;
                $user->save();
            }
             
            return redirect('profile/'.$id)->with('update','Your profile has been updated successfully..');        
        // } 
        // catch (\Throwable $th) {
        //     // dd($th);
        //     return redirect('profile/'.$id)->with('failed',"Your profile hasn't been updated..");        
        // }
        
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
