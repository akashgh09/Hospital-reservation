@extends('layouts.main')

@section('content')
<div class="container-lg" style="margin: 0 auto;">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Booking id</th>
      <th scope="col">Appointment id</th>
      <th scope="col">Department name</th>
      <th scope="col">Appointment Date</th>
      <th>Want to cancel</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($bookings as $key => $booking)
    <tr>
      <th scope="row">{{ $key + 1 }}</th>
      <td>{{$booking->appoinment_id}}</td>
      <td>{{$booking->department_name}}</td>
      <td>{{$booking->appoinment_date}}</td>

      <td>
      <form method="POST" action="{{route('cancelAppoinment')}}" >
        @csrf
        <input type="text" style="display :none;" value ="{{ $booking->appoinment_id}} "name="appoinment_id"/>
        <input type="text" style="display :none;" value ="{{ $booking->id }} "name="booking_id"/>
        <input type="submit" value="cancel" class="btn btn-danger">
      </form>

      </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection