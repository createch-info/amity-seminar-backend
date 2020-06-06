<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends Model
{
    use SoftDeletes;
   protected $fillable = ['payment_id','name','seminar_id','email','phoneNumber','companyName','applicable','choice_of_communication','payment_method','accommodation','seminar_fees'];

   protected $appends =['FormatNumber'];

    public function getnameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFormatNumberAttribute()
    {
        $number = preg_replace("/[^\d]/","",$this->phoneNumber);

        // get number length.
        $length = strlen($number);

        // if number = 10
        if($length == 10) {
            $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "+1($1)-$2-$3", $number);
        }

        return $number;
    }
//
//    public function  getemailAttribute($email)
//    {
//        return ucfirst($email);
//    }

//    public function getseminar(){
//        return $this->hasOne('App\Seminar','id','seminar_id');
//    }
}
