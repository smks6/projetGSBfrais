<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VisiteurService;

class VisiteurController extends Controller
{

    public function auth(Request $request)
    {
        $login=$request->input('login');
        $pwd=$request->input('pwd');

        $service=new VisiteurService();
        if ($service->signIn($login,$pwd)) {
            return redirect(url('/'));
        }else{
            $erreur="Identifiant ou mot de passe incorrect";
            return view('/formLogin',compact('erreur'));
        }
    }
    public function login()
    {
        return view('formLogin');
    }

    public function logout(){
        $visiteur=new VisiteurService();
        $visiteur->signOut();
        return view('home');
    }
}
