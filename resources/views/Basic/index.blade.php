@extends('layouts.admin')
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <h3>※ 관리자 리스트</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>관리자 아이디(이메일)</th>
            <th>관리자 이름</th>
            <th>관리자 등급</th>
            <th>등록날짜</th>
            <th>삭제</th>
        </tr>
        </thead>
        <tbody>
        @forelse($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td><a class="name-selector" href="{{ route('basic.edit', $admin->id) }}">{{ $admin->email }}</a></td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->roles[0]->name }}</td>
                <td>{{ $admin->created_at }}</td>
                <td><a class="delete" onclick="deleteConversation({{ $admin->id }})">삭제</a></td>
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
                    url: 'basic/' + id
                }).then(function(res) {
                    console.log(res);
                    window.location.href = 'basic';
                })
            }
        }
    </script>
@endsection