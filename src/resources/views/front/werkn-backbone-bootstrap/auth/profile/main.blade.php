@extends('front.theme.werkn-backbone-bootstrap.layouts.main')

@push('seo')

@endpush

@push('stylesheets')

@endpush

@section('content')
    <!-- Profile -->
    <section>
        <div class="container">
            <!-- Title -->
            <div class="row">
                <div class="col-md-12">
                    <p>Bienvenido</p>
                    <h1>Hola, {{ Auth()->user()->name ?? 'N/A' }}</h1>
                </div>
            </div>
            <!-- Content -->
            <div class="row mt-3">
                <div class="col-md-3">
                    @include('front.theme.werkn-backbone-bootstrap.auth.profile.partials.nav-user')
                </div>

                <div class="col-md-9">
                
                </div>
            </div>

        </div>
    </section>
@endsection