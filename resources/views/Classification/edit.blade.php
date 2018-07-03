@extends('layouts.admin')
@section('style')
    <style>
        .td-input {
            text-align: left;
        }

        #name {
            width: 80%;
        }
    </style>
@endsection
@section('content')
    <h3>※ 콘텐츠 카테고리 -> 수정</h3>
    <hr>
    <form method="POST" action="{{ route('classification.update', $classification->id) }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <table>
            <tr>
                <td><label for="name">제목</label></td>
                <td class="td-input">
                    <input id="name" name="name" type="text" value="{{ old('name', $classification->name) }}">
                    @if ($errors->has('name'))
                        <div class="help-block">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>
        <hr style="visibility: hidden;">
        <div class="button-wrapper">
            <button type="submit">확인</button>
            <button type="button" onclick="location.href = '/admin/classification'">취소</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    </script>
@endsection