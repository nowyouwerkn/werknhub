@extends('front.theme.werkn-backbone-bootstrap.layouts.main')

@push('seo')

@endpush

@push('stylesheets')
<style type="text/css">
    .bg-warning{
        background-color: rgba(212,205,191,1) !important;
        color: #6a6340 !important;
    }

    .bg-danger{
        background-color: rgba(10,18,33,1) !important;
        color: #d7cfc0 !important;
    }
</style>
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