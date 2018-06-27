<div class="sidebar judicialinfo-selector {{ preg_match('/\/admin\/category/', $_SERVER['REQUEST_URI']) ? '' : 'hide' }}">
    <div class="sidemenu">회화관리</div>
    <div class="sideuser">회화관리</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector {{preg_match('/^\/admin\/category$/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="{{url('admin/category/')}}">
                    회화 리스트
                </a>
            </li>
            <li class="selector {{preg_match('/\/admin\/category\/create/', $_SERVER['REQUEST_URI']) ? 'active' : '' }}">
                <a href="{{url('admin/category/create')}}">
                    회화 등록
                </a>
            </li>
        </ul>
    </div>
</div>
