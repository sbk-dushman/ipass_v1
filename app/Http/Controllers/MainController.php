<?php

namespace App\Http\Controllers;

use App\Group;
use App\Selected;
use App\Student;
use Illuminate\Foundation\Console\Presets\Vue;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

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
        $datas = Selected::get();
        return view('selected', compact('datas'));
    }

    public function postSelected(Request $request)
    {
        if( $request->ajax() ) {
            $studId = $request->studid;
            Selected::where('id', $studId)->delete();
        }
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
        // dump($arr);
        return view('tabelGroup',compact('students', 'groups', 'selected'));
    }

    public function postTableList(Request $request)
    {
        $data = $request->add_to_cart;
        $StudName = Student::where('id', $data)
                                ->value('name');
        $StudSurname = Student::where('id', $data)
                                ->value('surname');
        $StudLastname = Student::where('id', $data)
                                ->value('lastname');
        $StudGroup = Student::where('id', $data)
                                ->value('group_id');
        $issetName = Selected::where([
            'name' => $StudName,
            'surname' => $StudSurname,
            'lastname' => $StudLastname
        ])->value('id');

        // dd($issetName);
        if( $issetName == true ) {
            // dump(1);
            return redirect()->back();
        }else {
            DB::table('selecteds')->insert([
                'name' => $StudName,
                'surname' => $StudSurname,
                'lastname' => $StudLastname,
                'group' => $StudGroup
            ]);
        }
        return redirect()->back();
    }

    public function getPrint(Request $request)
    {
        $datas = Selected::get();
        $datass = Selected::find('id');
        $mass = [];
        foreach( $datas as $data ) {
            $mass = Arr::prepend($mass,$data->id);
        }
        $mass = Arr::sortRecursive($mass);
        $select = $request->all($mass);

        $months = [
            '01' => 'января',
            '02' => 'февраля',
            '03' => 'марта',
            '04' => 'апреля',
            '05' => 'мая',
            '06' => 'июня',
            '07' => 'июля',
            '08' => 'августа',
            '09' => 'сентября',
            '10' => 'октября',
            '11' => 'ноября',
            '12' => 'декабря'
        ];
        $dateNow = $months[Date::now()->format('m')];
        return view('print', compact('datas', 'dateNow', 'select'));
    }

    public function workerEdit()
    {
        $datas = Selected::get();
        return view('workeredit', compact('datas'));
    }
}
