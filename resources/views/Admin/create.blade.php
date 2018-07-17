@extends('layouts.admin')
@section('style')
    <style>
        .td-input {
            text-align: left;
        }

        .description {
            width :80%;
        }

        tr td:nth-child(2) input[type="text"] {
             width: unset !important;
             background-color: white !important;
        }
    </style>
@endsection
@section('content')
    <h3>※ 관리자 리스트 -> 등록</h3>
    <hr>
    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <table>
            <tr>
                <td><label for="email">이메일</label></td>
                <td class="td-input">
                    <input id="email" name="email" type="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="help-block">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="name">이름</label></td>
                <td class="td-input">
                    <input id="name" name="name" type="text" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div class="help-block">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="password">패스워드</label></td>
                <td class="td-input">
                    <input id="password" name="password" type="password" value="{{ old('password') }}">
                    @if ($errors->has('password'))
                        <div class="help-block">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="password-confirmation">패스워드 확인</label></td>
                <td class="td-input">
                    <input id="password-confirmation" name="password_confirmation" type="password" value="{{ old('password-confirmation') }}">
                    @if ($errors->has('password-confirmation'))
                        <div class="help-block">
                            {{ $errors->first('password-confirmation') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="role">회원 등급</label></td>
                <td class="td-input">
                    <select id="role" name="role">
                        <option value="Admin">관리자</option>
                        <option value="Leader">팀장</option>
                        <option selected value="Teacher">선생님</option>
                    </select>
                </td>
            </tr>
        </table>
        <hr style="visibility: hidden;">
        <div class="button-wrapper">
            <button type="submit">확인</button>
            <button type="button" onclick="location.href = '/admin/admin'">취소</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
    </script>
@endsection