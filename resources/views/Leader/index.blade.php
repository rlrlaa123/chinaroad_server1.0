@extends('layouts.admin')
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <h3>※ 담당 팀장 리스트</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>선생님 아이디(이메일)</th>
            <th>선생님 이름</th>
            <th>담당 팀장</th>
            <th>등록날짜</th>
        </tr>
        </thead>
        <tbody>
        @forelse($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td><a class="name-selector" href="{{ route('basic.edit', $teacher->id) }}">{{ $teacher->email }}</a></td>
                <td>{{ $teacher->name }}</td>
                <td>
                    <form method="POST" action="{{ route('leader.assign') }}">
                        {!! csrf_field() !!}
                        <select id="role" name="role">
                            <option>없음</option>
                            @forelse($leaders as $leader)
                                <option @if($teacher->leader == null) @elseif($teacher->leader->id == $leader->id) selected @endif value="{{ $leader->id . ',' .$teacher->id }}">
                                    {{ $leader->name }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        <button type="submit"><label for="role">변경</label></button>
                    </form>
                </td>
                <td>{{ $teacher->created_at }}</td>
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
                    url: 'leader/' + id
                }).then(function(res) {
                    console.log(res);
                    window.location.href = 'admin/leader';
                })
            }
        }
    </script>
@endsection