<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        // Vérifier si l'utilisateur a le statut approprié (1 pour Coach)
        if (auth()->user()->statut != 1) {
            abort(403, 'Accès non autorisé');
        }
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'statut' => 'required',
        ]);

        // Vérifier si l'e-mail existe déjà dans la base de données
        $existingUser = User::where('email', $validatedData['email'])->first();

        if ($existingUser) {
            // L'utilisateur avec cette adresse e-mail existe déjà
            return redirect()->route('users.create')->with('error', 'Cet utilisateur existe déjà.');
        }

        // Créer l'utilisateur s'il n'existe pas déjà
        $user = User::create($validatedData);

        // Rediriger vers la liste des utilisateurs ou une autre page appropriée
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit(User $user)
    {
        // Vérifier si l'utilisateur a le statut approprié (1 pour Coach)
        if (auth()->user()->statut != 1) {
            abort(403, 'Accès non autorisé');
        }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'statut' => 'required',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
