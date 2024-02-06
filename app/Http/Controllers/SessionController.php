<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Session;
use App\Models\User;

class SessionController extends Controller
{
    public function liste_session()
    {
        $sessions = Session::all();
        return view('session.liste', compact('sessions'));
    }

    public function ajouter_session()
    {
        return view('session.ajouter');
    }

    public function ajouter_session_traitement(Request $request)
    {
        $request->validate([
            'date_session' => 'required',
            'heure_session' => 'required'
        ]);



        $sessions= new Session();
        $sessions->date_session = $request -> nom;
        $sessions->heure_session = $request -> pre;
        $sessions->valide = $request -> valide;
        $sessions->save();

        return redirect('/ajouter-session')->with('status','Session rajouter avec succes');
    }


    public function modifier_session($id)
    {
        $sessions = Session::find($id);

        return view('session.modifier', compact('sessions'));
    }

    public function modifier_session_traitement(Request $request)
    {
        $request->validate([
            'date_session' => 'required',
            'heure_session' => 'required'
        ]);

        $sessions= Session::find($request -> id);
        $sessions->date_session = $request -> nom;
        $sessions->heure_session = $request -> pre;
        $sessions->valide = $request -> valide;
        $sessions->update();

        return redirect('/session')->with('status','Session modifier avec succes');
    }

    public function supprimer_session($id)
    {
        $session = Session::find($id);
        $session->delete();

        return redirect('/session')->with('status','Session supprimer avec succes');

    }

}
