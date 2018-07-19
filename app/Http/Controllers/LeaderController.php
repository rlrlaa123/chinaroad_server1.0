<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_teachers = DB::table('admin_role')->where('role_id', 3)->get();

        $teachers = [];

        foreach($role_teachers as $teacher) {
            array_push($teachers, Admin::find($teacher->admin_id));
        }

        $role_leaders = DB::table('admin_role')->where('role_id', 2)->get();

        $leaders = [];

        foreach($role_leaders as $leader) {
            array_push($leaders, Admin::find($leader->admin_id));
        }

        return view('Leader.index', compact('teachers', 'leaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignLeader(Request $request)
    {
        if ($request->role == '없음') {
            return back();
        }

        $leader_id = explode(',', $request->role)[0];
        $teacher_id = explode(',', $request->role)[1];

        $teacher = Admin::find($teacher_id);
//        return json_encode($teacher);
        $teacher->leader_id = $leader_id;

        $teacher->save();

        return redirect('admin/leader');
    }
}
