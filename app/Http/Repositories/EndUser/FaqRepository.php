<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\FaqInterface;
use App\Models\Faq;

class FaqRepository implements FaqInterface
{
    public function index()
    {
        $faqs = Faq::get();
        return view('faqs',compact('faqs'));
    }
}
