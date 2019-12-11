<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function examday(){
        return $this->belongsTo(Examday::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
