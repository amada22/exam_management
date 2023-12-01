@extends('master')
 
@section('content')


<h1 class="text-center text-4xl">Add New Candidate</h1>

<section class="m-5 relative overflow-x-auto shadow-md  sm:rounded-lg bg-indigo-800 ">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 ">
      <form method="POST" action="{{route('store_C')}}">
      @csrf

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 ">
              <div class="sm:col-span-2">
                  <label for="name" class="text-white block mb-2 text-sm font-medium  dark:text-white">Full Name</label>
                  <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
              </div>
              <div class="w-full">
                  <label for="first_name" class="text-white block mb-2 text-sm font-medium  dark:text-white">First name</label>
                  <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
              </div>
              <div class="w-full">
                  <label for="last_name" class="text-white block mb-2 text-sm font-medium  dark:text-white">Last name</label>
                  <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
              </div>            
            </div>
          <button type="submit" class="bg-indigo-300 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center  rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900  text-black">
          Add Candidate
          </button>
      </form>
  </div>
</section>


<h1 class="text-center text-4xl">List of Candidates</h1>
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

<br><br><br>



@endsection