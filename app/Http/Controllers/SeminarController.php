<?php

namespace App\Http\Controllers;

use App\Mail\DeleteSem;
use App\Mail\RegistranRegister;
use App\Seminar;
use Calendar;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use PayPal\Api\Amount;
use PayPal\Api\RefundRequest;
use PayPal\Api\Sale;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
// use Spatie\CalendarLinks\Link;
define('countryCode','1');

class SeminarController extends Controller
{

    /**
     * Display a listing of the resource.c
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = [];
        $start_date = $request->has('start_date') ? Carbon::parse($request->start_date) : Carbon::now();
        $data = Seminar::whereBetween("seminar_date", [$start_date->startOfMonth()->format("Y-m-d"), $start_date->endOfMonth()->format("Y-m-d")])->get();

        if ($data) {
            foreach ($data as $key => $value) {
                $registranCount = $value->registrants()->count();

                $str_start_date = $value->seminar_date;
                $str_start_date = Carbon::parse($str_start_date);

                $events[] = [
                    'date_'=>$str_start_date->format('F d,Y'),
                    'start_time' =>Carbon::parse($value->start_time)->format('g:i A'),
                    'end_time' =>Carbon::parse($value->end_time)->format('g:i A'),
                    'end' => $str_start_date,
                    'date' => $str_start_date,
                    'title' => $value->title,
                    'id' => $value->id,
                    'isFull'=>intval($registranCount) > $value->capacity
                ];
            }
        }
        return response()->json($events);


        // return view('seminar.scheduleseminar',['data'=> $data,'calendar' => $calendar]);
    }


    public function eventList()
    {
        $events = [
                'data'=>[],
            ];
        $data = Seminar::where("seminar_date",'>=',Carbon::now()->format("Y-m-d"))->orderBy('seminar_date')->paginate(1000);

        if ($data) {
            foreach ($data as $key => $value) {

                $registranCount = $value->registrants()->count();

                $str_start_date = Carbon::parse($value->seminar_date);


                $listDateFormat=$str_start_date->format("l ")." ".$str_start_date->formatLocalized('%b,%d,%Y');


                array_push($events['data'],[
                    'date' => $listDateFormat,
                    'title' => $value->title,
                    'description' => $value->description,
                    'format'=>$value->title.": ".strip_tags($value->description),
                    'id' => $value->id,
                ]);

                $events['pagination']=[
                    'loadmore'=>!empty($data->toArray()['next_page_url'])?$data->toArray()['next_page_url']:false,
                    ];

            }
        }


        return response()->json($events);
    }


    public function checkEmail(){
        $semnier = Seminar::find(24);
        $semnier->outlook = url('seminar/link/24');
      //  dd("Seminar booked for date ".$semnier->seminar_date." at ".$semnier->venue_address.". Click on ".url('seminar/link/'. (string)$semnier->id)." to sync event in your outlook.");
        // $this->sendSMS("919784538336","Seminar booked for date ".$semnier->seminar_date." at ".$semnier->venue_address.". Click on  to sync event in your outlook.");
      //  Mail::to("websenor.narendra@gmail.com")->send(new RegistranRegister($sem));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seminar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->type=='seminar')
        {
            $this->validate($request, [
                'title' => 'required|min:5',
                'capacity' => 'required|integer',
                'seminar_date' => ['required','date'],
                'start_time' => 'required',
                'end_time' => 'required',
                'venue_address' => 'required',
                'description' => 'required',
                'cost_per_seat' => 'required',
                'reminder_numbers' => 'required',
                'schedules' => 'required|array|min:1'
            ]);

            $request['webinarDetails']='';
            $request['url']='';
            $request['venue_address']="<pre>".$request->input('venue_address')."</pre>";
        }else
        if($request->type=='webinar')
        {
            $this->validate($request, [
                'title' => 'required|min:5',
                'capacity' => 'required|integer',
                'seminar_date' => ['required','date'],
                'start_time' => 'required',
                'end_time' => 'required',
                'webinarDetails' => 'required',
                'url'=>'required',
                'description' => 'required',
                'cost_per_seat' => 'required',
                'reminder_numbers' => 'required',
                'schedules' => 'required|array|min:1'
            ]);

            $request['venue_address']='';
        }

        $request['description']="<pre>".$request->input('description')."</pre>";

        $countSEM = Seminar::whereDate("seminar_date", Carbon::parse($request->seminar_date)->format("Y-m-d"))->count();

        if($countSEM >= 1){
            return response([
                'errors'=>[
                     'seminar_date'=>['Event already exists on this date']
                ],
                'message'=>'The given data was invalid.'
            ],422);
        }

        $data = $request->only(['title', 'capacity', 'seminar_date', 'start_time', 'end_time', 'venue_address', 'description', 'cost_per_seat', 'reminder_numbers', 'lat', 'lng','type','webinarDetails','url']);
        $data['seminar_date'] = Carbon::parse($data['seminar_date'])->format("Y-m-d");

        $seminar = Seminar::create($data);

        foreach (array_filter($request->schedules) as $item) {
            $seminar->schedules()->create([
                'schedules' => $item
            ]);
        }
        return response()->json($seminar);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Seminar $seminar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $sem = Seminar::find($id);

        if(!empty($sem->id))
        {
            $data = Seminar::withCount("registrants")->with("schedules")->find($id);
            $semdate=Carbon::parse($data['seminar_date'].$data['start_time']);
            $desc=$data['description'];

            $data['date'] = Carbon::parse($data['seminar_date'].$data['start_time'])->toDateTimeString();

            $desc=substr($desc, 0,-6);
            $desc=substr($desc,5);

            $data['_correct_date']=Carbon::parse($data['seminar_date']);
            $data['numberofregistrants'] = 0;
            $data['empty_seat'] = $data['capacity']- $data['registrants_count'];
            $data = $data->toArray();
            $data['isFull'] =intval($data['registrants_count']) >= $data['capacity'];
            $data['isPast'] =!Carbon::now()->lessThanOrEqualTo($data['date']);
            $data['seminar_date']=Carbon::parse($data['seminar_date']." ".$data['start_time'])->format("m/d/Y - g:i A");
            $data['isPaid']=($sem->cost_per_seat>0)?true:false;
            $data['schedules'] = Arr::pluck($data['schedules'], 'schedules');
            $data['end_time'] = Carbon::parse($data['end_time'])->format("g:i A");
            $data['end_time_sc'] = Carbon::parse($data['end_time'])->format("H:i");
            $data['day'] = $semdate->day;
            $data['month'] = $semdate->month;
            $data['formated_description']=$desc;
//            $data['formated_description']=strip_tags($data['description']);
            $data['formated_venue_address']=strip_tags($data['venue_address']);

            return response()->json($data);
        }
    }

    public function updateslot(Request $request, $id)
    {
        $this->validate($request, [
            'slot' => 'required'
        ]);
        $sem = Seminar::find($id);
        $sem->fill(['capacity' => $request->slot])->save();

        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Seminar $seminar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seminar = Seminar::where('id', $id)->with('schedules')->first();
        return view('seminar.edit', ['seminar' => $seminar]);
    }


    public function booking(Request $request)
    {
        $this->validate($request, [
            'sale_id' => 'required',
            'payer_id' => 'required',
            'payment_id' => 'required',
            'payment_method'=>'required',
            'seminar' => 'required',
            'registrants' => 'required|array|min:1',
            'registrants.*.email' => 'required|email',
            'registrants.*.applicable' => 'required|in:Applicable,Not Applicable',
            'registrants.*.choice_of_communication' => 'required|in:Email Only,Email & Text',
            'registrants.*.name' => 'required',
            'registrants.*.phoneNumber' => 'required',
        ]);

        $registrants = $request->registrants;

        $semnier = Seminar::find($request->seminar);

        $paymetn_id = $request->input("sale_id");
        $paymetn_method = $request->input("payment_method");



        $registrants = array_map(function ($item) use ($paymetn_id,$paymetn_method,$semnier) {
            $item['payment_id'] = $paymetn_id;
            $item['payment_method'] = $paymetn_method;
            $item['seminar_fees'] = $semnier->cost_per_seat;
            $item['companyName']=$item['companyName'] ? $item['companyName'] : '';
            $item['accommodation']=isset($item['accommodation'])?$item['accommodation']:'';
            return $item;
        }, $registrants);


        // return $registrants;

        $semnier->registrants()->createMany($registrants);

        $semnier->outlook = url('seminar/link/'. (string)$semnier->id);

        foreach ($registrants as $sendMail){
            Mail::to($sendMail['email'])->cc(['eg@amityhealthcaregroup.com'])->send(new RegistranRegister($semnier,$sendMail['payment_method'],$sendMail['accommodation']));

            if($sendMail['choice_of_communication']=="Email & Text"){
                $this->sendSMS(countryCode.$sendMail['phoneNumber'], "Thank you for registering for an event \"".$semnier->title."\". Please check your email for details and call us with any questions at 303-690-2749");
            }


        }
        return \response()->json([true]);

    }



   public function sendSMS($number,$message){

        // $data = array("from" => "10907", "to" => [$number],"body"=>$message);
        $data = array("from" => "+18332867382", "to" => [$number],"body"=>$message);
        $data_string = json_encode($data);
        // $ch = curl_init('https://sms.api.sinch.com/xms/v1/c29fb3e83dbc416e9db6dc0925e5054e/batches');
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


    public function checkValidashion(Request $request){
        $this->validate($request, [
            'seminar' => 'required',
            'registrants' => 'required|array|min:1',
            'registrants.*.email' => 'required|email',
            'registrants.*.applicable' => 'required|in:Applicable,Not Applicable',
            'registrants.*.choice_of_communication' => 'required|in:Email Only,Email & Text',

            'registrants.*.name' => 'required',
            'registrants.*.phoneNumber' => 'required',
        ]);


        return \response()->json(['status'=>true]);
    }

    public function __construct()
    {
        /** PayPal api context Live Keys**/

        $paypal_conf = config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                "AUFnvE0LVsJKtenY0t3fHlcpKeESQbPxtBIkym7lCqo5oFbm3ewIfaQeXpQ5qqQE3jcEglZNSmLWlpKx",
                "EC9JqwZ5Rv8sDPokp9MbUgLHnmePZVFB69cgJuQAlIq2EBgaYZVp5MGBJgBXc3Z11i6VD1pRlYi1NWTr"
            )
        );
        $this->_api_context->setConfig(array(
            'mode' => 'live',
            'log.LogEnabled' => true,
            'log.FileName' => 'PayPal.log',
            'log.LogLevel' => 'INFO', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
            'cache.enabled' => false,
        ));

         /** PayPal api context Sandbox Keys**/

        // $paypal_conf = config('paypal');
        // $this->_api_context = new ApiContext(new OAuthTokenCredential(
        //         "AT1L2reKiixvOpfviW4EasOTaQXKhigqLpIIbBeHQfUWPYi_XWoWat8ppdsYZMwdmHsCj1dx6NnG36YN",
        //         "EEKhvVFj21ZQRcCgWWpxt9zjxNAGT1onvyHRg_RoVhZXgb7IOgjxsdg96rxhTWrjqk1utVwKe7nBRjp1"
        //     )
        // );
        // $this->_api_context->setConfig(array(
        //     'mode' => 'sandbox',
        //     'log.LogEnabled' => true,
        //     'log.FileName' => 'PayPal.log',
        //     'log.LogLevel' => 'ERROR', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
        //     'cache.enabled' => false,
        // ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Seminar $seminar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->type=='seminar')
        {
            $this->validate($request, [
                'title' => 'required|min:5',
                'capacity' => 'required|integer',

                'start_time' => 'required',
                'end_time' => 'required',

                'venue_address' => 'required',
                'description' => 'required',
                'cost_per_seat' => 'required',

                'reminder_numbers' => 'required',
                'schedules' => 'required|array|min:1'
            ]);

            $request['venue_address']="<pre>".$request->input('venue_address')."</pre>";

        }else
        if($request->type=='webinar')
        {
            $this->validate($request, [
                'title' => 'required|min:5',
                'capacity' => 'required|integer',
                'start_time' => 'required',
                'end_time' => 'required',
                'webinarDetails' => 'required',
                'url'=>'required',
                'description' => 'required',
                'cost_per_seat' => 'required',
                'reminder_numbers' => 'required',
                'schedules' => 'required|array|min:1'
            ]);

                $request['venue_address']="";
        }

        $request['description']="<pre>".$request->input('description')."</pre>";

        $data = $request->only(['cost_per_seat','start_time','title', 'capacity','venue_address', 'description', 'reminder_numbers','webinarDetails','url','type']);
        $data['end_time']=$request->end_time_sc;

        $seminar = Seminar::find($id);
        $seminar->schedules()->delete();
        $seminar->update($data);

         foreach (array_filter($request->schedules) as $item) {
            $seminar->schedules()->create([
                'schedules' => $item
            ]);
        }

        return response()->json(['status' => true,'request'=>$request->all(),'end_time'=>$request->end_time]);
    }

    public function updateSlots(Request $request, $id)
    {
        $capacity = $request->capacity;
        Seminar::where('id', $id)->update(['capacity' => $capacity]);
        return redirect('seminar');
    }

    function dateToCal($time)
    {
        return date('Ymd\This', $time) . 'Z';
    }

    public function genrateLink(Request $request, $id)
    {

        $sem = Seminar::find($id);
        if(!empty($sem->id))
        {

            $fromstartdate=Carbon::parse($sem->seminar_date)->format('Ymd');
            $fromstarttime=Carbon::parse($sem->start_time)->format('His');
            $tostarttime=Carbon::parse($sem->end_time)->format('His');

            $from=$fromstartdate.'T'.$fromstarttime;
            $to=$fromstartdate.'T'.$tostarttime;
            $location=strip_tags($sem->venue_address);

           //$to = $to->toString();
            $ics_props = array(
          'BEGIN:VCALENDAR',
          'VERSION:2.0',
          'PRODID:-//hacksw/handcal//NONSGML v1.0//EN',
          'CALSCALE:GREGORIAN',
          'BEGIN:VEVENT',
          "SUMMARY:$sem->title",
          "DTSTART;TZID:$from",
          "DTEND;TZID:$to",
          "LOCATION:$location",
          "DESCRIPTION: ",
          "STATUS:CONFIRMED",
            "SEQUENCE:1",
            "BEGIN:VALARM",
            "TRIGGER:$sem->start_time",
            "DESCRIPTION:$sem->title",
            "ACTION:DISPLAY",
            "END:VALARM",
            "END:VEVENT",
            "END:VCALENDAR",
        );

    $f = implode("\r\n", $ics_props);
            // return response()->json(['status' => true]);
            // $link = Link::create($sem->title, $from, $to)
            //     ->description($sem->description)
            //     ->address($sem->venue_address);

            return new Response($f, Response::HTTP_OK, [
                'Content-type' => 'text/calendar; charset=utf-8',
                'Content-Disposition' => 'attachment; filename=' . Str::slug($sem->title) . '.ics',

            ]);
        }
        else
        {
            return "<b><center><h1>Event is deleted by Amity Administration</h1></center></b><br/><br/>
            <b><center><a href='https://amityhealthcaregroup.com/education/#'>Back to home</a></center></b>
            ";
        }
    }

    public function deleteregistran(Request $request, $id)
    {
        $this->validate($request, [
            'ids' => 'required|array|min:1'
        ]);


        $sem = Seminar::find($id);

        foreach ($request->ids as $delete_item) {

            $regs =  $sem->registrants()->where("id", $delete_item)->first();

            $payment_id = $regs->payment_id;
            $payment_method = $regs->payment_method;
            $accommodation=$regs->accommodation;

            $isPaid=($regs->seminar_fees>0)?true:false;

            if($isPaid) {
                $amt = new Amount();
                $amt->setCurrency('USD')
                    ->setTotal($regs->seminar_fees);
                $sale = new Sale();

                $refundRequest = new RefundRequest();
                $refundRequest->setAmount($amt);
                

                $sale->setId($payment_id);
                $refundedSale = null;
                try {
                    $refundedSale['mode'] = true;
                    $status = $sale->refundSale($refundRequest, $this->_api_context);
                    $refundedSale['value'] = $status->toArray();
                    Log::info('Transaction status success' . $status);

                }
                catch (\Exception $ex) {
                    $refundedSale['mode'] = false;
                    $refundedSale['value'] = $ex->getMessage();
                    Log::info('Transaction status exception' . $ex);
                }

                if ($refundedSale['mode'] === true) {
                    $sem->registrants()->where("id", $delete_item)->delete();
                    if ($regs->choice_of_communication == "Email & Text") {

                        $this->sendSMS(countryCode . $regs->phoneNumber, "Your registration for an event \"" . $sem->title . "\" is cancelled. Please check your email for details and call us with any questions at 303-690-2749.");
                    }
                    $sem->isReg = true;
//                    $sem->amount = $sem->cost_per_seat;
                    $sem->cost_per_seat = $regs->seminar_fees;
                    Mail::to($regs->email)->cc(['eg@amityhealthcaregroup.com'])->send(new DeleteSem($sem, $payment_method, "Your registration for an event \"" . $sem->title . "\" is cancelled", $accommodation));
                }
            }

            if(!$isPaid)
            {
                Log::info('Inside Not Paid condition');
                $sem->registrants()->where("id", $delete_item)->delete();

                if ($regs->choice_of_communication == "Email & Text") {

                    $this->sendSMS(countryCode . $regs->phoneNumber, "Your registration for an event \"" . $sem->title . "\" is cancelled. Please check your email for details and call us with any questions at 303-690-2749.");
                }

                $sem->isReg = true;
                $sem->cost_per_seat = $regs->seminar_fees;

                Mail::to($regs->email)->cc(['eg@amityhealthcaregroup.com'])->send(new DeleteSem($sem, $payment_method, "Your registration for an event \"" . $sem->title . "\" is cancelled", $accommodation));
            }

        }

        $refundedSale['req']=$request->ids;

       // $sem->registrants()->whereIn("id", $request->ids)->delete();

        if($isPaid) {

            $refundedSale['req']=$request->ids;
            return \response()->json($refundedSale);
        }

        if(!$isPaid) {
            return \response()->json(['Status'=>'Deleted Successfully','req'=>$request->ids]);
        }

    }

    public function registrants(Request $request, $id)
    {
        $sem = Seminar::find($id);
        $query = $request->has('query') ? $request->input("query") : null;

        $data = $sem->registrants()->when($query, function ($searchQuery) use ($query) {

            return $searchQuery->where(function ($serach_inner) use($query){
                return $serach_inner->orWhere("name", 'like', "%$query%")
                    ->orWhere("email", 'like', "%$query%");
            });

        })->paginate($request->has("per_page") ? $request->input("per_page") : 10);

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Seminar $seminar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete1 = Seminar::find($id);
        $regs = $delete1->registrants()->get();

        $isPaid=($regs->seminar_fees>0)?true:false;

        foreach ($regs as $deleteReg){
            if($isPaid) {
            $amt = new Amount();
            $amt->setCurrency('USD')
                ->setTotal($regs->seminar_fees);
            $sale = new Sale();

                $refundRequest = new RefundRequest();
                $refundRequest->setAmount($amt);

                $sale->setId($deleteReg->payment_id);
                try {
                    $refundedSale['mode'] = true;
                    $status = $sale->refundSale($refundRequest, $this->_api_context);
                    $refundedSale['value'] = $status->toArray();
                    Log::info('Transaction status Success' . $status);
                } catch (\Exception $ex) {
                    $refundedSale['mode'] = false;
                    $refundedSale['value'] = $ex->getMessage();
                    Log::info('Transaction status failed' . $ex);
                }
            }
               $deleteReg->isReg = false;
//               $deleteReg->amount = $delete1->cost_per_seat;
               $delete1->cost_per_seat = $deleteReg->seminar_fees;

               Mail::to($deleteReg->email)->cc(['eg@amityhealthcaregroup.com'])->send(new DeleteSem($delete1,$deleteReg->payment_method,"Amity Event cancelled",$deleteReg->accommodation));

             if($deleteReg->choice_of_communication=="Email & Text"){
                 $del_date=Carbon::parse($delete1->seminar_date)->format("m-d-Y");
                  $del_time=Carbon::parse($delete1->start_time)->format('g:i A')." - ".Carbon::parse($delete1->end_time)->format('g:i A');

                $this->sendSMS(countryCode.$deleteReg->phoneNumber, "Event \"".$delete1->title."\" Scheduled for $del_date $del_time, has been cancelled. Please check your email for further instructions and call us with any questions at 303-690-2749");
               // $this->sendSMS(countryCode.$deleteReg->phoneNumber, "Amity seminar ".$delete1->title." that you registered for, is cancelled. Please check your email ".$deleteReg->email." for all the details and call us with any questions.");
             }

            if($isPaid)
            {
                if($refundedSale['mode'] === true) {
                    $deleteReg->delete();
                }
            }

            if(!$isPaid)
            {
                $deleteReg->delete();
            }
        }

        $delete1->schedules()->delete();
        $delete1->registrants()->delete();
        $delete1->delete();
        return response()->json(['status' => true]);
    }
}
