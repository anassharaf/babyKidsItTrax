<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\ContactInterface;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactRepository implements ContactInterface
{
    public function store($request)
    {
        Contact::create([
            'name'  => $request->name,
            'email' => $request->email,
            'message'=> $request->message
        ]);
        Alert::success('Success','Your Message Has been Sent!');
        return redirect()->back();
    }
}
