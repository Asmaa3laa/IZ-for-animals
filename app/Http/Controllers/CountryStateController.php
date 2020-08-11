<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class CountryStateController extends Controller
{
    public function getStateList(Request $request)
    {
        $states = State::all()
                    ->where("country_id",$request->country_id)
                    ->pluck("name","id");
        return response()->json($states);
    }
}
