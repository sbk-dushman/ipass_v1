<?php

namespace App\Http\Controllers;

use App\Group;
use App\Selected;
use App\Student;
use Illuminate\Foundation\Console\Presets\Vue;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function group()
    {
        $groups = Group::paginate(2);
        // dd($group);

        return view('home', compact('groups'));
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

    public function getTableList($group_id = null)
    {
        $students = Student::where('group_id', $group_id)->get();
        $groups = Group::paginate(2);
        $arr = [];
        $arr = 0;
        $selected = Selected::get();
        foreach( Student::get() as $x ) {
            foreach( Selected::get() as $y ) {
                if( $x->name == $y->name && $x->surname == $y->surname && $x->lastname == $y->lastname && $x->group_id == $y->group ) {
                    $arr = [ 
                        'name' => $x->name,
                        'surname' => $x->surname,
                        'lastname' => $x->lastname,
                        'group_id' => $x->group_id
                    ];
                }
            }
        }
        dump($arr);
        return view('tabelGroup',compact('students', 'groups', 'selected'));
    }
}
