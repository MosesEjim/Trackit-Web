<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Carbon;
class Facility extends Model
{
    protected $table = 'facilities';
    protected $primaryKey = 'facility_id';
    public $incrementing = false;

    public function state(){
        return $this->belongsTo('App\State', 'state_code');
    }

    public function availability(){
        return $this->hasMany('App\SSQuestionaire','facility_id');
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