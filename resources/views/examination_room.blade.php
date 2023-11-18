<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<h1>List of ExaminationRoom</h1>


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
                    <a href="{{ route('modify', ['id' => $ExaminationRoom->id]) }}">UPDATE</a>
                </td>
                <td class="border-2">
                    <form method="POST" action="{{route('delete', ['id' => $ExaminationRoom->id])}}">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="DELETE" />
                    </form>
                
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



<h1>Add New ExaminationRoom</h1>

<form method="POST" action="{{route('store')}}">
    @csrf

    <label for="name"> Name:</label>
    <input type="text" name="name" required>

    <label for="capacity">Capacity:</label>
    <input type="text" name="capacity" required>


  

    <button type="submit">Add ExaminationRoom</button>
</form>



</body>
</html>