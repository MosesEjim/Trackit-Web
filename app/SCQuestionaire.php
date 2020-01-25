<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SCQuestionaire extends Model
{
    protected $table = 's_c_questionaires';
    public function facility(){
        return $this->belongsTo('App\Facility', 'facility_id');
    }
}
