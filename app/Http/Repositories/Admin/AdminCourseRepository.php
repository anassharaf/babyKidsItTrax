<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminCourseInterface;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Requests\Course\DeleteCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Traits\ImagesTrait;
use App\Models\Course;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCourseRepository implements AdminCourseInterface
{
    use ImagesTrait;

    public function index()
    {
        $courses = Course::get();
        return view('Admin.course.index',compact('courses'));
    }

    public function create()
    {
        return view('Admin.course.create');
    }

    public function store($request)
    {
        $imageName = time() . '_course.' . $request->image->extension();
        $this->uploadImage($request->image,$imageName,'courses');
        Course::create([
            'name'          => $request->name,
            'price'         => $request->price,
            'description'   => $request->description,
            'image'         => $imageName
        ]);

        Alert::success('Success','Course Created Successfully');
        return redirect(route('admin.course.all'));
    }

    public function delete($request)
    {
        $course = Course::find($request->course_id);
        unlink(public_path($course->image));
        $course->delete();
        Alert::success('Deleted','Course Deleted Successfully');
        return redirect()->back();
    }

    public function edit($courseId)
    {
        $course = Course::find($courseId);
        return view('Admin.course.edit',compact('course'));
    }

    public function update($request)
    {
        $course = Course::find($request->id);
        $updates = [
            'name'          => $request->name,
            'price'         => $request->price,
            'description'   => $request->description
        ];
        if (!is_null($request->image)) {
            $imageName = time() . '_course.' . $request->image->extension();
            $this->uploadImage($request->image,$imageName,'courses',$course->image);
            $updates = array_merge($updates,['image' => $imageName]);
        }

        $course->update($updates);
        Alert::success('Success','Course Updated');
        return redirect(route('admin.course.all'));
    }

}
