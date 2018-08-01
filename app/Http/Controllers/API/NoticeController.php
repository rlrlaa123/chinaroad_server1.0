<?php

namespace App\Http\Controllers\API;

use App\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    public function getNotice()
    {
        $notices = Notice::paginate(10);

        return response($notices);
    }
}
