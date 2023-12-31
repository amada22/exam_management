@extends('master')
 
@section('content')
    
<h1>UPDATE Candidate</h1>
<h3>{{$candidate->id}}</h3>

<form method="POST" action="{{route('update_C', ['id' => $candidate->id])}}">
    @csrf
    @method('PUT')

    <label for="name">Full Name:</label>
    <input type="text" value="{{$candidate->name}}" name="name" required>

    <label for="first_name">First Name:</label>
    <input type="text" value="{{$candidate->first_name}}" name="first_name" required>

    <label for="last_name">Last Name:</label>
    <input type="text" value="{{$candidate->last_name}}" name="last_name" required>


  

    <button type="submit">UPDATE Candidate</button>
</form>

@endsection