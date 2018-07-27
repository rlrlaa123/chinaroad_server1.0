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
    <h3>※ 콘텐츠리스트 -> 수정</h3>
    <hr>
    <form method="POST" action="{{ route('notice.update', $notice->id) }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <table>
            <tr>
                <td><label for="title">제목</label></td>
                <td class="td-input">
                    <input id="title" name="title" class="title" type="text" value="{{ old('title', $notice->title) }}">
                    @if ($errors->has('title'))
                        <div class="help-block">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="contents">내용</label></td>
                <td class="td-input">
                    <textarea id="contents" class="description" name="contents" rows="8">{{ old('contents', $notice->contents) }}</textarea>
                    @if ($errors->has('contents'))
                        <div class="help-block">
                            {{ $errors->first('contents') }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>
        <hr style="visibility: hidden;">
        <div class="button-wrapper">
            <button type="submit">확인</button>
            <button type="button" onclick="location.href = '/admin/notice'">취소</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    </script>
@endsection