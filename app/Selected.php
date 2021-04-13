<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selected extends Model
{
    public static function Oba($id)
    {
        // $sum = 5;

        // Selected::get();
        
        $name = Student::where('id', $id)->value('name');
        $surname = Student::where('id', $id)->value('surname');
        $lastname = Student::where('id', $id)->value('lastname');
        $group = Student::where('id', $id)->value('group');
        // dump($name);
        // dump(count(Selected::where([ 'name' => $name, 'surname' => $surname, 'lastname' => $lastname, 'group' => $group ])->get()));
        foreach( Student::where('id', $id)->get as $item ) {
            if( count(Selected::where([ 'name' => $item->name, 'surname' => $item->surname, 'lastname' => $item->lastname, 'group' => $item->group ])->get()) == 1 ) {
                return true;
            } else{
                return false;
            }
        }
        // if( Selected::where('name', 'Иван') == Student::where('name', 'Иван') ) {
        //     return true;
        // }

        // // if( $this )

        // return $sum;
    }
}
