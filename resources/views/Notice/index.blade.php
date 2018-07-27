@extends('layouts.admin')
@section('style')
    <style>
        header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .create-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80px;
            height: 20px;
            border-radius: 20px;
            padding: 0;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <header>
        <h3 style="display: inline-block;">※ 공지사항 리스트</h3>
        <button class="create-btn" onclick="location.href='notice/create'">새 글 쓰기</button>
    </header>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>삭제</th>
        </tr>
        </thead>
        <tbody>
        @forelse($notices as $notice)
            <tr>
                <td>{{ $notice->id }}</td>
                <td>
                    <a class="name-selector"
                       href="{{ route('notice.edit', [$notice->id]) }}">
                        {{ $notice->title }}
                    </a>
                </td>
                <td>{{ $notice->author }}</td>
                <td><a class="delete" onclick="deleteConversation({{ $notice->id }})">삭제</a></td>
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
            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: 'notice/' + id
                }).then(function (res) {
                    window.location.href = '/admin/notice'
                })
            }
        }
    </script>
@endsection