<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Admin\User as AdminUser;
use App\Models\User;
use App\Models\RolModel; // Importa el modelo de Roles
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Registrar el usuario
    public function register(Request $request)
    {
        // Validación
        $validator = Validator::make($request->all(), [
            'numControl' => 'required|string|unique:users,numControl',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'idRol' => 'required|integer',

        ]);
        

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear el usuario
        $rol = RolModel::where('nombre', 'user')->first();

        $user = AuthUser::create([
            'numControl' => $request->numControl,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'idRol' => $request->idRol,
        ]);
        

        $rol = RolModel::where('nombre', 'user')->first(); 
        if ($rol) {
            $user->idRol = $rol->id;
            $user->save();
        }

        // Redirigir al login o página deseada
        return redirect()->route('login');
    }
}
