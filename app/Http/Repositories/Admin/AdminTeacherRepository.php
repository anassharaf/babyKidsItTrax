<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminTeacherInterface;
use App\Http\Requests\Teacher\AddTeacherRequest;
use App\Http\Requests\Teacher\DeleteTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Traits\ImagesTrait;
use App\Models\Course;
use App\Models\Teacher;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTeacherRepository implements AdminTeacherInterface
{
    use ImagesTrait;
    public function index()
    {
        $teachers = Teacher::get();
        return view('Admin.teachers.teachers',compact('teachers'));
    }

    public function create()
    {
        $courses = Course::get();
        return view('Admin.teachers.create',compact('courses'));
    }

    public function store($request)
    {
        $image = $request->image;
        $imageName = time() . '_teacher.'. $image->extension();
        $this->uploadImage($image,$imageName,'teachers');

        Teacher::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $imageName,
            'course_id'     => $request->course_id
        ]);
        Alert::success('Success', 'Teacher Was Created !');
        return redirect(route('admin.teacher.all'));
    }

    public function delete($request)
    {

        $teacher =Teacher::where('id',$request->teacher_id)->first();
        unlink(public_path($teacher->image));
        $teacher->delete();
        Alert::success('Success', 'Teacher Was Deleted !');
        return redirect()->back();
    }

    public function edit($teacherId)
    {
        $teacher = Teacher::where('id',$teacherId)->first();
        $courses = Course::get();

        return view('Admin.teachers.edit',compact('teacher','courses'));
    }

    public function update($request)
    {
        $teacher = Teacher::find($request->id);
        if (!is_null($request->image)){
            $imageName = time() . '_teacher.' . $request->image->extension();
            $this->uploadImage($request->image, $imageName, 'teachers', $teacher->image);
        }

        $teacher->update(
            [
                'name'          => $request->name,
                'description'   => $request->description,
                'course_id'     => $request->course_id,
                'image' => (isset($imageName)) ? $imageName : $teacher->getRawOriginal('image')
            ]);

        Alert::success('Success','Updated Successfully');
        return redirect(route('admin.teacher.all'));
    }
}
