<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Note;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GroupController extends Controller
{
    public function index()
    {
        return view('group.group');
    }

    public function showGroup($name, $uuid)
    {

        return view('group.group_inside_layout', compact('name', 'uuid'));
    }

    public function showGroupDetail($name, $uuid)
    {

        return view('group.group_detail', compact('name', 'uuid'));
    }

    public function deleteGroup($name, $uuid)
    {
        $group = Group::where("uuid", $uuid)->first();
        $group->delete();

        return redirect()->route('group');
    }

    public function showGroupNote($name, $uuid)
    {
        $group = Group::where('uuid', $uuid)->firstOrFail();
        $notes = Note::where('group_id', $group->id)->get();
        return view('group.group_note', compact('name', 'uuid', 'notes', 'group'));
    }


    public function showGroupUploads($name, $uuid)
    {
        $group = Group::where('uuid', $uuid)->firstOrFail();
        $uploads = Upload::where('group_id', $group->id)->get();
        return view('group.group_uploads', compact('name', 'uuid', 'uploads', 'group'));
    }


    public function displayGroup()
    {
        $groups = Group::get();
        return view('admin.display_group', compact('groups'));
    }
}
