@extends('layouts.admin')
@section('style')
    <style>
        #activate-form {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection
@section('content')
    <h3>※ 콘텐츠 리스트</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>카테고리</th>
            <th>난이도</th>
            <th>제목</th>
            <th>이미지</th>
            <th><label for="activate">활성화여부</label></th>
            <th>삭제</th>
        </tr>
        </thead>
        <tbody>
        @forelse($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->classification->name }}</td>
                <td>{{ $teacher->level }}</td>
                <td><a class="name-selector" href="{{ route('contents.edit', [$teacher->id]) }}">{{ $teacher->title_ko }}</a></td>
                <td>@if($teacher->image == null) x @else <img src="/{{ $teacher->image }}" style="width: 100px;"> @endif</td>
                <td>
                    <form id="activate-form" method="POST" action="{{ route('contents.activate') }}">
                        {!! csrf_field() !!}
                        <select id="activate" name="activate" style="margin: 0 5px;">
                            <option @if( $teacher->activate == 1) selected @endif value="1">활성화</option>
                            <option @if( $teacher->activate == 0) selected @endif value="0">비활성화</option>
                        </select>
                        <input type="hidden" name="content_id" value="{{ $teacher->id }}">
                        <button type="submit" style="margin: 0 5px;">변경</button>
                    </form>
                </td>
                <td><a class="delete" onclick="deleteConversation({{ $teacher->id }})">삭제</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="7">등록된 데이터가 없습니다.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteConversation(id) {
            if(confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: 'teacher/' + id
                }).then(function(res) {
                    window.location.href = '/admin/teacher'
                })
            }
        }
    </script>
@endsection