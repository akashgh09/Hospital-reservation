@extends('layouts.main')

@section('content')
<div class="container-lg" style="margin: 0 auto;">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Department Name</th>
      <th scope="col">Appoinment Date</th>
      <th scope="col">Token</th>
    </tr>
  </thead>
  <tbody>
    @foreach($appoinments as $appoinment)
    <tr>
      <th scope="row">{{$appoinment->id}}</th>
      <td>{{$appoinment->department_name}}</td>
      <td>{{$appoinment->appoinment_date}}</td>
      @if($appoinment->tolen)
      <td>You cnt't book this</td>
      @else
      <td>
        <form>
            <input type="submit" value="book" class="btn btn-primary"/>
        </form>
      </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection