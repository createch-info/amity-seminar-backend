@extends('home')
@section('content')
<style>
        #regdiv{
            border: 2px solid;
            font-size:3vw;
            font-weight: bold;
            font-family: Calibri;
            color: white;
            background-color:#003f8c;
        }
        #calender{
            border:8px solid #003f8c;
            height: 790px;
            width: 95%;
            margin-top:30px ;
            margin-left: 20px;

        }
        .btn{
            width:90%;
        }
</style>
<div class="container-fluid">

    <div id="calender">{!! $calendar->calendar() !!}</div>
    <div class="row" id="div1">
        <div class="col-sm-7">
{{--            <h6 style="margin-top:30px;margin-left: 30px;float: left">{{$data['title']}}</h6>--}}
{{--            <h6 style="margin-top:30px;float:right;margin-right: -30px">{{$data['seminar_date']}} - {{$data['start_time']}} {{$data['timeformat1']}} MT</h6>--}}
{{--            <div style="margin-top:70px;height:170px; margin-left: 30px;margin-right: -30px">{{$data['description']}}</div>--}}
{{--            <form method="post" action="/update_slots/{{$data['id']}}">--}}
{{--                @csrf--}}
{{--                @method('patch')--}}
{{--            <div class="form-group">--}}
{{--            <input type="text" class="form-control capacity" id="capacity" name="capacity" value="{{$data['capacity']}}" disabled>--}}
{{--            <a type="submit" class="btn btn-default update_slots">Update no. of slots</a>--}}
{{--            <button type="submit" class="btn btn-default save_slots">Save</button>--}}
{{--            </div>--}}
{{--            </form>--}}
        </div>
{{--        <div class="col-sm-5">--}}
{{--            <div style="border:1px solid white; width:80%; height:50%;margin-top:30px;margin-left:50px  ">--}}
{{--                <button  class="btn btn-success getRegistrants" id="getRegistrants" onclick="getRegistrants()">REGISTRANTS DETAILS</button>--}}
{{--                <button style="margin-top: 20px; background-color:#003f8c " class="btn btn-info" onclick="getSeminars()">UPDATE SEMINAR</button>--}}
{{--                <button  style="margin-top: 20px;" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{$data['id']}}').submit();">DELETE SEMINAR</button>--}}
{{--                                <form action="{{ route('seminar.destroy',$data['id']) }}" method="POST" id="delete-form-{{$data['id']}}" style="display: none;">--}}
{{--                                    {{csrf_field()}}--}}
{{--                                    {{ method_field('DELETE') }}--}}
{{--                                    <input type="hidden" value="{{$data['id']}}" name="id">--}}
{{--                                </form>--}}
{{--                <button  style="margin-top: 20px;" class="btn btn-secondary hidden1" onclick="delete_all()">DELETE REGISTRANTS</button>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

{{--<div class="row justify-content-center update_seminar">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Update Seminar</div>--}}
{{--                 <div class="card-body">--}}
{{--                <form method="post" action="/seminar/{{$data['id']}}">--}}
{{--                @csrf--}}
{{--                @method('put')--}}
{{--  <div class="form-group">--}}
{{--    <label for="title">Seminar Title</label>--}}
{{--    <input type="text" class="form-control" id="title" name="title" value="{{$data['title']}}">--}}
{{--  </div>--}}
{{--  <div class="form-group">--}}
{{--    <label for="capacity">Capacity</label>--}}
{{--    <input type="text" class="form-control" id="capacity" name="capacity" value="{{$data['capacity']}}">--}}
{{--  </div>--}}
{{--  <div class="form-group">--}}
{{--    <label for="seminar_date">Date of the Seminar</label>--}}
{{--    <input type="date" class="form-control" id="seminar_date" name="seminar_date" value="{{$data['seminar_date']}}" disabled>--}}
{{--  </div>--}}
{{--  <div class="form-group">--}}
{{--    <label for="start_time">Start Time</label>--}}
{{--    <input type="time" class="form-control" id="start_time" name="start_time" value="{{$data['start_time']}}" disabled>--}}
{{--  </div>--}}
{{--  <div class="form-group">--}}
{{--  <select class="form-control" name="timeformat1" disabled>--}}
{{--    <option value="AM" {{ ( $data['timeformat1']) ? 'selected' : '' }}>AM</option>--}}
{{--    <option value="PM" {{ ( $data['timeformat1'] == 'PM') ? 'selected' : '' }}>PM</option>--}}
{{--  </select>--}}
{{--</div>--}}
{{--  <div class="form-group">--}}
{{--    <label for="end_time">End Time</label>--}}
{{--    <input type="time" class="form-control" id="end_time" name="end_time" value="{{$data['end_time']}}" disabled>--}}
{{--  </div>--}}
{{--  <div class="form-group">--}}
{{--  <select class="form-control" name="timeformat2" disabled>--}}
{{--    <option value="AM" {{ ( $data['timeformat1'] == 'AM') ? 'selected' : '' }}>AM</option>--}}
{{--    <option value="PM" {{ ( $data['timeformat1'] == 'PM') ? 'selected' : '' }}>PM</option>--}}
{{--  </select>--}}
{{--</div>--}}
{{--  <div class="form-group">--}}
{{--    <label for="venue_address">Venue Address</label>--}}
{{--    <input type="text" class="form-control" id="venue_address" name="venue_address" value="{{$data['venue_address']}}">--}}
{{--  </div>--}}
{{--  <div class="form-group">--}}
{{--    <label for="description">Description</label>--}}
{{--    <textarea class="form-control" id="description" name="description" value="">{{$data['description']}}</textarea>--}}
{{--  </div>--}}
{{--  <div class="form-group">--}}
{{--    <label for="cost_per_seat">Cost per seat</label>--}}
{{--    <input type="text" class="form-control" id="cost_per_seat" name="cost_per_seat" value="{{$data['cost_per_seat']}}" disabled>--}}
{{--  </div>--}}

{{--  <div class="form-group">--}}
{{--  <label for="reminder_numbers">No. of reminders</label>--}}
{{--  <select class="form-control" id="reminder_numbers" name="reminder_numbers">--}}
{{--    <option value="1" {{ ( $data["reminder_numbers"] == 1) ? 'selected' : '' }}>1</option>--}}
{{--    <option value="2" {{ ( $data["reminder_numbers"] == 2) ? 'selected' : '' }}>2</option>--}}
{{--    <option value="3" {{ ( $data["reminder_numbers"] == 3) ? 'selected' : '' }}>3</option>--}}
{{--    <option value="4" {{ ( $data["reminder_numbers"] == 4) ? 'selected' : '' }}>4</option>--}}
{{--  </select>--}}
{{--</div>--}}
{{--<div class ="form-group def">--}}
{{--@foreach($data['schedules'] as $data)--}}
{{--<div class="form-group abc">--}}
{{--  <label for="schedules">Reminder Schedules</label>--}}
{{--<select class="form-control" id="schedules" class="schedules" name="schedules[]">--}}
{{--<option value="1 Month Before" {{ ( $data["schedules"] == "1 Month Before") ? 'selected' : '' }}>1 Month Before</option>--}}
{{--<option value="1 Week Before" {{ ( $data["schedules"] == "1 Week Before") ? 'selected' : '' }}>1 Week Before</option>--}}
{{--<option value="2 Days Before" {{ ( $data["schedules"] == "2 Days Before") ? 'selected' : '' }}>2 Days Before</option>--}}
{{--<option value="24 Hours Before" {{ ( $data["schedules"] == "24 Hours Before") ? 'selected' : '' }}>24 Hours Before</option>--}}
{{--<option value="1 Hour Before" {{ ( $data["schedules"] == "1 Hour Before") ? 'selected' : '' }}>1 Hour Before</option>--}}
{{--</select>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--  <button type="submit" class="btn btn-default">Submit</button>--}}
{{--</form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--<div class="row hidden1">--}}
{{--        <div class="col-sm-12">--}}
{{--            <div style="margin-top:20px;margin-left: 30px;margin-right: 60px; ">--}}
{{--                <input type="text" name="search" class="search">--}}
{{--                <button type="submit" class="" style="" onclick="getsearchdata()">Search</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row hidden1">--}}
{{--        <div class="col-sm-12">--}}
{{--            <div style="margin-top:2px; margin-left: 30px;margin-right: 60px" >--}}
{{--            <table class="table">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th style="background-color:#003f8c;"><div class="checkbox" id="select_all"><label><input type="checkbox" value=""></label></div></th>--}}
{{--                    <th style="background-color:#003f8c; color:white">Registrant Name</th>--}}
{{--                    <th style="background-color:#003f8c; color:white">Company</th>--}}
{{--                    <th style="background-color:#003f8c; color:white">Email</th>--}}
{{--                    <th style="background-color:#003f8c; color:white">Phone</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody class="myTable">--}}
{{--                @foreach($registrants as $reg)--}}
{{--                        <tr id="tr_{{$reg['id']}}">--}}
{{--                        <td><div class="checkbox"><label><input type="checkbox" class="sub_chk" data-id="{{$reg['id']}}"  value="{{$reg['id']}}" name="checked[]"></label></div></td>--}}
{{--                            <td class="active">{{ $reg['name'] }}</td>--}}
{{--                            <td class="active">{{ $reg['company_name'] }}</td>--}}
{{--                            <td class="active">{{ $reg['email'] }}</td>--}}
{{--                            <td class="active">{{ $reg['phone_number'] }}</td>--}}
{{--                        </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@endsection


@section('scripts')
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>

{!! $calendar->script() !!}

<script type="text/javascript">
$(document).ready(function() { 
$(".hidden1").hide(); 
$(".save_slots").hide();
$(".update_seminar").hide();

$(".update_slots").click(function(e) { 
    e.preventDefault(); 
    $(".update_slots").hide();
    $(".save_slots").show(); 
    $(".capacity").removeAttr('disabled');


     $(".search").on("keyup", function() {
       console.log($(this).val());
    var value = $(this).val().toLowerCase();
    $(".myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
   
});

$("select[name='reminder_numbers']").change(function(){      
        $('.abc').remove();
        var number = $(this).val();
        for (let i = 0; i < number; i++) {
          $('.def').append('<div class="form-group abc"><label for="schedules">Reminder Schedules</label><select class="form-control" id="schedules" name="schedules[]"><option>1 Month Before</option><option>1 Week Before</option><option>2 Days Before</option><option>24 Hours Before</option><option>1 Hour Before</option></select></div>');     
        }
      });
});

function myFunction() {
      if(!confirm("Are You Sure to edit this"))
      event.preventDefault();
      $(this).submit();
  }


function getSeminars() { 
        $(".update_seminar").show();
        $(".hidden1").hide();
       
    }   
function getRegistrants() { 
        $(".hidden1").show();
        $(".update_seminar").hide();
        }

function getsearchdata(){
    var value = $(".search").val().toLowerCase();
    $(".myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    
  });
}


function delete_all(){
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)
            {
                 alert("Please select row.");
            }
        else {
        var join_selected_values = allVals.join(",");
        axios.delete('deletemultiple', {params : {ids:join_selected_values}})
        .then(function (response) {
            $(".sub_chk:checked").each(function() {
                        $(this).parents("tr").remove();
                    });
         });
        // $.ajax({
        //     url: $(this).data('deletemultiple'),
        //     type: 'DELETE',
        //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //     data: 'ids='+join_selected_values,
        //     success: function (data) {
        //         if (data['success']) {
        //             $(".sub_chk:checked").each(function() {
        //                 $(this).parents("tr").remove();
        //             });
        //             alert(data['success']);
        //         } else if (data['error']) {
        //             alert(data['error']);
        //         } else {
        //             alert('Whoops Something went wrong!!');
        //         }
        //     },
            
        // });
            }
                return false;
        }
</script>

@endsection
