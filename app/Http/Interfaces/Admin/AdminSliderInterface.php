<?php

namespace App\Http\Interfaces\Admin;

interface AdminSliderInterface
{
    public function index();

    public function create();

    public function store($request);

    public function delete($request);

    public function edit($sliderId);

    public function update($request);
}
