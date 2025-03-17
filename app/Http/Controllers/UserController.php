<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        // Passa gli utenti alla vista 'users.index'
        // return view('users.index', compact('users'));
        return  compact('users');
    }

    public function order(Request $request, $order)
{
    // Ottieni gli utenti ordinati per nome in ordine crescente
    $users = User::orderBy('name', $order)->get();

    // Restituisci la vista e passa i dati degli utenti
    return view('users.index', compact('users'));
}
}
