<div class="sidebar userinfo {{ preg_match('/\/admin\/user/', $_SERVER['REQUEST_URI']) ? '' : 'hide'}}">
    <div class="sidemenu">회원관리</div>
    <div class="sideuser">회원관리</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{ preg_match('/\/admin\/user/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a
                        href="/admin/user/">회원리스트</a></li>
            <li class="selector  {{ preg_match('/\/admin\/report/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a
                        href="/admin/report/">회원등급</a></li>
            <li class="selector  {{ preg_match('/\/admin\/asking/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a
                        href="/admin/asking/">회원가입</a></li>
        </ul>
    </div>
</div>