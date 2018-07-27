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

        .inquiry-detail {
            display: grid;
            grid-template-columns: 50% 50%;
            text-align: left;
        }

        .inquiry-detail p {
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
    <h3>※ 문의하기 리스트 - 답변하기</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>작성자</th>
            <th>제목</th>
            <th>내용</th>
            <th><label for="reply">답변</label></th>
            <th>첨삭여부</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $inquiry->id }}</td>
                <td>{{ $inquiry->user->name }}</td>
                <td>
                    {{ $inquiry->title }}
                </td>
                <td style="width: 25%; text-align: left;">
                    {{ $inquiry->contents }}
                </td>
                <td>
                    <div class="inquiry-detail">
                        <div class="textarea">
                            <form id="inquiry_reply" method="POST" action="{{ route('inquiry.reply') }}">
                                {!! csrf_field() !!}
                                <input type="hidden" id="inquiry_id" name="inquiry_id" value="{{ $inquiry->id }}">
                                <textarea rows="8" style="width: 100%;" id="reply" name="reply">{{ $inquiry->reply }}</textarea>
                                <button form="inquiry_reply">저장하기</button>
                            </form>
                        </div>
                    </div>
                </td>
                <td>{{ $inquiry->state }}</td>
            </tr>
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
            if(inquiry('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: 'inquiry/' + id
                }).then(function(res) {
                    window.location.href = '/admin/inquiry'
                })
            }
        }
    </script>
@endsection