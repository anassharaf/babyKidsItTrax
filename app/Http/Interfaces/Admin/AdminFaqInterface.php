<?php

namespace App\Http\Interfaces\Admin;

interface AdminFaqInterface
{
    public function index();

    public function create();

    public function store($request);

    public function delete($request);

    public function edit($faqId);

    public function update($request);
}
