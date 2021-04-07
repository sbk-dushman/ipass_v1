<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public function Oba($id)
    {
        foreach( Worker::where('id', $id)->get() as $item ) {
            if( count(Selected::where(['name' => $item->name, 'surname' => $item->surname, 'lastname' => $item->lastname, 'position' => $item->position])->get()) == 1 ) {
                return true;
            } else{
                return false;
            }
        }
    }
}
