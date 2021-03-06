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
    <h3>※ 콘텐츠 리스트 -> 등록</h3>
    <hr>
    <form method="POST" action="{{ route('contents.store') }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <table>
            <tr>
                <td><label for="classification">카테고리</label></td>
                <td class="td-input">
                    <select id="classification" name="classification" type="text">
                        <option>선택해주세요</option>
                        @foreach($classifications as $classification)
                            <option>{{ $classification->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('classification'))
                        <div class="help-block">
                            {{ $errors->first('classification') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="activate">활성화여부</label></td>
                <td class="td-input">
                    <select id="activate" name="activate" type="text">
                        <option value=1>활성화</option>
                        <option value=0>비활성화</option>
                    </select>
                    @if ($errors->has('activate'))
                        <div class="help-block">
                            {{ $errors->first('activate') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>난이도</td>
                <td class="td-input">
                    <label for="level-easy">초급</label>
                    <input id="level-easy" name="level" type="radio" value="easy" checked>
                    <label for="level-hard">중급</label>
                    <input id="level-hard" name="level" type="radio" value="hard">
                    @if ($errors->has('level'))
                        <div class="help-block">
                            {{ $errors->first('level') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="image">콘텐츠 사진</label></td>
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
                <td><label for="title_ko">한국어 제목</label></td>
                <td class="td-input">
                    <input id="title_ko" name="title_ko" class="title_ko" type="text" value="{{ old('title_ko') }}">
                    @if ($errors->has('title_ko'))
                        <div class="help-block">
                            {{ $errors->first('title_ko') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio_ko">한국어 재생파일</label></td>
                <td class="td-input">
                    <input id="audio_ko" name="audio_ko" type="file" value="{{ old('audio_ko') }}">
                    @if ($errors->has('audio_ko'))
                        <div class="help-block">
                            {{ $errors->first('audio_ko') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="contents_ko">한국어 내용</label></td>
                <td class="td-input">
                    <textarea id="contents_ko" class="description" name="contents_ko" rows="8">{{ old('contents_ko') }}</textarea>
                    @if ($errors->has('contents_ko'))
                        <div class="help-block">
                            {{ $errors->first('contents_ko') }}
                        </div>
                    @endif
                </td>
            </tr>

            <tr>
                <td><label for="title_ch">중국어 제목</label></td>
                <td class="td-input">
                    <input id="title_ch" name="title_ch" class="title_ch" type="text" value="{{ old('title_ch') }}">
                    @if ($errors->has('title_ch'))
                        <div class="help-block">
                            {{ $errors->first('title_ch') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="audio_ch">중국어 재생파일</label></td>
                <td class="td-input">
                    <input id="audio_ch" name="audio_ch" type="file" value="{{ old('audio_ch') }}">
                    @if ($errors->has('audio_ch'))
                        <div class="help-block">
                            {{ $errors->first('audio_ch') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="contents_ch">중국어 내용</label></td>
                <td class="td-input">
                    <textarea id="contents_ch" class="description" name="contents_ch" rows="8">{{ old('contents_ch') }}</textarea>
                    @if ($errors->has('contents_ch'))
                        <div class="help-block">
                            {{ $errors->first('contents_ch') }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>
        <hr style="visibility: hidden;">
        <div class="button-wrapper">
            <button type="submit">확인</button>
            <button type="button" onclick="location.href = '/admin/contents'">취소</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    </script>
@endsection