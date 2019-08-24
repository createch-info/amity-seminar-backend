<?php

namespace App\Http\Controllers;

use App\Register;
use App\Seminar;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Seminar::where('id',35)->first();
        $reserve_seat=Register::where('seminar_id',$data['id'])->count();
        $avail_seat=$data['capacity'] - $reserve_seat;
       return view('register.index',['data'=> $data,'reserve_seat' => $reserve_seat,'avail_seat' => $avail_seat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "instore";
    //     $this->validate($request,[
    //         'name' => 'required|min:1',
    //         'email' => 'required|unique:registers,email',
    //         'phone_number' => 'required|numeric|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/|unique:registers,phone_number',
    //         'company_name' => 'required',
    //         'choice_of_communication' => 'required',
    // ]);
    $data=$request->except('_token');
    $finalArray = array();

    foreach($data as $key => $value){
        array_push($finalArray, array(
            'name'=>$value,
            'email'=>$value,
            'phone_number'=>$value,
            'company_name'=>$value,
            'applicable'=>$value,
            'applicable'=> $value,
            'seminar_id' => 34
            )
        );
    }
    return $finalArray;
    Register::create($finalArray);
            // $register= Register::create([
            // 'name' => [$value]
            // 'email' => $item['email'],
            // 'phone_number' => $item['phone_number'],
            // 'company_name' => $item['company_name'],
            // 'applicable' => $item['applicable'],
            // 'choice_of_communication' => $item['choice_of_communication'],
            // 'semianr_id' => 34
        // ]);
        
     
    return $register;
    // $data=$request->only(['name','email','phone_number','company_name','applicable','choice_of_communication']);
    // $data['seminar_id']=12;
    // $register=Register::create($data);
    
    return view('register.create_success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $register=Register::where('id',$id)->first();
        // return view('register.edit',['register'=>$register]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    //     $this->validate($request,[
    //         'name' => 'required|min:5',
    //         'email' => 'required|unique:registers,email',
    //         'phone_number' => 'required|numeric|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/|unique:registers,phone_number',
    //         'company_name' => 'required',
    //         'choice_of_communication' => 'required',
    // ]);
    // $register=Register::find($id);
    // $register->update($request->only(['name','email','phone_number','company_name','applicable','choice_of_communication']));
    
    // return redirect('register');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "hello";
        // $delete1 = Register::find($id);
        // $delete1->delete();
        // return redirect('register');
        $checked = Request::input('checked',[]);
        foreach ($checked as $id) {
        Todo::where("id",$id)->delete();
        }
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Register::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Registerar Deleted successfully."]);
    }
}
