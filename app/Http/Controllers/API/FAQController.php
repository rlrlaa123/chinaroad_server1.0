<?php

namespace App\Http\Controllers\API;

use App\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    public function getFAQ()
    {
        $faqs = FAQ::paginate(15);

        return response($faqs);
    }
}
