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
    public function group($group_id = null, Selected $addStatus)
    {
        $students = Student::where('group_id', $group_id)->get();
        $groups = Group::get();
        return view('ready.group', compact('students', 'groups', 'addStatus'));
    }

    public function groupAdd($group_id = null, Request $request)
    {
        $data = $request->add_to_cart;
        $StudName = Student::where('id', $data)->value('name');
        $StudSurname = Student::where('id', $data)->value('surname');
        $StudLastname = Student::where('id', $data)->value('lastname');
        $StudGroup = Student::where('id', $data)->value('group');
        $StudStudId = Student::where('id', $data)->value('id');
        $issetName = Selected::where([
            'name' => $StudName,
            'surname' => $StudSurname,
            'lastname' => $StudLastname,
            'group' => $StudGroup,
            'stud_id' => $StudStudId
        ])->value('id');
        if( $issetName == true ) {
            return redirect()->back();
        }else {
            DB::table('selecteds')->insert([
                'name' => $StudName,
                'surname' => $StudSurname,
                'lastname' => $StudLastname,
                'group' => $StudGroup,
                'stud_id' => $StudStudId
            ]);
            return redirect()->back();
        }
    }

    public function selected()
    {
        $selecteds = Selected::get();
        return view('ready.selected-section', compact('selecteds'));
    }

    public function selectedPost(Request $request)
    {
        if( $request->ajax() ) {
            if( $request->studid ) {
                $studId = $request->studid;
                Selected::where('id', $studId)->delete();
            }
            elseif( $request->data || $request->workerireset ) {
                $workerid = $request->workerireset;
                $surname = $request->data[0]['surname'];
                $name = $request->data[0]['name'];
                $lastname = $request->data[0]['lastname'];
                $position = $request->data[0]['position'];
                DB::table('selecteds')->where('id', $workerid)->update([
                    'surname' => trim($surname),
                    'name' => trim($name),
                    'lastname' => trim($lastname),
                    'position' => trim($position)
                ]);
            }
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
            if( $request->workeriddelete ) {
                $workeriddelete = $request->workeriddelete;
                Worker::where('id', $workeriddelete)->delete();
            }
            elseif( $request->workerid ){
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
}
