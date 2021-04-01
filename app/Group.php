<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public static function Oba()
    {
        $sum = 5;

        return $sum;
    }
    public function group()
    {
        return $this->hasMany(Student::class);
    }
}
