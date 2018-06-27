@extends('layouts.admin')
@section('style')
    <style>
        .td-input {
            text-align: left;
        }

        .title {
            width: 80%;
        }

        .description {
            width :80%;
        }
    </style>
@endsection
@section('content')
    <h3>※ 회화등록</h3>
    <hr>
    <form method="POST" action="{{ route('conversation.store') }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <table>
            <tr>
                <td><label for="title">제목</label></td>
                <td class="td-input">
                    <input id="title" class="title" name="title" type="text" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <div class="help-block">
                            {{ $errors->first('title') }}
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
                <td><label for="image">회화사진</label></td>
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
                <td><label for="description">내용</label></td>
                <td class="td-input">
                    <textarea id="description" name="description" class="description" rows="10">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <div class="help-block">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>
        <hr style="visibility: hidden;">
        <div class="button-wrapper">
            <button>확인</button>
            <button>취소</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    </script>
@endsection