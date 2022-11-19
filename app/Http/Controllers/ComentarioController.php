<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentario;

use Illuminate\Support\Facades\Http;

class ComentarioController extends Controller
{
    public function store(StoreComentario $request, $publicacione){

        // $comentario = new Comentario();

        // $comentario->comentario = $request->comentario;
        // $comentario->publicacione_id = $publicacione;
        // $comentario->user_id = auth()->user()->id;

        // $comentario->save();

        $request=["comentario"=>$request->comentario, "publicacione_id"=>$publicacione, "user_id"=>auth()->user()->id];

        Http::post('http://localhost/api.bizsett/public/v1/comentarios', $request);

        $tipo = '1';

        return redirect()->route('notificaciones', compact('publicacione', 'tipo'));
        //return redirect()->route('home');
        
    }

    public function destroy($comentario){
        
        Http::delete('http://localhost/api.bizsett/public/v1/comentarios/'.$comentario);
        
        return redirect()->route('home');
    }
}
