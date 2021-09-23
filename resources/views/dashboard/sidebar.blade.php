<div
        class="sidebar sidebar-dark sidebar-fixed sidebar-self-hiding-xl"
        id="sidebar"
>
    <div class="sidebar-brand d-none d-md-flex">
        CRM
    </div>
    <ul
            class="sidebar-nav"
            data-coreui="navigation"
            data-simplebar=""
    >
        <x-sidebar-link
                name="Dashboard"
                iconLink="fas fa-tachometer-alt fa-fw"
                routeLink="/dashboard"
        />
        @can('manage users')
        <x-sidebar-link
                name="Users"
                iconLink="nav-icon fas fa-fw fa-user-alt"
                routeLink="/users"
        />
        @endcan
        <x-sidebar-link
                name="Clients"
                iconLink="nav-icon fas fa-fw fa-address-card"
                routeLink="/clients"
        />
        <x-sidebar-link
                name="Projects"
                iconLink="nav-icon fas fa-fw fa-copy"
                routeLink="/projects"
        />
        <x-sidebar-link
                name="Tasks"
                iconLink="nav-icon fas fa-fw fa-tasks"
                routeLink="/tasks"
        />

        <li class="nav-item mt-auto"></li>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <li class="nav-item">
                <button
                        class="nav-link w-100 container btn btn-link"
                        type="submit"
                >
                    <i class="nav-icon c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
                    Logout
                </button>
            </li>
        </form>
    </ul>
    <button
            class="sidebar-toggler"
            type="button"
            data-coreui-toggle="unfoldable"
    ></button>
</div>