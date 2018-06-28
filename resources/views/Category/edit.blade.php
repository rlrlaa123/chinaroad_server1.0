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
    <h3>※ 회화리스트 -> 수정</h3>
    <hr>
    <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <table>
            <tr>
                <td><label for="name">제목</label></td>
                <td class="td-input">
                    <input id="name" name="name" type="text" value="{{ old('name', $category->name) }}">
                    @if ($errors->has('name'))
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
                    <input id="level-easy" name="level" type="radio" value="easy" @if($category->level == 'easy') checked @endif>
                    <label for="level-hard">중급</label>
                    <input id="level-hard" name="level" type="radio" value="hard" @if($category->level == 'hard') checked @endif>
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
                    <input id="image" name="image" type="file" accept='image/*' value="{{ old('image', $category->image) }}">
                    <a class="image-name" href="{{ url($category->image) }}">[ {{ substr($category->image, 26) }} ]</a>
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
                    <textarea id="description" name="description" class="description" rows="10">{{ old('description', $category->description) }}</textarea>
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
            <button type="submit">확인</button>
            <button type="button" onclick="location.href = '/admin/conversation'">취소</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    </script>
@endsection