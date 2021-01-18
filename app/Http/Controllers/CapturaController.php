<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapturaController extends Controller
{
    public function index(Request $request) {
        return view('artigos.captura');
    }

    public function capturar(Request $request) {
        //
    }
}
