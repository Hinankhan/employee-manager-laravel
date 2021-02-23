<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
{
    //
    protected $dates = [
        'date_of_joining',
    ];

    public function user(){
        return $this->belongsTo('App/User');
    }
    public function getDateOfJoiningAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }
}
