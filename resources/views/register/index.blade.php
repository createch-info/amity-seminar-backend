@extends('home')
@section('content')
<div class="container-fluid">


<div id="regdiv" align="center">Register</div>
    <div class="row" id="div1">
        <div class="col-sm-7">
            <h6 style="margin-top:30px;margin-left: 30px;float: left">{{$data['title']}}</h6>
            <h6 style="margin-top:30px;float:right;margin-right: -30px">{{$data['seminar_date']}} - {{$data['start_time']}} {{$data['timeformat1']}} MT</h6>
            <div style="margin-top:70px;height:170px; margin-left: 30px;margin-right: -30px">{{$data['description']}}</div>
        </div>
        <div class="col-sm-5">
            <div style="border:1px solid red; width:80%; height:50%;margin-top:30px;margin-left:50px  ">
                </div>
                <form method="" action="">
  <div class="form-group">
    <label for="Fee">Seminar Fee</label>
    <input type="text" class="form-control" id="fee" name="fee" class="fee" value="">
  </div>
  <div class="form-group">
    <label for="Registrants">Number of registrants</label>
    <input type="text" class="form-control" id="num_reg" name="num_reg" class="num_reg" value="">
  </div>
  <div class="form-group">
    <label for="total_fee">Total Fee</label>
    <input type="text" class="form-control" id="total_fee" name="total_fee" class="total_fee" value="">
  </div>
  </form>
        </div>


        <div class="col-sm-5">
            <div style="width:80%; height:50%;margin-top:30px;margin-left:50px  ">
                </div>
                <form method="" action="">
  <div class="form-group">
    <label for="Fee">Number_of_registrants</label>
    <input type="text" class="form-control" id="reg_no" name="reg_no" class="reg_no" value="">
  </div>
  <div class="form-group">
    <label for="Registrants">Date and time of the seminar</label>
    <input type="text" class="form-control" id="num_reg" name="num_reg" class="num_reg" value="{{$data['seminar_date']}}-{{$data['start_time']}}" disabled>
  </div>
  <div class="form-group">
    <label for="description">Venue Address</label>
    <textarea class="form-control" disabled>{{$data['venue_address']}}</textarea>
  </div>
  <div class="form-group">
   </div>
   <div class="form-group">
    <label for="Registrants">Number of seats available</label>
    <input type="text" class="form-control" id="num_reg" name="num_reg" class="num_reg" value="{{$avail_seat}}" disabled>
  </div>
  <div class="form-group">
    <label for="total_fee">Number of seats filled</label>
    <input type="text" class="form-control" id="total_fee" name="total_fee" class="total_fee" value="{{$reserve_seat}}" disabled>
  </div>
  <button type="submit" class="btn btn-default" id="reg_button" onclick="showforms()">Register</button>
  <div class="checkbox">
  <label id="chk1"><input type="checkbox" value="Y">Terms and conditions</label>
</div>
  </form>
        </div>
         </div>

         <div class="def"> 
         <!-- <form method="post" action="/register" id="saveform" class="saveform">
                @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="phone_number">Phone Number</label>
    <input type="text" class="form-control" id="phone_number" name="phone_number">
  </div>
  <div class="form-group">
    <label for="company_name">Company Name</label>
    <input type="text" class="form-control" id="company_name" name="company_name">
  </div>
  <div class="form-group">
  <div class="checkbox">
  <label><input type="checkbox" value="N" name="applicable">Not Applicable</label>
    </div>
  </div>
  <div class="form-group">
    <label for="venue_address">Choice of communication</label>
    <div class="radio"><label><input type="radio" name="choice_of_communication" checked>Email only</label></div>
    <div class="radio"><label><input type="radio" name="choice_of_communication">Email & text</label></div>
  </div>
  
  <button type="submit" onclick="submit" class="btn btn-default">PROCEED TO PAYMENT</button>
</form> -->
         



</div>



<script type="text/javascript">

$(document).ready(function() { 
$(".def").hide();
});

function showforms()
{ 
  event.preventDefault(); 
  $("#reg_button").hide();
  $("#chk1").hide();
    var number = $("#reg_no").val();
    $("#num_reg").val(number);
    $("#fee").val('${{$data['cost_per_seat']}}');
    var totalfee= number * '{{$data['cost_per_seat']}}';
    $("#total_fee").val(totalfee);
    $(".def").show();    
    $(".def").append(`<form method='post' action='/register' id='savefor' class="saveform"> 
    @csrf`);

   for (let i = 0; i < number; i++) {
    $(".def").append(`<h2> Registrant ${i+1}</h2>
           <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name[]">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email[]">
  </div>
  <div class="form-group">
    <label for="phone_number">Phone Number</label>
    <input type="text" class="form-control" id="phone_number" name="phone_number[]">
  </div>
  <div class="form-group">
    <label for="company_name">Company Name</label>
    <input type="text" class="form-control" id="company_name" name="company_name[]">
  </div>
  <div class="form-group">
  <div class="checkbox">
  <label><input type="checkbox" value="N" name="applicable[]">Not Applicable</label>
    </div>
  </div>
  <div class="form-group">
    <label for="venue_address">Choice of communication</label>
    <div class="radio"><label><input type="radio" name="choice_of_communication[]" checked>Email only</label></div>
    <div class="radio"><label><input type="radio" name="choice_of_communication[]">Email & text</label></div>
  </div>`);
    }
    $(".def").append(`<button type="submit" class="btn btn-default">PROCEED TO PAYMENT</button></form>`);
}
</script>
@endsection