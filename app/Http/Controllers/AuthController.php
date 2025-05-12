<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('iniciarsesion');
    }

    public function login(Request $request)
    {
        $errores = [];
        
        if ($request->input('usuario') == '' || $request->input('password') == '') {
            array_push($errores, 'Uno de los campos está vacio o incompleto.');
        }

        if (count($errores) > 0) {
            return redirect()
                ->route('auth.login')
                ->with('errores', $errores)
                ->with('usuario', $request->input('usuario'));
        } else {
            $credenciales = [
                'username' => $request->input('usuario'),
                'password' => $request->input('password'),
            ];
            

            if(!Auth::attempt($credenciales)) {
                return redirect()
                    ->route('auth.login')
                    ->with('errores', ['Uno de los datos ingresados no coincide con nuestras credeciales.'])
                    ->with('usuario', $request->input('usuario'));
            }

            return redirect()
                ->route('home.home')
                ->with('message.success', 'Sesión iniciada.');
            }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()
            ->route('auth.login')
            ->with('message.success', 'Sesión cerrada.');
    }
}