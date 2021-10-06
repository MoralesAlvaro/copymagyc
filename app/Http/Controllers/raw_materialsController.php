<?php

namespace App\Http\Controllers;

use App\Models\raw_materials;
use Illuminate\Http\Request;

class raw_materialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $slug = 'raw_materials';
        $encabezados= ['ID', 'Codigo', 'Nombre', 'Fecha', 'Cantidad', 'Comentarios'];
        $campos= ['id', 'code', 'name', 'buy_date', 'amount', 'commetn'];
        $data = raw_materials::orderBy('id', 'DESC')->paginate();
        return view('raw_materials.index', compact('slug','encabezados', 'campos', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $slug = 'raw_materials';
        return view('raw_materials.create', compact('slug'));
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
     * @param  \App\Models\raw_materials  $raw_materials
     * @return \Illuminate\Http\Response
     */
    public function show(raw_materials $raw_materials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\raw_materials  $raw_materials
     * @return \Illuminate\Http\Response
     */
    public function edit(raw_materials $raw_materials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\raw_materials  $raw_materials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, raw_materials $raw_materials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\raw_materials  $raw_materials
     * @return \Illuminate\Http\Response
     */
    public function destroy(raw_materials $raw_materials)
    {
        //
    }
}
