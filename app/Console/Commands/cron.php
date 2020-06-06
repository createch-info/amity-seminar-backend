<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\ReminderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Seminar;
use Carbon\Carbon;
define('countryCode','1');


class cron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hour:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hourly Update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

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
                //  'Authorization:Bearer 233c8c2ebfdb4594b42984d479a498e2'
            )
        );
        $result = curl_exec($ch);
        curl_close($ch);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('Cron Execute: ');
        $date=Carbon::now()->format('Y-m-d');

        $data=Seminar::with('schedules','registrants')->where('seminar_date',$date)->get();

        Log::info('Seminar Details: '.$data);

        foreach ($data as $d)
        {
            foreach ($d->schedules as $schedule)
            {
                $start=Carbon::parse($d->seminar_date."".$d->start_time);
                $end=Carbon::now();
                Log::info('seminar time: '.$start);
                Log::info('Current Time: '.$end);

                if($schedule->schedules==5)
                {
                    $diff = $end->diffInMinutes($start,false);
                    Log::info('Difference: '.$diff);

                    if($diff<=60)
                    {
                        foreach ($d->registrants as $registrant)
                        {
                            Log::info('Registrant: '.$registrant);

                            if($registrant->choice_of_communication=='Email & Text')
                            {
                                Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                                $this->sendSMS(countryCode.$registrant->phoneNumber, "This is a reminder for seminar ".$d->title.". Please check your email for details and call us with any questions at 303-690-2749.");
                            }
                            else
                                Mail::to($registrant->email)->send(new ReminderEmail($d,'paypal'));
                        }
                    }
                }
            }

        }
    }
}