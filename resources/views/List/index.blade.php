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
            <th>이미지여부</th>
            <th>삭제</th>
            <th>서브메뉴</th>
        </tr>
        </thead>
        <tbody>
        @forelse($lists as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td><a class="name" href="{{ route('list.edit', [$category_id , $list->id]) }}">{{ $list->name }}</a></td>
                <td>{{ isset($list->image) ? 'O' : 'X' }}</td>
                <td><a class="delete" onclick="deleteConversation({{ $list->id }})">삭제</a></td>
                <td class="submenu"><a href="#">서브메뉴</a></td>
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
                    url: "{{ $category_id }}/" + id
                }).then(function(res) {
                    console.log(res);
                    location.href = '/admin/conversation/' + '{{ $category_id }}'
                })
            }
        }
    </script>
@endsection