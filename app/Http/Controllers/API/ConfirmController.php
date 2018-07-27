<?php

namespace App\Http\Controllers\API;

use App\Confirm;
use App\Edit;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConfirmController extends Controller
{
    public function getConfirm($email)
    {
        $user = User::where('email', $email)->first();

        $distincts = DB::table('confirms')
            ->distinct()
            ->select('date')
            ->where('user_id', '=', $user->id)
            ->groupBy('date')
            ->get();

        $confirms = [];
        foreach ($distincts as $index => $distinct) {
            $date = DB::table('confirms')
                ->where('date', $distinct->date);

            $total = $date->count();
            $confirmed = $date->where('state', '=', '승인완료')->count();
            $array = array(
                'id' => $index + 1,
                'date' => $distinct->date,
                'total' => $total,
                'confirmed' => $confirmed,
                'checked' => $total == $confirmed ? true : false,
            );

            array_push($confirms, $array);
        }

        return response($confirms);
    }

    public function showConfirm($email, $date)
    {
        $user = User::where('email', $email)->first();

        $confirms = Confirm::where([
            ['date', '=', $date],
            ['user_id', '=', $user->id],
            ['state', '=', '승인완료']
        ])->get();

        $response = [];

        foreach ($confirms as $index => $confirm) {
            $edit = Edit::where('id', $confirm->edit_id)->first();
            $array = array(
                'id' => $index + 1,
                'question_ch' => $edit->question_ch,
                'question_ko' => $edit->question_ko,
                'answer' => $confirm->answer,
                'reply' => $confirm->reply,
            );

            array_push($response, $array);
        }

        return response($response);
    }
}