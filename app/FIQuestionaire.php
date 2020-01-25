<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FIQuestionaire extends Model
{
    protected $table = 'f_i_questionaires';
    public function facility(){
        return $this->belongsTo('App\Facility', 'facility_id');
    }
}
