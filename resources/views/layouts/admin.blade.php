<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('style')
    @include('layouts.partials.admin_style')
    @include('layouts.partials.common_style')
    <script src="/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<div id="wrapper">
    <div class="navbar">
        <div class="navbardiv grid-item"><a href="{{ url('admin') }}"
                                            id="appname">{{ config('app.name','Laravel') }}</a></div>
        <div id="userdate" class="grid-item">| 김동현님 안녕하세요
            / {{ \Carbon\Carbon::now() }}</div>
        {{--<div class="navbardiv grid-item">--}}
            {{--<a href="{{ route('admin.logout') }}"--}}
               {{--onclick="event.preventDefault();--}}
                               {{--document.getElementById('logout-form').submit();">--}}
                {{--Logout--}}
            {{--</a>--}}
            {{--<form id="logout-form" action="{{ route('admin.logout') }}" method="POST"--}}
                  {{--style="display: none;">--}}
                {{--{{ csrf_field() }}--}}
            {{--</form>--}}
        {{--</div>--}}
    </div>
    <div class="navsubbar">
        <div class="grid-item basicinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/basic' ? 'active' : ''}}" style="-ms-grid-column: 1"
            onclick="location.href='/admin/basic';">
            기초정보
        </div>
        <div class="grid-item  user-selector {{ $_SERVER['REQUEST_URI'] === '/admin/user' ? 'active' : ''}}" style="-ms-grid-column: 3"
             onclick="location.href='/admin/user';">
            회원관리
        </div>
        <div class="grid-item customer-selector {{ $_SERVER['REQUEST_URI'] === '/admin/customer' ? 'active' : '' }}"
             onclick="location.href='/admin/customer';" style="-ms-grid-column: 5">
            고객센터
        </div>
        <div class="grid-item  conversation-selector {{ preg_match('/admin\/conversation/', $_SERVER['REQUEST_URI']) ||
        $_SERVER['REQUEST_URI'] === '/admin/list'
        ? 'active' : '' }}"
             onclick="location.href='/admin/conversation';" style="-ms-grid-column: 7">
            회화
        </div>
        <div class="grid-item  contents-selector {{ $_SERVER['REQUEST_URI'] === '/admin/contents' ? 'active' : '' }}"
             onclick="location.href='/admin/contents';" style="-ms-grid-column: 9">
            콘텐츠
        </div>
        <div class="grid-item  edit-selector {{ $_SERVER['REQUEST_URI'] === '/admin/edit' ? 'active' : '' }}"
             onclick="location.href='/admin/edit';" style="-ms-grid-column: 11">
            첨삭
        </div>
    </div>

    <div class="navlayout">
        <div class="grid-item">
            @component('Components.admin.basicinfo')
            @endcomponent
            @component('Components.admin.edit')
            @endcomponent
            @component('Components.admin.customer')
            @endcomponent
            @component('Components.admin.conversation')
            @endcomponent
            @component('Components.admin.contents')
            @endcomponent
            @component('Components.admin.user')
            @endcomponent
        </div>
        <div class="grid-item">
            <div id="container">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<div class="footer">
    {{--@include('layouts.partials.footer')--}}
</div>
@yield('script')
</body>
</html>