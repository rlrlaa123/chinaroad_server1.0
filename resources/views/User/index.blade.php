@extends('layouts.admin')
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <h3>※ 유저 리스트</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>이미지</th>
            <th>아이디(이메일)</th>
            <th>이름</th>
            <th>성별</th>
            <th>가입경로</th>
            <th>등록날짜</th>
            <th>회원등급</th>
            <th>삭제</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td><img src="/{{ $user->image }}" style="width: 100px;"></td>
                <td><a class="name-selector" href="{{ route('user.edit', $user->id) }}">{{ $user->email }}</a></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->registered }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <select>
                        <option @if($user->type == 'Free') selected @endif>Free</option>
                        <option @if($user->type == '1개월') selected @endif>1개월</option>
                        <option @if($user->type == '3개월') selected @endif>3개월</option>
                        <option @if($user->type == '6개월') selected @endif>6개월</option>
                        <option @if($user->type == '12개월') selected @endif>12개월</option>
                    </select>
                    <button>변경</button>
                </td>
                <td><a class="delete" onclick="deleteConversation({{ $user->id }})">삭제</a></td>
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
                    url: 'user/' + id
                }).then(function(res) {
                    console.log(res);
                    window.location.href = 'user';
                })
            }
        }
    </script>
@endsection