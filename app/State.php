<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\support\Carbon;

class State extends Model
{
    protected $table = 'states';
    protected $primaryKey = 'state_code';
    public $incrementing = false;
    protected $dateFormat = 'u';

    public function lgas(){
        return $this->hasMany('App\Lga','state_code');
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
