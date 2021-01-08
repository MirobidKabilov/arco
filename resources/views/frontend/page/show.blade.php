@extends('layouts.frontend')

@section('content')
<header class="page-header" data-background="{{ asset('assets/frontend/images/bg-pages.jpg') }}" data-stellar-background-ratio="1.15">
	<div class="container">
		<h1>{{ $item->title }}</h1>
		{{-- <p>The smaller male cones release pollen, which fertilizes the female</p> --}}
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.menu.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $item->title }}</li>
        </ol>
	</div>
	<!-- end container -->
</header>
<section class="about-content py-layout">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				  {{-- <h2>{{ $item->title }}</h2>        		 --}}
				  {{-- <p class="mb-5 font-weight-bold">{{ $item->short_text }}</p> --}}
				  <div class="redactor-content">
					{!! $item->text !!}
				  </div>
			</div>						 
      </div>                   	
	</div>
	<!-- end container -->
</section>
@endsection