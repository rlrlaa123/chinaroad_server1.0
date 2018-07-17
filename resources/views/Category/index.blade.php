@extends('layouts.admin')
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <h3>※ 회화리스트</h3>
    <hr>
    <table>
        <thead>
        <tr>
            <th>일련번호</th>
            <th>난이도</th>
            <th>이름</th>
            <th>내용</th>
            <th>이미지</th>
            <th>삭제</th>
            <th>서브메뉴</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->level }}</td>
                <td><a class="name-selector" href="{{ route('category.edit', $category->id) }}">{{ $category->name }}</a></td>
                <td>{{ $category->description }}</td>
                <td><img src="/{{ $category->image }}" style="width: 100px;"></td>
                <td><a class="delete" onclick="deleteConversation({{ $category->id }})">삭제</a></td>
                <td class="submenu"><a href="{{ route('conversation.index', $category->id) }}">서브메뉴</a></td>
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
                    url: 'conversation/' + id
                }).then(function(res) {
                    window.location.href = 'conversation';
                })
            }
        }
    </script>
@endsection