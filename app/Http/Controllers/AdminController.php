<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Role;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('name')->get();

        return view('Admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required',
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $admin = new Admin;

        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->name = $request->name;
        $admin->email = $request->email;

        $admin->save();

        $admin->roles()->attach(Role::where('name', $request->role)->first());

        return redirect('admin/admin');
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
        $admin = Admin::find($id);

        return view('Admin.edit', compact('admin'));
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
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|string|email|max:255|unique:admins',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->email != null) {
            Admin::where('id', $id)->update([
                'email' => $request->email,
            ]);
        }

        if ($request->password != null) {
            Admin::where('id', $id)->update([
                'password' => bcrypt($request->password),
            ]);
        }
        if ($request->name != null) {
            Admin::where('id', $id)->update([
                'name' => $request->name,
            ]);
        }

        return redirect('admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);

        $admin->roles()->detach();
        $admin->delete();

        return response('success', 200);
    }

    public function authorizeAdmin(Request $request, $id)
    {
//        return $request;
        $admin = Admin::find($request->admin_id);

        $admin->roles()->detach();
        $admin->roles()->attach(Role::where('name', $request->role)->first());

        return redirect('admin/admin');
    }
}
