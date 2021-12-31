<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminCourseInterface;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Requests\Course\DeleteCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Traits\ImagesTrait;
use App\Models\Course;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCourseController extends Controller
{
    public $adminCourseInterface;

    public function __construct(AdminCourseInterface $adminCourseInterface)
    {
        $this->adminCourseInterface = $adminCourseInterface;
    }


    public function index()
    {
        return $this->adminCourseInterface->index();
    }

    public function create()
    {
        return $this->adminCourseInterface->create();
    }

    public function store(CreateCourseRequest $request)
    {
        return $this->adminCourseInterface->store($request);
    }

    public function delete(DeleteCourseRequest $request)
    {
        return $this->adminCourseInterface->delete($request);
    }

    public function edit($courseId)
    {
        return $this->adminCourseInterface->edit($courseId);
    }

    public function update(UpdateCourseRequest $request)
    {
        return $this->adminCourseInterface->update($request);
    }
}
