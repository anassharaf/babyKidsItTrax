<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminContactInterface;
use App\Http\Requests\Contact\DeleteContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminContactController extends Controller
{
    public $adminContactInterface;
    public function __construct(AdminContactInterface $adminContactInterface)
    {
        $this->adminContactInterface = $adminContactInterface;
    }

    public function index()
    {
        return $this->adminContactInterface->index();
    }

    public function delete(DeleteContactRequest $request)
    {
        return $this->adminContactInterface->delete($request);
    }
}
