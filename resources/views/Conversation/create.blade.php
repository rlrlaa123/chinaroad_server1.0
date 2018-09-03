@extends('layouts.admin')
@section('style')
    <style>
        /*td {*/
            /*text-align: left;*/
        /*}*/
        .td-input {
            text-align: left;
        }

    </style>
@endsection
@section('content')
    <h3>※ 회화등록 -> {{ \App\Category::find($category_id)->name }}</h3>
    <hr>
    <form method="POST" action="{{ route('conversation.store', $category_id) }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <table>
            <tr>
                <td><label for="name">제목</label></td>
                <td class="td-input">
                    <input id="name" class="name" name="name" type="text" value="{{ old('name') }}">
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
                    <input id="korean1" class="korean1" name="korean1" type="text" value="{{ old('korean1') }}">
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
                    <input id="chinese_c1" class="chinese_c1" name="chinese_c1" type="text" value="{{ old('chinese_c1') }}">
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
                    <input id="chinese_e1" class="chinese_e1" name="chinese_e1" type="text" value="{{ old('chinese_e1') }}">
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
                    <input id="audio1" name="audio1" type="file" value="{{ old('audio1') }}">
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
                    <input id="korean2" class="korean2" name="korean2" type="text" value="{{ old('korean2') }}">
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
                    <input id="chinese_c2" class="chinese_c2" name="chinese_c2" type="text" value="{{ old('chinese_c2') }}">
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
                    <input id="chinese_e2" class="chinese_e2" name="chinese_e2" type="text" value="{{ old('chinese_e2') }}">
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
                    <input id="audio2" name="audio2" type="file" value="{{ old('audio2') }}">
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
                    <input id="korean3" class="korean3" name="korean3" type="text" value="{{ old('korean3') }}">
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
                    <input id="chinese_c3" class="chinese_c3" name="chinese_c3" type="text" value="{{ old('chinese_c3') }}">
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
                    <input id="chinese_e3" class="chinese_e3" name="chinese_e3" type="text" value="{{ old('chinese_e3') }}">
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
                    <input id="audio3" name="audio3" type="file" value="{{ old('audio3') }}">
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
                    <input id="korean4" class="korean4" name="korean4" type="text" value="{{ old('korean4') }}">
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
                    <input id="chinese_c4" class="chinese_c4" name="chinese_c4" type="text" value="{{ old('chinese_c4') }}">
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
                    <input id="chinese_e4" class="chinese_e4" name="chinese_e4" type="text" value="{{ old('chinese_e4') }}">
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
                    <input id="audio4" name="audio4" type="file" value="{{ old('audio4') }}">
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
                    <input id="korean5" class="korean5" name="korean5" type="text" value="{{ old('korean5') }}">
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
                    <input id="chinese_c5" class="chinese_c5" name="chinese_c5" type="text" value="{{ old('chinese_c5') }}">
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
                    <input id="chinese_e5" class="chinese_e5" name="chinese_e5" type="text" value="{{ old('chinese_e5') }}">
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
                    <input id="audio5" name="audio5" type="file" value="{{ old('audio5') }}">
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
                    <input id="korean6" class="korean6" name="korean6" type="text" value="{{ old('korean6') }}">
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
                    <input id="chinese_c6" class="chinese_c6" name="chinese_c6" type="text" value="{{ old('chinese_c6') }}">
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
                    <input id="chinese_e6" class="chinese_e6" name="chinese_e6" type="text" value="{{ old('chinese_e6') }}">
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
                    <input id="audio6" name="audio6" type="file" value="{{ old('audio6') }}">
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
                    <input id="korean7" class="korean7" name="korean7" type="text" value="{{ old('korean7') }}">
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
                    <input id="chinese_c7" class="chinese_c7" name="chinese_c7" type="text" value="{{ old('chinese_c7') }}">
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
                    <input id="chinese_e7" class="chinese_e7" name="chinese_e7" type="text" value="{{ old('chinese_e7') }}">
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
                    <input id="audio7" name="audio7" type="file" value="{{ old('audio7') }}">
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
                    <input id="korean8" class="korean8" name="korean8" type="text" value="{{ old('korean8') }}">
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
                    <input id="chinese_c8" class="chinese_c8" name="chinese_c8" type="text" value="{{ old('chinese_c8') }}">
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
                    <input id="chinese_e8" class="chinese_e8" name="chinese_e8" type="text" value="{{ old('chinese_e8') }}">
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
                    <input id="audio8" name="audio8" type="file" value="{{ old('audio8') }}">
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
                    <input id="korean9" class="korean9" name="korean9" type="text" value="{{ old('korean9') }}">
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
                    <input id="chinese_c9" class="chinese_c9" name="chinese_c9" type="text" value="{{ old('chinese_c9') }}">
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
                    <input id="chinese_e9" class="chinese_e9" name="chinese_e9" type="text" value="{{ old('chinese_e9') }}">
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
                    <input id="audio9" name="audio9" type="file" value="{{ old('audio9') }}">
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
                    <input id="korean10" class="korean10" name="korean10" type="text" value="{{ old('korean10') }}">
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
                    <input id="chinese_c10" class="chinese_c10" name="chinese_c10" type="text" value="{{ old('chinese_c10') }}">
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
                    <input id="chinese_e10" class="chinese_e10" name="chinese_e10" type="text" value="{{ old('chinese_e10') }}">
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
                    <input id="audio10" name="audio10" type="file" value="{{ old('audio10') }}">
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
                    <input id="image1" name="image1" type="file" accept='image/*' value="{{ old('image1') }}">
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
                    <input id="image2" name="image2" type="file" accept='image/*' value="{{ old('image2') }}">
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
                    <input id="video1" name="video1" type="file" value="{{ old('video1') }}">
                    @if ($errors->has('video1'))
                        <div class="help-block">
                            {{ $errors->first('video1') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video2">동영상 (step3-1) - 소리 X, 자막 O</label></td>
                <td class="td-input">
                    <input id="video2" name="video2" type="file" value="{{ old('video2') }}">
                    @if ($errors->has('video2'))
                        <div class="help-block">
                            {{ $errors->first('video2') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="video3">동영상 (step3-2) - 소리 X, 자막 X</label></td>
                <td class="td-input">
                    <input id="video3" name="video3" type="file" value="{{ old('video3') }}">
                    @if ($errors->has('video3'))
                        <div class="help-block">
                            {{ $errors->first('video3') }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>
        <hr style="visibility: hidden;">
        <div class="button-wrapper">
            <button type="submit">확인</button>
            <button type="button" onclick="location.href= '/admin/conversation/{{ $category_id }}'">취소</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    </script>
@endsection