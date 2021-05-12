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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Getopt;
use App\Http\Requests\CardOrderRequest;

class AllController extends Controller
{
    public function group($group_id = null, Selected $addStatus)
    {
        $students = Student::where('group_id', $group_id)->paginate(13);
        $groups = Group::get();
        return view('ready.group', [ 'students' => $students ], compact('groups', 'addStatus'));
    }

    public function groupAdd(Request $request)
    {
        $data = $request->add_to_cart;
        $selected_student = Student::where('id', $data)->get();
        foreach( $selected_student as $student ) {
            if( Selected::where([
                'name' => $student->name,
                'surname' => $student->surname,
                'lastname' => $student->lastname,
                'group' => $student->group_id,
                'form_of_education' => $student->form_of_education,
                'code' => $student->code,
                'photo' => $student->photo,
                'date_of_enrollment' => $student->date_of_enrollment
            ])->value('id') ) {
                return redirect()->back();
            } else {
                DB::table('selecteds')->insert([
                    'name' => $student->name,
                    'surname' => $student->surname,
                    'lastname' => $student->lastname,
                    'group' => $student->group_id,
                    'form_of_education' => $student->form_of_education,
                    'code' => $student->code,
                    'photo' => $student->photo,
                    'date_of_enrollment' => $student->date_of_enrollment,
                    'shablon' => 1,
                ]);
                return redirect()->back();
            }
        }
    }

    public function selected()
    {
        $selecteds = Selected::paginate(15);
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

    public function workers(Worker $addStatus)
    {
        $workers = Worker::get();
        return view('ready.workers', compact('workers', 'addStatus'));
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
                foreach( Worker::where('id', $request->worker_idd)->get() as $item ) {
                    DB::table('selecteds')->where([
                        'name' => $item->name,
                        'surname' => $item->surname,
                        'lastname' => $item->lastname,
                        'position' => $item->position,
                    ])->update([
                        'name' => $request->arr[0]['name'],
                        'surname' => $request->arr[1]['surname'],
                        'lastname' => $request->arr[2]['lastname'],
                        'position' => $request->arr[3]['position']
                    ]);
                }

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
                            'shablon' => 2
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
        // dump(1);
        $data = $request->search;
        $sort = $request->sort;
        FakeSearch::where('id', '>', '0')->delete();

        $resultsStud = Student::where('name', 'LIKE', '%' . $data . '%')
                            ->orWhere('surname', 'LIKE', '%' . $data . '%')
                            ->orWhere('lastname', 'LIKE', '%' . $data . '%')
                            ->orWhere('group_id', 'LIKE', '%' . $data . '%')
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
                'group' => $item->group_id,
                'form_of_education' => $item->form_of_education,
                'photo' => $item->photo,
                'code' => $item->code,
                'date_of_enrollment' => $item->date_of_enrollment
            ]);
        }
        foreach( $resultsWork as $item ) {
            FakeSearch::insert([
                'name' => $item->name,
                'surname' => $item->surname,
                'lastname' => $item->lastname,
                'position' => $item->position,
                'photo' => $item->photo,
            ]);
        }
        // dd($request->getRequestUri());
        // $fake_search = FakeSearch::get();
        $fake_search = FakeSearch::paginate(14)->withPath($request->getRequestUri());
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
                if( Selected::where([
                        'name' => $item->name,
                        'surname' => $item->surname,
                        'lastname' => $item->lastname,
                        'position' => $item->position,
                        'photo' => $item->photo,
                    ])->get() == 1) {
                    return redirect()->back();
                } else {
                    Selected::insert([
                        'name' => trim($item->name),
                        'surname' => trim($item->surname),
                        'lastname' => trim($item->lastname),
                        'position' => trim($item->position),
                        'shablon' => 1,
                        'form_of_education' => trim($item->form_of_education),
                        'photo' => trim($item->photo),
                        'code' => trim($item->code),
                        'date_of_enrollment' => trim($item->date_of_enrollment)
                    ]);
                    return redirect()->back();
                }
            }elseif( trim($item->position) == '' ) {
                if( count(Selected::where([
                        'name' => $item->name,
                        'surname' => $item->surname,
                        'lastname' => $item->lastname,
                        'group' => $item->group,
                        'photo' => $item->photo,
                    ])->get()) == 1 ) {
                    return redirect()->back();
                } else {
                    Selected::insert([
                        'name' => trim($item->name),
                        'surname' => trim($item->surname),
                        'lastname' => trim($item->lastname),
                        'group' => trim($item->group),
                        'shablon' => 1,
                        'form_of_education' => trim($item->form_of_education),
                        'photo' => trim($item->photo),
                        'code' => trim($item->code),
                        'date_of_enrollment' => trim($item->date_of_enrollment)
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

    // public function CardorderPost(Request $request)
    public function CardorderPost(CardOrderRequest $request)
    {
        // dd($request->all());
        Worker::insert([
            'name' => $request->name,
            'surname' => $request->surname,
            'lastname' => $request->lastname,
            'position' => $request->position,
            'photo' => '/storage/images/' . date("YmdHis").'.'.$request->file('photo')->getClientOriginalExtension(),
        ]);
        $request->file('photo')->storeAs('public/images', date("YmdHis").'.'.$request->file('photo')->getClientOriginalExtension());
        session()->flash('card_send_succsess','Заявка  успешно отправлена');
        return redirect()->back();
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

    public function ajax()
    {

        // return 1;
        // function doRequest($url) {
        //     $ch = curl_init();
        //     $token = base64_encode('АгарковОВ:qzwxec123');
        //     curl_setopt($ch, CURLOPT_HEADER, 0);
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Basic $token"]);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //     curl_setopt($ch, CURLOPT_URL, $url);

        //     $data = curl_exec($ch);
        //     curl_close($ch);

        //     $data = json_decode($data);
        //     return $data;
        // }
        $groups = json_decode(file_get_contents('./1c/groups.json'), true);
        // $url = 'http://1c.uksivt.ru/uksivt-2018/odata/standard.odata/Document_%D0%90%D0%BD%D0%BA%D0%B5%D1%82%D0%B0%D0%90%D0%B1%D0%B8%D1%82%D1%83%D1%80%D0%B8%D0%B5%D0%BD%D1%82%D0%B0?$format=json&$filter=Ref_Key%20eq%20guid%27dc220144-6aa4-11e7-f798-40167e72fa59%27';
        // $url2 = 'http://1c.uksivt.ru/uksivt-2018/odata/standard.odata/Catalog_%D0%A1%D0%BF%D0%B5%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D0%BE%D1%81%D1%82%D0%B8?$format=json&$filter=Ref_Key%20eq%20guid%27f281b54e-6a86-11e6-a63f-005056c00008%27';
        // dd(doRequest($url)->value);
        // $data = 'PFN0cmluZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEi\r\nIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5z\r\ndGFuY2UiLz4=';
        // echo base64_decode($data);
        // foreach( $groups as $group ) {
        //     dd($group);
        // }
        // $arr = [];
        DB::table('students')->where("id", ">", "0")->delete();
        DB::table('groups')->where("id", ">", "0")->delete();
        foreach ($groups as $group) {
            dump($group);
            DB::table('groups')->insert([
                'group' => trim($group['name'])
            ]);
            foreach ( $group['students'] as $item ) {
                // dump(substr("121221", 1));

                if( isset($item['imageFile']) ) {
                    DB::table('students')->insert([
                        'name' => trim($item['name']),
                        'surname' => trim($item['surname']),
                        'lastname' => trim($item['patronymic']),
                        'group_id' => trim($group['name']),
                        'date_of_enrollment' => trim($group['orderDate']),
                        'form_of_education' => trim($group['form']),
                        'photo' => '/1c' . substr($item['imageFile'], 1),
                        'code' => substr($item['code'], 1)
                    ]);
                } else {
                    DB::table('students')->insert([
                        'name' => trim($item['name']),
                        'surname' => trim($item['surname']),
                        'lastname' => trim($item['patronymic']),
                        'date_of_enrollment' => trim($group['orderDate']),
                        'group_id' => trim($group['name']),
                        'form_of_education' => trim($group['form']),
                        'photo' => '',
                        'code' => substr($item['code'], 1)
                    ]);
                }
            }
        }
        // // return $arr;
    }

    public function getGroups(Request $request) {
        $data = $request->data;
        // return $data;
        if( $request->data == '' ) {
            return Group::get();
        } else {
            return Group::where('group', 'LIKE', '%' . $data . '%')->get();
        }

    }
}
