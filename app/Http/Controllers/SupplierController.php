<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $slug = 'supplier';
        $encabezados= ['id', 'Nombre', 'Dirección', 'Empresa', 'Correo'];
        $campos= ['id', 'name', 'address', 'company_type', 'email'];
        $data = Supplier::orderBy('id', 'DESC')->paginate();
        return view('supplier.index', compact('slug','encabezados', 'campos', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $slug = 'supplier';
        return view('supplier.create', compact('slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'nrc' => ['required', 'string', 'max:255'],
            'nit' => ['required', 'string', 'max:255'],
            'company_type' => ['required', 'string', 'max:255'],
            'business' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'dui' => ['required', 'string', 'max:255'],
            'active' => 'required|boolean',
             ]);
    
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slug = 'supplier';
        $data = supplier::findOrFail($id);
        return view('supplier.show', compact('slug', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          
        $slug = 'supplier';
        $data = Supplier::findOrFail($id);
        return view('supplier.edit', compact('slug', 'data'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
