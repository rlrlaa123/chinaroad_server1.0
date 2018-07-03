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
            <th>등록날짜</th>
            <th>카테고리</th>
            <th>난이도</th>
            <th>제목</th>
            <th><label for="activate">활성화여부</label></th>
        </tr>
        </thead>
        <tbody>
        @forelse($contents as $content)
            <tr>
                <td>{{ $content->id }}</td>
                <td>{{ $content->created_at }}</td>
                <td>{{ $content->classification->name }}</td>
                <td>{{ $content->level }}</td>
                <td><a class="name-selector" href="{{ route('contents.edit', [$content->id]) }}">{{ $content->title_ko }}</a></td>
                <td>
                    <form id="activate-form" method="POST" action="{{ route('contents.activate') }}">
                        {!! csrf_field() !!}
                        <select id="activate" name="activate" style="margin: 0 5px;">
                            <option @if( $content->activate == 1) selected @endif value="1">활성화</option>
                            <option @if( $content->activate == 0) selected @endif value="0">비활성화</option>
                        </select>
                        <input type="hidden" name="content_id" value="{{ $content->id }}">
                        <button type="submit" style="margin: 0 5px;">변경</button>
                    </form>
                </td>
                {{--<td><a class="name-selector" href="{{ route('contents.edit', [$content->id]) }}">{{ $content->name }}</a></td>--}}
                {{--<td><a class="delete" onclick="deleteConversation({{ $content->id }})">삭제</a></td>--}}
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
{{--                    url: '{{ $classification_id }}/' + id--}}
                }).then(function() {
                    window.location.href = '/admin/content/'
                })
            }
        }
    </script>
@endsection