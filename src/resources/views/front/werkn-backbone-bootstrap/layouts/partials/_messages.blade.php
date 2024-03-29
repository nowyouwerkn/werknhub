@if(Session::has('exito'))
<div class="alert alert-success fade show alert-dismissable alert-fixed">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>¡Éxito!</strong> {{ Session::get('exito') }}
</div>
@endif

@if(Session::has('info'))
<div class="alert alert-info fade show alert-dismissable alert-fixed">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    {{ Session::get('info') }}
</div>
@endif

@if(Session::has('warning'))
<div class="alert alert-warning fade show alert-dismissable alert-fixed">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>¡Proceso Correcto!</strong> {{ Session::get('warning') }}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger fade show alert-dismissable alert-fixed">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>¡Error!</strong> {{ Session::get('error') }}
</div>
@endif
