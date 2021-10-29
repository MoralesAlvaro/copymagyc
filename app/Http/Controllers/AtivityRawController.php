<?php

namespace App\Http\Controllers;

use App\Models\AtivityRaw;
use App\Models\Parameter;
use Illuminate\Http\Request;
use App\Models\RawMaterial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class AtivityRawController extends Controller
{

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

        // Validando que lo que saca sea igual o menor a la cantidad que hay que hay
        if ($rawMaterial->amount < $request->amount) {
            return redirect()->back()->with('warning', 'No puedes sacar más de '.$rawMaterial->amount.' unidades de '.$rawMaterial->name.' !.');
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
            'input_output' => 'Entrada',
            'user_id' => Auth::user()->id,
        ]);

        $ativityRaw->save();
        return redirect()->back()->with('success', 'Has ingresado '.$request->amount.' de '.$rawMaterial->name.' !.');
        // return response()->json([$id, $request->user_id, $request->amount, $rawMaterial]);
    }

    
    public function date(Request $request)
    {
        if (Auth::user()->is_admin == 1) {
            return view('activityRaw.date');
        }
        return redirect()->back()->with('success', 'No estas autorizado para llevar a cabo esta operación !.');
    }


    public function exportDate(Request $request)
    {
        if (Auth::user()->is_admin == 1) {
            if ($request->from > $request->to) {
                $data = AtivityRaw::whereBetween('created_at', [$request->to, $request->from])->get();    
            }else{
                $data = AtivityRaw::whereBetween('created_at', [$request->from, $request->to])->get();
            }
            //return response()->json([$data, $request->from, $request->to]);
            $parameters = Parameter::all();
            $encabezados= ['id', 'Código', 'Nombre', 'Cantidad', 'Operación', 'Usuario'];
            $campos= ['id', 'code', 'name', 'total', 'input_output', 'user_id'];
            $panel = "Reporte General";
            $pdf = PDF::loadView('report.pdf', compact('panel', 'parameters', 'campos', 'encabezados', 'data'));
            return $pdf->download('Movimientos Materia Prima.pdf');
        }
        return redirect()->back()->with('success', 'No estas autorizado para llevar a cabo esta operación !.');
    }

    public function mount()
    {
        if (Auth::user()->is_admin == 1) {
            $mes = date("m");
            $data = AtivityRaw::whereMonth('created_at', $mes)->get();
            //return response($ativity_raw);
            $encabezados= ['id', 'Código', 'Nombre', 'Cantidad', 'Operación', 'Usuario'];
            $campos= ['id', 'code', 'name', 'total', 'input_output', 'user_id'];
            return view('activityRaw.mount', compact('encabezados', 'campos', 'data'));
        }
        return redirect()->back()->with('success', 'No estas autorizado para llevar a cabo esta operación !.');
    }

    public function exportPdf()
    {
        if (Auth::user()->is_admin == 1) {
            $parameters = Parameter::all();
            $mes = date("m");
            $data = AtivityRaw::whereMonth('created_at', $mes)->get();
            //$user = $data[0]->user->name;
            //return response($user);
            $encabezados= ['id', 'Código', 'Nombre', 'Cantidad', 'Operación', 'Usuario'];
            $campos= ['id', 'code', 'name', 'total', 'input_output', 'user_id'];
            $panel = "Reporte General";
            $pdf = PDF::loadView('report.pdf', compact('panel', 'parameters', 'campos', 'encabezados', 'data'));
            return $pdf->download('Movimientos Materia Prima.pdf');
        }
        return redirect()->back()->with('success', 'No estas autorizado para llevar a cabo esta operación !.');
        }
}
