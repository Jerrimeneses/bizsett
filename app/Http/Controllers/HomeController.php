<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Empleo;
use App\Models\Emprendimiento;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use App\Models\Publicacione;
use App\Models\Reaccione;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function __invoke(){

        $emprendimientos = Http::get('http://localhost/api.bizsett/public/v1/emprendimientos');
        $emprendimientos = $emprendimientos->json();

        $publicaciones = Http::get('http://localhost/api.bizsett/public/v1/publicaciones?included=emprendimiento.user,reacciones.user,comentarios.user');
        $publicaciones = $publicaciones->json();
        
        $publicaciones = collect($publicaciones);
        $publicaciones = $publicaciones->sortByDesc('id');

        $reacciones = Http::get('http://localhost/api.bizsett/public/v1/reacciones');
        $reacciones = $reacciones->json();

        return view('home', compact('publicaciones', 'emprendimientos', 'reacciones'));

    }


    
    public function panel(){

        return view('layouts.dashboard');
    }

}
