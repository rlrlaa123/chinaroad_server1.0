<div class="sidebar libraryinfo {{ preg_match('/\/admin\/contents/', $_SERVER['REQUEST_URI']) ||
    preg_match('/\/admin\/classification/', $_SERVER['REQUEST_URI']) ? '' : 'hide' }}">
    <div class="sidemenu">콘텐츠관리</div>
    <div class="sideuser">콘텐츠관</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{ preg_match('/\/admin\/contents$/', $_SERVER['REQUEST_URI']) ||
                                    preg_match('/\/admin\/contents\/[0-9]+\/edit/', $_SERVER['REQUEST_URI'])
                                    ? 'active' : ''}}">
                <a href="/admin/contents">콘텐츠 리스트</a>
            </li>
            <li class="selector  {{ preg_match('/\/admin\/contents\/create/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="/admin/contents/create">콘텐츠 등록</a>
            </li>
            <li class="selector  {{ preg_match('/\/admin\/classification/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="/admin/classification">카테고리 관리</a>
            </li>
        </ul>
    </div>
</div>
