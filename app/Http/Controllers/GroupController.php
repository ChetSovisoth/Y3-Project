<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GroupController extends Controller
{
    public function index() {
        return view('group.group');
    }

    public function showGroup($name, $uuid) {

        return view('group.group_inside_layout', compact('name', 'uuid'));
    }

    public function showGroupDetail($name, $uuid) {

        return view('group.group_detail', compact('name', 'uuid'));
    }

    public function showGroupnote($name, $uuid) {

        return view('group.group_note', compact('name', 'uuid'));
    }

    public function showGroupUploads($name, $uuid) {

        return view('group.group_uploads', compact('name', 'uuid'));
    }

    public function displayGroup() {
        $groups = Group::get();
        return view('admin.display_group', compact('groups'));
    }

}
