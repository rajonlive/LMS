<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Curriculum;
use Livewire\Component;

class CourseShow extends Component
{
    public $course_id;
    public function render()
    {
        $course= Course::with('curriculumns')->findOrFail($this->course_id);
        $class = Curriculum::where('course_id',$course->id)->get();
        $allClass = $class->sortBy('class_date');

        return view('livewire.course-show',[
            'course' => $course,
            'allClass' => $allClass
        ]);
    }

    public function curriculamDelete($id)
    {
        $curriculum = Curriculum::findOrFail($id);

        $curriculum->delete();

        flash()->addSuccess('Curriculum deleted successfully');
    }


}
