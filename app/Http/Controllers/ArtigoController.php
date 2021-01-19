<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtigoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        $artigos = Artigo::where('id_usuario', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('artigos.index', ['artigos' => $artigos]);
    }

    public function buscar(Request $request) {
        $request->validate([
            'nome_veiculo' => 'required|string|max:255|min:3',
        ]);

        $artigos = Artigo::where([
            ['nome_veiculo', 'like', "%{$request->nome_veiculo}%"],
            ['id_usuario', Auth::user()->id],
        ])->orderBy('id', 'desc')->get();

        return view('artigos.index', ['artigos' => $artigos, 'busca' => '1']);
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
