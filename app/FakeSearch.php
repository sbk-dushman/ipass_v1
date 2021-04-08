<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FakeSearch extends Model
{
    public static function Oba($id) {
        // addStatus
        $name = FakeSearch::where('id', $id)->value('name');
        $surname = FakeSearch::where('id', $id)->value('surname');
        $lastname = FakeSearch::where('id', $id)->value('lastname');
        $group = FakeSearch::where('id', $id)->value('group');
        $position = FakeSearch::where('id', $id)->value('position');
        // dump($name);
        // dump(count(Selected::where([ 'name' => $name, 'surname' => $surname, 'lastname' => $lastname, 'group' => $group ])->get()));
        if( trim($group) == '' ) {
            if( Selected::where(['name' => $name,  'surname' => $surname,  'lastname' => $lastname, 'position' => $position ])->get() == 1) {
                return true;
            } else{
                return false;
            }
        }elseif(trim($position) == '' ) {
            if( count(Selected::where(['name' => $name, 'surname' => $surname, 'lastname' => $lastname, 'group' => $group,])->get()) == 1 ) {
                return true;
            } else{
                return false;
            }
        }
        // if( count(Selected::where([
        //     'name' => $name, 
        //     'surname' => $surname, 
        //     'lastname' => $lastname, 
        //     'group' => $group,
        //     'position' => $position 
        // ])->get()) == 1 ) {
        //     return true;
        // } else{
        //     return false;
        // }
    }
}
