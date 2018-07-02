<?php

namespace App\Http\Controllers;

use App\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id)
    {
        $lists = Lists::where('category_id', $category_id)->get();

        return view('List.index', compact('category_id', 'lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id)
    {
        return view('List.create', compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $category_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')) {
            if (!file_exists('images')) {
                File::makeDirectory('images');
                if(!file_exists('images/lists')) {
                    File::makeDirectory('images/lists');
                }
            }

            $list = $request->file('image');
            $list_name = 'list' . time() . '.' . $list->getClientOriginalExtension();
            $destinationPath_list = public_path('images/lists/');
            $list->move($destinationPath_list, $list_name);
        }

        $list = new Lists;

        $list->name = $request->name;
        $list->category_id = $category_id;
        if($request->has('image')) {
            $list->image = 'images/lists/' . $list_name;
        }
        $list->save();

        return redirect('admin/conversation/' . $category_id);
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
    public function edit($category_id, $list_id)
    {
        $list = Lists::find($list_id);

        return view('List.edit', compact('category_id', 'list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id, $list_id)
    {
        if ($request->hasFile('image')) {
            if (!file_exists('images')) {
                File::makeDirectory('images');
                if(!file_exists('images/lists')) {
                    File::makeDirectory('images/lists');
                }
            }
            $list = Lists::find($list_id);

            if($list->image != null) {
                File::delete($list->image);
            }

            $list = $request->file('image');
            $list_name = 'list' . time() . '.' . $list->getClientOriginalExtension();
            $destinationPath_list = public_path('images/lists/');
            $list->move($destinationPath_list, $list_name);
        }

        Lists::where('id', $list_id)->update([
            'name' => $request->name,
        ]);

        if($request->has('image')) {
            Lists::where('id', $list_id)->update([
                'image' => 'images/lists/' . $list_name,
            ]);
        }

        return redirect('admin/conversation/' . $category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id, $list_id)
    {
        $list = Lists::find($list_id);

        File::delete($list->image);

        $list->delete();

        return response('success', 200);
    }
}
