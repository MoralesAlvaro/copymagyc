<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;

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
        //
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
