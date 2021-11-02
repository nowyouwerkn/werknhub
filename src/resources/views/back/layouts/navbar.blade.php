<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="{{ route('index') }}" class="aside-logo">We<span></span>rkn</a>
        <a href="javascript:void(0)" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>

    <a href="{{ route('index') }}" class="btn btn-primary btn-block" style="border-radius: 0px;">Ir a tu página <i data-feather="shopping-bag"></i></a>

    <div class="aside-body">
        <!-- User Menu -->
        <div class="aside-loggedin">
            <div class="d-flex align-items-center justify-content-start">
                <a href="" class="avatar">
                    <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim( Auth::user()->email ?? 'N/A'))) . '?d=retro&s=150' }}" alt="user" class="rounded-circle">     
                </a>
                <div class="aside-alert-link">
                    <a href="{{ route('update.messages') }}" class="new" data-toggle="tooltip" title="Nuevas actualizaciones en tu plataforma de WeCommerce">
                        <i data-feather="message-square"></i>
                    </a>
                    
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-1').submit();" data-toggle="tooltip" title="Cerrar Sesión">
                        <i data-feather="log-out"></i>
                        <form id="logout-form-1" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
            <div class="aside-loggedin-user">
                <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
                    <h6 class="tx-semibold mg-b-0">{{ Auth::user()->name ?? 'N/A' }}</h6>
                    <i data-feather="chevron-down"></i>
                </a>
                <p class="tx-color-03 tx-12 mg-b-0">Administrator</p>
            </div>
            <div class="collapse" id="loggedinMenu">
                <ul class="nav nav-aside mg-b-0">
                    <li class="nav-item">
                        @if(Auth::user()->color_mode == false)
                        <a href="{{ route('change.color') }}" class="nav-link"><i data-feather="moon"></i> <span>Modo Oscuro</span></a>
                        @else
                        <a href="{{ route('change.color') }}" class="nav-link"><i data-feather="sun"></i> <span>Modo Claro</span></a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.help') }}" class="nav-link"><i data-feather="help-circle"></i> <span>Ayuda</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-danger">
                            <i data-feather="log-out"></i> <span>Cerrar Sesión</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Menu -->
        <ul class="nav nav-aside">
            <li class="nav-label">General</li>
            <li class="nav-item active">
                <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="pie-chart"></i> <span>Inicio</span></a>
            </li>


            <li class="nav-item">
                <a href="{{ route('extensions.index') }}" class="nav-link">
                    <i data-feather="users"></i> <span>Extensiones</span>
                </a>
            </li>

            <li class="nav-label mg-t-100">Configuración</li>
            <li class="nav-item">
                <a href="{{ route('configuration') }}" class="nav-link">
                    <i data-feather="settings"></i> <span>Configuración</span>
                </a>
            </li>
        </ul>
    </div>
</aside>