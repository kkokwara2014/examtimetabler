<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    
    public function block(){
        return $this->belongsTo(Block::class);
    }
}
