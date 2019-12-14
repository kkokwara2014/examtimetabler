<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable=['name'];

    public function room(){
        return $this->hasMany(Room::class);
    }
}
