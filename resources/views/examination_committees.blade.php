@extends('master')
 
@section('content')
 
<h1 class="text-4xl">List of ExaminationCommittee</h1>

<div class="m-5 relative overflow-x-auto shadow-md  sm:rounded-lg">
    <table class=" w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-00">
        <thead class="text-xs text-white uppercase bg-indigo-800 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Committee Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Supervisors
                </th>
                <th scope="col" class="px-6 py-3">
                    edit
                </th>
                <th scope="col" class="px-6 py-3">
                    delete
                </th>
            </tr>
        </thead>
        <tbody >
        @foreach($ExaminationCommittees as $ExaminationCommittee)
            <tr class="bg-indigo-600 border-b border-blue-400">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                {{ $ExaminationCommittee->committee_name }}
                </th>
                <td class="px-6 py-4">
                @php
                    $supervisors = json_decode($ExaminationCommittee->Supervisors, true);
                @endphp

                
                    @foreach($supervisors as $supervisor)
                        {{ $supervisor }}<br>
                    @endforeach
               
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('modify', ['id' => $ExaminationCommittee->id]) }}" class="font-medium text-white hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    
                    <form  method="POST" action="{{ route('delete', ['id' => $ExaminationCommittee->id]) }}">
                        @csrf
                        @method("DELETE")
                        <input class="font-medium bg-indigo-600 text-white hover:underline" type="submit" value="DELETE" />
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!--<table class="border-2 p-4">
    <thead>
        <tr>
            <th class="border-2">Committee Name</th>
            <th class="border-2">Supervisors</th>
            <th class="border-2">Update</th>
            <th class="border-2">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ExaminationCommittees as $ExaminationCommittee)
            <tr>
                <td class="border-2">{{ $ExaminationCommittee->committee_name }}</td>
                <td class="border-2">
                @php
                    $supervisors = json_decode($ExaminationCommittee->Supervisors, true);
                @endphp

                
                    @foreach($supervisors as $supervisor)
                        {{ $supervisor }}<br>
                    @endforeach
               
            </td>
                <td class="border-2">
                    <a href="{{ route('modify', ['id' => $ExaminationCommittee->id]) }}">UPDATE</a>
                </td>
                <td class="border-2">
                    <form method="POST" action="{{ route('delete', ['id' => $ExaminationCommittee->id]) }}">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="DELETE" />
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
-->





<h1 class="text-4xl">Add New Examination Committee</h1>

<form method="POST" action="{{ route('store') }}">
    @csrf

    <label for="committee_name">Committee Name:</label>
    <input type="text" name="committee_name" required>

    <div id="supervisorFields">
        <label for="Supervisor">Supervisor Name:</label>
        <input type="text" name="supervisors[]" required>
    </div>

    <button type="button" onclick="addSupervisorField()">Add Supervisor</button>
    <br>

    <button type="submit">Add Examination Committee</button>
</form>

<script>
    function addSupervisorField() {
        var supervisorFields = document.getElementById('supervisorFields');

        var label = document.createElement('label');
        label.setAttribute('for', 'Supervisor');
        label.innerText = 'Supervisor Name:';

        var input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('name', 'supervisors[]');
        input.setAttribute('required', true);

        supervisorFields.appendChild(document.createElement('br'));
        supervisorFields.appendChild(label);
        supervisorFields.appendChild(input);
    }
</script>



@endsection