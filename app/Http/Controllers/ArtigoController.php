<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        $artigos = Artigo::orderBy('id', 'desc')->get();

        return view('artigos.index', ['artigos' => $artigos]);
    }

    public function deletar(Request $request) {
        $id = $request->id;

        if (!$id || !Artigo::where('id', $id)->first()) {
            return back()->withErrors([
                'msg' => 'ID inválido',
            ]);
        }

        Artigo::where('id', $id)->delete();

        return redirect('/artigos')->with('msg', 'Artigo excluído com sucesso');
    }
}
