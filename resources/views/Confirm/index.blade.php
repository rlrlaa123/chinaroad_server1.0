@extends('layouts.admin')
@section('style')
    <style>
        #activate-form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .name-selector {
            display: inline;
            margin-bottom: 5px;
        }
    </style>
@endsection
@section('content')
    <h3>※ 첨삭확인 리스트</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>작성시간</th>
            <th>작성자</th>
            <th>내용</th>
            <th>첨삭여부</th>
        </tr>
        </thead>
        <tbody>
        @forelse($confirms as $confirm)
            <tr>
                <td>{{ $confirm->id }}</td>
                <td>{{ $confirm->created_at }}</td>
                <td>{{ $confirm->user->name }}</td>
                <td>내용</td>
                <td>{{ $confirm->state }}</td>
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
                    url: 'confirm/' + id
                }).then(function(res) {
                    window.location.href = '/admin/confirm'
                })
            }
        }
    </script>
@endsection