<?php

namespace App\Http\Interfaces\Admin;

interface AdminTeacherInterface
{
    public function index();

    public function create();

    public function store($request);

    public function delete($request);

    public function edit($teacherId);

    public function update($request);
}
