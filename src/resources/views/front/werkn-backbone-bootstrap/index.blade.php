@extends('front.theme.werkn-backbone-bootstrap.layouts.main')

@push('seo')

@endpush

@push('stylesheets')

@endpush

@section('content')
<h1 class="mt-5 mb-5 text-center">Bienvenido a WerknHub</h1>

<section class="banner-main" style="background:#f9f8f5;">
    @if(empty($banners))
    <h2 class="text-center p-5">No se ha configurado un banner</h2>
    @else
        @foreach($banners as $banner)
        <div class="banner-wrap" style="position: relative;">
            @if(empty($banners->video_background))
            @else
                <iframe frameborder="0" height="100%" width="100%" src="https://youtube.com/{{$banner->video_background}}?autoplay=1&controls=0&showinfo=0&autohide=1" style="z-index: 2; position: absolute;"></iframe>
                @endif
            <div class="container">
                <div class="row">
                    <div class="col-12" style="position: relative;"> 
                     
                        <div  style="z-index: 3; position: relative; text-align:{{$banner->position}}" class="banner-content">
                            <h3 style="color: {{$banner->hex_text_title}}">{{ $banner->subtitle }}</h3>
                            <h2 style="color: {{$banner->hex_text_subtitle}}">{{ $banner->title }}</h2>
                            <p style="color: {{$banner->hex_text_subtitle}}">{{ $banner->text }}</p>

                            @if($banner->has_button == true)
                            <a style="color: {{$banner->hex_text_button}}; background-color: {{$banner->hex_button}}; border: none;" href="{{ $banner->link }}" class="btn btn-primary">{{ $banner->text_button }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="banner-img">
                @if($banner->image == NULL)
                @else
                    <img style="z-index: 1; position: relative;" src="{{ asset('img/banners/' . $banner->image ) }}" alt="" class="main-img">
                @endif
            </div>
        </div>
        @endforeach
    @endif
</section>

@endsection

@push('scripts')

@endpush