<?php

namespace App\Http\Interfaces\Admin;

interface AdminCourseInterface
{
    public function index();

    public function create();

    public function store($request);

    public function delete($request);

    public function edit($courseId);

    public function update($request);
}
