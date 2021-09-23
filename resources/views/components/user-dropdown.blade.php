<ul class="header-nav ms-3">
    <li class="nav-item dropdown">
        <a
                class="nav-link py-0"
                data-coreui-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
        >
            <div class="avatar avatar-md">
                <i class="far fa-user"></i>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end pt-0">
            <div class="dropdown-header bg-light py-2">
                <div class="fw-semibold">Settings</div>
            </div>
            <a
                    class="dropdown-item"
                    href="{{ route('profile.index') }}"
            >
                <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg>
                Profile
            </a>
            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                        class="dropdown-item"
                >
                    <svg class="icon me-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </li>
</ul>