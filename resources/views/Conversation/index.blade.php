@extends('layouts.admin')
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <h3>※ 회화리스트</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>난이도</th>
            <th>제목</th>
            <th>내용</th>
            <th>이미지여부</th>
            <th>삭제</th>
            <th>서브메뉴</th>
        </tr>
        </thead>
        <tbody>
        @forelse($conversations as $conversation)
            <tr>
                <td>{{ $conversation->id }}</td>
                <td>{{ $conversation->level }}</td>
                <td><a class="title" href="{{ route('conversation.edit', $conversation->id) }}">{{ $conversation->title }}</a></td>
                <td>{{ $conversation->description }}</td>
                <td>{{ isset($conversation->image) ? 'O' : 'X' }}</td>
                <td><a class="delete" onclick="deleteConversation({{ $conversation->id }})">삭제</a></td>
                <td class="submenu">서브메뉴</td>
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
                    url: 'conversation/' + id
                }).then(function() {
                    window.location.href = 'conversation';
                })
            }
        }
    </script>
@endsection