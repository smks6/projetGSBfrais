<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    public function login()
    {
        return view('formLogin');
    }
}
