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
        if($request->ajax()) //this condition will check if this method receive ajax request or not
        {
            $input = $request->get('input');
            if($input != '')
            {
                $country = DB::table("countries")
                            ->where("name" ,"like", "%".$input."%")
                            ->select("id","name")->get();
                $state = DB::table("states")
                            ->where("name" ,"like", "%".$input."%")
                            ->select("id","name")->get();
                $data = DB::table('users')->where(["role"=>'clinic',"is_verified"=>1,"country_id"=>$country->id])->get();
                if($data->count() == 0)
                $data = DB::table('users')->where(["role"=>'clinic',"is_verified"=>1,"state_id"=>$state->id])->get();
            }
            else
            {
                //
            }
            $total_row = $data->count();
    //   if($total_row > 0)
    //   {
    //    foreach($data as $row)
    //    {
    //     $output .= '
    //     <tr>
    //     '.$row->name.'
    //     </tr>
    //     ';
    //    }
    //   }
    //   else
    //   {
    //    $output = '
    //    <tr>
    //     <td align="center" colspan="5">No Data Found</td>
    //    </tr>
    //    ';
    //   }
    //   $data = array(
    //    'table_data'  => $output,
    //   );

      echo json_encode($data);
     }
    //         return view('search', compact('data'));

    //     $q = Input::get ( 'q' );
	// if (count ( $data ) > 0)
		// return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
	// else
	// 	return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
    
    //     }
    }


    public function searchByState(Request $request){
        // dd($request->option);
        $clinics = User::where(['state_id'=>$request->option, 'is_verified'=>'1'])->get();
        // dd($clinics);
        // return $request->option;
        return view('clinic.search_data',compact('clinics'));
    }
}
