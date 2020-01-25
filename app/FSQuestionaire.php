<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FSQuestionaire extends Model
{
    protected $table = 'f_s_questionaires';
    public function facility(){
        return $this->belongsTo('App\Facility', 'facility_id');
    }
}
