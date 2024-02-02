<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Seance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ParticipantController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_seance' => 'required',
            'id_user' => 'required',
            'id_poste_rameur' => 'required',
        ]);
        Participant::create($request->all());
        return redirect()->route('seances.index')
            ->with('success', 'Participant created successfully.');
    }

    public function create()
    {
        $seances = Seance::all();
        $id = Auth::id();
        return view('seances.index', compact('seances', 'id'));
    }

    public function getRameurPoste()
    {
        $result = DB::table('poste_rameurs')->get();
        return $result;
    }

    public function getRameurPosteById($id_user, $id_seance)
    {
        $result = DB::table('poste_rameurs')
            ->join('participants', 'poste_rameurs.id', '=', 'participants.id_poste_rameur')
            ->where('participants.id_user', $id_user)
            ->where('participants.id_seance', $id_seance)
            ->select('poste_rameurs.libelle')
            ->first();

        if ($result !== null) {
            return $result->libelle;
        } else {
            // Handle the case when $result is null
            return null; // Or any other value or action you want
        }
    }
}
