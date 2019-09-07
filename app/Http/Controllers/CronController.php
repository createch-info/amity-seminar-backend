<?php

namespace App\Http\Controllers;

use App\Mail\ReminderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Seminar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

define('countryCode','1');

class CronController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function sendSMS($number,$message){

        //$data = array("from" => "10907", "to" => [$number],"body"=>$message);
        $data = array("from" => "+18332867382", "to" => [$number],"body"=>$message);
        $data_string = json_encode($data);
        //$ch = curl_init('https://sms.api.sinch.com/xms/v1/c29fb3e83dbc416e9db6dc0925e5054e/batches');
        $ch = curl_init('https://sms.api.sinch.com/xms/v1/d7f3f825708341ddb4321658abf8fd48/batches');  //TFN API for US number
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization:Bearer a82439f3fb1446a68ef7bae012396446'  //TFN API for US number
           // 'Authorization:Bearer 233c8c2ebfdb4594b42984d479a498e2'
           )
        );
        $result = curl_exec($ch);
        curl_close($ch);
   }

    public function remindermail()
    {                                                                                                                                                                                       
        Log::info('-------------------Day Cron Executed from here --------------');
        $date=Carbon::now();
        $data=Seminar::with('schedules','registrants')->whereDate('seminar_date','>',$date->format("Y-m-d"))->get();
        Log::info('Current Date'.$date);
        Log::info('Data'.$data);

        foreach ($data as $d)
        {
            foreach ($d->schedules as $schedule)
            {
               
                switch ($schedule->schedules)
                {
                    case 1:
                         Log::info('Schedule'.$schedule);
                        $seminardate=Carbon::parse($d->seminar_date);
                        $diff = 1 + $date->diffInDays($seminardate,false);
                        Log::info('Seminar date: '.$seminardate);
                        Log::info('Difference of 30-31 days: '.$diff);
                        if($diff==30 || $diff==31)
                        {
                            foreach ($d->registrants as $registrant)
                            {
                                Log::info('Registrants'.$registrant);
                                    if($registrant->choice_of_communication=='Email & Text')
                                    {
                                         Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                         $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar \"".$d->title."\". Please check your email for details and call us with any questions at 303-690-2749.");
                                    }
                                    else
                                        Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));

                            }
                        }
                        break;

                    case 2:
                         Log::info('Schedule'.$schedule);
                        $seminardate=Carbon::parse($d->seminar_date);
                        $diff = 1 + $date->diffInDays($seminardate,false);
                        Log::info('Seminar date: '.$seminardate);
                        Log::info('Difference of 7 days: '.$diff);

                        if($diff==7)
                        {
                            foreach ($d->registrants as $registrant)
                            {
                                 Log::info('Registrants'.$registrant);
                              if($registrant->choice_of_communication=='Email & Text')
                                    {
                                         Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                        $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar \"".$d->title."\". Please check your email for details and call us with any questions at 303-690-2749.");
                                    }
                                    else
                                        Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));

                            }
                        }
                        break;

                    case 3:
                         Log::info('Schedule'.$schedule);
                        $seminardate=Carbon::parse($d->seminar_date);
                        $diff = 1 + Carbon::parse($date)->diffInDays($seminardate,false);
                        Log::info('Seminar date: '.$seminardate);
                        Log::info('Difference of 2 days: '.$diff);
                        
                        if($diff==2)
                        {
                            foreach ($d->registrants as $registrant)
                            {
                                 Log::info('Registrants'.$registrant);
                             if($registrant->choice_of_communication=='Email & Text')
                                    {
                                        
                                         Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                         $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar \"".$d->title."\". Please check your email for details and call us with any questions at 303-690-2749.");
                                    }
                                    else
                                        Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));

                            }
                        }
                        break;

                   /* case 4:
                         Log::info('Schedule'.$schedule);
                        $seminardate=Carbon::parse($d->seminar_date);
                        $diff = 1 + $date->diffInDays($seminardate,false);
                        Log::info('Seminar Date:'.$seminardate);
                        Log::info('Difference of 1 day: '.$diff);
                        if($diff==1)
                        {
                            foreach ($d->registrants as $registrant)
                            {
                                 Log::info('Registrants'.$registrant);
                             if($registrant->choice_of_communication=='Email & Text')
                                    {
                                         Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                         $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar \"".$d->title."\". Please check your email for details and call us with any questions at 303-690-2749.");
                                    }
                                    else
                                        Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));

                            }
                        }
                        break;*/
                }
            }
        }

        return "Successfully Sent";
    }

   
    public function hour_reminder()
    {
        $date=Carbon::now()->format('Y-m-d');
        $dateDay2=Carbon::now()->addDays(2)->format('Y-m-d');

        Log::info('-------------Hourly Cron Executed----------------');

        $data=Seminar::with('schedules','registrants')->whereBetween('seminar_date',[$date,$dateDay2])->get();
        
        foreach ($data as $d)
        {
            foreach ($d->schedules as $schedule)
            {
                $start=Carbon::parse($d->seminar_date."".$d->start_time);
                $end=Carbon::now();
                Log::info('Schedule Data: '.$schedule);
                Log::info('seminar Date: '.$start);
                Log::info('Current Date: '.$end);

                if($schedule->schedules==4)
                {
                    $diff = $end->diffInMinutes($start,false);
                    Log::info('Difference: '.$diff);

                    if($diff<=1440 && $diff>1380)
                    {
                        foreach ($d->registrants as $registrant)
                        {
                            Log::info('Registrant: '.$registrant);

                           if($registrant->choice_of_communication=='Email & Text')
                            {
                                Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar \"".$d->title."\". Please check your email for details and call us with any questions at 303-690-2749.");
                            }
                            else
                                Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                        }
                    }
                }
                
                else if($schedule->schedules==5)
                {
                    $diff = $end->diffInMinutes($start,false);
                    Log::info('Difference: '.$diff);

                    if($diff<=60 && $diff>0)
                    {
                        foreach ($d->registrants as $registrant)
                        {
                            Log::info('Registrant: '.$registrant);

                           if($registrant->choice_of_communication=='Email & Text')
                            {
                                Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar \"".$d->title."\". Please check your email for details and call us with any questions at 303-690-2749.");
                            }
                            else
                                Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                        }
                    }
                }
            }

        }

         return "Mail Sent";
    }
}
