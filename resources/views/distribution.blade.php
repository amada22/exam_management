@extends('master')
 
@section('content')
<h1 class="text-center text-4xl">Distribution</h1>
<br>
<form action="{{ route('distribution') }}" method="post" class="text-center">
    @csrf
    <button class="bg-indigo-600 text-white h-15 w-40 sm:rounded-lg" type="submit" >Auto Assign Candidates</button>
    </form>
<br><br>

    <div class="m-5 relative overflow-x-auto shadow-md  sm:rounded-lg">
        
    @foreach ($rooms as $room)

       <h2 class="text-center text-4xl" >{{ $room->name }} Candidates</h2>
<br><br>
        <table id="table-{{ $loop->index }}" class=" w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-00">
            <thead class="text-xs text-white uppercase bg-indigo-800 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>     
                </tr>
            </thead>
            <tbody >
                    @php
                        $sortedCandidates = $room->candidates->sortBy('name');
                    @endphp

                    @foreach ($sortedCandidates as $candidate)
                        <tr class="bg-indigo-600 border-b border-blue-400">
                            <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100" >
                                {{ $candidate->name }}
                            </th>
                        </tr>
                    @endforeach

                    @if ($sortedCandidates->isEmpty())
                        <tr class="bg-indigo-600 border-b border-blue-400">
                            <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">No candidates assigned to this room</td>
                        </tr>
                    @endif
            </tbody>
        </table>
        <br>
        <br>
        <button class="bg-indigo-600 text-white h-15 w-20 sm:rounded-lg" onclick="printTable('{{ $room->name }}', 'table-{{ $loop->index }}')">Print Table</button>
        <br>
        <br>
        <br>
     @endforeach
        <div class="text-center">
            <button class="text-center bg-red-600 text-white h-15 w-20 sm:rounded-lg" type="submit"> <a  href="{{ route('delete_D') }}">Reset </a></button>
                <br><br>
        </div>
</div>




   <!-- @foreach ($rooms as $room)
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
-->
   
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