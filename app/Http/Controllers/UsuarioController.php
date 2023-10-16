<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {

        $users = Usuario::whereIn('id_rol', [1, 2])->get();
        return view('usuarios', compact('users'));
    }

    public function showEdit($id)
    {
        $user = Usuario::findOrFail($id);
        $roles = Rol::all();
        return view('update-usuario', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = Usuario::findOrFail($id);
        //dd($request->all());
        $user->update($request->all());
        return redirect()->route('usuarios');
    }

}
