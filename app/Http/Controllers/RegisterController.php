<?php

namespace App\Http\Controllers;

use App\Models\Tipodocumento;
use App\Models\Genero;
use App\Models\Ciudade;
use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    
    public function index(){

        $tipodocumentos =Tipodocumento::all();
        return view('auth.register', compact('tipodocumentos'));
    }

    public function store(StoreUser $request){

        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->numero_documento = $request->numero_documento;
        $user->tipodocumento_id = $request->tipodocumento_id;
        $user->tipopersona_id = '1';
        $user->foto_perfil = 'undraw_avatar.svg';

        $user->save();

        auth()->login($user);

        $request = [
            "email" => $request->email,
            "password" => $request->password,
            "nombre" => $request->nombre,
            "apellidos" => $request->apellidos,
            "numero_documento" => $request->numero_documento,
            "tipodocumento_id" => $request->tipodocumento_id,
            "tipopersona_id" => '1',
            "foto_perfil" => 'undraw_avatar.svg'
            ];
        
            $user = Http::post('http://localhost/api.bizsett/public/v1/users', $request);

        return redirect()->route('home');

    }
}
