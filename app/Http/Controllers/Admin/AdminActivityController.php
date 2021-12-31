<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminActivityInterface;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\DeleteActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Http\Traits\ImagesTrait;
use App\Models\Activity;
use App\Models\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminActivityController extends Controller
{


    public $adminActivityInterface;

    public function __construct(AdminActivityInterface $adminActivityInterface)
    {
        return $this->adminActivityInterface = $adminActivityInterface;
    }

    public function index()
    {
        return $this->adminActivityInterface->index();
    }

    public function create()
    {
        return $this->adminActivityInterface->create();
    }

    public function store(CreateActivityRequest $request)
    {
        return $this->adminActivityInterface->store($request);
    }

    public function delete(DeleteActivityRequest $request)
    {
        return $this->adminActivityInterface->delete($request);
    }

    public function edit($activityId)
    {
        return $this->adminActivityInterface->edit($activityId);
    }

    public function update(UpdateActivityRequest $request)
    {
        return $this->adminActivityInterface->update($request);
    }
}
