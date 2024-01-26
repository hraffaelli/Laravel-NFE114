<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\Seance;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profileController = new ProfileController();
        $seances = Seance::all();
        $id = Auth::id();
        $is_Coach = $profileController->isCoach();
        // Call the verifyParticipant function to determine if the user is a participant for each Seance
        $participantStatus = [];
        foreach ($seances as $seance) {
            $participantStatus[$seance->id] = $this->verifyParticipant($seance->id);
        }

        $is_Max_User = [];
        foreach ($seances as $seance) {
            $is_Max_User[$seance->id] = $this->isMaxUser($seance->id);
        }

        return view('seances.index', compact('seances', 'id', 'participantStatus', 'is_Coach', 'is_Max_User'));
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

    public function addParticipant($id_seance)
    {
        $id = Auth::id();
        Participant::create([
            'id_seance' => $id_seance,
            'id_user' => $id,
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
}
