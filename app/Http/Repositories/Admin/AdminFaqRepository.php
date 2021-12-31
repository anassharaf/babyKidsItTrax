<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminFaqInterface;
use App\Http\Requests\CreateFaqRequest;
use App\Http\Requests\DeleteFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use RealRashid\SweetAlert\Facades\Alert;

class AdminFaqRepository implements AdminFaqInterface
{
    public function index()
    {
        $faqs = Faq::get();
        return view('Admin.faq.faqs',compact('faqs'));
    }

    public function create()
    {
        return view('Admin.faq.create');
    }

    public function store($request)
    {
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        Alert::success('Success', 'Faq Was Created !');

        return redirect(route('admin.faq.all'));
    }

    public function delete($request)
    {
        Faq::where('id', $request->faq_id)->delete();

        Alert::success('Success', 'Faq Was Deleted !');

        return redirect()->back();
    }

    public function edit($faqId)
    {
        $faq = Faq::find($faqId);
        return view('Admin.faq.edit', compact('faq'));
    }

    public function update($request)
    {

        $faq = Faq::find($request->faq_id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        Alert::success('Success', 'Faq Was Updated !');
        return redirect(route('admin.faq.all'));

    }
}
