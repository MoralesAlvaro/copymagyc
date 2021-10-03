<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function index() {
        return view('parameter.index');
    }

    public function create() {
        return view('parameter.create');
    }
}
