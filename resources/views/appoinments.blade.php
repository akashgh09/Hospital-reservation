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
    @for($i = 0; $i < count($appoinments); $i++)
    <tr>
      <th scope="row">{{ $i + 1 }}</th>
      <td>{{$appoinments[$i]->department_name}}</td>
      <td>{{$appoinments[$i]->appoinment_date}}</td>
      @if($appoinments[$i]->taken)
      <td>You cnt't book this</td>
      @else
      <td>
        <form method="post" action="{{route('bookAppoinment')}}">
        @csrf  
        <input type="text" style="display: none;" value="{{$appoinments[$i]->id}}" name="appoinment_id"/>
          <input type="text" style="display:none;" value="{{$appoinments[$i]->department_name}}" name="department_name"/>  
          <input type="text" style="display:none;" value="{{$appoinments[$i]->appoinment_date}}" name="appoinment_date"/>
          <input type="submit" value="book" class="btn btn-primary"/>
        </form>
      </td>
      @endif
    </tr>
    @endfor
  </tbody>
</table>
</div>
@endsection