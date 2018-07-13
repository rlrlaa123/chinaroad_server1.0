<?php

namespace App\Http\Controllers\API;

use App\Edit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

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
}
