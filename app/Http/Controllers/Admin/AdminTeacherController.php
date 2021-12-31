<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminTeacherInterface;
use App\Http\Requests\Teacher\AddTeacherRequest;
use App\Http\Requests\Teacher\DeleteTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Traits\ImagesTrait;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTeacherController extends Controller
{
    use ImagesTrait;
    public $adminTeacherInterface;

    public function __construct(AdminTeacherInterface $adminTeacherInterface)
    {
        $this->adminTeacherInterface = $adminTeacherInterface;
    }

    public function index()
    {
        return $this->adminTeacherInterface->index();
    }

    public function create()
    {
        return $this->adminTeacherInterface->create();
    }

    public function store(AddTeacherRequest $request)
    {
        return $this->adminTeacherInterface->store($request);
    }

    public function delete(DeleteTeacherRequest $request)
    {

        return $this->adminTeacherInterface->delete($request);
    }

    public function edit($teacherId)
    {
        return $this->adminTeacherInterface->edit($teacherId);
    }

    public function update(UpdateTeacherRequest $request)
    {
        return $this->adminTeacherInterface->update($request);
    }
}
