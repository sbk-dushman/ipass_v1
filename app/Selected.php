<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selected extends Model
{
    public static function Oba($id)
    {
        foreach( Student::where('id', $id)->get() as $item ) {
            if( count(Selected::where([
                'code' => $item->code,
                'name' => $item->name,
                'surname' => $item->surname,
                'lastname' => $item->lastname,
                'group' => $item->group_id,
                'form_of_education' => $item->form_of_education,
                'date_of_enrollment' => $item->date_of_enrollment
                ])->get()) == 1 ) {
                return true;
            } else{
                return false;
            }
        }
    }
}
