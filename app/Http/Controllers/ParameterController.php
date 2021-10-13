<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParameterController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = Parameter::all();
        //return $data;
        $slug = 'parameter';
        return view('parameter.show', compact('slug', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        $data = Parameter::all();
        //return $data;
        $slug = 'parameter';
        return view('parameter.edit', compact('slug', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parameter $parameter)
    {
        $parameter = Parameter::findOrFail(1);

        // Validando data
        $request->validate([
            'name' => 'string',
            'logo_1' => 'nullable|image',
            'logo_2' => 'nullable|image',
            'representative' => 'string',
            'telephone' => 'string|max:9',
            'email' => 'email',
            'address' => 'string',
            'company_nit' => 'string|max:17',
            'nrc' => 'string|max:7',
            'representative_nit' => 'string|max:17',
            'company_type' => 'string',
        ]);

        // Verificando si ha habido modificaciones
        $campos = ['name', 'representative', 'telephone', 'email', 'address', 'company_nit', 'representative_nit', 'company_type', 'nrc'];
        foreach ($campos as $item) {
            // Valor traido de la bd
            $valor_campo_old = $parameter->$item;
            // Valor traido del formulario
            $valor_campo_new = $request->get($item);
            if ($valor_campo_new != $valor_campo_old) {
                // Actualizando campo
                $parameter->fill([$item => $valor_campo_new])->save();
            }
        }

        // IMG: Verificación de cambios de logo_1
        if ($request->file('logo_1') ) {
            // Ruta de guardado
            $pathImgUrl = Storage::disk('public')->put('img/parameters', $request->file('logo_1'));
            // Comprobando que la imagen no sea la default
            if ($parameter->logo_1 != "https://via.placeholder.com/1350x280.png/05ff8f?text=DEFAULT_LOGO_1") {
                $reemplazo = str_replace( env('APP_URL'), "", $parameter->logo_1 );

                // Comprobando que exista el archivo
                if (file_exists($reemplazo)) {
                    unlink($reemplazo);
                }
            }

            // actualiznado campo
            $parameter->fill(['logo_1' => asset($pathImgUrl)])->update();
        }else{
            $pathImgUrl = $parameter->logo_1;
            // actualiznado campo
            $parameter->fill(['logo_1' => asset($pathImgUrl)])->update();
        }

        // IMG: Verificación de cambios de logo_1
        if ($request->file('logo_2') ) {
            // Ruta de guardado
            $pathImgUrl = Storage::disk('public')->put('img/parameters', $request->file('logo_2'));
            // Comprobando que la imagen no sea la default
            if ($parameter->logo_2 != "https://via.placeholder.com/1350x280.png/05ff8f?text=DEFAULT_LOGO 2") {
                $reemplazo = str_replace( env('APP_URL'), "", $parameter->logo_2 );

                // Comprobando que exista el archivo
                if (file_exists($reemplazo)) {
                    unlink($reemplazo);
                }
            }

            // actualiznado campo
            $parameter->fill(['logo_2' => asset($pathImgUrl)])->update();
        }else{
            $pathImgUrl = $parameter->logo_2;
            // actualiznado campo
            $parameter->fill(['logo_2' => asset($pathImgUrl)])->update();
        }

        return redirect('/parameter/show')->with('success', 'Actualizado correctamente!.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameter $parameter)
    {
        //
    }
}
