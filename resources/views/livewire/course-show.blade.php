<div class=" justify-center">
    <div class="rounded-sm  mx-4 shadow-sm bg-white pb-3">
        <img class="h-40" src="{{$course->image}}">

        <div class="mt-4">
            <div class="flex">
                <h1 class="text-3xl font-bold text-gray-900">
                   {{$course->name}}
                </h1>
            </div>


            <ul class="flex flex-wrap items-center gap-4 mt-5 text-gray-700">
                <li class="flex items-center gap-2">
                    Total Class
                    <span>{{count($course->curriculumns)}} </span>
                </li>


                <li class="flex items-center gap-2">
                    <svg class="w-6 h-6 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>${{number_format($course->price,2)}}</span>
                </li>
            </ul>
        </div>
        <h3 class="text-lg py-4">Teachers</h3>
        <ul class="flex flex-wrap gap-4">
            @foreach($course->teachers as $teacher)
            <li>
                <p><span>Name: </span> {{$teacher->name}}</p>
                <p><span>Email: </span> {{$teacher->email}}</p>
            </li>
            @endforeach
        </ul>
        <h3 class="text-lg py-4">Description</h3>
        <p class="text-gray-600">{{$course->description}}</p>
        <h3 class="text-lg py-4">All Class List</h3>
        <div class="table w-full p-2">
           {{--  <table class="w-full border">
                <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Class No
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Date
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Start Time
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i=1
                @endphp
                @foreach($allClass as $class)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                        <td class="p-2 border-r text-left px-4">Class-{{$i++}}</td>
                        <td class="p-2 border-r text-center px-4">
                           {{date('l,F j,Y',strtotime($class->class_date))}}
                        </td>
                        <td class="p-2 border-r text-center px-4">
                            {{date('H:i A',strtotime($class->class_duration))}}
                        </td>
                    </tr>
                @endforeach
                </tbody> --}}
            </table>
        </div>
        <table class="w-full table-auto">
            <tr>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 text-left">Actions</th>
            </tr>

            @foreach ($allClass as $class)
            <tr>
                <td class="border px-4 py-2">{{$class->name}}</td>
                <td class="border px-4 py-2">
                    <div class="flex items-center justify-center">
                        <a class="mr-1" href="{{route('class.edit',$class->id)}}">
                            @include('components.icons.edit')
                        </a>

                        <a class="mr-1" href="{{route('class.show', $class->id)}}">
                            @include('components.icons.eye')
                        </a>

                        <form class="ml-1" onsubmit="return confirm('Are you sure?');"
                            wire:submit.prevent="curriculamDelete({{$class->id}})">
                            <button type="submit">
                                @include('components.icons.trash')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
