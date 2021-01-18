<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(Request $request) {
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('login.index');
    }
    
    protected function validar(array $data) {
        return Validator::make($data, [
            'usuario' => 'required|string|max:255',
            'senha' => 'required|string|max:255|confirmed',
        ]);
    }

    public function autenticar(Request $request) {
        $this->validar($request->only('usuario', 'senha'));

        $credenciais = [
            'usuario' => $request->usuario,
            'password' => $request->senha
        ];

        if (Auth::attempt($credenciais)) {
            return redirect('/artigos');
        }

        return back()->withErrors([
            'usuario' => 'As credenciais informadas não conferem',
        ]);
    }

    public function sair(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
