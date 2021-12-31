<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminContactInterface;
use App\Http\Requests\Contact\DeleteContactRequest;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class AdminContactRepository implements AdminContactInterface
{
    public function index()
    {
        $contacts = Contact::get();
        return view('Admin.contact.index',compact('contacts'));
    }

    public function delete($request)
    {
        Contact::find($request->contact_id)->delete();
        Alert::success('Success','Deleted Successfully');
        return redirect()->back();
    }
}
