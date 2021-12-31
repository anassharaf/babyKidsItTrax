<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Slider;
use App\Models\Teacher;

class HomeRepository implements HomeInterface
{
    public function index()
    {
        $sliders = Slider::get();
        $activities = Activity::get();
        $courses = Course::get();
        $faqs = Faq::get();
        $teachers = Teacher::get();
        return view('index',compact('sliders','activities','courses','faqs','teachers'));
    }
}
