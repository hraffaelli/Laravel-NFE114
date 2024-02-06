<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Rameur;
use App\Models\User;

class RameurController extends Controller
{
    public function liste_rameur()
    {
        $rameurs = Rameur::all();
        return view('rameur.liste', compact('rameurs'));
    }

    public function ajouter_rameur()
    {
        return view('rameur.ajouter');
    }

    public function ajouter_rameur_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'pre' => 'required',
            'age' => 'required|numeric',
            'email' => 'required|email',
            'tel' => 'required',
            'niv' => 'required'
        ]);

        // Créer un nouvel utilisateur
        $user = new User();
        $user->name = $request -> nom;
        $user->email = $request -> email;
        $motDePasseAleatoire = Str::random(10);
        $user->password = Hash::make($motDePasseAleatoire);
        // Ajoutez d'autres attributs d'utilisateur si nécessaire...
        $user->save();


        $rameurs= new Rameur();
        $rameurs->id_user_fk = $user -> id;
        $rameurs->nom = $request -> nom;
        $rameurs->pre = $request -> pre;
        $rameurs->age = $request -> age;
        $rameurs->email = $request -> email;
        $rameurs->tel   = $request -> tel;
        $rameurs->niv   = $request -> niv;
        $rameurs->save();

        return redirect('/ajouter')->with('status','Rameur creer avec succes');
    }


    public function modifier_rameur($id)
    {
        $rameurs = Rameur::find($id);

        return view('rameur.modifier', compact('rameurs'));
    }

    public function modifier_rameur_traitement(Request $request)
    {
        $request->validate([
            'id_user_fk' => 'required',
            'nom' => 'required',
            'pre' => 'required',
            'age' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'niv' => 'required'
        ]);


        $rameurs= Rameur::find($request -> id);
        $rameurs->id_user_fk = $request -> id_user_fk;
        $rameurs->nom = $request -> nom;
        $rameurs->pre = $request -> pre;
        $rameurs->age = $request -> age;
        $rameurs->email = $request -> email;
        $rameurs->tel   = $request -> tel;
        $rameurs->niv   = $request -> niv;
        $rameurs->update();

        return redirect('/rameur')->with('status','Rameur modifier avec succes');
    }

    public function supprimer_rameur($id)
    {
        $rameurs = Rameur::find($id);
        $rameurs->delete();

        return redirect('/rameur')->with('status','Rameur supprimer avec succes');

    }

}
