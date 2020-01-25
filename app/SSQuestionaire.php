<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SSQuestionaire extends Model
{
    protected $table = 's_s_questionaires';
    public function facility(){
        return $this->belongsTo('App\Facility', 'facility_id');
    }
}
