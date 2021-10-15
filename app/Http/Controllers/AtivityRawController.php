<?php

namespace App\Http\Controllers;

use App\Models\AtivityRaw;
use Illuminate\Http\Request;
use App\Models\RawMaterial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AtivityRawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {       
        $rawMaterial = RawMaterial::find($id);

        if ($request->amount === null || $request->amount === "") {
            return redirect()->back()->with('warning', 'Debes ingresar una cantidad de materia prima a sacar!.');
        }

        // Sacando materia prima
        $rawMaterial->amount = $rawMaterial->amount - $request->amount;
        $rawMaterial->update();

        // Ingresando movimiento a activity_raw
        $ativityRaw = new AtivityRaw([
            'total' => $request->amount,
            'code' => $rawMaterial->code,
            'name' => $rawMaterial->name,
            'input_output' => 'Entrada',
            'user_id' => Auth::user()->id,
        ]);

        $ativityRaw->save();
        return redirect()->back()->with('success', 'Has sacado '.$request->amount.' de '.$rawMaterial->name.' !.');
        // return response()->json([$id, $request->user_id, $request->amount, $rawMaterial]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AtivityRaw  $ativityRaw
     * @return \Illuminate\Http\Response
     */
    public function show(AtivityRaw $ativityRaw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AtivityRaw  $ativityRaw
     * @return \Illuminate\Http\Response
     */
    public function edit(AtivityRaw $ativityRaw)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AtivityRaw  $ativityRaw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rawMaterial = RawMaterial::find($id);

        if ($request->amount === null || $request->amount === "") {
            return redirect()->back()->with('warning', 'Debes ingresar una cantidad de materia prima a sacar!.');
        }

        // Sacando materia prima
        $rawMaterial->amount = $rawMaterial->amount + $request->amount;
        $rawMaterial->update();

        // Ingresando movimiento a activity_raw
        $ativityRaw = new AtivityRaw([
            'total' => $request->amount,
            'code' => $rawMaterial->code,
            'name' => $rawMaterial->name,
            'input_output' => 'Salida',
            'user_id' => Auth::user()->id,
        ]);

        $ativityRaw->save();
        return redirect()->back()->with('success', 'Has ingresado '.$request->amount.' de '.$rawMaterial->name.' !.');
        // return response()->json([$id, $request->user_id, $request->amount, $rawMaterial]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AtivityRaw  $ativityRaw
     * @return \Illuminate\Http\Response
     */
    public function destroy(AtivityRaw $ativityRaw)
    {
        //
    }

    public function mount()
    {
        $fechaActual = now();
        $mes = date("m");
        $data = DB::table('ativity_raws')->whereMonth('created_at', $mes)->get();
        //return response($ativity_raw);
        $encabezados= ['id', 'Código', 'Nombre', 'Cantidad', 'Operación', 'Usuario'];
        $campos= ['id', 'code', 'name', 'total', 'input_output', 'user_id'];
        return view('activityRaw.mount', compact('encabezados', 'campos', 'data'));
    }
}
