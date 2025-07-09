<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">Zaily</a>
        <span class="ti-close menu-toggle" id="sidebar-close"></span>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="{{route('dashboard')}}">
                <i class="ti-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{route('profile.index')}}">
                <i class="ti-user"></i>
                <span>Users</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ti-package"></i>
                <span>Services</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ti-star"></i>
                <span>Skills</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ti-briefcase"></i>
                <span>Projects</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ti-book"></i>
                <span>Blog</span>
            </a>
        </li>
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ti-power-off"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>