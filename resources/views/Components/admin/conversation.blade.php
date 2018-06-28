<div class="sidebar conversation-selector {{ preg_match('/\/admin\/conversation/', $_SERVER['REQUEST_URI']) ||
    preg_match('/\/admin\/list/', $_SERVER['REQUEST_URI'])
    ? '' : 'hide' }}">
    <div class="sidemenu">회화관리</div>
    <div class="sideuser">회화관리</div>
    <div class="sidesubmenu">
        <ul>
            @if(preg_match('/\/admin\/conversation$/', $_SERVER['REQUEST_URI']))
                <li class="selector {{ preg_match('/^\/admin\/conversation$/', $_SERVER['REQUEST_URI']) ||
                 preg_match('/^\/admin\/conversation\/.\/edit/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                    <a href="{{ url('admin/conversation/') }}">
                        회화 리스트
                    </a>
                </li>
                <li class="selector {{ preg_match('/\/admin\/conversation\/create/', $_SERVER['REQUEST_URI']) ? 'active' :  '' }}">
                    <a href="{{ url('admin/conversation/create') }}">
                        회화 등록
                    </a>
                </li>
            @elseif(preg_match('/\/admin\/conversation\/[0-9]+/', $_SERVER['REQUEST_URI']))
                <li class="selector {{ preg_match('/^\/admin\/conversation\/[0-9]+$/', $_SERVER['REQUEST_URI']) ||
                 preg_match('/^\/admin\/conversation\/[0-9]+\/[0-9]+\/edit/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                    <a href="/admin/conversation/{{ substr($_SERVER['REQUEST_URI'], 20, 1) }}">
                        회화 리스트
                    </a>
                </li>
                <li class="selector {{ preg_match('/\/admin\/conversation\/[0-9]+\/create/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                    <a href="/admin/conversation/{{ substr($_SERVER['REQUEST_URI'], 20) }}/create">
                        회화 등록
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
