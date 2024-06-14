<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function index($uuid)
    {
        $group = Group::where('uuid', $uuid)->firstOrFail();
        $uploads = Upload::where('group_id', $group->id)->get();
        return view('upload.index', compact('uploads', 'group'));
    }

    public function create($uuid)
    {
        $group = Group::where('uuid', $uuid)->firstOrFail();
        return view('upload.create', compact('group'));
    }

    public function store(Request $request, $uuid)
    {
        $group = Group::where('uuid', $uuid)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file',
        ]);

        $filePath = $request->file('file')->store('uploads', 'public');

        Upload::create([
            'group_id' => $group->id,
            'title' => $request->title,
            'file_path' => $filePath,
        ]);

        return redirect()->route('group.uploads', [$group->name, $group->uuid])->with('success', 'File uploaded successfully.');
    }

    public function edit(Upload $upload)
    {
        $this->authorize('update', $upload); // Ensure proper authorization
        return view('upload.edit', compact('upload'));
    }

    public function update(Request $request, Upload $upload)
    {
        $this->authorize('update', $upload); // Ensure proper authorization

        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file',
        ]);

        // Check if a new file has been uploaded
        if ($request->hasFile('file')) {
            // Delete the old file
            Storage::delete($upload->file_path);

            // Store the new file
            $filePath = $request->file('file')->store('uploads', 'public');
        } else {
            // Use the existing file path
            $filePath = $upload->file_path;
        }

        $upload->update([
            'title' => $request->title,
            'file_path' => $filePath,
        ]);

        return redirect()->route('group.uploads', [$upload->group->name, $upload->group->uuid])->with('success', 'File updated successfully.');
    }

    public function destroy(Upload $upload)
    {
        $this->authorize('delete', $upload); // Ensure proper authorization

        // Delete the file from storage
        Storage::delete($upload->file_path);

        $upload->delete();

        return redirect()->route('group.uploads', [$upload->group->name, $upload->group->uuid])->with('success', 'File deleted successfully.');
    }

    public function download(Upload $upload)
    {
        return Storage::download('public/' . $upload->file_path);
    }
}
