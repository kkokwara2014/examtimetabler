<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=['rmnumber','block_id'];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
