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

    public function estados(Request $request)
    {
        $states = DB::table("states")->where([
                            ['country_id', '=', $request->get("id_country")],
                        ])->get();
        
    	$response = new JsonResponse();
    	$response->setData($states);
        //echo "<pre>"; var_dump($response); exit();
        return ['success' => true, 'data' => $states];
    	//return $response;
    }

    public function ciudades(Request $request)
    {
        $cities = DB::table("cities")->where([
                            ['state_id', '=', $request->get("id_state")],
                        ])->get();
        
    	$response = new JsonResponse();
    	$response->setData($cities);
        //echo "<pre>"; var_dump($response); exit();
        return ['success' => true, 'data' => $cities];
    	//return $response;
    }
}
