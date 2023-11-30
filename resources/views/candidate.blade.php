@extends('master')
 
@section('content')

<h1 class="text-4xl">List of Candidates</h1>

<!--
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
</table>-->


<div class="m-5 relative overflow-x-auto shadow-md  sm:rounded-lg">
    <table class=" w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-00">
        <thead class="text-xs text-white uppercase bg-indigo-800 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Full Name
                </th>
                <th scope="col" class="px-6 py-3">
                    First Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Name
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
        @foreach($candidates as $candidate)
            <tr class="bg-indigo-600 border-b border-blue-400">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                {{ $candidate->name }}
                </th>
                
                <td class="px-6 py-4">
                {{ $candidate->first_name }}
                </td>
                <td class="px-6 py-4">
                {{ $candidate->last_name }}
                </td>

                <td class="px-6 py-4">
                    <a href="{{ route('modify_C', ['id' => $candidate->id]) }}" class="font-medium text-white hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    
                    <form  method="POST" action="{{route('delete_C', ['id' => $candidate->id])}}">
                        @csrf
                        @method("DELETE")
                        <input class="font-medium bg-indigo-600 text-white hover:underline" type="submit" value="DELETE" />
                    </form>
                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




<h1 class="text-4xl">Add New Candidate</h1>

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



@endsection