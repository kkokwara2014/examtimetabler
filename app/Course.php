<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    

    public function classlevel(){
        return $this->belongsTo(Classlevel::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
}
