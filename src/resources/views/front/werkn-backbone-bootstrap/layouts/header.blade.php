<nav class="pt-3 pb-3">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-5">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="{{ route('index') }}">Inicio</a></li>
                    @foreach($extensions as $extension)
                        @switch($extension->name)
                            @case('WeBlog')
                                <li class="list-inline-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                                @break

                            @case('WeCommerce')
                                <li class="list-inline-item"><a href="{{ route('index') }}">WeCommerce</a></li>

                                @break

                            @case('WeFood')
                                <li class="list-inline-item"><a href="{{ route('index') }}">WeFood</a></li>
                                @break

                            @default
                                Hubo un problema, intenta después.
                        @endswitch
                    @endforeach                    
                </ul>
            </div>
            <div class="col-2">
                <a href="{{ route('index') }}">
                    @if(!empty($store_config))
                        @if($store_config->store_logo == NULL)
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid" width="200">
                        @else
                        <img src="{{ asset('assets/img/' . $store_config->store_logo) }}" alt="Logo" class="img-fluid" width="200">
                        @endif
                    @else
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid" width="200">
                    @endif
                </a>    
            </div>
            <div class="col-5 text-end">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="{{ route('login') }}"><ion-icon name="person"></ion-icon></a></li>
                </ul>       
            </div>
        </div>
    </div>
</nav>