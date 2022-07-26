<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('user.login');
    }

    public function authenticate(LoginFormRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->route('home')
                ->with('login', 'Bem vindo(a) ' . Auth::user()->name);
        }

        return back()->withErrors([
            'error' => 'Credenciais invalidas!',
        ])->with('error', 'Credenciais invalidas!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('home')
            ->with('logout', 'Logout realizado com sucesso');
    }
}
