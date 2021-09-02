<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Peticion Ajax que devuelve los estados en base a un pais
    public function estados(Request $request)
    {
        $states = DB::table("states")->where([
                            ['country_id', '=', $request->get("id_country")],
                        ])->get();
        
    	$response = new JsonResponse();
    	$response->setData($states);
        return ['success' => true, 'data' => $states];
    }

    //Peticion Ajax que devuelve las ciudades en base a un estado
    public function ciudades(Request $request)
    {
        $cities = DB::table("cities")->where([
                            ['state_id', '=', $request->get("id_state")],
                        ])->get();
        
    	$response = new JsonResponse();
    	$response->setData($cities);
        return ['success' => true, 'data' => $cities];
    }
}
