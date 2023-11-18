<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<h1>List of Candidates</h1>


<table class="border-2 p-4" >
    <thead>
        <tr>
            <th class="border-2">Full Name</th>
            <th class="border-2 ">First Name</th>
            <th class="border-2" >Last Name</th>
            <th class="border-2" >UPDATE</th>
            <th class="border-2" >DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($candidates as $candidate)
            <tr>
           
                <td class="border-2">{{ $candidate->name }}</td>
                <td class="border-2">{{ $candidate->first_name }}</td>
                <td class="border-2">{{ $candidate->last_name }}</td>
                <td class="border-2">
                    <a href="{{ route('modify_C', ['id' => $candidate->id]) }}">UPDATE</a>
                </td>
                <td class="border-2">
                    <form method="POST" action="{{route('delete_C', ['id' => $candidate->id])}}">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="DELETE" />
                    </form>
                
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



<h1>Add New Candidate</h1>

<form method="POST" action="{{route('store_C')}}">
    @csrf

    <label for="name">Full Name:</label>
    <input type="text" name="name" required>

    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required>


  

    <button type="submit">Add Candidate</button>
</form>



</body>
</html>