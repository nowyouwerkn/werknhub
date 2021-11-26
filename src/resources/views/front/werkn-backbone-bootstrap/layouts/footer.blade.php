<footer class="bg-dark text-white pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>

                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <li class="mb-3"><strong>Sitio</strong></li>
                            <li><a href="{{ route('index') }}">Inicio</a></li>
                            @foreach($extensions as $extension)
                                @switch($extension->name)
                                    @case('weblog')
                                        <li><a href="{{ route('wb-blog.index') }}">Blog</a></li>
                                        @break

                                    @case('wecommerce')
                                        <li><a href="{{ route('index') }}">WeCommerce</a></li>

                                        @break

                                    @case('wefood')
                                        <li><a href="{{ route('index') }}">WeFood</a></li>
                                        @break

                                    @default
                                        Hubo un problema, intenta después.
                                @endswitch
                            @endforeach 
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