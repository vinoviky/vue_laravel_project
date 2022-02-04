<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       return view('home');

    }
}
