<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slug = 'user';
        $encabezados= ['ID', 'Nombre', 'Apellido', 'Correo', 'Estado'];
        $campos= ['id', 'name', 'lastName', 'email','active'];
        $data = User::orderBy('id', 'DESC')->paginate(1000);
        return view('user.index', compact('slug','encabezados', 'campos', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
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
        // Validando data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => '',
        ]);

        
        $user = new User([
            'name' => $request->get('name'),
            'lastName' => $request->get('lastName'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'photo' => '',
        ]);

        $user->save();
            
        // IMG
        if ($request->file('photo')) {
            // Ruta de guardado
            $pathImgUrl = Storage::disk('public')->put('img/usuarios', $request->file('photo'));
            // Actualizando ruta img
            $user->fill(['photo' => asset($pathImgUrl)])->save();
        }
        
        return redirect('/usuarios/create')->with('success', 'El usuario se ha registrado correctamente!.');
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
}