<?php

namespace App\Http\Controllers;

use App\Category;
use App\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;

class CategoryController extends Controller
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
        $categories = Category::all();

        return view('Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
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
            'name' => 'required',
            'level' => 'required',
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
                if(!file_exists('images/categories')) {
                    File::makeDirectory('images/categories');
                }
            }

            $category = $request->file('image');
            $category_name = 'category' . time() . '.' . $category->getClientOriginalExtension();
            $destinationPath_category = public_path('images/categories/');
            $category->move($destinationPath_category, $category_name);
        }

        $category = new Category;

        $category->name = $request->name;
        $category->level = $request->level;
        if($request->has('description')) {
            $category->description = $request->description;
        }
        if($request->has('image')) {
            $category->image = 'images/categories/' . $category_name;
        }
        $category->save();

        return redirect('admin/conversation');
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
        $category = Category::find($id);

        return view('Category.edit', compact('category'));
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
        if ($request->hasFile('image')) {
            if (!file_exists('images')) {
                File::makeDirectory('images');
                if(!file_exists('images/categories')) {
                    File::makeDirectory('images/categories');
                }
            }
            $category = Category::find($id);

            if($category->image != null) {
                File::delete($category->image);
            }

            $category = $request->file('image');
            $category_name = 'category' . time() . '.' . $category->getClientOriginalExtension();
            $destinationPath_category = public_path('images/categories/');
            $category->move($destinationPath_category, $category_name);
        }

        Category::where('id', $id)->update([
            'name' => $request->name,
            'level' => $request->level,
        ]);

        if($request->has('description')) {
            Category::where('id', $id)->update([
                'description' => $request->description,
            ]);
        }
        if($request->has('image')) {
            Category::where('id', $id)->update([
                'image' => 'images/categories/' . $category_name,
            ]);
        }

        return redirect('admin/conversation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        File::delete($category->image);

        $lists = Lists::where('category_id', $id)->get();

        foreach ($lists as $list) {
            if ($list->image) {
                File::delete($list->image);
            }
        }

        $category->delete();

        return response('success', 200);
    }
}
