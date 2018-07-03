@extends('layouts.admin')
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <h3>※ 회화리스트 -> {{ \App\Category::find($category_id)->name }}</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>이름</th>
            <th>문장</th>
            <th>이미지</th>
            <th>동영상</th>
            <th>삭제</th>
        </tr>
        </thead>
        <tbody>
        @forelse($conversations as $conversation)
            <tr>
                <td>{{ $conversation->id }}</td>
                <td><a class="name-selector" href="{{ route('conversation.edit', [$category_id, $conversation->id]) }}">{{ $conversation->name }}</a></td>
                <td>{{ $conversation->korean1 }}<br>{{ $conversation->chinese_c1 }}<br>{{ $conversation->chinese_e1 }}</td>
                <td>@if($conversation->image1 == null) x @else <img src="/{{ $conversation->image1 }}" style="width: 100px;"> @endif</td>
                <td>{{ isset($conversation->video1) && isset($conversation->video2) ? 'O' : 'X' }}</td>
                <td><a class="delete" onclick="deleteConversation({{ $conversation->id }})">삭제</a></td>
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
                    url: '{{ $category_id }}/' + id
                }).then(function() {
                    window.location.href = '/admin/conversation/' + '{{ $category_id }}'
                })
            }
        }
    </script>
@endsection