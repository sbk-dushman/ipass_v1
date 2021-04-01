<?php

namespace App\Http\Controllers;

use App\Group;
use App\Selected;
use App\Student;
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
        // dd($request->add_to_cart);
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

    public function selectedPost()
    {
        dd(1);
    }

    public function workers()
    {
        return view('ready.workers');
    }
}
