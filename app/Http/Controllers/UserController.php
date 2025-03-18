<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        // return view('users.index', compact('users'));
        return  compact('users');
    }

    public function order(Request $request, $order)
{
    
    $users = User::orderBy('name', $order)->get();

    return view('users.index', compact('users'));
}
}
