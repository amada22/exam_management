<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/candidates">candidates</a><br><br>
    <a href="/examination_committees">examination_committees</a><br><br>
    <a href="/examination_room">examination_room</a><br><br>
    


    <form action="{{ route('distribution') }}" method="post">
    @csrf
    <button type="submit">Auto Assign Candidates</button>
    </form>

    <button type="submit"> <a href="{{ route('delete_D') }}">examination_room</a></button>
       <br><br>



    <h1>the repartition</h1>


    <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Room</th>
            <th>Committee</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($candidates as $candidate)
            <tr>
                <td>{{ $candidate->name }}</td>
                <td>{{ $candidate->examinationRooms->first()->name ?? 'Not Assigned' }}</td>
                <td>{{ $candidate->examinationCommittees->first()->committee_name ?? 'Not Assigned' }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>




    <div>
        @yield('content')
    </div>
</body>
</html>