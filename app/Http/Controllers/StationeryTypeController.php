<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StationeryType;

class StationeryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slug = 'stationeryTypes';
        $encabezados= ['id', 'Nombre', 'Color', 'Tamaño', 'Material'];
        $campos= ['id', 'name', 'color', 'size', 'material'];
        $data = StationeryType::orderBy('id', 'DESC')->paginate();
        return view('stationery_types.index', compact('slug','encabezados', 'campos', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stationeryTypes = StationeryType::all();
        $slug = 'stationeryTypes';
        return view('stationery_types.create', compact('slug', 'stationeryTypes'));
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
            'name' => ['required', 'string', 'max:255', 'unique:raw_materials'],
            'color' => ['nullable', 'string', 'max:255'],
            'size' => ['nullable', 'string', 'max:255'],
            'material' => ['nullable', 'string', 'max:255'],
        ]);

        $stationeryType = new StationeryType($request->all());
        $stationeryType->save();

        return redirect()->back()->with('success', 'El tipo de Materia Prima se ha registrado correctamente!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slug = 'stationeryTypes';
        $data = StationeryType::findOrFail($id);
        return view('stationery_types.show', compact('slug', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slug = 'stationeryTypes';
        $data = StationeryType::findOrFail($id);
        return view('stationery_types.edit', compact('slug', 'data')); 
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
        $stationeryTypes = StationeryType::findOrFail($id);
        if ($stationeryTypes) {
            
            // Validando data

            $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:stationery_types,name,'.$stationeryTypes->id],
                'color' => ['nullable', 'string', 'max:255'],
                'size' => ['nullable', 'string', 'max:255'],
                'material' => ['nullable', 'string', 'max:255'],
            ]);

            // Verificando si ha habido modificaciones
            $campos = ['name', 'color', 'size', 'material'];
            foreach ($campos as $item) {
                // Valor traido de la bd
                $valor_campo_old = $stationeryTypes->$item;
                // Valor traido del formulario
                $valor_campo_new = $request->get($item);
                if ($valor_campo_new != $valor_campo_old) {
                    // Actualizando campo
                    $stationeryTypes->fill([$item => $valor_campo_new])->save();
                }
            }

            return redirect('/stationeryTypes'.'/'.$id)->with('success', 'El tipo de Materia Prima ha sido actualizado correctamente!.');      
        }
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
