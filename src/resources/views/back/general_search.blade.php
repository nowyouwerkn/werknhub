@extends('werknhub::back.layouts.main')

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">WerknHub</a></li>
                <li class="breadcrumb-item active" aria-current="page">Búsqueda General</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Búsqueda General</h4>
        </div>
        <div class="d-none d-md-block">

        </div>
    </div>
@endsection

@section('content')

<h2 class="margin-text-2">Resultados para: {{ Request::input('query') }}</h2>
<p>Encontrado resultado(s) que concuerdan con tu búsqueda</p>

@endsection