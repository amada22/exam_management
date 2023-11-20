@extends('master')
 
@section('content')
    
<h1>UPDATE ExaminationRoom</h1>
<h3>{{$ExaminationRoom->id}}</h3>

<form method="POST" action="{{route('update_R', ['id' => $ExaminationRoom->id])}}">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" value="{{$ExaminationRoom->name}}" name="name" required>

    <label for="capacity">Capacity:</label>
    <input type="text" value="{{$ExaminationRoom->capacity}}" name="capacity" required>
  

    <button type="submit">UPDATE ExaminationRoom</button>
</form>

@endsection