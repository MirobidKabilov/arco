@extends('layouts.frontend')

@section('content')
<header class="page-header" data-background="{{ asset('storage/'.$news->img) }}" data-stellar-background-ratio="1.15" style="background-image: url(&quot;images/slide01.jpg&quot;); background-position: 0% 0%;">
	<div class="container">
		<h1>@lang('main.menu.news')</h1>
		{{-- <p>The smaller male cones release pollen, which fertilizes the female</p> --}}
		  <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.menu.home')</a></li>
          <li class="breadcrumb-item"><a href="{{ route('news') }}">@lang('main.menu.news')</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $news->title }}</li>
      </ol>
	</div>
	<!-- end container -->
</header>
<section class="about-content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				  <h2><span>{{ $news->title }}</span></h2>
        <h5>{{ $news->short_text }}</h5>
			</div>

       <!-- end col-9 -->
       <div class="col-12">
        {!! $news->text !!}
      </div>
      <!-- en col-12 -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</section>
@endsection