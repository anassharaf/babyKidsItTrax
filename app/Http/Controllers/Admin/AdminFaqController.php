<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminFaqInterface;
use App\Http\Requests\CreateFaqRequest;
use App\Http\Requests\DeleteFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminFaqController extends Controller
{
    public $adminFaqInterface;

    public function __construct(AdminFaqInterface $adminFaqInterface)
    {
        $this->adminFaqInterface = $adminFaqInterface;
    }

    public function index()
    {
        return $this->adminFaqInterface->index();
    }

    public function create()
    {
        return $this->adminFaqInterface->create();
    }

    public function store(CreateFaqRequest $request)
    {
        return $this->adminFaqInterface->store($request);
    }

    public function delete(DeleteFaqRequest $request)
    {
        return $this->adminFaqInterface->delete($request);
    }

    public function edit($faqId)
    {
        return $this->adminFaqInterface->edit($faqId);
    }

    public function update(UpdateFaqRequest $request)
    {
        return $this->adminFaqInterface->update($request);
    }
}
