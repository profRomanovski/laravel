<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminInfo()
    {
        $roles = [
            'Create new user',
            'Edit users',
            'Edit post',
            'Make a new posts',
            'Create new admin user'
        ];
        return view('admin', compact('roles'));
    }
}
