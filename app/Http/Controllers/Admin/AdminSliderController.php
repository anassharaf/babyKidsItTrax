<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminSliderInterface;
use App\Http\Requests\Slider\AddSliderRequest;
use App\Http\Requests\Slider\DeleteSliderRequest;
use App\Http\Traits\ImagesTrait;
use App\Models\Slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSliderController extends Controller
{
    public $adminSliderInterface;
    public function __construct(AdminSliderInterface $adminSliderInterface)
    {
        $this->adminSliderInterface = $adminSliderInterface;
    }

    public function index()
    {
        return $this->adminSliderInterface->index();
    }

    public function create()
    {
      return $this->adminSliderInterface->create();
    }

    public function store(Request $request)
    {
        return $this->adminSliderInterface->store($request);
    }

    public function delete(DeleteSliderRequest $request)
    {
        return $this->adminSliderInterface->delete($request);
    }

    public function edit($sliderId)
    {
        return $this->adminSliderInterface->edit($sliderId);
    }


    public function update(Request $request)
    {
        return $this->adminSliderInterface->update($request);
    }
}
