<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoControleur extends Controller
{
    public function todolist()
    {
        $valeursEnBase = Todo::all();
        return view('todolist', ['ValeursBase' => $valeursEnBase]);
    }
    public function addtodo(Request $request){
        // $request contient l'ensemble des données envoyées par le formulaire
        // request()->all() retourne un tableau associatif avec l'ensemble des données
        Todo::create($request->all());
        return redirect("/todolist");
      }
      public function mark($id){
        $todo = Todo::find($id);

// Le passer à terminer
        $todo->termine = !$todo->termine;

// Le sauvegarder en base de données. (Ici Eloquent va générer une requête de type UPDATE)
        $todo->save();
        return redirect("/todolist");
      }
}
