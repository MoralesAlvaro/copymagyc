<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        // $slug = 'user';
        // $encabezados = ['ID', 'Nombre Empresa', 'Dirección', 'NRC', 'NIT', 'Tipo de Compañia', 'Negocio', ,'Télefono', 'Correo Electronico', 'Estado', ''];
        // $campos = ['id', 'name', 'lastName', 'email', 'active'];
        // $data = User::orderBy('id', 'DESC')->paginate(1000);
        // return view('user.index', compact('slug', 'encabezados', 'campos', 'data'))
        return view('customers.index');
    }

    public function create() {
        return view('customers.create');
    }
}
