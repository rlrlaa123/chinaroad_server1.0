@extends('layouts.admin')
@section('style')
    <style>
        .td-input {
            text-align: left;
        }

        #name {
            width: 80%;
        }

        .description {
            width :80%;
        }
    </style>
@endsection
@section('content')
    <h3>※ 회화리스트 -> {{ \App\Category::find($category_id)->name }} -> 수정</h3>
    <hr>
    <form method="POST" action="{{ route('conversation.update', [$category_id, $conversation->id]) }}" enctype="multipart/form-data">
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <table>
            <tr>
                <td><label for="name">제목</label></td>
                <td class="td-input">
                    <input id="name" class="name" name="name" type="text" value="{{ old('name', $conversation->name) }}">
                    @if ($errors->has('name'))
                        <div class="help-block">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean1">한국어 문장 1</label></td>
                <td class="td-input">
                    <input id="korean1" class="korean1" name="korean1" type="text" value="{{ old('korean1', $conversation->korean1) }}">
                    @if ($errors->has('korean1'))
                        <div class="help-block">
                            {{ $errors->first('korean1') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c1">중국어(간체) 문장 1</label></td>
                <td class="td-input">
                    <input id="chinese_c1" class="chinese_c1" name="chinese_c1" type="text" value="{{ old('chinese_c1', $conversation->chinese_c1) }}">
                    @if ($errors->has('chinese_c1'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c1') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e1">중국어(음체) 문장 1</label></td>
                <td class="td-input">
                    <input id="chinese_e1" class="chinese_e1" name="chinese_e1" type="text" value="{{ old('chinese_e1', $conversation->chinese_e1) }}">
                    @if ($errors->has('chinese_e1'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e1') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio1">녹음파일 1</label></td>
                <td class="td-input">
                    <input id="audio1" name="audio1" type="file" value="{{ old('audio1', $conversation->audio1) }}">
                    <a class="image-name" href="/{{ $conversation->audio1 }}">{{ substr($conversation->audio1, 32) }}</a>
                    @if ($errors->has('audio1'))
                        <div class="help-block">
                            {{ $errors->first('audio1') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean2">한국어 문장 2</label></td>
                <td class="td-input">
                    <input id="korean2" class="korean2" name="korean2" type="text" value="{{ old('korean2', $conversation->korean2) }}">
                    @if ($errors->has('korean2'))
                        <div class="help-block">
                            {{ $errors->first('korean2') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c2">중국어(간체) 문장 2</label></td>
                <td class="td-input">
                    <input id="chinese_c2" class="chinese_c2" name="chinese_c2" type="text" value="{{ old('chinese_c2', $conversation->chinese_c2) }}">
                    @if ($errors->has('chinese_c2'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c2') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e2">중국어(음체) 문장 2</label></td>
                <td class="td-input">
                    <input id="chinese_e2" class="chinese_e2" name="chinese_e2" type="text" value="{{ old('chinese_e2', $conversation->chinese_e2) }}">
                    @if ($errors->has('chinese_e2'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e2') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio2">녹음파일 2</label></td>
                <td class="td-input">
                    <input id="audio2" name="audio2" type="file" value="{{ old('audio2', $conversation->audio2) }}">
                    <a class="image-name" href="/{{ $conversation->audio2 }}">{{ substr($conversation->audio2, 32) }}</a>
                    @if ($errors->has('audio2'))
                        <div class="help-block">
                            {{ $errors->first('audio2') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean3">한국어 문장 3</label></td>
                <td class="td-input">
                    <input id="korean3" class="korean3" name="korean3" type="text" value="{{ old('korean3', $conversation->korean3) }}">
                    @if ($errors->has('korean3'))
                        <div class="help-block">
                            {{ $errors->first('korean3') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c3">중국어(간체) 문장 3</label></td>
                <td class="td-input">
                    <input id="chinese_c3" class="chinese_c3" name="chinese_c3" type="text" value="{{ old('chinese_c3', $conversation->chinese_c3) }}">
                    @if ($errors->has('chinese_c3'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c3') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e3">중국어(음체) 문장 3</label></td>
                <td class="td-input">
                    <input id="chinese_e3" class="chinese_e3" name="chinese_e3" type="text" value="{{ old('chinese_e3', $conversation->chinese_e3) }}">
                    @if ($errors->has('chinese_e3'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e3') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio3">녹음파일 3</label></td>
                <td class="td-input">
                    <input id="audio3" name="audio3" type="file" value="{{ old('audio3', $conversation->audio3) }}">
                    <a class="image-name" href="/{{ $conversation->audio3 }}">{{ substr($conversation->audio3, 32) }}</a>
                    @if ($errors->has('audio3'))
                        <div class="help-block">
                            {{ $errors->first('audio3') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean4">한국어 문장 4</label></td>
                <td class="td-input">
                    <input id="korean4" class="korean4" name="korean4" type="text" value="{{ old('korean4', $conversation->korean4) }}">
                    @if ($errors->has('korean4'))
                        <div class="help-block">
                            {{ $errors->first('korean4') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c4">중국어(간체) 문장 4</label></td>
                <td class="td-input">
                    <input id="chinese_c4" class="chinese_c4" name="chinese_c4" type="text" value="{{ old('chinese_c4', $conversation->chinese_c4) }}">
                    @if ($errors->has('chinese_c4'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c4') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e4">중국어(음체) 문장 4</label></td>
                <td class="td-input">
                    <input id="chinese_e4" class="chinese_e4" name="chinese_e4" type="text" value="{{ old('chinese_e4', $conversation->chinese_e4) }}">
                    @if ($errors->has('chinese_e4'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e4') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio4">녹음파일 4</label></td>
                <td class="td-input">
                    <input id="audio4" name="audio4" type="file" value="{{ old('audio4', $conversation->audio4) }}">
                    <a class="image-name" href="/{{ $conversation->audio4 }}">{{ substr($conversation->audio4, 32) }}</a>
                    @if ($errors->has('audio4'))
                        <div class="help-block">
                            {{ $errors->first('audio4') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean5">한국어 문장 5</label></td>
                <td class="td-input">
                    <input id="korean5" class="korean5" name="korean5" type="text" value="{{ old('korean5', $conversation->korean5) }}">
                    @if ($errors->has('korean5'))
                        <div class="help-block">
                            {{ $errors->first('korean5') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c5">중국어(간체) 문장 5</label></td>
                <td class="td-input">
                    <input id="chinese_c5" class="chinese_c5" name="chinese_c5" type="text" value="{{ old('chinese_c5', $conversation->chinese_c5) }}">
                    @if ($errors->has('chinese_c5'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c5') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e5">중국어(음체) 문장 5</label></td>
                <td class="td-input">
                    <input id="chinese_e5" class="chinese_e5" name="chinese_e5" type="text" value="{{ old('chinese_e5', $conversation->chinese_e5) }}">
                    @if ($errors->has('chinese_e5'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e5') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio5">녹음파일 5</label></td>
                <td class="td-input">
                    <input id="audio5" name="audio5" type="file" value="{{ old('audio5', $conversation->audio5) }}">
                    <a class="image-name" href="/{{ $conversation->audio5 }}">{{ substr($conversation->audio5, 32) }}</a>
                    @if ($errors->has('audio5'))
                        <div class="help-block">
                            {{ $errors->first('audio5') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean6">한국어 문장 6</label></td>
                <td class="td-input">
                    <input id="korean6" class="korean6" name="korean6" type="text" value="{{ old('korean6', $conversation->korean6) }}">
                    @if ($errors->has('korean6'))
                        <div class="help-block">
                            {{ $errors->first('korean6') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c6">중국어(간체) 문장 6</label></td>
                <td class="td-input">
                    <input id="chinese_c6" class="chinese_c6" name="chinese_c6" type="text" value="{{ old('chinese_c6', $conversation->chinese_c6) }}">
                    @if ($errors->has('chinese_c6'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c6') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e6">중국어(음체) 문장 6</label></td>
                <td class="td-input">
                    <input id="chinese_e6" class="chinese_e6" name="chinese_e6" type="text" value="{{ old('chinese_e6', $conversation->chinese_e6) }}">
                    @if ($errors->has('chinese_e6'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e6') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio6">녹음파일 6</label></td>
                <td class="td-input">
                    <input id="audio6" name="audio6" type="file" value="{{ old('audio6', $conversation->audio6) }}">
                    <a class="image-name" href="/{{ $conversation->audio6 }}">{{ substr($conversation->audio6, 32) }}</a>
                    @if ($errors->has('audio6'))
                        <div class="help-block">
                            {{ $errors->first('audio6') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean7">한국어 문장 7</label></td>
                <td class="td-input">
                    <input id="korean7" class="korean7" name="korean7" type="text" value="{{ old('korean7', $conversation->korean7) }}">
                    @if ($errors->has('korean7'))
                        <div class="help-block">
                            {{ $errors->first('korean7') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c7">중국어(간체) 문장 7</label></td>
                <td class="td-input">
                    <input id="chinese_c7" class="chinese_c7" name="chinese_c7" type="text" value="{{ old('chinese_c7', $conversation->chinese_c7) }}">
                    @if ($errors->has('chinese_c7'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c7') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e7">중국어(음체) 문장 7</label></td>
                <td class="td-input">
                    <input id="chinese_e7" class="chinese_e7" name="chinese_e7" type="text" value="{{ old('chinese_e7', $conversation->chinese_e7) }}">
                    @if ($errors->has('chinese_e7'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e7') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio7">녹음파일 7</label></td>
                <td class="td-input">
                    <input id="audio7" name="audio7" type="file" value="{{ old('audio7', $conversation->audio7) }}">
                    <a class="image-name" href="/{{ $conversation->audio7 }}">{{ substr($conversation->audio7, 32) }}</a>
                    @if ($errors->has('audio7'))
                        <div class="help-block">
                            {{ $errors->first('audio7') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean8">한국어 문장 8</label></td>
                <td class="td-input">
                    <input id="korean8" class="korean8" name="korean8" type="text" value="{{ old('korean8', $conversation->korean8) }}">
                    @if ($errors->has('korean8'))
                        <div class="help-block">
                            {{ $errors->first('korean8') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c8">중국어(간체) 문장 8</label></td>
                <td class="td-input">
                    <input id="chinese_c8" class="chinese_c8" name="chinese_c8" type="text" value="{{ old('chinese_c8', $conversation->chinese_c8) }}">
                    @if ($errors->has('chinese_c8'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c8') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e8">중국어(음체) 문장 8</label></td>
                <td class="td-input">
                    <input id="chinese_e8" class="chinese_e8" name="chinese_e8" type="text" value="{{ old('chinese_e8', $conversation->chinese_e8) }}">
                    @if ($errors->has('chinese_e8'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e8') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio8">녹음파일 8</label></td>
                <td class="td-input">
                    <input id="audio8" name="audio8" type="file" value="{{ old('audio8', $conversation->audio8) }}">
                    <a class="image-name" href="/{{ $conversation->audio8 }}">{{ substr($conversation->audio8, 32) }}</a>
                    @if ($errors->has('audio8'))
                        <div class="help-block">
                            {{ $errors->first('audio8') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean9">한국어 문장 9</label></td>
                <td class="td-input">
                    <input id="korean9" class="korean9" name="korean9" type="text" value="{{ old('korean9', $conversation->korean9) }}">
                    @if ($errors->has('korean9'))
                        <div class="help-block">
                            {{ $errors->first('korean9') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c9">중국어(간체) 문장 9</label></td>
                <td class="td-input">
                    <input id="chinese_c9" class="chinese_c9" name="chinese_c9" type="text" value="{{ old('chinese_c9', $conversation->chinese_c9) }}">
                    @if ($errors->has('chinese_c9'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c9') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e9">중국어(음체) 문장 9</label></td>
                <td class="td-input">
                    <input id="chinese_e9" class="chinese_e9" name="chinese_e9" type="text" value="{{ old('chinese_e9', $conversation->chinese_e9) }}">
                    @if ($errors->has('chinese_e9'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e9') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio9">녹음파일 9</label></td>
                <td class="td-input">
                    <input id="audio9" name="audio9" type="file" value="{{ old('audio9', $conversation->audio9) }}">
                    <a class="image-name" href="/{{ $conversation->audio9 }}">{{ substr($conversation->audio9, 32) }}</a>
                    @if ($errors->has('audio9'))
                        <div class="help-block">
                            {{ $errors->first('audio9') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="korean10">한국어 문장 10</label></td>
                <td class="td-input">
                    <input id="korean10" class="korean10" name="korean10" type="text" value="{{ old('korean10', $conversation->korean10) }}">
                    @if ($errors->has('korean10'))
                        <div class="help-block">
                            {{ $errors->first('korean10') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_c10">중국어(간체) 문장 10</label></td>
                <td class="td-input">
                    <input id="chinese_c10" class="chinese_c10" name="chinese_c10" type="text" value="{{ old('chinese_c10', $conversation->chinese_c10) }}">
                    @if ($errors->has('chinese_c10'))
                        <div class="help-block">
                            {{ $errors->first('chinese_c10') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="chinese_e10">중국어(음체) 문장 10</label></td>
                <td class="td-input">
                    <input id="chinese_e10" class="chinese_e10" name="chinese_e10" type="text" value="{{ old('chinese_e10', $conversation->chinese_e10) }}">
                    @if ($errors->has('chinese_e10'))
                        <div class="help-block">
                            {{ $errors->first('chinese_e10') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio10">녹음파일 10</label></td>
                <td class="td-input">
                    <input id="audio10" name="audio10" type="file" value="{{ old('audio10', $conversation->audio10) }}">
                    <a class="image-name" href="/{{ $conversation->audio10 }}">{{ substr($conversation->audio10, 32) }}</a>
                    @if ($errors->has('audio10'))
                        <div class="help-block">
                            {{ $errors->first('audio10') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="image1">회화사진 (step1)</label></td>
                <td class="td-input">
                    <input id="image1" name="image1" type="file" accept='image/*' value="{{ old('image1', $conversation->image1) }}">
                    <a class="image-name" href="/{{ $conversation->image1 }}">{{ substr($conversation->image1, 32) }}</a>
                    @if ($errors->has('image1'))
                        <div class="help-block">
                            {{ $errors->first('image1') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="image2">회화사진 (step2)</label></td>
                <td class="td-input">
                    <input id="image2" name="image2" type="file" accept='image/*' value="{{ old('image2', $conversation->image2) }}">
                    <a class="image-name" href="/{{ $conversation->image2 }}">{{ substr($conversation->image2, 32) }}</a>
                    @if ($errors->has('image2'))
                        <div class="help-block">
                            {{ $errors->first('image2') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video1">동영상 (step1) - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video1" name="video1" type="file" value="{{ old('video1', $conversation->video1) }}">
                    <a class="image-name" href="/{{ $conversation->video1 }}">{{ substr($conversation->video1, 32) }}</a>
                    @if ($errors->has('video1'))
                        <div class="help-block">
                            {{ $errors->first('video1') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video2">동영상 (step3-1) A파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video2" name="video2" type="file" value="{{ old('video2', $conversation->video2) }}">
                    <a class="image-name" href="/{{ $conversation->video2 }}">{{ substr($conversation->video2, 32) }}</a>
                    @if ($errors->has('video2'))
                        <div class="help-block">
                            {{ $errors->first('video2') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video3">동영상 (step3-1) B파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video3" name="video3" type="file" value="{{ old('video3', $conversation->video3) }}">
                    <a class="image-name" href="/{{ $conversation->video3 }}">{{ substr($conversation->video3, 32) }}</a>
                    @if ($errors->has('video3'))
                        <div class="help-block">
                            {{ $errors->first('video3') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video4">동영상 (step3-2) A파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video4" name="video4" type="file" value="{{ old('video4', $conversation->video4) }}">
                    <a class="image-name" href="/{{ $conversation->video4 }}">{{ substr($conversation->video4, 32) }}</a>
                    @if ($errors->has('video4'))
                        <div class="help-block">
                            {{ $errors->first('video4') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video5">동영상 (step3-2) B파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video5" name="video5" type="file" value="{{ old('video5', $conversation->video5) }}">
                    <a class="image-name" href="/{{ $conversation->video5 }}">{{ substr($conversation->video5, 32) }}</a>
                    @if ($errors->has('video5'))
                        <div class="help-block">
                            {{ $errors->first('video5') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video6">동영상 (step3-3) A파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video6" name="video6" type="file" value="{{ old('video6', $conversation->video6) }}">
                    <a class="image-name" href="/{{ $conversation->video6 }}">{{ substr($conversation->video6, 32) }}</a>
                    @if ($errors->has('video6'))
                        <div class="help-block">
                            {{ $errors->first('video6') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video2">동영상 (step3-3) B파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video7" name="video7" type="file" value="{{ old('video7', $conversation->video7) }}">
                    <a class="image-name" href="/{{ $conversation->video7 }}">{{ substr($conversation->video7, 32) }}</a>
                    @if ($errors->has('video7'))
                        <div class="help-block">
                            {{ $errors->first('video7') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video8">동영상 (step3-4) A파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video8" name="video8" type="file" value="{{ old('video8', $conversation->video8) }}">
                    <a class="image-name" href="/{{ $conversation->video8 }}">{{ substr($conversation->video8, 32) }}</a>
                    @if ($errors->has('video8'))
                        <div class="help-block">
                            {{ $errors->first('video8') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video9">동영상 (step3-4) B파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video9" name="video9" type="file" value="{{ old('video9', $conversation->video9) }}">
                    <a class="image-name" href="/{{ $conversation->video9 }}">{{ substr($conversation->video9, 32) }}</a>
                    @if ($errors->has('video9'))
                        <div class="help-block">
                            {{ $errors->first('video9') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video10">동영상 (step3-5) A파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video10" name="video10" type="file" value="{{ old('video10', $conversation->video10) }}">
                    <a class="image-name" href="/{{ $conversation->video10 }}">{{ substr($conversation->video10, 32) }}</a>
                    @if ($errors->has('video10'))
                        <div class="help-block">
                            {{ $errors->first('video10') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video11">동영상 (step3-5) B파트 - 소리 O, 자막 O</label></td>
                <td class="td-input">
                    <input id="video11" name="video11" type="file" value="{{ old('video11', $conversation->video11) }}">
                    <a class="image-name" href="/{{ $conversation->video11 }}">{{ substr($conversation->video11, 32) }}</a>
                    @if ($errors->has('video11'))
                        <div class="help-block">
                            {{ $errors->first('video11') }}
                        </div>
                    @endif
                </td>
            </tr>

            <tr>
                <td><label for="video12">동영상 (step3-1) A파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video12" name="video12" type="file" value="{{ old('video12', $conversation->video12) }}">
                    <a class="image-name" href="/{{ $conversation->video12 }}">{{ substr($conversation->video12, 32) }}</a>
                    @if ($errors->has('video12'))
                        <div class="help-block">
                            {{ $errors->first('video12') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video13">동영상 (step3-1) B파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video13" name="video13" type="file" value="{{ old('video13', $conversation->video13) }}">
                    <a class="image-name" href="/{{ $conversation->video13 }}">{{ substr($conversation->video13, 32) }}</a>
                    @if ($errors->has('video13'))
                        <div class="help-block">
                            {{ $errors->first('video13') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video14">동영상 (step3-2) A파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video14" name="video14" type="file" value="{{ old('video14', $conversation->video14) }}">
                    <a class="image-name" href="/{{ $conversation->video14 }}">{{ substr($conversation->video14, 32) }}</a>
                    @if ($errors->has('video14'))
                        <div class="help-block">
                            {{ $errors->first('video14') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video15">동영상 (step3-2) B파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video15" name="video15" type="file" value="{{ old('video15', $conversation->video15) }}">
                    <a class="image-name" href="/{{ $conversation->video15 }}">{{ substr($conversation->video15, 32) }}</a>
                    @if ($errors->has('video15'))
                        <div class="help-block">
                            {{ $errors->first('video15') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video16">동영상 (step3-3) A파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video16" name="video16" type="file" value="{{ old('video16', $conversation->video16) }}">
                    <a class="image-name" href="/{{ $conversation->video16 }}">{{ substr($conversation->video16, 32) }}</a>
                    @if ($errors->has('video16'))
                        <div class="help-block">
                            {{ $errors->first('video16') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video17">동영상 (step3-3) B파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video17" name="video17" type="file" value="{{ old('video17', $conversation->video17) }}">
                    <a class="image-name" href="/{{ $conversation->video17 }}">{{ substr($conversation->video17, 32) }}</a>
                    @if ($errors->has('video17'))
                        <div class="help-block">
                            {{ $errors->first('video17') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video18">동영상 (step3-4) A파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video18" name="video18" type="file" value="{{ old('video18', $conversation->video18) }}">
                    <a class="image-name" href="/{{ $conversation->video18 }}">{{ substr($conversation->video18, 32) }}</a>
                    @if ($errors->has('video18'))
                        <div class="help-block">
                            {{ $errors->first('video18') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video19">동영상 (step3-4) B파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video19" name="video19" type="file" value="{{ old('video19', $conversation->video19) }}">
                    <a class="image-name" href="/{{ $conversation->video19 }}">{{ substr($conversation->video19, 32) }}</a>
                    @if ($errors->has('video19'))
                        <div class="help-block">
                            {{ $errors->first('video19') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video20">동영상 (step3-5) A파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video20" name="video20" type="file" value="{{ old('video20', $conversation->video20) }}">
                    <a class="image-name" href="/{{ $conversation->video20 }}">{{ substr($conversation->video20, 32) }}</a>
                    @if ($errors->has('video20'))
                        <div class="help-block">
                            {{ $errors->first('video20') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video21">동영상 (step3-5) B파트 - 소리 O, 자막 X</label></td>
                <td class="td-input">
                    <input id="video21" name="video21" type="file" value="{{ old('video21', $conversation->video21) }}">
                    <a class="image-name" href="/{{ $conversation->video21 }}">{{ substr($conversation->video21, 32) }}</a>
                    @if ($errors->has('video21'))
                        <div class="help-block">
                            {{ $errors->first('video21') }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>
        <hr style="visibility: hidden;">
        <div class="button-wrapper">
            <button type="submit">확인</button>
            <button type="button" onclick="location.href = '/admin/conversation/' + '{{ $category_id }}'">취소</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    </script>
@endsection