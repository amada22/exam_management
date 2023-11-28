@extends('master')
 
@section('content')
 
<h1 class="text-4xl" >List of ExaminationRoom</h1>


<table class="border-2 p-4" >
    <thead>
        <tr>
            <th class="border-2">Name</th>
            <th class="border-2 ">Capacity</th>
            <th class="border-2" >UPDATE</th>
            <th class="border-2" >DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ExaminationRooms as $ExaminationRoom)
            <tr>
           
                <td class="border-2">{{ $ExaminationRoom->name }}</td>
                <td class="border-2">{{ $ExaminationRoom->capacity}}</td>
                
                <td class="border-2">
                    <a href="{{ route('modify_R', ['id' => $ExaminationRoom->id]) }}">UPDATE</a>
                </td>
                <td class="border-2">
                    <form method="POST" action="{{route('delete_R', ['id' => $ExaminationRoom->id])}}">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="DELETE" />
                    </form>
                
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



<h1 class="text-4xl">Add New ExaminationRoom</h1>

<form method="POST" action="{{route('store_R')}}">
    @csrf

    <label for="name"> Name:</label>
    <input type="text" name="name" required>

    <label for="capacity">Capacity:</label>
    <input type="text" name="capacity" required>


  

    <button type="submit">Add ExaminationRoom</button>
</form>



@endsection