@extends('master')
 
@section('content')

<form action="{{ route('distribution') }}" method="post">
    @csrf
    <button type="submit">Auto Assign Candidates</button>
    </form>

    <button type="submit"> <a href="{{ route('delete_D') }}">Reset </a></button>
       <br><br>



    <h1>the repartition</h1>


    <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Room</th>
            <th>Committee</th>
            <th>supervisors</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($candidates as $candidate)
    <tr>
        <td>{{ $candidate->name }}</td>
        <td>{{ $candidate->examinationRooms->first()->name ?? 'Not Assigned' }}</td>
        <td>
            @if ($committee = $candidate->examinationCommittees->first())
                {{ $committee->committee_name ?? 'Not Assigned' }}

                @php
                    $supervisors = json_decode($committee->Supervisors, true);
                @endphp

                <td>
                    @if ($supervisors === null)
                        'Not Assigned'
                    @else
                        @foreach ($supervisors as $sup)
                            {{ $sup ?? 'Not Assigned' }} <br>
                        @endforeach
                    @endif
                </td>
            @else
                'Not Assigned'
            @endif
        </td>
    </tr>
@endforeach
    </tbody>
    </table>

   


@endsection