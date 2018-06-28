<div class="sidebar editinfo {{ preg_match('/\/admin\/edit/', $_SERVER['REQUEST_URI']) ? '' : 'hide' }}">
    <div class="sidemenu">첨삭관리</div>
    <div class="sideuser">첨삭관리</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector {{ preg_match('/\/admin\/edit/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/edit">오늘의 질문</a>
            </li>
            <li class="selector {{ preg_match('/\/admin\/edit.+/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/edit">오늘의 질문 등록</a>
            </li>
            <li class="selector {{ preg_match('/\/admin\/edit.+/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/edit">첨삭하기</a>
            </li>
            <li class="selector {{ preg_match('/\/admin\/edit.+/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="/admin/edit">첨삭승인</a>
            </li>
        </ul>
    </div>
</div>