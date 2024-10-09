<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Show dashboard with notes
    public function index()
    {
        // Fetch notes for the authenticated user
        $notes = Note::where('user_id', Auth::id())->get();
        return view('dashboard', compact('notes'));
    }

    // Store a new note
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // Create the note
        Note::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Note created successfully');
    }

    // Edit an existing note
    public function edit($id)
    {
        $note = Note::where('user_id', Auth::id())->findOrFail($id); // Ensure you fetch by user_id
        return view('edit-note', compact('note'));
    }

    // Update the note
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $note = Note::where('user_id', Auth::id())->findOrFail($id);
        $note->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard')->with('success', 'Note updated successfully');
    }

    // Delete the note
    public function destroy($id)
    {
        $note = Note::where('user_id', Auth::id())->findOrFail($id);
        $note->delete();

        return redirect()->route('dashboard')->with('success', 'Note deleted successfully');
    }
}
