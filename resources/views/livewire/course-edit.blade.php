<div>
    <form class="p-4" wire:submit.prevent="courseEdit">
        <div class="flex w-full">
            @include('components.input-form',['name'=>'course_name','type'=>'text','label' => 'Name', 'placeholder'=>'Course Name'])
            @include('components.input-form',['name'=>'course_image','type'=>'text','label' => 'Image', 'placeholder'=>'image url'])
            @include('components.input-form',['name'=>'price','type'=>'number','label' => 'Price', 'placeholder'=>'Amount'])
        </div>
        <div class="w-full mt-8">
            @include('components.input-form',['name'=>'description','type'=>'textarea','label' => 'Description', 'placeholder'=>'Description'])
        </div>


        <h3 class="text-gray-600 mt-4 ml-3">Select Days</h3>
        <div class="w-full ml-3 mt-4 flex justify-between items-center gap-4">
            @foreach($days as $day)
                <div class="flex items-center">
                    <input id="checked-checkbox" type="checkbox" value="{{$day}}" wire:model="selectedDays" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                    <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900">{{$day}}</label>
                </div>
            @endforeach
            <div class="flex gap-4 items-center">
                <div class="min-w-max">
                    @include('components.input-form',['name'=>'duration','type'=>'time','label' => 'Time', 'placeholder'=>'duration'])
                </div>
                <div class="min-w-max">
                    @include('components.input-form',['name'=>'end_date','type'=>'date','label' => 'Date', 'placeholder'=>'Date'])
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

        @include('components.form-submit-btn',[
            'target' =>'courseEdit',
            'class' => 'bg-green-500 ml-3',
            'buttonText'=>'Update'
        ])
    </form>

</div>
