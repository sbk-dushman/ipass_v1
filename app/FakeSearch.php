<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FakeSearch extends Model
{
    public static function Oba($id) 
    {
        foreach(FakeSearch::where('id', $id)->get() as $item ) {
            if( trim($item->group) == '' ) {
                if( Selected::where(['name' => $item->name,  'surname' => $item->surname,  'lastname' => $item->lastname, 'position' => $item->position ])->get() == 1) {
                    return true;
                } else{
                    return false;
                }
            }elseif(trim($item->position) == '' ) {
                if( count(Selected::where(['name' => $item->name, 'surname' => $item->surname, 'lastname' => $item->lastname, 'group' => $item->group,])->get()) == 1 ) {
                    return true;
                } else{
                    return false;
                }
            }
        }
    }
}
