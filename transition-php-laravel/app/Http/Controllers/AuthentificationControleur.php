<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthentificationControleur extends Controller
{
    public function loginview()
    {
        return view('authentification.login');
    }
    public function traitementLogin(Request $request)
    {
        $mdp = $request->input('password');
        $email = $request->input('email');
        $utilisateur = Utilisateur::where('email', $email)->first();
        $estValide = password_verify($mdp, $utilisateur->password);

        if ($estValide) {
        $request->session()->put('user', $utilisateur);
        return redirect('/pong');
        } else {
            return redirect('/connexion')->with('error', 'Identifiants incorrects');
        }
    }
    public function registerView()
    {
        return view('authentification.register');
    }
    public function traitementRegister(Request $request)
    {
        $mdp = $request->input('password');
        $hash = password_hash($mdp, PASSWORD_DEFAULT);

        $utilisateur=new Utilisateur();
        $utilisateur->name=$request->input('name');
        $utilisateur->email=$request->input('email');
        $utilisateur->password=$hash;
        $utilisateur->save();

        return redirect('/connexion')->with('succes', 'inscription réussie');

    }

}
