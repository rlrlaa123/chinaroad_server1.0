<?php

namespace App\Http\Controllers;

use App\Category;
use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Validator;

class ConversationController extends Controller
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
    public function index($category_id)
    {
        if (!Auth::user()->hasRole('admin')) {
            return view('layouts.401');
        }

        $conversations = Conversation::where('category_id', $category_id)->get();

        return view('Conversation.index', compact('conversations', 'category_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id)
    {
        if (!Auth::user()->hasRole('admin')) {
            return view('layouts.401');
        }

        return view('Conversation.create', compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $category_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'korean1' => 'required',
            'chinese_c1' => 'required',
            'chinese_e1' => 'required',
            'audio1' => 'required',
            'korean2' => 'required',
            'chinese_c2' => 'required',
            'chinese_e2' => 'required',
            'audio2' => 'required',
            'image1' => 'required | file | image',
            'image2' => 'required | file | image',
            'video1' => 'required',
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // conversation 폴더 있는지 확인 후 없으면 생성
        if ($request->hasFile('images')) {
            File::makeDirectory('images');
            if (!file_exists('images/conversations')) {
                File::makeDirectory('images/conversations');
            }
        }

        // 회화가 등록된 시간으로 (이미지, 음성, 비디오) 파일 저장 폴더 생성
        $time = time();
        File::makeDirectory('images/conversations/' . $time);
        $path = 'images/conversations/' . $time;

        // 회화 데이터
        $conversation = new Conversation;

        $conversation->category_id = $category_id;
        $conversation->name = $request->name;

        $conversation->korean1 = $request->korean1;
        $conversation->chinese_c1 = $request->chinese_c1;
        $conversation->chinese_e1 = $request->chinese_e1;

        $conversation->korean2 = $request->korean2;
        $conversation->chinese_c2 = $request->chinese_c2;
        $conversation->chinese_e2 = $request->chinese_e2;

        // 필수 입력이 아닌 회화 데이터
        for ($i = 3; $i <= 10; $i++) {
            if ($request->has('korean' . $i)) {
                $korean = 'korean' . $i;
                $chinese_c = 'chinese_c' . $i;
                $chinese_e = 'chinese_e' . $i;
                $conversation->$korean = $request->$korean;
                $conversation->$chinese_c = $request->$chinese_c;
                $conversation->$chinese_e = $request->$chinese_e;
            }
        }

        // image1 path 데이터 입력 및 파일 저장
        if ($request->hasFile('image1')) {

            $conversation_image = $request->file('image1');
            $conversation_name = 'image1' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->image1 = $path . '/' . $conversation_name;
        }

        // image2 path 데이터 입력 및 파일 저장
        if ($request->hasFile('image2')) {

            $conversation_image = $request->file('image2');
            $conversation_name = 'image2' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->image2 = $path . '/' . $conversation_name;
        }

        // audio1 path 데이터 입력 및 파일 저장
        if ($request->hasFile('audio1')) {

            $conversation_image = $request->file('audio1');
            $conversation_name = 'audio1' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->audio1 = $path . '/' . $conversation_name;
        }

        // audio2 path 데이터 입력 및 파일 저장
        if ($request->hasFile('audio2')) {

            $conversation_image = $request->file('audio2');
            $conversation_name = 'audio2' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->audio2 = $path . '/' . $conversation_name;
        }

        // 필수 입력이 아닌 오디오 데이터 입력 및 파일 저장
        for ($i = 3; $i <= 10; $i++) {
            if ($request->has('audio' . $i)) {
                $audio = 'audio' . $i;

                $conversation_image = $request->file('audio' . $i);
                $conversation_name = 'audio' . $i . '.' . $conversation_image->getClientOriginalExtension();
                $destinationPath_conversation = public_path($path);
                $conversation_image->move($destinationPath_conversation, $conversation_name);

                $conversation->$audio = $path . '/' . $conversation_name;
            }
        }

        // video1 path 데이터 입력 및 파일 저장
        if ($request->hasFile('video1')) {

            $conversation_image = $request->file('video1');
            $conversation_name = 'video1' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->video1 = $path . '/' . $conversation_name;
        }

        // video2~21 path 데이터 입력 및 파일 저장
        for ($i = 2; $i <= 21; $i++) {
            if ($request->hasFile('video' . $i)) {
                $video = 'video' . $i;

                $conversation_image = $request->file('video' . $i);
                $conversation_name = $video . '.' . $conversation_image->getClientOriginalExtension();
                $destinationPath_conversation = public_path($path);
                $conversation_image->move($destinationPath_conversation, $conversation_name);

                $conversation->$video = $path . '/' . $conversation_name;
            }
        }

        $conversation->save();

        return redirect('admin/conversation/' . $category_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id, $id)
    {
        if (!Auth::user()->hasRole('admin')) {
            return view('layouts.401');
        }

        $conversation = Conversation::find($id);

        return view('Conversation.edit', compact('conversation', 'category_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id, $conversation_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'korean1' => 'required',
            'chinese_c1' => 'required',
            'chinese_e1' => 'required',
            'korean2' => 'required',
            'chinese_c2' => 'required',
            'chinese_e2' => 'required',
        ]);

        $validator->after(function () {
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $conversation = Conversation::find($conversation_id);

        $conversation->category_id = $category_id;
        $conversation->name = $request->name;

        $conversation->korean1 = $request->korean1;
        $conversation->chinese_c1 = $request->chinese_c1;
        $conversation->chinese_e1 = $request->chinese_e1;

        $conversation->korean2 = $request->korean2;
        $conversation->chinese_c2 = $request->chinese_c2;
        $conversation->chinese_e2 = $request->chinese_e2;

        // 필수 입력이 아닌 회화 데이터
        for ($i = 3; $i <= 10; $i++) {
            if ($request->has('korean' . $i)) {
                $korean = 'korean' . $i;
                $chinese_c = 'chinese_c' . $i;
                $chinese_e = 'chinese_e' . $i;
                $conversation->$korean = $request->$korean;
                $conversation->$chinese_c = $request->$chinese_c;
                $conversation->$chinese_e = $request->$chinese_e;
            }
        }

        preg_match('/[0-9]+/', $conversation->image1, $matches);
        $path = 'images/conversations/' . $matches[0];

        // image1 path 데이터 입력 및 파일 저장
        if ($request->hasFile('image1')) {

            if ($conversation->image1 != null) {
                File::delete($conversation->image1);
            }

            $conversation_image = $request->file('image1');
            $conversation_name = 'image1' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->image1 = $path . '/' . $conversation_name;
        }

        // image2 path 데이터 입력 및 파일 저장
        if ($request->hasFile('image2')) {

            if ($conversation->image2 != null) {
                File::delete($conversation->image2);
            }

            $conversation_image = $request->file('image2');
            $conversation_name = 'image2' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->image2 = $path . '/' . $conversation_name;
        }

        // audio1 path 데이터 입력 및 파일 저장
        if ($request->hasFile('audio1')) {

            if ($conversation->audio1 != null) {
                File::delete($conversation->audio1);
            }

            $conversation_image = $request->file('audio1');
            $conversation_name = 'audio1' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->audio1 = $path . '/' . $conversation_name;
        }

        // audio2 path 데이터 입력 및 파일 저장
        if ($request->hasFile('audio2')) {

            if ($conversation->audio2 != null) {
                File::delete($conversation->audio2);
            }

            $conversation_image = $request->file('audio2');
            $conversation_name = 'audio2' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->audio2 = $path . '/' . $conversation_name;
        }

        // 필수 입력이 아닌 오디오 데이터 입력 및 파일 저장
        for ($i = 3; $i <= 10; $i++) {
            if ($request->has('audio' . $i)) {
                $audio = 'audio' . $i;

                if ($conversation->$audio != null) {
                    File:delete($conversation->$audio);
                }

                $conversation_image = $request->file('audio' . $i);
                $conversation_name = 'audio' . $i . '.' . $conversation_image->getClientOriginalExtension();
                $destinationPath_conversation = public_path($path);
                $conversation_image->move($destinationPath_conversation, $conversation_name);

                $conversation->$audio = $path . '/' . $conversation_name;
            }
        }

        // video1 path 데이터 입력 및 파일 저장
        if ($request->hasFile('video1')) {

            if ($conversation->video1 != null) {
                File::delete($conversation->video1);
            }

            $conversation_image = $request->file('video1');
            $conversation_name = 'video1' . '.' . $conversation_image->getClientOriginalExtension();
            $destinationPath_conversation = public_path($path);
            $conversation_image->move($destinationPath_conversation, $conversation_name);

            $conversation->video1 = $path . '/' . $conversation_name;
        }

        // video2~21 path 데이터 입력 및 파일 저장
        for ($i = 2; $i <= 21; $i++) {
            if ($request->hasFile('video' . $i)) {
                $video = 'video' . $i;

                if ($conversation->$video != null) {
                    File::delete($conversation->$video);
                }

                $conversation_image = $request->file('video' . $i);
                $conversation_name = $video . '.' . $conversation_image->getClientOriginalExtension();
                $destinationPath_conversation = public_path($path);
                $conversation_image->move($destinationPath_conversation, $conversation_name);

                $conversation->$video = $path . '/' . $conversation_name;
            }
        }

        $conversation->save();

        return redirect('admin/conversation/' . $category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id, $conversation_id)
    {
        $conversation = Conversation::find($conversation_id);
        preg_match('/[0-9]+/', $conversation->image1, $imageDirectory);
//        return 'images/conversation/' . $imageDirectory[0];
        File::deleteDirectory('images/conversations/' . $imageDirectory[0]);

        $conversation->delete();

        return response('success', 200);
    }

//    public function destroySingleVideo
}