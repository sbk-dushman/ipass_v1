<?php

namespace App\Http\Controllers;

use App\FakeSearch;
use App\FakeWorker;
use App\Group;
use App\Selected;
use App\Student;
use App\Worker;
use Illuminate\Bus\Dispatcher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
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
        $selecteds = Selected::paginate(16);
        $count = 1;
        return view('ready.selected-section', compact('selecteds', 'count'));
    }

    public function selectedPost(Request $request)
    {
        if( $request->ajax() ) {
            if( $request->studid ) {
                $studId = $request->studid;
                Selected::where('id', $studId)->delete();
            }
            elseif( $request->data && $request->workerireset ) {
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
            elseif( $request->select_val && $request->workid) {

                DB::table('selecteds')->where('id', $request->workid)->update([
                    'shablon' => $request->select_val
                ]);
                // return $request->workid;
            }
        }
        dd($request->all());
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
            elseif( $request->worker_id ) {
                $data = Worker::where('id', $request->worker_id)->get();
                return $data;
            }
            elseif ( $request->workerrid && $request->select ) {
                // return Selected::where('id', $request->workerrid)->get();
                DB::table('selecteds')->where('id', $request->workerrid)->update(['shablon' => $request->select]);
            }
            elseif ( $request->arr ) {
                DB::table('workers')->where('id', $request->worker_idd)->update([
                    'name' => $request->arr[0]['name'],
                    'surname' => $request->arr[1]['surname'],
                    'lastname' => $request->arr[2]['lastname'],
                    'position' => $request->arr[3]['position']
                ]);
            }
            elseif( $request->workerid ){
                // $data = $request->workerid;
                foreach ( Worker::where('id', $request->workerid)->get() as $item ) {
                    if( count( Selected::where(['name' => $item->name, 'surname' => $item->surname, 'lastname' => $item->lastname, 'position' => $item->position, 'photo' => $item->photo])->get()) != 1 ) {
                        DB::table('selecteds')->insert([
                            'name' => $item->name,
                            'surname' => $item->surname,
                            'lastname' => $item->lastname,
                            'position' => $item->position,
                            'photo' => $item->photo,
                            'shablon' => 1
                        ]);
                    }
                }
            }
        }
    }

    public function getPrint()
    {
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
        $selectedPrint = Selected::get();
        return view('ready.printt', compact('selectedPrint', 'dateNow'));
    }

    public function search(Request $request, $page = 'page=1', $search = '1', FakeSearch $addStatus)
    {
        // dump($request->ajax());
        $data = $request->search;
        $sort = $request->sort;
        FakeSearch::where('id', '>', '0')->delete();

        $resultsStud = Student::where('name', 'LIKE', '%' . $data . '%')
                            ->orWhere('surname', 'LIKE', '%' . $data . '%')
                            ->orWhere('lastname', 'LIKE', '%' . $data . '%')
                            ->orWhere('group', 'LIKE', '%' . $data . '%')
                            ->get();
        $resultsWork = Worker::where('name', 'LIKE', '%' . $data . '%')
                            ->orWhere('surname', 'LIKE', '%' . $data . '%')
                            ->orWhere('lastname', 'LIKE', '%' . $data . '%')
                            ->orWhere('position', 'LIKE', '%' . $data . '%')
                            ->get();

        foreach( $resultsStud as $item ) {
            FakeSearch::insert([
                'name' => $item->name,
                'surname' => $item->surname,
                'lastname' => $item->lastname,
                'group' => $item->group
            ]);
        }
        foreach( $resultsWork as $item ) {
            FakeSearch::insert([
                'name' => $item->name,
                'surname' => $item->surname,
                'lastname' => $item->lastname,
                'position' => $item->position
            ]);
        }
        $fake_search = FakeSearch::paginate(5);
        // $arr1 = new Collection;

        // $arr1 = $arr1->merge($resultsStud)->merge($resultsWork);
        // $arr1 = paginate(1);
        return view('ready.search', compact('fake_search', 'addStatus'));
    }

    public function searchPost(Request $request)
    {
        $addFromSearch = FakeSearch::where('id', $request->add_to_cart)->get();
        foreach( $addFromSearch as $item ) {
            if( trim($item->group) == '' ) {
                if( Selected::where(['name' => $item->name,  'surname' => $item->surname,  'lastname' => $item->lastname, 'position' => $item->position ])->get() == 1) {
                    return redirect()->back();
                } else {
                    Selected::insert([
                        'name' => trim($item->name), 
                        'surname' => trim($item->surname), 
                        'lastname' => trim($item->lastname), 
                        'position' => trim($item->position),
                        'shablon' => 1
                    ]);
                    return redirect()->back();
                }
            }elseif( trim($item->position) == '' ) {
                if( count(Selected::where(['name' => $item->name, 'surname' => $item->surname, 'lastname' => $item->lastname, 'group' => $item->group,])->get()) == 1 ) {
                    return redirect()->back();
                } else {
                    Selected::insert([
                        'name' => trim($item->name), 
                        'surname' => trim($item->surname), 
                        'lastname' => trim($item->lastname), 
                        'group' => trim($item->group),
                        'shablon' => 1
                    ]);
                    return redirect()->back();
                }
            }
        }
    }

    public function Cardorder()
    {
        return view('ready.cardOrder');
    }

    public function CardorderPost(Request $request)
    {
        // dd($request->all());
        Worker::insert([
            'name' => $request->name,
            'surname' => $request->surname,
            'lastname' => $request->lastname,
            'position' => $request->position,
            'photo' => date("YmdHis").'.'.$request->file('photo')->getClientOriginalExtension(),
        ]);

        $request->file('photo')->storeAs('public/images', date("YmdHis").'.'.$request->file('photo')->getClientOriginalExtension());
    }

    public function searchSort($sort = null)
    {
        if( $sort == 1 ) {
            $Sort = FakeSearch::orderBy('surname', 'ASC')->get();
            return view('ready.search' ,compact('Sort'));
        }elseif( $sort == 2 ) {
            $Sort = FakeSearch::orderBy('name', 'ASC')->get();
            return view('ready.search' ,compact('Sort'));
        }elseif ( $sort == 3 ) {
            $Sort = FakeSearch::orderBy('lastname', 'ASC')->get(); 
            return view('ready.search' ,compact('Sort'));     
        }
    }

    public function getGroupInfo()
    {
        function isNull($e) {
            return $e === '00000000-0000-0000-0000-000000000000';
        }
        
        function doRequest($url) {
            $ch = curl_init();
            $token = base64_encode('АгарковОВ:qzwxec123');
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Basic $token"]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
        
            $data = curl_exec($ch);
            curl_close($ch);
        
            $data = json_decode($data);
            dd($data);
            return $data;
        }
        doRequest('http://1c.uksivt.ru/uksivt-2018/odata/standard.odata/Catalog_%D0%A3%D1%87%D0%B5%D0%B1%D0%BD%D1%8B%D0%B5%D0%93%D1%80%D1%83%D0%BF%D0%BF%D1%8B?$format=json&$filter=');
        // dd($url);
        // $perRequest = 3;

        // function save () {
        //     global $groups;
        //     file_put_contents(__DIR__ . '/../db/groups.json', json_encode($groups, JSON_UNESCAPED_UNICODE));
        // }
        // save();
        // $count = count($groups);
        // $loaded = 0;
        // $counter = 0;

        // $url = 'http://1c.uksivt.ru/uksivt-2018/odata/standard.odata/Catalog_%D0%A3%D1%87%D0%B5%D0%B1%D0%BD%D1%8B%D0%B5%D0%93%D1%80%D1%83%D0%BF%D0%BF%D1%8B?$format=json&$filter=';
        // foreach ($groups as &$group) {
        //     if (isset($group['_gg'])) continue;
        //     $counter++;
        //     if ($counter === $perRequest + 1) {
        //         break;
        //     }
        //     $url .= 'Ref_Key%20eq%20guid%27' . $group['Ref_Key'] . '%27%20or%20';
        //     $group['_gg'] = true;
        // }

        // if ($counter === 0) {
        //     echo json_encode([
        //         'loaded' => $count,
        //         'count' => $count,
        //         'percent' => 100,
        //     ]);
        //     return;
        // }

        // $url = substr($url, 0, strlen($url) - 8);

        // $data = doRequest($url)->value;

        // foreach ($data as $value) {
        //     $ref = $value->Ref_Key;
        //     $groups[$ref]['name'] = $value->Description;
        //     $groups[$ref]['form'] = mb_strtolower($value->{'ФормаОбучения'});
        // }

        // foreach ($groups as &$group) {
        //     if (!isset($group['_gg'])) {
        //         echo json_encode([
        //             'loaded' => $loaded,
        //             'count' => $count,
        //             'percent' => floor($loaded * 100 / $count * 100) / 100,
        //         ]);
        //         save();
        //         return;
        //     }
        //     $loaded++;
        // }

        // save();

        // echo json_encode([
        //     'loaded' => $loaded,
        //     'count' => $count,
        //     'percent' => floor($loaded * 100 / $count * 100) / 100,
        // ]);
    }
}
