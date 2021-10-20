<?php

namespace App\Http\Controllers;

use App\Models\AtivityRaw;
use Illuminate\Support\Facades\Auth;
use App\Models\RawMaterial;
use App\Models\Supplier;
use App\Models\StationeryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $encabezados= ['ID', 'Código', 'Nombre', 'Fecha', 'Cantidad'];
        $campos= ['id', 'code', 'name', 'buy_date', 'amount'];
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
            'buy_date' => ['nullable', 'date'],
            'amount' => ['required', 'integer'],
            'comment' => ['nullable', 'string', 'max:255'],
            'user_id' => ['integer'],
            'photo' => '',
            'supplier_id' => ['required', 'integer'],
            'stationery_type_id' => ['required', 'integer'],
        ]);
        //return response()->json(['data' => $request->all()]);

        $rawMaterial = new RawMaterial($request->all());
        $rawMaterial->save();

        // IMG
        if (!$request->file('photo')) {
            // Imagen default de usuario
            $pathImgUrl = "https://via.placeholder.com/1350x280.png/05ff8f?text=DEFAULT";
            // Actualizando ruta img
            $rawMaterial->fill(['photo' => asset($pathImgUrl)])->save();
        }else{
            // Ruta de guardado
            $pathImgUrl = Storage::disk('public')->put('img/rawMaterials', $request->file('photo'));
            // Actualizando ruta img
            $rawMaterial->fill(['photo' => asset($pathImgUrl)])->save();
        }

        // Ingresando movimiento a activity_raw
        $ativityRaw = new AtivityRaw([
            'total' => $request->amount,
            'code' => $rawMaterial->code,
            'name' => $rawMaterial->name,
            'input_output' => 'Entrada',
            'user_id' => Auth::User()->id,
        ]);

        $ativityRaw->save();

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
        $suppliers = Supplier::all();
        $stationeryTypes = StationeryType::all();
        $slug = 'rawMaterials';
        $data = RawMaterial::findOrFail($id);
        return view('raw_materials.edit', compact('slug', 'data', 'suppliers', 'stationeryTypes'));  
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
                'code' => ['required', 'string', 'max:255', 'unique:raw_materials,code,'.$rawMaterials->id],
                'name' => ['required', 'string', 'max:255'],
                'buy_date' => ['nullable', 'date'],
                'amount' => ['required', 'integer'],
                'comment' => ['nullable', 'string', 'max:255'],
                 'user_id' => ['integer'],
                'photo' => '',
                'supplier_id' => ['required', 'integer'],
                'stationery_type_id' => ['required', 'integer'],
            ]);

            // Verificando si ha habido modificaciones
            $campos = ['code', 'name', 'buy_date', 'amount', 'comment', 'user_id', 'supplier_id', 'stationery_type_id'];
            foreach ($campos as $item) {
                // Valor traido de la bd
                $valor_campo_old = $rawMaterials->$item;
                // Valor traido del formulario
                $valor_campo_new = $request->get($item);
                if ($valor_campo_new != $valor_campo_old) {
                    // Actualizando campo
                    $rawMaterials->fill([$item => $valor_campo_new])->save();
                }
            }

            // IMG: Verificación de cambios de photo
            if ($request->file('photo') ) {
                // Ruta de guardado
                $pathImgUrl = Storage::disk('public')->put('img/rawMaterials', $request->file('photo'));
                // Comprobando que la imagen no sea la default
                if ($rawMaterials->photo != "https://via.placeholder.com/1350x280.png/05ff8f?text=DEFAULT") {
                    $reemplazo = str_replace( env('APP_URL'), "", $rawMaterials->photo );
    
                    // Comprobando que exista el archivo
                    if (file_exists($reemplazo)) {
                        unlink($reemplazo);
                    }
                }
    
                // actualiznado campo
                $rawMaterials->fill(['photo' => asset($pathImgUrl)])->update();
            }else{
                $pathImgUrl = $rawMaterials->photo;
                // actualiznado campo
                $rawMaterials->fill(['photo' => asset($pathImgUrl)])->update();
            }

            return redirect('/rawMaterials'.'/'.$id)->with('success', 'La Materia Prima se ha sido actualizado correctamente!.');      
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
        $data = RawMaterial::find($id);
        if ($data == null) {
            return redirect('/rawMaterials')->with('success', 'El registro que desea eliminar no se encuentra!.');
        }
        
        $data->delete();
        return redirect('/rawMaterials')->with('success', 'El registro se ha sido eliminado correctamente!.');
    }
}
