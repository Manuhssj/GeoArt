<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users|string|max:50',
            'password' => ['required', Password::min(8)],
        ],
        [   
            'username.required' => 'Username requerido.',
            'email.required' => 'Correo requerido.',
            'email.unique' => 'Username ya ocupado.',
            'email.max' => 'Excedes el límite de caracteres.',
            'password.required' => 'Contraseña requerida.',
            'password.min' => 'Minimo 8 caracteres.',
        ]);


        /* echo "(".$request.") |";
        echo $request->username."  |  ";
        echo $request->email."  |  ";
        echo $request->password."  |  ";
        echo $request->password_confirmation."  |  "; */

        $user = User::create(['username' => $request->username, 'email' => $request->email, 'password' => bcrypt($request->password),]);
        /* echo $request;
        echo " ---------------- ";
        echo $user;
        echo " ---------------- ";
        echo $user->password; */
        if($user){
            return redirect()->back()->with('success', 'Usuario registrado.');
        }
        return redirect()->back()->with('error', 'No se pudo registrar.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Se ha eliminado el usuario.');
        }
        return redirect()->back()->with('error', 'No fue posible eliminar el usuario.');
    }
}