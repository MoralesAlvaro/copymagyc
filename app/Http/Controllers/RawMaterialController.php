<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use App\Models\Supplier;
use App\Models\StationeryType;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $slug = 'rawMaterials';
        $encabezados= ['ID', 'Codigo', 'Nombre', 'Fecha', 'Cantidad', 'Comentarios'];
        $campos= ['id', 'code', 'name', 'buy_date', 'amount', 'comment'];
        $data = RawMaterial::orderBy('id', 'DESC')->paginate();
        return view('raw_materials.index', compact('slug','encabezados', 'campos', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $suppliers = Supplier::all();
        $stationeryTypes = StationeryType::all();
        $slug = 'rawMaterials';
        return view('raw_materials.create', compact('slug', 'suppliers', 'stationeryTypes'));
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
            'code' => ['required', 'string', 'max:255', 'unique:raw_materials'],
            'name' => ['required', 'string', 'max:255'],
            'buy_date' => ['required', 'date'],
            'amount' => ['required', 'integer'],
            'comment' => ['nullable', 'string', 'max:255'],
            'user_id' => ['integer'],
            'supplier_id' => ['required', 'integer', 'max:2'],
            'stationery_type_id' => ['required', 'integer', 'max:2'],
        ]);
        //return response()->json(['data' => $request->all()]);


        $rawMaterial = new RawMaterial($request->all());
        $rawMaterial->save();

        return redirect()->back()->with('success', 'La Materia Prima se ha registrado correctamente!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\raw_materials  $raw_materials
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $slug = 'rawMaterials';
        $data = RawMaterial::findOrFail($id);
        return view('raw_materials.show', compact('slug', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\raw_materials  $raw_materials
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $slug = 'rawMaterials';
        $data = RawMaterial::findOrFail($id);
        return view('raw_materials.edit', compact('slug', 'data'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\raw_materials  $raw_materials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rawMaterials = RawMaterial::findOrFail($id);
        if ($rawMaterials) {
            
            // Validando data
            $request->validate([
                'name' => 'required|string|max:255|unique:suppliers,name,'.$rawMaterials->id,
                'address' => 'required|string|max:255',
                'nrc' => 'required|numeric|min:7|unique:suppliers,nrc,'.$rawMaterials->id,
                'nit' => 'required|numeric|min:17|unique:suppliers,nit,'.$rawMaterials->id,
                'company_type' => 'required|string|max:7',
                'business' => 'required|string|max:255',
                'telephone' => 'required|numeric|min:8|unique:suppliers,telephone,'.$rawMaterials->id,
                'email' => 'required|email|max:50|unique:suppliers,email,'.$rawMaterials->id,
                'dui' => 'required|numeric|min:9|unique:suppliers,dui,'.$rawMaterials->id,
                'active' => 'required|boolean',
            ]);

            // Verificando si ha habido modificaciones
            $campos = ['name', 'address', 'nrc', 'nit', 'company_type', 'business', 'telephone', 'email', 'dui', 'active'];
            foreach ($campos as $item) {
                // Valor traido de la bd
                $valor_campo_old = $supplier->$item;
                // Valor traido del formulario
                $valor_campo_new = $request->get($item);
                if ($valor_campo_new != $valor_campo_old) {
                    // Actualizando campo
                    $supplier->fill([$item => $valor_campo_new])->save();
                }
            }

            return redirect('/rawMaterials'.'/'.$id)->with('success', 'El Proveedor se ha sido actualizado correctamente!.');      
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\raw_materials  $raw_materials
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Supplier::find($id);
        if ($data == null) {
            return redirect('/raw_materials')->with('success', 'El registro que desea eliminar no se encuentra!.');
        }
        
        $data->delete();
        return redirect('/raw_materials')->with('success', 'El registro se ha sido eliminado correctamente!.');
    }
}
