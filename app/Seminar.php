<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seminar extends Model
{
    use SoftDeletes;
    protected $fillable=['lat','lng','title','capacity','seminar_date','start_time','timeformat1','end_time','timeformat2','venue_address','description','cost_per_seat','reminder_numbers'];

    protected $appends =['FormatedCost'];

    public function getFormatedCostAttribute()
    {
        return "$".sprintf("%.2f", strval($this->cost_per_seat));
    }

    public function schedules()
    {
        return $this->hasMany('App\Reminder','seminar_id','id');
    }

    public function registrants(){
        return $this->hasMany('App\Register','seminar_id','id');
        
    }


}
