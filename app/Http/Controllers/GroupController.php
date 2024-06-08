<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index() {
        $groupName = 'Math Club';
        $imageUrl = 'https://media.licdn.com/dms/image/C4E12AQEYBRrthY2U_A/article-cover_image-shrink_600_2000/0/1594363873051?e=2147483647&v=beta&t=6_TpuyFJ49-TaXp0Wt8ruOHRDHnbpQgxSNlWElTvMps';

        return view('group.group', compact('groupName', 'imageUrl'));
    }

    public function showGroup($name) {

        return view('group.show_group');
    }
}
