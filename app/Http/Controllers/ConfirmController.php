<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Confirm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $confirms = Confirm::all();
        }

         else if (Auth::user()->hasRole('leader')) {
            $teachers = Admin::where('leader_id', Auth::user()->id)->get();

            $students = [];

            foreach ($teachers as $teacher) {
                $items =  User::where('teacher_id', $teacher->id)->get();

                foreach ($items as $item) {
                    array_push($students, $item);
                }
            }

            $confirms = [];

            foreach ($students as $student) {
                $items = Confirm::where('user_id', $student->id)->get();

                foreach ($items as $item) {
                    array_push($confirms, $item);
                }
            }
         }

         else {
             $users = User::where('teacher_id', Auth::user()->id)->get();

             $confirms = [];

             foreach ($users as $user) {
                 $items = Confirm::where('user_id', $user->id)->get();
                 foreach ($items as $item) {
                     array_push($confirms, $item);
                 }
             }
         }

        return view('Confirm.index', compact('confirms'));
    }

    public function teacherConfirm(Request $request)
    {
        Confirm::where('id', $request->confirm_id)->update([
            'state' => '1차승인',
            'answer' => $request->answer,
        ]);

        return redirect('admin/confirm');
    }
}
