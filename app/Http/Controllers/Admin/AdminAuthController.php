<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminAuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAuthController extends Controller
{
    public $adminAuthInterface;

    public function __construct(AdminAuthInterface $adminAuthInterface)
    {
        $this->adminAuthInterface = $adminAuthInterface;
    }

    public function loginPage()
    {
        return $this->adminAuthInterface->loginPage();
    }

    public function login(Request $request)
    {
        return $this->adminAuthInterface->login($request);
    }

    public function logout(Request $request)
    {
        return $this->adminAuthInterface->logout($request);
    }
}
