<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Models\Tipodocumento;
use App\Models\Genero;
use App\Models\Ciudade;
use App\Models\Departamento;
use App\Models\Tipopersona;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    
    public function index(){

        $users = Http::get('http://localhost/api.bizsett/public/v1/users?included=tipopersona,tipodocumento');
        $users = $users->json();


        // $users = User::query()->when(request('search'), function($query) {
        //     return $query->where('nombre', 'like', '%' . request('search') . '%')
        //     ->orWhere('apellidos', 'like', '%' . request('search') . '%');
        // })->paginate(5);

    return view('users.index', compact('users'));
    }


     public function create(){

        $tipodocumentos = Http::get('http://localhost/api.bizsett/public/v1/tipodocumentos');
        $tipodocumentos = $tipodocumentos->json();

        $tipopersonas = Http::get('http://localhost/api.bizsett/public/v1/tipopersonas');
        $tipopersonas = $tipopersonas->json();

        return view('users.create', compact('tipodocumentos', 'tipopersonas'));
    }




    public function store(StoreUser $request){

        $request = [
                "email" => $request->email,
                "password" => $request->password,
                "nombre" => $request->nombre,
                "apellidos" => $request->apellidos,
                "numero_documento" => $request->numero_documento,
                "tipodocumento_id" => $request->tipodocumento_id,
                "tipopersona_id" => $request->tipopersona_id,
                "foto_perfil" => 'undraw_avatar.svg'
                ];

        Http::post('http://localhost/api.bizsett/public/v1/users', $request);

        return redirect()->route('users.index');
        
    }

    

    public function edit($user){

        $tipodocumentos = Http::get('http://localhost/api.bizsett/public/v1/tipodocumentos');
        $tipodocumentos = $tipodocumentos->json();

        $tipopersonas = Http::get('http://localhost/api.bizsett/public/v1/tipopersonas');
        $tipopersonas = $tipopersonas->json();

        $user = Http::get('http://localhost/api.bizsett/public/v1/users/'.$user);
        $user = $user->json();

        return view('users.edit', compact('user', 'tipodocumentos', 'tipopersonas'));
    }



    public function update(Request $request,User $user){


        
        $user->email = $request->email;
        $user->password = $request->password;
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;

        $user->save();

        $request = [
            "email" => $request->email,
            "password" => $request->password,
            "nombre" => $request->nombre,
            "apellidos" => $request->apellidos,
            "numero_documento" => $request->numero_documento,
            "tipodocumento_id" => $request->tipodocumento_id,
            "tipopersona_id" => $request->tipopersona_id,
            ];

        Http::put('http://localhost/api.bizsett/public/v1/users/'.$user->id, $request);
        

        return redirect(route('users.index'));
        
    }

    public function destroy(User $user){

        $user->delete();
        
        Http::delete('http://localhost/api.bizsett/public/v1/users/'.$user->id);

        return redirect()->route('users.index');
    }

    public function actualizar(Request $request, User $user){


        $user->email = $request->email;
        $user->password = $request->password;
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;

        $user->save();

        Http::put('http://localhost/api.bizsett/public/v1/users/'.$user, $request);

        return redirect(route('home'));

      
        
    }

}

