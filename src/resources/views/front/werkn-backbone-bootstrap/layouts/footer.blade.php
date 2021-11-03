@php
    $legals = Nowyouwerkn\WerknHub\Models\LegalText::get(['type']);
@endphp

<footer class="bg-dark text-white pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="index.html" class="footer-logo"><img src="{{ asset('themes/werkn-backbone/img/logo/w_logo.svg') }}" alt=""></a>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>

                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <li class="mb-3"><strong>Sitio</strong></li>
                            <li><a href="{{ route('index') }}">Inicio</a></li>
                            <li><a href="{{ route('index') }}">Blog</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <li class="mb-3"><strong>Información Legal</strong></li>
                            @foreach($legals as $legal)
                            <li>
                                <a href="{{ route('legal.text' , $legal->type) }}">
                                    @switch($legal->type)
                                        @case('Returns')
                                            Política de Devoluciones
                                            @break

                                        @case('Privacy')
                                            Política de Privacidad
                                            @break

                                        @case('Terms')
                                            Términos y Condiciones
                                            @break

                                        @case('Shipment')
                                            Política de Envíos
                                            @break

                                        @default
                                            Hubo un problema, intenta después.
                                    @endswitch 
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer -->
<div class="post-footer bg-light pt-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="text-uppercase mb-0" style="font-size: .8em">&copy; 2021 <a href="index.html">{{ $site_config->store_name ?? 'WerknHub' }}</a>. Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</div>