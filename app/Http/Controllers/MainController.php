<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $group = Group::with('group')->get();
        // dd($group);
        return view('home');
    }
    public function Cardorder ()
    {
          return view('cardOrder');
    }
}
