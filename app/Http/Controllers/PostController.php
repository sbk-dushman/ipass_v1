<?php

namespace App\Http\Controllers;

use App\FakeWorker;
use App\Group;
use App\Student;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addWorker(Request $request)
    {
        $name = $request->name;
        $surname = $request->surname;
        $lastname = $request->lastname;
        $position = $request->position;
        $photo = $request->photo;

        FakeWorker::insert([
            'name' => $name,
            'surname' => $surname,
            'lastname' => $lastname,
            'position' => $position,
            'photo' => $photo
        ]);
    }

    public function getGroups()
    {
        
    }

    public function getGroupList($groupname, Request $request)
    {
        $group_list = Student::where('group_id', '17is2');
        return $group_list;
    }

    
}
