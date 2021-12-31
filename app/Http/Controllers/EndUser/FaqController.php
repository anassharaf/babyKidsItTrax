<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\FaqInterface;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public $faqInterface;
    public function __construct(FaqInterface $faqInterface)
    {
        $this->faqInterface = $faqInterface;
    }

    public function index()
    {
        return $this->faqInterface->index();
    }
}
