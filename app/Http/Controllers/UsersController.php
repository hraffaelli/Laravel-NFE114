<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersStatuts;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersStatutsController;

class UsersController extends Controller
{
    public function index()
    {
    //    $usersStatutController = new UsersStatutsController();
      //  $usersStatut = [];
       // $users = User::all();
       // foreach($users as $user){
         //   $usersStatut[$user->id] = $usersStatutController->getAllStatuts();

        //}
       // return view('users.index', compact('users', 'usersStatut'));
        $users = User::all();
        $usersStatutsController = new UsersStatutsController();
        $usersStatuts = $usersStatutsController->getAllStatuts();

        return view('users.index', compact('users', 'usersStatuts'));

    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required',
            'statut' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Créer un nouvel utilisateur
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'statut' => $request->statut,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required',
            'statut' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',

        ]);

        // Mettre à jour l'utilisateur
        $user->update([
            'name' => $request->name,
            'statut' => $request->statut,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function destroy(User $user)
    {
        // Supprimer l'utilisateur
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
