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
    <h3>※ 첨삭 리스트 -> 등록</h3>
    <hr>
    <form method="POST" action="{{ route('edit.store') }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <table>
            <tr>
                <td><label for="date">표시일자</label></td>
                <td class="td-input">
                    <input type="date" id="date" name="date" value="{{ old('date', substr(\Carbon\Carbon::now(), 0, 10)) }}">
                    @if ($errors->has('date'))
                        <div class="help-block">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>난이도</td>
                <td class="td-input">
                    <label for="level-easy">초급</label>
                    <input id="level-easy" name="level" type="radio" value="easy" checked>
                    <label for="level-medium">중급</label>
                    <input id="level-medium" name="level" type="radio" value="medium">
                    <label for="level-hard">고급</label>
                    <input id="level-hard" name="level" type="radio" value="hard">
                    @if ($errors->has('level'))
                        <div class="help-block">
                            {{ $errors->first('level') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="image">질문 사진</label></td>
                <td class="td-input">
                    <input id="image" name="image" type="file" accept='image/*' value="{{ old('image') }}">
                    @if ($errors->has('image'))
                        <div class="help-block">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="question_ko">한국어 질문</label></td>
                <td class="td-input">
                    <input id="question_ko" name="question_ko" class="question_ko" type="text" value="{{ old('question_ko') }}">
                    @if ($errors->has('question_ko'))
                        <div class="help-block">
                            {{ $errors->first('question_ko') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="question_audio_ko">한국어 질문 음성 파일</label></td>
                <td class="td-input">
                    <input id="question_audio_ko" name="question_audio_ko" type="file" value="{{ old('question_audio_ko') }}">
                    @if ($errors->has('question_audio_ko'))
                        <div class="help-block">
                            {{ $errors->first('question_audio_ko') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="answer_ko">한국어 모범답안</label></td>
                <td class="td-input">
                    <input id="answer_ko" name="answer_ko" class="answer_ko" type="text" value="{{ old('answer_ko') }}">
                    @if ($errors->has('answer_ko'))
                        <div class="help-block">
                            {{ $errors->first('answer_ko') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="answer_audio_ko">한국어 모범 답안 음성 파일</label></td>
                <td class="td-input">
                    <input id="answer_audio_ko" name="answer_audio_ko" type="file" value="{{ old('answer_audio_ko') }}">
                    @if ($errors->has('answer_audio_ko'))
                        <div class="help-block">
                            {{ $errors->first('answer_audio_ko') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="question_ch">중국어 질문</label></td>
                <td class="td-input">
                    <input id="question_ch" name="question_ch" class="question_ch" type="text" value="{{ old('question_ch') }}">
                    @if ($errors->has('question_ch'))
                        <div class="help-block">
                            {{ $errors->first('question_ch') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="question_audio_ch">중국어 질문 음성 파일</label></td>
                <td class="td-input">
                    <input id="question_audio_ch" name="question_audio_ch" type="file" value="{{ old('question_audio_ch') }}">
                    @if ($errors->has('question_audio_ch'))
                        <div class="help-block">
                            {{ $errors->first('question_audio_ch') }}
                        </div>
                    @endif
                </td>
            </tr>

            <tr>
                <td><label for="answer_ch">중국어 모범답안</label></td>
                <td class="td-input">
                    <input id="answer_ch" name="answer_ch" class="answer_ch" type="text" value="{{ old('answer_ch') }}">
                    @if ($errors->has('answer_ch'))
                        <div class="help-block">
                            {{ $errors->first('answer_ch') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="answer_audio_ch">중국어 모범 답안 음성 파일</label></td>
                <td class="td-input">
                    <input id="answer_audio_ch" name="answer_audio_ch" type="file" value="{{ old('answer_audio_ch') }}">
                    @if ($errors->has('answer_audio_ch'))
                        <div class="help-block">
                            {{ $errors->first('answer_audio_ch') }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>
        <hr style="visibility: hidden;">
        <div class="button-wrapper">
            <button type="submit">확인</button>
            <button type="button" onclick="location.href = '/admin/edit'">취소</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    </script>
@endsection