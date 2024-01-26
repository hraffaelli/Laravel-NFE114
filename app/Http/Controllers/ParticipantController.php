<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Seance;
use Illuminate\Support\Facades\Auth;


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
}
