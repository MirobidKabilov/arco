@extends('layouts.frontend')
@section('styles')

@endsection
@section('content')
<header class="page-header" data-background="{{ asset('assets/frontend/images/bg-pages.jpg') }}" data-stellar-background-ratio="1.15">
	<div class="container">
		<h1>@lang('main.menu.gallery')</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.menu.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('main.menu.gallery')</li>
		</ol>
	</div>
</header>
<sction class="photo-gallery">
    <div class="container">
        <ul class="gallery">
            @foreach($items as $item)
            <li>
                <a href="{{ asset('/storage/'.$item->img) }}" data-fancybox="">
                    <img src="{{ asset('/storage/'.$item->img) }}" alt="Image">
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</sction>
@endsection
@section('scripts')
<script>
</script>
@endsection