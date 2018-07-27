<div class="sidebar developmentinfo {{ preg_match('/\/admin\/customer/', $_SERVER['REQUEST_URI']) ||
                                       preg_match('/\/admin\/customer.+/', $_SERVER['REQUEST_URI']) ||
                                       preg_match('/admin\/notice/', $_SERVER['REQUEST_URI']) ||
                                       preg_match('/admin\/faq/', $_SERVER['REQUEST_URI']) ||
                                       preg_match('/admin\/inquiry/', $_SERVER['REQUEST_URI'])
                                       ? '' : 'hide'}}">
    <div class="sidemenu">고객센터</div>
    <div class="sideuser">고객센터</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector {{ preg_match('/\/admin\/notice/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/notice">공지사항</a>
            </li>
            <li class="selector {{ preg_match('/\/admin\/faq/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/faq">FAQ</a>
            </li>
            <li class="selector {{ preg_match('/\/admin\/inquiry/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/inquiry">문의게시판</a>
            </li>
        </ul>
    </div>
</div>