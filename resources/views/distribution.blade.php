@extends('master')
 
@section('content')
<h1 class="text-4xl m-auto">Distribution</h1>
<br>
<form action="{{ route('distribution') }}" method="post">
    @csrf
    <button type="submit" >Auto Assign Candidates</button>
    </form>

    <button type="submit"> <a href="{{ route('delete_D') }}">Reset </a></button>
       <br><br>



    <h1 class="text-4xl m-auto" >RESULT :</h1> 

    <br>

    @foreach ($rooms as $room)
    <h2 style="color: black; font-size: 24px;">{{ $room->name }} Candidates</h2>
        <table id="table-{{ $loop->index }}"> 
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sortedCandidates = $room->candidates->sortBy('name');
                @endphp

                @foreach ($sortedCandidates as $candidate)
                    <tr>
                        <td>{{ $candidate->name }}</td>
                    </tr>
                @endforeach

                @if ($sortedCandidates->isEmpty())
                    <tr>
                        <td colspan="1">No candidates assigned to this room</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <button onclick="printTable('{{ $room->name }}', 'table-{{ $loop->index }}')">Print Table</button>
        
        <br><br><br><br>
    @endforeach




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

   
    <script>
    function printTable(roomName, tableId) {
        var printWindow = window.open('', '_blank');
        var tableContent = document.getElementById(tableId).outerHTML;

        printWindow.document.write('<html><head><title>' + roomName + ' Candidates</title>');
        printWindow.document.write('<style>' +
            'body { font-family: Arial, sans-serif; }' +
            'h2 { text-align: center; color: #007bff; font-size: 24px; }' +
            'table { width: 100%; border-collapse: collapse; margin-top: 10px; }' +
            'th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }' +
            'th { background-color: #f2f2f2; }' +
            '</style></head><body>'
        );

        printWindow.document.write('<h2 style="color: black; font-size: 24px;">' + roomName + ' Candidates</h2>');
        printWindow.document.write(tableContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

@endsection