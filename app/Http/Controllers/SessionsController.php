<?php

namespace App\Http\Controllers;

use App\Models\Emprendimiento;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class SessionsController extends Controller
{
    public function index(){
    return view('auth.login');
    }

    public function store(Request $request){
       

        if(auth()->attempt(request(['email', 'password']))==false ){
            return back()->withErrors([
                'message' => 'El correo o la contraseña son incorrectos'
            ]);
        }

        // $user = Http::post('http://localhost/api.bizsett/public/v1/login', $request);

        // return $user;

        // if($user == false ){
        //     return back()->withErrors([
        //         'message' => 'El correo o la contraseña son incorrectos'
        //     ]);
        // }

        // auth()->$user->only('email', 'password');
        

        if(auth()->user()->tipopersona_id == '1'){
            return redirect()->route('home');
        } else{
            return redirect()->route('users.index');
        }
        
       // return redirect()->route('home');
        
    } 

   

    public function destroy(){
        auth()->logout();
        return redirect()->route('home');
    }
}
