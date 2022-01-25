@extends('werknhub::back.layouts.main')

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mg-lg-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">WerknHub</a></li>
                <li class="breadcrumb-item active" aria-current="page">Extensiones</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Extensiones</h4>
        </div>
        <div class="d-none d-md-block">

        </div>
    </div>

    <style type="text/css">
        .status-circle{
            display: inline-block;
            width: 8px;
            height: 8px;
            margin-right: 5px;
            border-radius: 100%;
        }

        .token-notification{
            position: relative;
            background-color: black;
            color: #fff;
            font-size: .8em;
            padding: 8px 10px;
            width: 92.7%;
            border-radius: 0px 0px 10px 10px;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="pr-5 pt-4 pl-3">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('configuration') }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i></a>
                <h4 class="mb-0 ml-2">Regresar</h4>
            </div>

            <h3>Extensiones</h3>
            <p>Conecta cualquier sistemal ecosistema de Werkn utilizando el comando correspondiente.</p>

            <p>Tu sitio puede vincularse con: </p>

            <ul>
                <li>WeBlog</li>
                <li>WeCommerce</li>
                <li>WeFood <span class="badge badge-info">Proximamente</span></li>
                <li>y mas...</li>
            </ul>
        </div>
        
    </div>
    <div class="col-md-8">
        <div class="card card-body mb-4">
            <h4>Extensiones del Sitio</h4>
            <p class="mb-4"><strong>Operativo</strong></p>

            @if($extensions->count() == 0)
            <div class="text-center">
                <img src="{{ asset('assets/img/group_10.svg') }}" class="wd-40p ml-auto mr-auto mb-5">
                <h4>No hay extensiones activas en tu plataforma.</h4>
                <p class="mb-4">Empieza dando click en el botón inferior.</p>
            </div>
            @else
            <div class="row">
                @foreach($extensions as $extension)
                <div class="col-md-6">
                    <div class="card mb-4">
                        @if($extension->is_active == false)
                        <span class="badge badge-danger">Desactivado</span>
                        @else
                        <span class="badge badge-success">Activado</span>
                        @endif

                        <div class="card-body">
                            <h6 class="card-title">{{ $extension->name }}</h6>
                            <p class="card-text">{{ $extension->composer_require }}</p>
                            <hr>
                            <a href="" class="btn btn-sm btn-outline-primary btn-block">Correr Migraciones y Semillas</a>
                            <a href="" class="btn btn-sm btn-outline-primary btn-block">Instalar Vistas</a>                                     
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <a href="javascript:void(0)" data-toggle="modal" data-target="#modalCreate" class="btn btn-sm btn-outline-light btn-uppercase btn-block mt-3">Instalar nueva extensión</a>
        </div>
    </div>
</div>


<div id="modalCreate" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Crear nuevo Elemento</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <form method="POST" action="{{ route('extensions.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-body pd-25">
                    <div class="row">
                        <div class="form-group col-md-6 mt-2">
                            <label>Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="werkn-backbone">
                        </div>

                        <div class="form-group col-md-6 mt-2">
                            <label>Versión <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="1.0.0" name="version">
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label>Comando <span class="text-info">(Opcional)</span></label>
                        <input type="text" class="form-control" name="composer_require" placeholder="composer require nowyouwerkn/wecommerce">
                    </div>

                    <div class="alert alert-warning">
                        <p class="mb-0">Al guardar la información de esta extensión el sistema la instalará y se activará automáticamente. Si tu plataforma no funciona con la actualización: <a href="">contacta a soporte</a></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Integrar Ahora</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

@endsection