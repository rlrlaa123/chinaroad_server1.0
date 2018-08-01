<?php

namespace App\Http\Controllers\API;

use App\Inquiry;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    public function getInquiry($email)
    {
        $user = User::where('email', $email)->first();

        $inquires = Inquiry::where('user_id', $user->id)->paginate(15);

        return response($inquires);
    }
}
