<x-app-layout>
    <x-slot name="header">
     <div class="flex justify-between">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users') }}
        </h2>
        <a class="lms-btn" href="{{route('user.index')}}">Roles</a>
        <a class="lms-btn" href="{{route('user.create')}}">Add New User</a>
     </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:user-index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
