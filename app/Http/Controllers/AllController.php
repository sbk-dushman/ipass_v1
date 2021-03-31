<?php

namespace App\Http\Controllers;

use App\Group;
use App\Selected;
use App\Student;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllController extends Controller
{
    public function group($group_id = null)
    {
        $students = Student::where('group_id', $group_id)->get();
        $groups = Group::get();
        return view('ready.group', compact('students', 'groups'));
    }

    public function groupAdd($group_id = null, Request $request)
    {
        $data = $request->add_to_cart;
        $StudName = Student::where('id', $data)->value('name');
        $StudSurname = Student::where('id', $data)->value('surname');
        $StudLastname = Student::where('id', $data)->value('lastname');
        $StudGroup = Student::where('id', $data)->value('group');
        $StudGroupId = Student::where('id', $data)->value('group_id');
        $issetName = Selected::where([
            'name' => $StudName,
            'surname' => $StudSurname,
            'lastname' => $StudLastname,
            'group' => $StudGroup
        ])->value('id');
        if( $issetName == true ) {
            return redirect()->back();
        }else {
            DB::table('selecteds')->insert([
                'name' => $StudName,
                'surname' => $StudSurname,
                'lastname' => $StudLastname,
                'group' => $StudGroup,
                'group_id' => $StudGroupId
            ]);
            return redirect()->back();
        }
    }

    public function selected()
    {
        $selecteds = Selected::get();
        return view('ready.selected', compact('selecteds'));
    }

    public function selectedPost(Request $request)
    {
        if( $request->ajax() ) {
            $studId = $request->studid;
            Selected::where('id', $studId)->delete();
        }
    }

    public function workers()
    {
        $workers = Worker::get();
        return view('ready.workers', compact('workers'));
    }

    public function workersAdd(Request $request)
    {
        if( $request->ajax() ) {
            $data = $request->workerid;
            
            $StudName = Worker::where('id', $data)->value('name');
            $StudSurname = Worker::where('id', $data)->value('surname');
            $StudLastname = Worker::where('id', $data)->value('lastname');
            $StudPosition = Worker::where('id', $data)->value('position');
            $issetName = Selected::where([
                'name' => $StudName,
                'surname' => $StudSurname,
                'lastname' => $StudLastname,
                'position' => $StudPosition
            ])->value('id');
            // dd(1);
            if( $issetName ) {
                return 1;
            }else {
                DB::table('selecteds')->insert([
                    'name' => $StudName,
                    'surname' => $StudSurname,
                    'lastname' => $StudLastname,
                    'position' => $StudPosition
                ]);
                // return redirect()->back();
            }
        }
    }
}
