<?php

namespace App\Http\Controllers;

use App\Edit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;

class EditController extends Controller
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
        $edits = Edit::all();

        return view('Edit.index', compact('edits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Edit.create');
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
            'date' => 'required',
            'level' => 'required',
            'image' => 'required',
            'question_ko' => 'required',
            'question_ch' => 'required',
            'answer_ko' => 'required',
            'answer_ch' => 'required',
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // edits 폴더 있는지 확인 후 없으면 생성
        if (!file_exists('images')) {
            File::makeDirectory('images');
        }
        if (!file_exists('images/edits')) {
            File::makeDirectory('images/edits');
        }

        // 회화가 등록된 시간으로 (이미지, 음성, 비디오) 파일 저장 폴더 생성
        $time = time();
        File::makeDirectory('images/edits/' . $time);
        $path = 'images/edits/' . $time;

        $edit = new Edit;

        $edit->date = $request->date;
        $edit->level = $request->level;
        $edit->question_ko = $request->question_ko;
        $edit->question_ch = $request->question_ch;
        $edit->answer_ko = $request->answer_ko;
        $edit->answer_ch = $request->answer_ch;

        // image path 데이터 입력 및 파일 저장
        if ($request->hasFile('image')) {

            if($edit->image != null) {
                File::delete($edit->image);
            }

            $edit_image = $request->file('image');
            $edit_name = 'image' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_edit = public_path($path);
            $edit_image->move($destinationPath_edit, $edit_name);

            $edit->image = $path . '/' . $edit_name;
        }

        // question_audio_ko path 데이터 입력 및 파일 저장
        if ($request->hasFile('question_audio_ko')) {

            $edit_image = $request->file('question_audio_ko');
            $edit_name = 'question_audio_ko' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $edit_image->move($destinationPath_content, $edit_name);

            $edit->question_audio_ko = $path . '/' . $edit_name;
        }

        // answer_audio_ko path 데이터 입력 및 파일 저장
        if ($request->hasFile('answer_audio_ko')) {

            $edit_image = $request->file('answer_audio_ko');
            $edit_name = 'answer_audio_ko' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $edit_image->move($destinationPath_content, $edit_name);

            $edit->answer_audio_ko = $path . '/' . $edit_name;
        }

        // question_audio_ch path 데이터 입력 및 파일 저장
        if ($request->hasFile('question_audio_ch')) {

            $edit_image = $request->file('question_audio_ch');
            $edit_name = 'question_audio_ch' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $edit_image->move($destinationPath_content, $edit_name);

            $edit->question_audio_ch = $path . '/' . $edit_name;
        }

        // answer_audio_ch path 데이터 입력 및 파일 저장
        if ($request->hasFile('answer_audio_ch')) {

            $edit_image = $request->file('answer_audio_ch');
            $edit_name = 'answer_audio_ch' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $edit_image->move($destinationPath_content, $edit_name);

            $edit->answer_audio_ch = $path . '/' . $edit_name;
        }

        $edit->save();

        return redirect('admin/edit');
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
        $edit = Edit::find($id);

        return view('Edit.edit', compact('edit'));
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
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $edit = Edit::find($id);

        $edit->date = $request->date;
        $edit->level = $request->level;
        $edit->question_ko = $request->question_ko;
        $edit->question_ch = $request->question_ch;
        $edit->answer_ko = $request->answer_ko;
        $edit->answer_ch = $request->answer_ch;

        preg_match('/[0-9]+/', $edit->image, $matches);
        $path = 'images/edits/' . $matches[0];

        // image path 데이터 입력 및 파일 저장
        if ($request->hasFile('image')) {

            if($edit->image != null) {
                File::delete($edit->image);
            }

            $edit_image = $request->file('image');
            $edit_name = 'image' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_edit = public_path($path);
            $edit_image->move($destinationPath_edit, $edit_name);

            $edit->image = $path . '/' . $edit_name;
        }

        // question_audio_ko path 데이터 입력 및 파일 저장
        if ($request->hasFile('question_audio_ko')) {

            if($edit->question_audio_ko != null) {
                File::delete($edit->question_audio_ko);
            }

            $edit_image = $request->file('question_audio_ko');
            $edit_name = 'question_audio_ko' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $edit_image->move($destinationPath_content, $edit_name);

            $edit->question_audio_ko = $path . '/' . $edit_name;
        }

        // answer_audio_ko path 데이터 입력 및 파일 저장
        if ($request->hasFile('answer_audio_ko')) {

            if($edit->answer_audio_ko != null) {
                File::delete($edit->answer_audio_ko);
            }

            $edit_image = $request->file('answer_audio_ko');
            $edit_name = 'answer_audio_ko' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $edit_image->move($destinationPath_content, $edit_name);

            $edit->answer_audio_ko = $path . '/' . $edit_name;
        }

        // question_audio_ch path 데이터 입력 및 파일 저장
        if ($request->hasFile('question_audio_ch')) {

            if($edit->question_audio_ch != null) {
                File::delete($edit->question_audio_ch);
            }

            $edit_image = $request->file('question_audio_ch');
            $edit_name = 'question_audio_ch' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $edit_image->move($destinationPath_content, $edit_name);

            $edit->question_audio_ch = $path . '/' . $edit_name;
        }

        // answer_audio_ch path 데이터 입력 및 파일 저장
        if ($request->hasFile('answer_audio_ch')) {

            if($edit->answer_audio_ch != null) {
                File::delete($edit->answer_audio_ch);
            }

            $edit_image = $request->file('answer_audio_ch');
            $edit_name = 'answer_audio_ch' . '.' . $edit_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $edit_image->move($destinationPath_content, $edit_name);

            $edit->answer_audio_ch = $path . '/' . $edit_name;
        }

        $edit->save();

        return redirect('admin/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edit = Edit::find($id);

        preg_match('/[0-9]+/', $edit->image, $imageDirectory);

        File::deleteDirectory('images/edits/' . $imageDirectory[0]);

        $edit->delete();

        return response('success', 200);
    }
}
