<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\ContactInterface;
use App\Http\Requests\Contact\AddContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public $contactInterface;
    public function __construct(ContactInterface $contactInterface)
    {
        $this->contactInterface = $contactInterface;
    }

    public function store(AddContactRequest $request)
    {
        return $this->contactInterface->store($request);
    }
}
