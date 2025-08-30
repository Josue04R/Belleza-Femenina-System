<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    
    public function mostrarLogin() {
        return view('login.login'); 
    }

    
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


 
    public function mostrarRegistro() {
        return view('login.login'); 
    }


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

    public function mostrarPerfil()
    {
        $cliente = Cliente::find(Session::get('cliente_id'));
        return view('cliente.perfil', compact('cliente'));
    }

    public function actualizarPerfil(Request $request)
    {
        $cliente = Cliente::find(Session::get('cliente_id'));

        // Validación de los campos
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'email' => 'required|email|unique:clientes,email,' . $cliente->idCliente . ',idCliente',
            'telefono' => 'nullable|max:20',
            'password' => 'nullable|min:6|confirmed',
            'current_email' => 'required|email',
            'current_password' => 'required'
        ]);

        // Confirmar correo y contraseña actuales
        if ($request->current_email !== $cliente->email || !Hash::check($request->current_password, $cliente->password)) {
            return back()->withErrors(['current_password' => 'El correo o la contraseña actual no son correctos.']);
        }

        // Si pasa la validación, actualizamos
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;

        if ($request->filled('password')) {
            $cliente->password = Hash::make($request->password);
        }

        $cliente->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }

    public function logout()
    {
        // Eliminar todas las variables de sesión relacionadas al cliente
        Session::forget('cliente_id');
        Session::forget('cliente_nombre');
        
        // O eliminar toda la sesión: Session::flush();
        // Session::flush();
        return redirect()->route('login')->with('success', 'Has cerrado sesión correctamente.');
    }



}
