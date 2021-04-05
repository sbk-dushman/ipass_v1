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
                $name_s = Selected::where('id', $workerid)->value('name');                
                $surname_s = Selected::where('id', $workerid)->value('surname');               
                $lastname_s = Selected::where('id', $workerid)->value('lastname');              
                $position_s = Selected::where('id', $workerid)->value('position');
                
                $surname_w = Worker::where('surname', $surname_s);
                $name_w = Worker::where('name', $name_s);
                $lastname_w = Worker::where('lastname', $lastname_s);
                $position_w = Worker::where('position', $position_s);
                
                $id_w = Worker::where([
                    'name' => trim($name_w),
                    'surname' => trim($surname_w),
                    'lastname' => trim($lastname_w),
                    'position' => trim($position_w)
                ])->value('id');
                // dd($id_w);
                DB::table('workers')->where('id', $id_w)->update([
                    'surname' => trim($surname),
                    'name' => trim($name),
                    'lastname' => trim($lastname),
                    'position' => trim($position)
                ]);

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
                $StudPhoto = Worker::where('id', $data)->value('photo');
                $issetName = Selected::where([
                    'name' => $StudName,
                    'surname' => $StudSurname,
                    'lastname' => $StudLastname,
                    'position' => $StudPosition,
                    'photo' => $StudPhoto
                ])->value('id');
                // dd(1);
                if( $issetName ) {
                    return 1;
                }else {
                    DB::table('selecteds')->insert([
                        'name' => $StudName,
                        'surname' => $StudSurname,
                        'lastname' => $StudLastname,
                        'position' => $StudPosition,
                        'photo' => $StudPhoto
                    ]);
                    // return redirect()->back();
                }
            }
        }
    }

    public function getPrint()
    {
        return view('print');
    }

    public function search()
    {
        return view('ready.search');
    }

    public function searchPost(Request $request)
    {
        // dd($request->all());
        $data = trim($request->search);
            $resultsStud = Student::where('name', 'LIKE', '%' . $data . '%')
                                ->orWhere('surname', 'LIKE', '%' . $data . '%')
                                ->orWhere('lastname', 'LIKE', '%' . $data . '%')
                                ->orWhere('group', 'LIKE', '%' . $data . '%')
                                ->orderBy('surname', 'ASC')
                                ->get();
            $resultsWork = Worker::where('name', 'LIKE', '%' . $data . '%')
                                ->orWhere('surname', 'LIKE', '%' . $data . '%')
                                ->orWhere('lastname', 'LIKE', '%' . $data . '%')
                                ->orWhere('position', 'LIKE', '%' . $data . '%')
                                ->orderBy('surname', 'ASC')
                                ->get();
        return redirect()->route('search')->with(['resultsStud' => $resultsStud, 'resultsWork' => $resultsWork]);
    }
}
