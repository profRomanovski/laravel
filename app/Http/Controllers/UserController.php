<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uerInfo()
    {
        $name = 'Roma';
        $year = '18';
        $status = 'student';
        return view("user", compact('name', 'year', 'status'));
    }
}
