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
    <h3>※ 첨삭 리스트</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>표시일자</th>
            <th>난이도</th>
            <th>질문</th>
            <th>모범답안</th>
            <th>이미지</th>
            <th>음성포함여부</th>
            <th>삭제</th>
        </tr>
        </thead>
        <tbody>
        @forelse($edits as $edit)
            <tr>
                <td>{{ $edit->id }}</td>
                <td>{{ $edit->date }}</td>
                <td>{{ $edit->level }}</td>
                <td style="text-align: left;">
                    <a href="{{ route('edit.edit', [$edit->id]) }}">
                        <div>[한국어]</div>
                        <div class="name-selector">{{ $edit->question_ko }}</div>
                        <br><br>
                        <div>[중국어]</div>
                        <div class="name-selector">{{ $edit->question_ch }}</div>
                    </a>
                </td>
                <td style="text-align: left;">
                    <a href="{{ route('edit.edit', [$edit->id]) }}">
                        <div>[한국어]</div>
                        <div class="name-selector">{{ $edit->answer_ko }}</div>
                        <br><br>
                        <div>[중국어]</div>
                        <div class="name-selector">{{ $edit->answer_ch }}</div>
                    </a>
                </td>
                <td>
                    @if($edit->image == null) x @else <img src="/{{ $edit->image }}" @endif style="width: 100px;">
                </td>
                <td>
                    <div>[한국어]</div>
                    <div>{{ $edit->question_audio_ko === null ? 'x' : 'o' }} / {{ $edit->answer_audio_ko === null ? 'x' : 'o' }}</div>
                    <br><br>
                    <div>[중국어]</div>
                    <div>{{ $edit->question_audio_ch === null ? 'x' : 'o' }} / {{ $edit->answer_audio_ko === null ? 'x' : 'o' }}</div>
                <td><a class="delete" onclick="deleteConversation({{ $edit->id }})">삭제</a></td>
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
                    url: 'edit/' + id
                }).then(function(res) {
                    window.location.href = '/admin/edit'
                })
            }
        }
    </script>
@endsection