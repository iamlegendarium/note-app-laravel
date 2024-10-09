<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index()
{
    // Fetch notes for the authenticated user
    $notes = Auth::user()->notes; // OR Note::where('user_id', Auth::id())->get();
    
    return view('dashboard', compact('notes'));
}

}
