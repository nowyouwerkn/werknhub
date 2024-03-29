@extends('werknhub::back.layouts.main')

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">WerknHub</a></li>
                <li class="breadcrumb-item active" aria-current="page">Configuración</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Configuración</h4>
        </div>
        <div class="d-none d-md-block">
            <!--
            <a href="{{ route('dashboard') }}" class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5">
                Dashboard
            </a>
            -->
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('general.config') }}">
                <div class="card card-body h-100">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">Preferencias Generales</h3>
                    <h6 class="tx-12 tx-color-03 mg-b-0 mt-2">Administra los datos generales de tu tienda.</h6>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('themes.index') }}">
                <div class="card card-body h-100">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">Apariencia / Personalizar</h3>
                    <h6 class="tx-12 tx-color-03 mg-b-0 mt-2">Activa y desactiva tus carpetas de proyectos dentro del sistema de manera programática.</h6>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('seo.index') }}">
                <div class="card card-body h-100">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">SEO</h3>
                    <h6 class="tx-12 tx-color-03 mg-b-0 mt-2">Configura como quieres que te encuentren en los buscadores de Internet</h6>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('users.index') }}">
                <div class="card card-body h-100">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">Usuarios y Permisos</h3>
                    <h6 class="tx-12 tx-color-03 mg-b-0 mt-2">Administra los accesos a tu plataforma para diferentes usuarios.</h6>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="{{ route('notifications.index') }}">
                <div class="card card-body h-100">
                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">Notificaciones por Correo</h3>
                    <h6 class="tx-12 tx-color-03 mg-b-0 mt-2">Configura los datos de servidor SMTP para notificar por correo a tus clientes y a ti mismo.</h6>
                </div>
            </a>
        </div>
    </div>
@endsection