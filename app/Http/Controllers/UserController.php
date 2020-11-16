<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\User;
use Mail;
use Auth;
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
        $title = "Users";
        return view('admin.users.index', compact('users','title'));
    }

    public function doctorUsers()
    {
        $users = User::where([
            ['role','=','doctor'],
            ['is_verified','=',1]
            ])->paginate(10);
            $title = "Doctors";
        return view('admin.users.index', compact('users','title'));
    }

    public function clinicUsers()
    {
        $users = User::where([
            ['role','clinic'],
            ['is_verified',1]
            ])->paginate(10);
            $title = "Clinics";
        return view('admin.users.index', compact('users','title'));
    }

    public function PendingUsers()
    {
        $users = User::where([
            ['role','!=','admin'],
            ['is_verified',0]
            ])->paginate(3);
            $title = "Pending Users";
        return view('admin.users.index', compact('users','title'));
    }

    public function UpdatingUsers()
    {
        $users = User::where([
            ['role','!=','admin'],
            ['is_verified',1],
            ['updated_at','!=',null]
            ])->paginate(3);
            $title = "Updating Users";
        return view('admin.users.index', compact('users','title'));
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
            return Redirect::to('users/pending')->with('verify','Email has been send and user is confirmed successfully!');

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
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
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
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'user_name' => $request->user_name,            
        ]);
        if($request->hasFile('image')){
            // $image = $request['image'];
            $image_path = $request['image']->store('uploads', 'public');
            $user->image = $image_path;
            $user->save();
        }
        return redirect()->route('user.show',['user'=> Auth::user()])->with('update','Your profile has been updated successfully..'); 
        // return redirect('user/'.$id)->with('update','Your profile has been updated successfully..');        

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
            $user->forceDelete();
            Db::commit();
            return Redirect::to('users/pending')->with('reject',"Reject email has been send and user is deleted successfully!");
            } 
        catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            DB::rollBack();
            return Redirect::to('users/pending')->with('failed',"Email address may be not accurate, it can't send email!");

        }
        
    }
    public function delete($id){
        $user = User::find($id); 
        $this->authorize('manage.users');
        $user->delete();
        return redirect('users/clinic')->with('success','User deleted successfully ');
    }
}
