@section('sidebar')
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('assets/img/logo/logo2.png') }}">
            </div>
            <div class="sidebar-brand-text mx-3">RuangAdmin</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ request()->segment(1) == '/' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('listdata.guest') }}">
                <i class="fas fa-fw fa-list-alt"></i>
                <span>List Data</span>
            </a>
        </li>
        {{-- <div class="version" id="version-ruangadmin"></div> --}}
    </ul>
@show
