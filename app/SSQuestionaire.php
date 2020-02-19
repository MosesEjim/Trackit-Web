<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Carbon;
class SSQuestionaire extends Model
{
    protected $table = 's_s_questionaires';
    public function facility(){
        return $this->belongsTo('App\Facility', 'facility_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
