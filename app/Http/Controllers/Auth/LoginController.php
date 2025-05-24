<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'numControl' => 'required',
            'password' => 'required',
        ]);

        // Autenticación del usuario con numControl
        if (auth()->attempt(['numControl' => $request->numControl, 'password' => $request->password])) {
            // Redirigir al dashboard u otra página de la aplicación
            return redirect()->route('home');
        }

        // Si las credenciales no son correctas, redirigir con error
        return back()->withErrors(['numControl' => 'Las credenciales no coinciden.']);
    }

    /**
     * Override the username method to authenticate with numControl.
     *
     * @return string
     */
    public function username()
    {
        return 'numControl'; // Cambiar para autenticar con numControl
    }
}
