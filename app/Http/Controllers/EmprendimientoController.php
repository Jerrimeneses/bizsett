<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmprendimiento;
use Illuminate\Support\Facades\Http;

class EmprendimientoController extends Controller
{

    public function index(){

        $emprendimientos = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos?included=user,ciudade');
        $emprendimientos = $emprendimientos->json();

        $users = Http::get('http://localhost/api.bizsett/public/v1/users');
        $users = $users->json();

        // $emprendimientos = Emprendimiento::query()->when(request('search'), function($query) {
        //     return $query->where('nombre_emprendimiento', 'like', '%' . request('search') . '%')
        //     ->orWhere('clasificacion', 'like', '%' . request('search') . '%')
        //     ->orWhere('descripcion', 'like', '%' . request('search') . '%');
        // })->paginate(5);

    return view('emprendimientos.index', compact('emprendimientos', 'users'));
    }

     public function create(){
        $ciudades = Http::get('http://localhost/api.bizsett/public/v1/ciudades');
        $ciudades = $ciudades->json();

        if (auth()->user()->tipopersona_id == '2'){
            $users = Http::get('http://localhost/api.bizsett/public/v1/users?included=emprendimiento');
            $users = $users->json();
            return view('emprendimientos.create', compact('users', 'ciudades'));
        }else{
            return view('emprendimientos.create_emprendimiento', compact('ciudades'));
        }
    }

    public function store(StoreEmprendimiento $request){

        if (auth()->user()->tipopersona_id == '2'){
            Http::post('http://localhost/api.bizsett/public/v1/emprendimientos', $request);

            return redirect()->route('emprendimientos.index');
        }else{
            $request = [
            "nombre" => $request->nombre,
            "categoria" => $request->categoria,
            "descripcion" => $request->descripcion,
            "telefono" => $request->telefono,
            "direccion" => $request->direccion,
            "ciudade_id" => $request->ciudade_id,
            "user_id" => auth()->user()->id
            ];
            Http::post('http://localhost/api.bizsett/public/v1/emprendimientos', $request);

            return redirect()->route('perfilemp.me');
        }
    }

    public function edit($emprendimiento){
        $emprendimiento = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos/'.$emprendimiento);
        $emprendimiento = $emprendimiento->json();

        $users = Http::get('http://localhost/api.bizsett/public/v1/users');
        $users = $users->json();

        if (auth()->user()->tipopersona_id == '2'){
            return view('emprendimientos.edit', compact('emprendimiento', 'users'));
            
        }else{
            return view('edit_emprendimiento', compact('emprendimiento'));
        }
    }

    public function update(StoreEmprendimiento $request, $emprendimiento){
        Http::put('http://localhost/api.bizsett/public/v1/emprendimientos/'.$emprendimiento, $request);
        if (auth()->user()->tipopersona_id == '2'){
        return redirect(route('emprendimientos.index'));
        }
        else{
            return redirect(route('perfilemp.me'));
        }
    }

    public function destroy($emprendimiento){
        Http::delete('http://localhost/api.bizsett/public/v1/emprendimientos/'.$emprendimiento);
        return redirect()->route('emprendimientos.index');
    }
    
}
