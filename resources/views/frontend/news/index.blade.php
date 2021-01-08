@extends('layouts.frontend')

@section('content')
<header class="page-header" data-background="{{ asset('assets/frontend/images/bg-pages.jpg') }}" data-stellar-background-ratio="1.15" style="background-image: url(&quot;images/slide01.jpg&quot;); background-position: 0% 0%;">
	<div class="container">
		<h1>@lang('main.menu.news')</h1>
		{{-- <p>The smaller male cones release pollen, which fertilizes the female</p> --}}
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.menu.home')</a></li>
		<li class="breadcrumb-item active" aria-current="page">@lang('main.menu.news')</li>
	</ol>
	</div>
	<!-- end container -->
</header>
<section class="press-relases bg-silver py-layout overflow">
    <div class="container">
      <div class="row">
		@foreach($news as $item)
		<div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0s">
		  <figure class="mb-15 bg-white"> 
			<a href="{{ route('news-show', $item->id) }}" style="background-image: url('{{ asset('storage/'.$item->img) }}')">
				{{-- <img src="{{ asset('storage/'.$item->img) }}" alt="Image"> --}}
			</a>
			 <figcaption>
				  <h5>{{ $item->title }}</h5>
				  <p>{{ $item->short_text }}</p>
				  <small>{{ $item->published_at }}</small>
			  </figcaption>
			</figure>
		</div>
		@endforeach
      </div>
      <!-- end row --> 
      {!! $news->links('partials.pagination') !!}
    </div>
    <!-- end container --> 
</section>
@endsection