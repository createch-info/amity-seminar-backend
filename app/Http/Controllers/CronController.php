<?php

namespace App\Http\Controllers;

use App\Mail\ReminderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Seminar;
use Carbon\Carbon;
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

       // $data = array("from" => "10907", "to" => [$number],"body"=>$message);
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
        $date=Carbon::now()->format('Y-m-d');
        $data=Seminar::with('schedules','registrants')->where('seminar_date','>=',$date)->get();

        foreach ($data as $d)
        {
            foreach ($d->schedules as $schedule)
            {
                switch ($schedule->schedules)
                {
                    case 1:
                        $seminardate=Carbon::parse($d->seminar_date);
                        $diff = $seminardate->diffInDays($date);

                        if($diff==30 || $diff==31)
                        {
                            foreach ($d->registrants as $registrant)
                            {
                                    if($registrant->choice_of_communication=='Email & Text')
                                    {
                                         Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                         $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar ".$d->title.". Please check your email ".$registrant->email." for details and call us with any questions at 303-690-2749.");
                                    }
                                    else
                                        Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));

                            }
                        }
                        break;

                    case 2:
                        $seminardate=Carbon::parse($d->seminar_date);
                        $diff = $seminardate->diffInDays($date);

                        if($diff==7)
                        {
                            foreach ($d->registrants as $registrant)
                            {
                              if($registrant->choice_of_communication=='Email & Text')
                                    {
                                         Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                        $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar ".$d->title.". Please check your email ".$registrant->email." for details and call us with any questions at 303-690-2749.");
                                    }
                                    else
                                        Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));

                            }
                        }
                        break;

                    case 3:
                        $seminardate=Carbon::parse($d->seminar_date);
                        $diff = $seminardate->diffInDays($date);

                        if($diff==2)
                        {
                            foreach ($d->registrants as $registrant)
                            {
                             if($registrant->choice_of_communication=='Email & Text')
                                    {
                                         Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                         $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar ".$d->title.". Please check your email ".$registrant->email." for details and call us with any questions at 303-690-2749.");
                                    }
                                    else
                                        Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));

                            }
                        }
                        break;

                    case 4:
                        $seminardate=Carbon::parse($d->seminar_date);
                        $diff = $seminardate->diffInDays($date);

                        if($diff==1)
                        {
                            foreach ($d->registrants as $registrant)
                            {
                             if($registrant->choice_of_communication=='Email & Text')
                                    {
                                         Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                         $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar ".$d->title.". Please check your email ".$registrant->email." for details and call us with any questions at 303-690-2749.");
                                    }
                                    else
                                        Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));

                            }
                        }
                        break;

                    case 5:
                        $start=Carbon::parse($d->seminar_date."".$d->start_time);
                        $end=Carbon::now()->format('Y-m-d H:m');

                        $diff=$start->diffInHours($end);

                        if($diff==1)
                        {
                            foreach ($d->registrants as $registrant)
                            {
                               if($registrant->choice_of_communication=='Email & Text')
                                    {
                                         Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                         $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar ".$d->title.". Please check your email ".$registrant->email." for details and call us with any questions at 303-690-2749.");
                                    }
                                    else
                                        Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));

                            }
                        }
                        break;

                }
            }
        }

        return "Successfully Sent";
    }

    public function hour_reminder()
    {
        $date=Carbon::now()->format('Y-m-d');
        $data=Seminar::with('schedules','registrants')->where('seminar_date','>=',$date)->get();

        foreach ($data as $d)
        {
            foreach ($d->schedules as $schedule)
            {
                $start=Carbon::parse($d->seminar_date."".$d->start_time);
                $end=Carbon::now()->format('Y-m-d H:m');

                $diff=$start->diffInHours($end);

                if($diff==1)
                {
                    foreach ($d->registrants as $registrant)
                    {
                       if($registrant->choice_of_communication=='Email & Text')
                        {
                            Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                            $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar ".$d->title.". Please check your email ".$registrant->email." for details and call us with any questions at 303-690-2749.");
                        }
                        else
                            Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                    }
                }
            }
        }

         return "Successfully Sent";
    }
}
