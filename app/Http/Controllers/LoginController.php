<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(Request $request) {
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('login.index');
    }

    public function autenticar(LoginRequest $request) {
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
