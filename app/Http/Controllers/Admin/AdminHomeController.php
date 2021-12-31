<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminHomeInterface;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public $adminHomeInterface;

    public function __construct(AdminHomeInterface $adminHomeInterface)
    {
        $this->adminHomeInterface = $adminHomeInterface;
    }

    public function index()
    {
        return $this->adminHomeInterface->index();
    }
}
