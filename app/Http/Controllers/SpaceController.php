<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaceController extends Controller
{
    //
    public function index($id = 0)
    {
        return view('space.index');
    }
}
