<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function index($uuid)
    {
        $group = Group::where('uuid', $uuid)->firstOrFail();
        $notes = Note::where('group_id', $group->id)->get();
        return view('note.index', compact('notes', 'group'));
    }

    public function create($uuid)
    {
        $group = Group::where('uuid', $uuid)->firstOrFail();
        return view('note.create', compact('group'));
    }

    public function store(Request $request, $uuid)
    {
        $group = Group::where('uuid', $uuid)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Note::create([
            'uuid' => Str::uuid(),
            'group_id' => $group->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // redirect to group/{name}/{uuid}/notes
        return redirect()->route('group.notes', ["name" => Group::where("uuid", $uuid)->first()->name, "uuid" => $uuid])->with('success', 'Note created successfully.');
    }

    public function edit(Note $note)
    {
        $this->authorize('update', $note); // Ensure proper authorization
        $groups = Group::all();
        return view('note.edit', compact('note', 'groups'));
    }

    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note); // Ensure proper authorization

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('group.notes', ["name" => Group::where("uuid", $note->group->uuid)->first()->name, "uuid" => $note->group->uuid])->with('success', 'Note created successfully.');
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note); // Ensure proper authorization
        $note->delete();

        return redirect()->route('group.notes', ["name" => Group::where("uuid", $note->group->uuid)->first()->name, "uuid" => $note->group->uuid])->with('success', 'Note created successfully.');
    }
}
