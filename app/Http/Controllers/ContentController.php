<?php

namespace App\Http\Controllers;

use App\Classification;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Validator;

class ContentController extends Controller
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
        if (!Auth::user()->hasRole('admin')) {
            return view('layouts.401');
        }

        $contents = Content::all();

        return view('Contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->hasRole('admin')) {
            return view('layouts.401');
        }

        $classifications = Classification::all();

        return view('Contents.create', compact('classifications'));
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
            'classification' => 'required',
            'activate' => 'required | boolean',
            'level' => 'required',
            'image' => 'required',
            'title_ko' => 'required',
            'audio_ko' => 'required',
            'contents_ko' => 'required',
            'title_ch' => 'required',
            'audio_ch' => 'required',
            'contents_ch' => 'required',
        ]);

        $validator->after(function () use ($request, $validator) {
            if($request->classification == '선택해주세요') {
                $validator->errors()->add('classification', '카테고리 필드는 필수입니다.');
            }
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // contents 폴더 있는지 확인 후 없으면 생성
        if ($request->hasFile('image')) {
            if (!file_exists('images')) {
                File::makeDirectory('images');
            }
            if (!file_exists('images/contents')) {
                File::makeDirectory('images/contents');
            }
        }

        // 회화가 등록된 시간으로 (이미지, 음성, 비디오) 파일 저장 폴더 생성
        $time = time();
        File::makeDirectory('images/contents/' . $time);
        $path = 'images/contents/' . $time;

        $content = new Content;

        $content->classification_id = Classification::where('name', $request->classification)->first()->id;
        $content->activate = $request->activate;
        $content->level = $request->level;
        $content->title_ko = $request->title_ko;
        $content->contents_ko = $request->contents_ko;
        $content->title_ch = $request->title_ch;
        $content->contents_ch = $request->contents_ch;

        // image path 데이터 입력 및 파일 저장
        if ($request->hasFile('image')) {

            if($content->image != null) {
                File::delete($content->image);
            }

            $content_image = $request->file('image');
            $content_name = 'image' . '.' . $content_image->getClientOriginalExtension();
            $destinationPath_contents = public_path($path);
            $content_image->move($destinationPath_contents, $content_name);

            $content->image = $path . '/' . $content_name;
        }

        // audio_ko path 데이터 입력 및 파일 저장
        if ($request->hasFile('audio_ko')) {

            $content_image = $request->file('audio_ko');
            $content_name = 'audio_ko' . '.' . $content_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $content_image->move($destinationPath_content, $content_name);

            $content->audio_ko = $path . '/' . $content_name;
        }

        // audio_ch path 데이터 입력 및 파일 저장
        if ($request->hasFile('audio_ch')) {

            $content_image = $request->file('audio_ch');
            $content_name = 'audio_ch' . '.' . $content_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $content_image->move($destinationPath_content, $content_name);

            $content->audio_ch = $path . '/' . $content_name;
        }

        $content->save();

        return redirect('admin/contents');
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
        if (!Auth::user()->hasRole('admin')) {
            return view('layouts.401');
        }

        $classifications = Classification::all();
        $content = Content::find($id);

        return view('Contents.edit', compact('classifications', 'content'));
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

        $validator->after(function () use ($request, $validator) {
            if($request->classification == '선택해주세요') {
                $validator->errors()->add('classification', '카테고리 필드는 필수입니다.');
            }
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $content = Content::find($id);

        $content->classification_id = Classification::where('name', $request->classification)->first()->id;
        $content->activate = $request->activate;
        $content->level = $request->level;
        $content->title_ko = $request->title_ko;
        $content->contents_ko = $request->contents_ko;
        $content->title_ch = $request->title_ch;
        $content->contents_ch = $request->contents_ch;

        preg_match('/[0-9]+/', $content->image, $matches);
        $path = 'images/contents/' . $matches[0];

        // image path 데이터 입력 및 파일 저장
        if ($request->hasFile('image')) {

            if($content->image != null) {
                File::delete($content->image);
            }

            $content_image = $request->file('image');
            $content_name = 'image' . '.' . $content_image->getClientOriginalExtension();
            $destinationPath_contents = public_path($path);
            $content_image->move($destinationPath_contents, $content_name);

            $content->image = $path . '/' . $content_name;
        }

        // audio_ko path 데이터 입력 및 파일 저장
        if ($request->hasFile('audio_ko')) {

            if($content->audio_ko != null) {
                File::delete($content->audio_ko);
            }

            $content_image = $request->file('audio_ko');
            $content_name = 'audio_ko' . '.' . $content_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $content_image->move($destinationPath_content, $content_name);

            $content->audio_ko = $path . '/' . $content_name;
        }

        // audio_ch path 데이터 입력 및 파일 저장
        if ($request->hasFile('audio_ch')) {

            if($content->audio_ch != null) {
                File::delete($content->audio_ch);
            }

            $content_image = $request->file('audio_ch');
            $content_name = 'audio_ch' . '.' . $content_image->getClientOriginalExtension();
            $destinationPath_content = public_path($path);
            $content_image->move($destinationPath_content, $content_name);

            $content->audio_ch = $path . '/' . $content_name;
        }

        $content->save();

        return redirect('admin/contents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);

        preg_match('/[0-9]+/', $content->image, $imageDirectory);

        File::deleteDirectory('images/contents/' . $imageDirectory[0]);

        $content->delete();

        return response('success', 200);
    }

    // 콘텐츠 리스트 페이지에서 '활성화' '비활성화' 변경 기능
    public function activateContents(Request $request)
    {
        $content = Content::find($request->content_id);

        $content->activate = $request->activate;

        $content->save();

        return redirect('admin/contents');
    }
}
