<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Carbon;
class Lga extends Model
{
    protected $table = 'lgas';
    protected $primaryKey = 'lga_code';
    public $incrementing = false;

    public function state(){
        return $this->belongsTo('App\State', 'state_code');
    }
    public function lgas(){
        return $this->hasMany('App\Facility', 'lga_code');
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
