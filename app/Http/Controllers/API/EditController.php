<?php

namespace App\Http\Controllers\API;

use App\Confirm;
use App\Edit;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Validator;

class EditController extends Controller
{
    public function todayEdits()
    {
        $edits = Edit::where('date', Carbon::now()->toDateString())->get();

        foreach($edits as $edit) {
            $edit->image = URL::to('/') . '/' . $edit->image;
            $edit->question_audio_ko = URL::to('/') . '/' . $edit->question_audio_ko;
            $edit->question_audio_ch = URL::to('/') . '/' . $edit->question_audio_ch;
            $edit->answer_audio_ko = URL::to('/') . '/' . $edit->answer_audio_ko;
            $edit->answer_audio_ch = URL::to('/') . '/' . $edit->answer_audio_ch;
        }

        return response($edits);
    }

    public function sendReply(Request $request)
    {
        $confirm = new Confirm;

        $confirm->user_id = User::where('email', $request->input('email'))->first()->id;
        $confirm->edit_id = $request->edit_id;
        $confirm->reply = $request->reply;
        $confirm->date = $request->date;
        $confirm->state = '첨삭대기';

        $confirm->save();

        return response('success', 200);
    }

    public function checkTodayConfirms($email)
    {
        $user = User::where('email', $email)->first();
        $edits = Edit::where('date', Carbon::now()->toDateString())->get();
//        return response($edits);
        $confirms = [];
        foreach ($edits as $edit) {
            array_push($confirms, Confirm::where([
                ['user_id', '=', $user->id],
                ['edit_id', '=', $edit->id]
            ])->first());
        }

        return response($confirms);
    }
}
