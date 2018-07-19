<div class="sidebar basicinfo {{ preg_match('/\/admin\/admin/', $_SERVER['REQUEST_URI']) ||
                                 preg_match('/\/admin\/admin\/create/', $_SERVER['REQUEST_URI']) ||
                                 preg_match('/\/admin\/leader/', $_SERVER['REQUEST_URI']) ||
                                 preg_match('/\/admin\/teacher/', $_SERVER['REQUEST_URI'])
                                 ? '' : 'hide'}}">
    <div class="sidemenu">관리자</div>
    <div class="sideuser">관리자</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{ preg_match('/\/admin\/admin$/', $_SERVER['REQUEST_URI']) ||
                                    preg_match('/\/admin\/admin\/[0-9]+\/edit/', $_SERVER['REQUEST_URI'])
                                    ? 'active' : ''}}">
                <a href="/admin/admin">관리자정보</a>
            </li>
            <li class="selector  {{ preg_match('/\/admin\/admin\/create/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="/admin/admin/create">관리자 회원가입</a>
            </li>
            <li class="selector  {{ preg_match('/\/admin\/leader/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="/admin/leader">담당 팀장 배정</a>
            </li>
            <li class="selector  {{ preg_match('/\/admin\/teacher/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="/admin/teacher">담당 선생님 배정</a>
            </li>
        </ul>
    </div>
</div>