<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Empleo;
use App\Models\Emprendimiento;
use App\Models\Follower;
use App\Models\Multimedia;
use App\Models\Publicacione;
use App\Models\Reaccione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PerfilesController extends Controller
{
    
    public function misdatos(User $user){

        return view('misdatos', compact('user'));
    }

    public function fotoperfil(User $user){

        return view('subirfoto', compact('user'));
    }

    
    public function subirfoto(Request $request, User $user){

        if ($request->foto_perfil == ''){
            $user->foto_perfil = 'undraw_avatar.svg';
            $request = ["foto_perfil" => "undraw_avatar.svg"];
            
        }
        else{
        $user['foto_perfil'] = time() . '_' . $request->file(key: 'foto_perfil')->getClientOriginalName();
        $request->file(key: 'foto_perfil')->storeAs(path:'fotos_perfiles', name: $user['foto_perfil']);

        $request = ["foto_perfil" => $user['foto_perfil']];
        }
        $user->save();

        Http::put('http://localhost/api.bizsett/public/v1/foto/'.$user->id, $request);

        return redirect()->route('home');

    }


    public function perfilemp(){

        $emprendimientos = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos?included=user,publicaciones');
        $emprendimientos = $emprendimientos->json();

        $followers = Http::get('http://localhost/api.bizsett/public/v1/followers');
        $followers = $followers->json();


        

        foreach ($emprendimientos as $emprendimiento){
            if (auth()->user()->id==$emprendimiento['user_id']){
                
                $user = $emprendimiento['user'];

                $public=0;
                foreach($emprendimiento['publicaciones'] as $publicacione){
                        $public=$public+1;
                }
                $public;
        
                $seguidores=0;
                foreach($followers as $follower){
                    if($follower['emprendimiento_id'] == $emprendimiento['id']){
                        $seguidores=$seguidores+1;
                    }
                }
                $seguidores;
        
                $seguidos=0;
                foreach($followers as $follower){
                    if($follower['user_id'] == $user['id']){
                        $seguidos=$seguidos+1;
                    }
                }
                $seguidos;


                return view('perfilemp', compact('emprendimiento', 'public', 'seguidores', 'seguidos'));
            }else{
                $emp = 1;
            }
        }
        if($emp == 1){
            return redirect()->route('emprendimientos.create');
        }

    }

    public function cuenta($id){

        $emprendimiento = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos/'. $id.'?included=user,publicaciones');
        $emprendimiento = $emprendimiento->json();

        $followers = Http::get('http://localhost/api.bizsett/public/v1/followers');
        $followers = $followers->json();

        $user = $emprendimiento['user'];

        $public=0;
        foreach($emprendimiento['publicaciones'] as $publicacione){
                $public=$public+1;
        }
        $public;

        $seguidores=0;
        foreach($followers as $follower){
            if($follower['emprendimiento_id'] == $emprendimiento['id']){
                $seguidores=$seguidores+1;
            }
        }
        $seguidores;

        $seguidos=0;
        foreach($followers as $follower){
            if($follower['user_id'] == $user['id']){
                $seguidos=$seguidos+1;
            }
        }
        $seguidos;

        return view('cuenta', compact('emprendimiento', 'public', 'seguidores', 'seguidos', 'followers'));

    }

}
