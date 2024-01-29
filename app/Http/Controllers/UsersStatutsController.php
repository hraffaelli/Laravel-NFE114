<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersStatutsController extends Controller
{
    public function getAllStatuts()
    {
        $results = DB::table('users_statuts')
            ->pluck('libelle', 'id')
            ->all();

        return $results;
    }
}


