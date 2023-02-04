<form wire:submit.prevent="formSubmit">
    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Enter name',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'course_image',
            'label' => 'Image',
            'type' => 'text',
            'placeholder' => 'image url',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'placeholder' => 'Enter course description',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
            'placeholder' => 'Add price',
            'required' => 'required',
        ])
    </div>

    <div class="flex mb-6 items-center">
        <div class="w-full mr-4">
            <label class="lms-label" for="days">Days</label>
            <div class="flex flex-wrap -mx-4">
                @foreach ($days as $day)
                    <div class="min-w-max flex items-center px-4">
                        <input wire:model.lazy="selectedDays" class="mr-2" type="checkbox" value="{{ $day }}"
                            id="{{ $day }}"> <label for="{{ $day }}">{{ ucfirst($day) }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="min-w-max mr-4">
            <div class="mb-6">
                @include('components.form-field', [
                    'name' => 'time',
                    'label' => 'Time',
                    'type' => 'time',
                    'placeholder' => 'Enter time',
                    'required' => 'required',
                ])
            </div>
        </div>

        <div class="min-w-max">
            <div class="mb-6">
                @include('components.form-field', [
                    'name' => 'end_date',
                    'label' => 'End date',
                    'type' => 'date',
                    'placeholder' => 'Enter end date',
                    'required' => 'required',
                ])
            </div>
        </div>
    </div>
    <h3 class="text-gray-600 mt-4 ml-3">Select Teachers</h3>
    <div class="w-full  ml-3 mt-4 flex flex-wrap items-center gap-4">
    @foreach($teachers as $teacher)
            <div class="flex items-center">
                <input id="checked-checkbox" type="checkbox" value="{{$teacher->id}}" wire:model="selectedTeachers" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900">{{$teacher->name}}</label>
            </div>
        @endforeach
    </div>
    @error('selectedTeachers')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
    @enderror


    @include('components.wire-loading-btn')
</form>
