<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Country;
use DateTime;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(2); //Paginacion por default
        //Edades
        foreach ($users as $user) {
            $nacimiento = new DateTime($user->dateNac);
            $ahora = new DateTime(date("Y-m-d"));
            $diferencia = $ahora->diff($nacimiento);
            $user->edad = $diferencia->format("%y");
        }
        return view('/admin/listUsers', compact(
            'users',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = DB::table('countries')->get(); //Paginacion por default
        //Fecha maxima
        $anio = date("Y") - 18;
        $fecha = date("m-d");
        return view('/admin/createUser', compact(
            'paises',
            'anio',
            'fecha'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->role_id = 2;
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->name = $request->get('name');
        $user->num_mobile = $request->get('num_mobile');
        $user->ci = $request->get('ci');
        $user->dateNac = $request->get('dateNac');
        $user->city_id = $request->get('city_id');
        $user->save();

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $paises = Country::all();
        //Fecha maxima
        $anio = date("Y") - 18;
        $fecha = date("m-d");
        return view('/admin/editUser', compact(
            'user',
            'paises',
            'anio',
            'fecha'
        ));
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
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->name = $request->get('name');
        $user->num_mobile = $request->get('num_mobile');
        $user->ci = $request->get('ci');
        $user->dateNac = $request->get('dateNac');
        $user->city_id = $request->get('city_id');
        $user->save();

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/users');
    }
}
