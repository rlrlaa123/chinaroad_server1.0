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
                <td><a class="name-selector" href="{{ route('admin.edit', $admin->id) }}">{{ $admin->email }}</a></td>
                <td>{{ $admin->name }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.authorize') }}">
                        {!! csrf_field() !!}
                        <select id="role" name="role">
                            <option @if($admin->roles[0]->name == 'Admin') selected @endif value="Admin">관리자</option>
                            <option @if($admin->roles[0]->name == 'Leader') selected @endif value="Leader">팀장</option>
                            <option @if($admin->roles[0]->name == 'Teacher') selected @endif value="Teacher">선생님</option>
                        </select>
                        <input type="hidden" id="admin_id" name="admin_id" value="{{ $admin->id }}">
                        <button type="submit"><label for="role">변경</label></button>
                    </form>
                </td>
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
                    url: 'admin/' + id
                }).then(function(res) {
                    console.log(res);
                    window.location.href = 'admin';
                })
            }
        }
    </script>
@endsection