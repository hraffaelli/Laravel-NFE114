<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{

    public function index()
    {
        $profiles = DB::table('users')->join('users_statuts', 'users.statut', '=', 'users_statuts.id')->select('users.id', 'users.name', 'users.email', 'users_statuts.libelle')->get();
        $is_Coach = $this->isCoach();
        return view('profile.index', compact('profiles', 'is_Coach'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $is_Coach = $this->isCoach();
        $statuts = DB::table('users_statuts')->select('users_statuts.id', 'users_statuts.libelle')->get();


        return view('profile.edit', compact('is_Coach', 'statuts'), [
            'user' => $request->user(),
        ]);
    }

    public function edit_multi($id)
    {
        $is_Coach = $this->isCoach();
        $statuts = DB::table('users_statuts')->select('users_statuts.id', 'users_statuts.libelle')->get();
        $user = User::find($id);
        // Vérifier si l'utilisateur a le statut approprié (1 pour Coach)
        return view('profile.edit-multi', compact('user', 'is_Coach', 'statuts'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function update_multi(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'statut' => 'required',
        ]);
        $user = User::find($id);
        $user->update($validatedData);

        return redirect()->route('profile.index');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function destroy_multi(User $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('profile.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('profile.index')
            ->with('success', 'profile deleted successfully');
    }

    public function create(): View
    {
        $statuts = DB::table('users_statuts')->select('users_statuts.id', 'users_statuts.libelle')->get();

        return view('profile.create', compact('statuts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'statut' => ['required', 'integer'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'statut' => $request->statut,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Profile created successfully.');
    }

    public function isCoach()
    {
        $id = Auth::id();
        $statut = DB::table('users')
            ->where('id', $id)
            ->select('statut')
            ->first();
        if ($statut->statut == 2) {
            return true;
        } else {
            return false;
        }
    }
}
