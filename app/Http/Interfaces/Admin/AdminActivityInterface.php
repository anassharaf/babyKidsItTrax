<?php
namespace App\Http\Interfaces\Admin;

use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\DeleteActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;

interface AdminActivityInterface {

    public function index();

    public function create();

    public function store($request);

    public function delete($request);

    public function edit($activityId);

    public function update($request);
}
