@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrant</div>

                <div class="card-body">
                <form method="post" action="/register" id="saveform" class="saveform">
                @csrf
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
  </div>
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
    <div class="radio"><label><input type="radio" value="Email only" name="choice_of_communication[]" checked>Email only</label></div>
    <div class="radio"><label><input type="radio" value="Email & Text" name="choice_of_communication[]">Email & text</label></div>
  </div>
  <button type="submit" onclick="submit" class="btn btn-default">PROCEED TO PAYMENT</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
