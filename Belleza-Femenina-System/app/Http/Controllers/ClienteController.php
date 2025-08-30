<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    // Mostrar login
    public function mostrarLogin() {
        return view('login.login'); 
    }

    // Login
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $cliente = Cliente::where('email', $request->email)->first();

        if ($cliente && Hash::check($request->password, $cliente->password)) {
            Session::put('cliente_id', $cliente->idCliente);
            Session::put('cliente_nombre', $cliente->nombre);
            return redirect()->route('home');
        }   

        return back()->withErrors(['email' => 'Correo o contraseña incorrectos']);
    }

    // Mostrar registro
    public function mostrarRegistro() {
        return view('login.login'); 
    }

    // Registrar cliente
    public function registrar(Request $request) {
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'nullable|max:20',
            'password' => 'required|min:6|confirmed' 
        ]);

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->password = Hash::make($request->password); 
        $cliente->save();

        return redirect()->route('login')->with('success', 'Cuenta creada correctamente. Ahora puedes iniciar sesión.');
    }

    // Mostrar perfil
    public function mostrarPerfil() {
        $cliente = Cliente::find(Session::get('cliente_id'));
        return view('cliente.perfil', compact('cliente'));
    }

    // Actualizar perfil
    public function actualizarPerfil(Request $request) {
        $cliente = Cliente::find(Session::get('cliente_id'));

        // Validación de los campos
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'email' => 'required|email|unique:clientes,email,' . $cliente->idCliente . ',idCliente',
            'telefono' => 'nullable|max:20',
            'password' => 'nullable|min:6|confirmed',
            'current_password' => 'required_with:password'
        ]);

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;

        // Cambiar contraseña solo si se proporciona
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $cliente->password)) {
                return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
            }
            $cliente->password = Hash::make($request->password);
        }

        $cliente->save();
        Session::put('cliente_nombre', $cliente->nombre);

        return back()->with('success', 'Perfil actualizado correctamente.');
    }

    // Logout
    public function logout() {
        Session::forget('cliente_id');
        Session::forget('cliente_nombre');
        return redirect()->route('login')->with('success', 'Has cerrado sesión correctamente.');
    }
}
