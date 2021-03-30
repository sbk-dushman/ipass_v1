<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function group()
    {
        $group = Group::with('group')->get();
        // dd($group);
        return view('home');
    }
    public function Cardorder ()
    {
          return view('cardOrder');
    }

    public function search()
    {
        return view('search');
    }

    public function selected()
    {
        return view('selected');
    }
}
