@extends('layouts.admin')
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <h3>※ 담당 선생님 리스트</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>학생 아이디(이메일)</th>
            <th>학생 이름</th>
            <th>담당 선생님</th>
            <th>등록날짜</th>
        </tr>
        </thead>
        <tbody>
        @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td><a class="name-selector" href="{{ route('teacher.edit', $student->id) }}">{{ $student->email }}</a></td>
                <td>{{ $student->name }}</td>
                <td>
                    <form method="POST" action="{{ route('teacher.assign') }}">
                        {!! csrf_field() !!}
                        <select id="role" name="role">
                            <option>없음</option>
                            @forelse($teachers as $teacher)
                                <option @if($student->teacher == null)
                                        @elseif($student->teacher->id == $teacher->id)
                                            selected
                                        @endif
                                        value="{{ $teacher->id . ',' .$student->id }}">
                                    {{ $teacher->name }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        <button type="submit"><label for="role">변경</label></button>
                    </form>
                </td>
                <td>{{ $student->created_at }}</td>
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