@props(['name', 'iconLink', 'routeLink'])

<li class="nav-item">
    <a
            class="nav-link"
            href="{{ $routeLink }}"
    >
        <i class="nav-icon {{ $iconLink }}"></i>
        {{ $name }}
    </a>
</li>