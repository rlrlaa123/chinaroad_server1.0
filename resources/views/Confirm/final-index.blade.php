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

        .confirm-detail {
            display: grid;
            grid-template-columns: 50% 50%;
            text-align: left;
        }

        .confirm-detail p {
            margin: 0;
        }

        .textarea {
            grid-column: span 2;
            margin-top: 10px;
        }

        .textarea button {
            float: right;
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
            <th>작성날짜</th>
            <th>작성자</th>
            <th><label for="answer">내용</label></th>
            <th>첨삭여부</th>
        </tr>
        </thead>
        <tbody>
        @forelse($confirms as $confirm)
            <tr>
                <td>{{ $confirm->id }}</td>
                <td>{{ $confirm->date }}</td>
                <td>
                    {{ $confirm->user->email }}<br>
                    {{ $confirm->user->name }}
                </td>
                <td>
                    <div class="confirm-detail">
                        <div>
                            <p>[중국어질문]</p>
                            <p>{{ $confirm->edit->question_ch }}</p>
                        </div>
                        <div>
                            <p>[중국어답변]</p>
                            <p>{{ $confirm->reply }}</p>
                        </div>
                        <div style="margin-top: 10px;">
                            <p>[한국어질문]</p>
                            <p>{{ $confirm->edit->question_ko }}</p>
                        </div>
                        <div style="margin-top: 10px;">
                            <p>[한국어답변]</p>
                            <p></p>
                        </div>

                        <div class="textarea">
                            <form id="leader_save" method="POST" action="{{ route('confirm.leader') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="confirm_id" value="{{ $confirm->id }}">
                                <textarea rows="8" style="width: 100%;" id="answer" name="answer">{{ $confirm->answer }}</textarea>
                                <button type="submit">승인완료</button>
                            </form>
                        </div>
                    </div>
                </td>
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