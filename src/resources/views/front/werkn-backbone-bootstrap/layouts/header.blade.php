@php
    $site_config = Nowyouwerkn\WerknHub\Models\SiteConfig::first(['site_name', 'contact_email', 'phone']);
    $extensions = Nowyouwerkn\WerknHub\Models\Extension::where('is_active', true)->get(['name']);
@endphp

<nav class="pt-3 pb-3">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-5">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="{{ route('index') }}">Inicio</a></li>
                    @foreach($extensions as $extension)
                        @switch($extension->name)
                            @case('weblog')
                                <li class="list-inline-item"><a href="{{ route('wb-blog.index') }}">Blog</a></li>
                                @break

                            @case('wecommerce')
                                <li class="list-inline-item"><a href="{{ route('index') }}">WeCommerce</a></li>

                                @break

                            @case('wefood')
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
                    @if(!empty($site_config))
                        @if($site_config->store_logo == NULL)
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid" width="200">
                        @else
                        <img src="{{ asset('assets/img/' . $site_config->store_logo) }}" alt="Logo" class="img-fluid" width="200">
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