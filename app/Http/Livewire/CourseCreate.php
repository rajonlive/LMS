<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseCreate extends Component
{

    public $name;
    public $course_image;
    public $description;
    public $price;
    public $selectedDays = [];
    public $selectedTeachers = [];
    public $time;
    public $end_date;
    public $slug;

    // public $course_name;
    // public $course_image;
    // public $price;
    // public $description;
    // public $selectedDays = [];
    // public $selectedTeachers = [];
    // public $duration;
    // public $end_date;



    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];




    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'price' => 'required',
        'course_image'=> 'required',
        'selectedDays' => 'required',
        'time' => 'required'
    ];


    public function formSubmit() {
        $this->validate();
        // $course = Course::create([
        //     'name' => $this->name,
        //     'image' => $this->course_image,
        //     'description' => $this->description,
        //     'price' => $this->price,
        //     'user_id' => Auth::user()->id,
        // ]);

        $course = new Course();
        $course->name = $this->name;
        $course->slug = str_replace(' ', '-', $this->name);
        $course->description = $this->description;
        $course->image = $this->course_image;
        $course->price = $this->price;
        $course->user_id = Auth::user()->id;
        $course->save();

        $course_id = $course->id;
        foreach($this->selectedDays as $day) {
            // check how many sunday available
            $i = 1;
            $start_date = new DateTime(Carbon::now());
            $end_date =   new DateTime($this->end_date);
            $interval =  new DateInterval('P1D');
            $date_range = new DatePeriod($start_date, $interval, $end_date);
            foreach ($date_range as $date) {
                if($date->format("l") === "Sunday"){ // Need to make Selected day Dynamic
                    $curriculum = Curriculum::create([
                        'name' => $this->name.' '.$i++,
                        'week_day' => $day,
                        'class_time' => $this->time,
                        'end_date' => $this->end_date,
                        'course_id' => $course_id,
                    ]);
                }
            }
        }
        $i++;

        $course->teachers()->attach($this->selectedTeachers);

        flash()->addSuccess('Course created successfully');

        return redirect()->route('course.index');
    }


    public function render()
    {
        $teachers = User::Role('Teacher')->get();
        return view('livewire.course-create',
        ['teachers' => $teachers]);
    }
}
