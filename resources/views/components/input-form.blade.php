@if($type == 'textarea')
    <div class="w-full mx-3">
        <label for="{{$name}}" class="lms-label">{{$label}}</label>
        <textarea id="{{$name}}" class="lms-input" name="{{$name}}" wire:model="{{$name}}" placeholder="{{$placeholder}}"></textarea>
        @error($name)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
        @enderror
    </div>
@else
    <div class="w-full mx-3">
        <label for="{{$name}}" class="lms-label">{{$label}}</label>
        <input type="{{$type}}" wire:model="{{$name}}" id="{{$name}}"  class="lms-input" placeholder="{{$placeholder}}" />
        @error($name)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
        @enderror
    </div>
@endif
