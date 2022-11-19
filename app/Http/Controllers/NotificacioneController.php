<?php

namespace App\Http\Controllers;

use App\Events\NotificacionEvent;
use App\Models\Emprendimiento;
use App\Models\Notificacione;
use App\Models\Publicacione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class NotificacioneController extends Controller
{
    public function notifView(){
        

        return view('notificaciones');
        //return redirect()->route('home');
        
    }


    public function notificaciones($publicacione, $tipo){

        $users = Http::get('http://localhost/api.bizsett/public/v1/users');
        $users = $users->json();

        $emprendimientos = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos');
        $emprendimientos = $emprendimientos->json();

        $publicacione = Http::get('http://localhost/api.bizsett/public/v1/publicaciones/'.$publicacione);
        $publicacione = $publicacione->json();
        
        foreach($emprendimientos as $emprendimiento){
            if($emprendimiento['id'] == $publicacione['emprendimiento_id']){
                foreach($users as $user){
                    if($user['id'] == $emprendimiento['user_id']){
                        
                        $request=["reading"=>'false', "tiponotificacione_id"=>$tipo, "user_id"=> $user['id']];

                         Http::post('http://localhost/api.bizsett/public/v1/comentarios', $request);

                    }
                }
            }
        }
        
        return redirect()->route('home');
    }

    

    public function read(Notificacione $notificacione){
            $user = Auth::user();
                
            $notificacione->reading = 'true';
            $notificacione->save();
        
          return redirect(route('home'));
    }


}
