<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprendimiento;
use App\Models\Inversionista;
use App\Http\Requests\StoreInversionista;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class InversionistaController extends Controller
{

    public function index(){

        $inversionistas = Http::get('http://localhost/api.bizsett/public/v1/inversionistas');
        $inversionistas = $inversionistas->json();

        $emprendimientos = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos');
        $emprendimientos = $emprendimientos->json();

        $users = Http::get('http://localhost/api.bizsett/public/v1/users');
        $users = $users->json();

        // $inversionistas =Inversionista::query()->when(request('search'), function($query) {
        //     return $query->where('propuesta', 'like', '%' . request('search') . '%');
        // })->paginate(5);

    return view('inversionistas.index', compact('inversionistas', 'users', 'emprendimientos'));
    }

    


    public function create(){

        $emprendimientos = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos');
        $emprendimientos = $emprendimientos->json();

        $users = Http::get('http://localhost/api.bizsett/public/v1/users');
        $users = $users->json();

        $emprendimiento = "1";

        return view('inversionistas.create', compact('emprendimientos', 'users', 'emprendimiento'));
    }
    

    public function crear($emprendimiento){
        $emprendimiento = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos/'.$emprendimiento);
        $emprendimiento = $emprendimiento->json();

        

        return view('inversionistas.create_inversiones', compact( 'emprendimiento'));
    }




    public function store(StoreInversionista $request, $emprendimiento){

        if (auth()->user()->tipopersona_id == '2'){
            
            Http::post('http://localhost/api.bizsett/public/v1/inversionistas', $request);

            return redirect()->route('inversionistas.index');
        }
        else{

            $request = ["propuesta"=>$request->propuesta, "emprendimiento_id"=>$emprendimiento, "user_id"=>auth()->user()->id];

            Http::post('http://localhost/api.bizsett/public/v1/inversionistas', $request);

            
            return redirect()->route('perfilemp.user', $emprendimiento);
        }
        
    }

    

    public function edit($inversionista){
        
        $emprendimientos = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos');
        $emprendimientos = $emprendimientos->json();

        $inversionista = Http::get('http://localhost/api.bizsett/public/v1/inversionistas/'.$inversionista);
        $inversionista = $inversionista->json();

        //$emprendimientos =Emprendimiento::all();

        return view('inversionistas.edit', compact('inversionista', 'emprendimientos'));
    }



    public function update(Request $request, $inversionista){

        Http::put('http://localhost/api.bizsett/public/v1/inversionistas/'.$inversionista, $request);

        if (auth()->user()->tipopersona_id == '2'){
        return redirect(route('inversionistas.index'));
        }
        else{
            redirect(route('home'));
        }
    }

    public function destroy($inversionista){

        Http::delete('http://localhost/api.bizsett/public/v1/inversionistas/'.$inversionista);
        if (auth()->user()->tipopersona_id == '2'){
        return redirect()->route('inversionistas.index');
        }
        else{
            redirect(route('home'));
        }
     }


   
    
}
