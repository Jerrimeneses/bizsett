<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Models\Empleo;
use App\Http\Requests\StoreEmpleo;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class EmpleoController extends Controller
{

    public function index(){

        $empleos = Http::get('http://localhost/api.bizsett/public/v1/empleos?included=emprendimiento,user');
        $empleos = $empleos->json();

        // $empleos =Empleo::query()->when(request('search'), function($query) {
        //     return $query->where('mensaje_trabajo', 'like', '%' . request('search') . '%');
        // })->paginate(5);

        return view('empleos.index', compact('empleos'));
    }


    public function create(){

        $emprendimientos = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos');
        $emprendimientos = $emprendimientos->json();

        $users = Http::get('http://localhost/api.bizsett/public/v1/users');
        $users = $users->json();

        return view('empleos.create', compact('emprendimientos', 'users'));
    }

    public function crear($emprendimiento){

        $emprendimiento = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos/'.$emprendimiento);
        $emprendimiento = $emprendimiento->json(); 

        return view('empleos.create_empleo', compact('emprendimiento'));
    }




    public function store(StoreEmpleo $request, Emprendimiento $emprendimiento){

        $empleo = new Empleo();

            $empleo['evidencia'] = time() . '_' . $request->file(key: 'evidencia')->getClientOriginalName();
            $request->file(key: 'evidencia')->storeAs(path:'pdf_folder', name: $empleo['evidencia']);
            
            $empleo->mensaje_trabajo = $request->mensaje_trabajo;

        if (auth()->user()->tipopersona_id == '2'){
            $empleo->emprendimiento_id = $request->emprendimiento_id;
            $empleo->user_id = $request->user_id;
            $empleo->save();
            
            return redirect()->route('empleos.index');
        }
        else{
            
            $empleo->emprendimiento_id = $emprendimiento->id;
            $empleo->user_id = auth()->user()->id;
            $empleo->save();

            return redirect()->route('perfilemp.user', compact('emprendimiento'));
        }

    }

    

    public function edit($empleo){

        $emprendimientos = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos');
        $emprendimientos = $emprendimientos->json();

        $users = Http::get('http://localhost/api.bizsett/public/v1/users');
        $users = $users->json();

        $empleo = Http::get('http://localhost/api.bizsett/public/v1/empleos/'.$empleo.'?included=emprendimiento');
        $empleo = $empleo->json(); 


        return view('empleos.edit', compact('empleo', 'emprendimientos', 'users'));
    }



    public function update(Request $request, Empleo $empleo){

            $empleo['evidencia'] = time() . '_' . $request->file(key: 'evidencia')->getClientOriginalName();
            $request->file(key: 'evidencia')->storeAs(path:'pdf_folder', name: $empleo['evidencia']);
            
            $empleo->mensaje_trabajo = $request->mensaje_trabajo;

        if (auth()->user()->tipopersona_id == '2'){
            $empleo->emprendimiento_id = $request->emprendimiento_id;
            $empleo->user_id = $request->user_id;
            $empleo->save();
            
            return redirect()->route('empleos.index');
        }
        // else{
            
        //     $empleo->emprendimiento_id = $emprendimiento->id;
        //     $empleo->user_id = auth()->user()->id;
        //     $empleo->save();

        //     return redirect()->route('home');
        // }
    }

    public function destroy($empleo){
        
        Http::delete('http://localhost/api.bizsett/public/v1/empleos/'.$empleo);

        return redirect()->route('empleos.index');
    }


   
    
}
