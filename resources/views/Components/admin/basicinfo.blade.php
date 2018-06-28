<div class="sidebar basicinfo {{ preg_match('/\/admin\/basic/', $_SERVER['REQUEST_URI']) ? '' : 'hide'}}">
    <div class="sidemenu">기초정보</div>
    <div class="sideuser">관리자</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{ preg_match('/\/admin\/basic/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="/admin/basic">관리자정보</a>
            </li>
        </ul>
    </div>
</div>