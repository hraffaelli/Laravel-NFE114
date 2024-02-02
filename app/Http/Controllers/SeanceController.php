<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\Seance;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participantStatus = [];
        $is_Max_User = [];
        $is_Poste_Rameur = [];

        $id = Auth::id();
        $seances = Seance::all();
        $profileController = new ProfileController();
        $participantController = new ParticipantController();

        $postes = $participantController->getRameurPoste();
        $is_Coach = $profileController->isCoach();

        foreach ($seances as $seance) {
            $participantStatus[$seance->id] = $this->verifyParticipant($seance->id);
        }
        foreach ($seances as $seance) {
            $is_Max_User[$seance->id] = $this->isMaxUser($seance->id);
        }
        foreach ($seances as $seance) {
            $is_Poste_Rameur[$seance->id] = $participantController->getRameurPosteById($id, $seance->id);
        }

        return view('seances.index', compact('seances', 'id', 'participantStatus', 'is_Coach', 'is_Max_User', 'postes', 'is_Poste_Rameur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'lieu' => 'required',
            'horaire' => 'required',
            'max_users' => 'required',
        ]);
        Seance::create($request->all());
        return redirect()->route('seances.index')
            ->with('success', 'Seance created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seance = Seance::find($id);

        return view('seances.show', compact('seance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required',
            'lieu' => 'required',
            'horaire' => 'required',
            'max_users' => 'required',
        ]);

        $seance = Seance::find($id);
        $seance->update($request->all());

        return redirect()->route('seances.index')
            ->with('success', 'seance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seance = Seance::find($id);
        $seance->delete();
        DB::table('participants')->where('id_seance', '=', $id)->delete();

        return redirect()->route('seances.index')
            ->with('success', 'Seance deleted successfully');
    }

    public function create()
    {
        return view('seances.create');
    }

    public function edit($id)
    {
        $seance = Seance::find($id);

        return view('seances.edit', compact('seance'));
    }

    public function addParticipant(Request $request, $id_seance)
    {

        $poste = $request->input('poste');
        $id = Auth::id();
        Participant::create([
            'id_seance' => $id_seance,
            'id_user' => $id,
            'id_poste_rameur' => $poste,
        ]);
        return $this->index();
    }

    public function deleteParticipant($id_seance)
    {
        $id = Auth::id();
        DB::table('participants')
            ->where('id_seance', $id_seance)
            ->where('id_user', $id)
            ->delete();

        return $this->index();
    }

    public function verifyParticipant($id_seance)
    {
        $id = Auth::id();
        $result = DB::table('participants')
            ->where('id_seance', $id_seance)
            ->where('id_user', $id)
            ->get();

        return $result->isEmpty() ? 0 : 1;
    }

    public function isMaxUser($id_seance)
    {
        $result = DB::table('participants')
            ->where('id_seance', $id_seance)
            ->count();

        return $result;
    }

    public function showParticipants($id_seance)
    {
        $result = DB::table('users')
            ->join('participants', 'users.id', '=', 'participants.id_user')
            ->join('seances', 'participants.id_seance', '=', 'seances.id')
            ->join('poste_rameur', 'participants.id_poste_rameur', '=', 'poste_rameurs.id')
            ->where('id_seance', $id_seance)
            ->select('users.name', 'poste_rameurs.libelle')
            ->get();

        return $result;
    }
}
