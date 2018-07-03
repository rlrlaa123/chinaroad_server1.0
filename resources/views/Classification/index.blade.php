@extends('layouts.admin')
@section('style')
    <style>
    </style>
@endsection
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: flex-end;">
        <h3 style="display: inline-block; ">※ 콘텐츠 카테고리</h3>
        <a href="/admin/classification/create" style="font-weight: bold;">[ 등록하기 ]</a>
    </div>
    <hr>
    <table>
        <thead>
        <tr>
            <th>카테고리명</th>
            <th>수정</th>
            <th>삭제</th>
        </tr>
        </thead>
        <tbody>
        @forelse($classifications as $classification)
            <tr>
                <td>{{ $classification->name }}</td>
                <td><a class="name-selector" href="{{ route('classification.edit', [$classification->id]) }}">{{ $classification->name }}</a></td>
                <td><a class="delete" onclick="deleteConversation({{ $classification->id }})">삭제</a></td>
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
                    url: 'classification/' + id
                }).then(function() {
                    window.location.href = '/admin/classification/'
                })
            }
        }
    </script>
@endsection