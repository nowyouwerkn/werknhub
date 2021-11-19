@extends('front.theme.werkn-backbone-bootstrap.layouts.main')

@push('seo')

@endpush

@push('stylesheets')

@endpush

@section('content')
<h1>Bienvenido a WerknHub</h1>

<p>Extensiones instaladas:</p>

<ul>
	@foreach($extensions as $extension)
	<li>{{ $extension }}</li>
</ul>
@endsection

@push('scripts')

@endpush