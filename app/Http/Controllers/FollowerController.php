<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FollowerController extends Controller
{

    //Seguir
    public function store($emprendimiento){

        $request=["emprendimiento_id"=>$emprendimiento, "user_id"=>auth()->user()->id];

        Http::post('http://localhost/api.bizsett/public/v1/followers', $request);

        $tipo = '3';

        //return redirect()->route('notificaciones', compact('publicacione', 'tipo'));
        return redirect()->route('perfilemp.user', compact('emprendimiento'));
    }


    


    //Dejar de seguir

    public function destroy($follower){

        $seguidor=Http::get('http://localhost/api.bizsett/public/v1/followers/'.$follower.'?included=emprendimiento');
        $seguidor = $seguidor->json();

        $emprendimiento = $seguidor['emprendimiento']['id'];

        Http::delete('http://localhost/api.bizsett/public/v1/followers/'.$follower);
        
        return redirect()->route('perfilemp.user', compact('emprendimiento'));
        
    }
}
