  @extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Seminar</div>

                <div class="card-body">
                <form method="post" action="/seminar" id="saveform" class="saveform">
                @csrf
  <div class="form-group">
    <label for="title">Seminar Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="capacity">Capacity</label>
    <input type="text" class="form-control" id="capacity" name="capacity">
  </div>
  <div class="form-group">
    <label for="seminar_date">Date of the Seminar</label>
    <input type="date" class="form-control" id="seminar_date" name="seminar_date">
  </div>
  <div class="form-group">
    <label for="start_time">Start Time</label>
    <input type="text" class="form-control" id="start_time" name="start_time">
  </div>
  <div class="form-group">
  <select class="form-control" name="timeformat1">
    <option value="AM">AM</option>
    <option value="PM">PM</option>
  </select>
</div>
  <div class="form-group">
    <label for="end_time">End Time</label>
    <input type="text" class="form-control" id="end_time" name="end_time">
  </div>
  <div class="form-group">
  <select class="form-control" name="timeformat2">
    <option value="AM">AM</option>
    <option value="PM">PM</option>
  </select>
</div>
  <div class="form-group">
    <label for="venue_address">Venue Address</label>
    <input type="text" class="form-control" id="venue_address" name="venue_address">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="cost_per_seat">Cost per seat</label>
    <input type="text" class="form-control" id="cost_per_seat" name="cost_per_seat">
  </div>

  <div class="form-group">
  <label for="reminder_numbers">No. of reminders</label>
  <select class="form-control" id="reminder_numbers" name="reminder_numbers">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
</div>

<div class="def">
<div class="form-group abc">
  <label for="schedules">Reminder Schedules</label>
<select class="form-control" id="schedules" name="schedules[]">
<option>1 Month Before</option>
<option>1 Week Before</option>
<option>2 Days Before</option>
<option>24 Hours Before</option>
<option>1 Hour Before</option>
</select>
</div>
</div>

  <button type="submit" onclick="return functionAlert();" class="btn btn-default">CREATE SEMINAR</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="confirm">
         <div class="message">This is a warning message.</div>
            <button class="yes">OK</button>
         </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select[name='reminder_numbers']").change(function(){
      $('.abc').remove();
        var number = $(this).val();
        for (let i = 0; i < number; i++) {
      $('.def').append('<div class="form-group abc"><label for="schedules">Reminder Schedules</label><select class="form-control" id="schedules" name="schedules[]"><option>1 Month Before</option><option>1 Week Before</option><option>2 Days Before</option><option>24 Hours Before</option><option>1 Hour Before</option></select></div>');     
        }
      });
    });
  //     function myFunction() {
  //     if(!confirm("Are You Sure to add this"))
  //     event.preventDefault();
  //     $(this).submit();
  // }

  function functionAlert(msg, myYes) {
            var confirmBox = $("#confirm");
            confirmBox.find(".message").text(msg);
            confirmBox.find(".yes").unbind().click(function() {
               confirmBox.hide();
            });
            confirmBox.find(".yes").click(myYes);
            confirmBox.show();
         }
</script>
<style>
         #confirm {
            display: none;
            background-color: #F3F5F6;
            color: #000000;
            border: 1px solid #aaa;
            position: fixed;
            width: 300px;
            height: 100px;
            left: 50%;
            margin-left: -100px;
            padding: 10px 20px 10px;
            box-sizing: border-box;
            text-align: center;
         }
         #confirm button {
            background-color: #FFFFFF;
            display: inline-block;
            border-radius: 12px;
            border: 4px solid #aaa;
            padding: 5px;
            text-align: center;
            width: 60px;
            cursor: pointer;
         }
         #confirm .message {
            text-align: left;
         }
      </style>
   </head>
   <body>
      
      <!-- <input type="button" value="Click Me" onclick="functionAlert();" /> -->
   </body>
</html>
