<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    Protected $fillable=['seminar_id','schedules'];
}
