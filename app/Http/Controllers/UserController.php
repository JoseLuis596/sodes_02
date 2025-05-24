<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RolModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $users = User::with('rol')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = RolModel::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numControl' => 'required|string|unique:users,numControl',
            'name'       => 'required|string',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6',
            'idRol'      => 'required|exists:roles,idRol',
        ]);

        User::create([
            'numControl' => $request->numControl,
            'name'       => $request->name,
            'email'      => $request->email,
            'password' => bcrypt($request->password),
            'idRol'      => $request->idRol,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario registrado correctamente.');
    }

    public function show($id)
    {
        $user = User::with('rol')->findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = RolModel::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'numControl' => 'required|string|max:255|unique:users,numControl,' . $user->id,
            'email'      => 'required|email|max:255|unique:users,email,' . $user->id,
            'idRol'      => 'required|exists:roles,idRol',
        ]);

        $user->update([
            'name'       => $request->name,
            'numControl' => $request->numControl,
            'email'      => $request->email,
            'idRol'      => $request->idRol,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
