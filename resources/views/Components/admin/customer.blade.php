<div class="sidebar developmentinfo {{ preg_match('/\/admin\/customer/', $_SERVER['REQUEST_URI']) ||preg_match('/\/admin\/customer.+/', $_SERVER['REQUEST_URI'])? '' : 'hide'}}">
    <div class="sidemenu">고객센터</div>
    <div class="sideuser">고객센터</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector {{ preg_match('/\/admin\/customer/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/customer">게시판 설정</a>
            </li>
            <li class="selector {{ preg_match('/\/admin\/customer.+/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/customer">공지사항</a>
            </li>
            <li class="selector {{ preg_match('/\/admin\/customer.+/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/customer">FAQ</a>
            </li>
            <li class="selector {{ preg_match('/\/admin\/customer.+/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/customer">문의게시</a>
            </li>
        </ul>
    </div>
</div>