@extends('master')
 
@section('content')
 
<h1 class="text-4xl" >List of ExaminationRoom</h1>

<div class="m-5 relative overflow-x-auto shadow-md  sm:rounded-lg">
    <table class=" w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-00">
        <thead class="text-xs text-white uppercase bg-indigo-800 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                   name
                </th>
                <th scope="col" class="px-6 py-3">
                    Capacity
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
        @foreach($ExaminationRooms as $ExaminationRoom)
            <tr class="bg-indigo-600 border-b border-blue-400">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                {{ $ExaminationRoom->name }}
                </th>
                <td class="px-6 py-4">
                {{ $ExaminationRoom->capacity}}
                </td>

                <td class="px-6 py-4">
                    <a href="{{ route('modify_R', ['id' => $ExaminationRoom->id]) }}" class="font-medium text-white hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    
                    <form  method="POST" action="{{route('delete_R', ['id' => $ExaminationRoom->id])}}">
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