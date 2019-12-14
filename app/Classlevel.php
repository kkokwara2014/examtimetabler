<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classlevel extends Model
{
    protected $fillable=['title','code','department_id','classlevel_id'];
    
    public function course(){
        return $this->hasMany(Course::class);
    }
}
