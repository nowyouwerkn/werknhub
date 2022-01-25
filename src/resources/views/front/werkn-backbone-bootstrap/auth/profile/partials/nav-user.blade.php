<ul class="list-unstyled">
    <li>
        <a href="{{ route('profile') }}">Vista General</a>
    </li>
    <li>

    <li class="mt-5">
        <a href="{{ route('account') }}">Editar Cuenta</a>
    </li>

    <li class="mt-5">
       <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-danger">
            <i data-feather="log-out"></i> <span>Cerrar Sesión</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </a>
    </li>
</ul>