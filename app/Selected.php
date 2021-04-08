<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selected extends Model
{
    public static function Oba($id)
    {
        foreach( Student::where('id', $id)->get() as $item ) {
            if( count(Selected::where([ 'name' => $item->name, 'surname' => $item->surname, 'lastname' => $item->lastname, 'group' => $item->group ])->get()) == 1 ) {
                return true;
            } else{
                return false;
            }
        }
    }
}
