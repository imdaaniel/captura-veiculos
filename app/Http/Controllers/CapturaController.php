<?php

namespace App\Http\Controllers;

use App\Http\Requests\CapturaRequest;
use App\Services\CapturadorDeArtigo;
use Illuminate\Http\Request;
use App\Models\Artigo;

class CapturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        return view('artigos.captura');
    }

    public function capturar(CapturaRequest $request, CapturadorDeArtigo $capturadorDeArtigo) {
        $artigos = $capturadorDeArtigo->capturaArtigos($request->termo);

        if (count($artigos) > 0) {
            foreach ($artigos as $artigo) {
                Artigo::updateOrCreate($artigo);
            }

            return back()->with('msg', 'Artigos capturados com sucesso.');
        }

        return back()->withErrors([
            'Nenhum artigo foi importado, pois a busca não retornou nenhum resultado.',
        ]);
    }
}
