<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="format-detection" content="telephone=no">
<meta name="theme-color" content="#282828"/>
<title>Arco Building</title>
<meta name="" content="">
<meta name="description" content="">
<meta name="keywords" content="homepark, realestate, flat, apartment, benefits, facility, consultation, home, house, studio, pool, animation, transportation">

<!-- SOCIAL MEDIA META -->
<meta property="og:description" content="">
<meta property="og:image" content="">
<meta property="og:site_name" content="">
<meta property="og:title" content="">
<meta property="og:type" content="">

<link rel="shortcut icon" href="{{ asset('assets/frontend/ico/favicon.ico') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('assets/frontend/ico/apple-touch-icon.png') }}" />
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/frontend/ico/apple-touch-icon-57x57.png') }}" />
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/frontend/ico/apple-touch-icon-72x72.png') }}" />
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/frontend/ico/apple-touch-icon-76x76.png') }}" />
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/frontend/ico/apple-touch-icon-114x114.png') }}" />
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/frontend/ico/apple-touch-icon-120x120.png') }}" />
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/frontend/ico/apple-touch-icon-144x144.png') }}" />
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/frontend/ico/apple-touch-icon-152x152.png') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontend/ico/apple-touch-icon-180x180.png') }}" />



<!-- CSS FILES -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/odometer.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css?v=1.6') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/app.css?v=1.6') }}">
@yield('styles')
</head>
<body class="page-loaded">
{{-- <div class="preloader">
  <div class="layer"></div>
  <div class="inner">
    <figure><img src="{{ asset('assets/frontend/images/preloader.gif') }}" alt="Image"></figure>
    <p><span class="text-rotater">Загрузка</span></p>
  </div>
</div> --}}
<!-- end prelaoder -->
<div class="transition-overlay">
  <div class="layer"></div>
</div>
<!-- end transition-overlay -->
<div class="side-navigation">
  <div class="menu">
    <ul>
		    <li><a href="{{ route('home') }}">{{mb_strtoupper(__('main.menu.home'), 'UTF-8')}}</a></li>
        <li><a href="{{ route('page.show', ['o-proekte']) }}">{{mb_strtoupper(__('main.menu.about'), 'UTF-8')}}</a></li>
        <li><a href="{{ route('gallery') }}">{{mb_strtoupper(__('main.menu.gallery'), 'UTF-8')}}</a></li>
      	<li><a href="{{ route('news') }}">{{mb_strtoupper(__('main.menu.news'), 'UTF-8')}}</a></li>
		    <li><a href="{{ route('contact') }}">{{mb_strtoupper(__('main.menu.contact'), 'UTF-8')}}</a></li>
    </ul>
    <div class="language language--sidebar"> 
      @foreach(LaravelLocalization::getSupportedLocales() as $code => $lang)
          <a href="{{  LaravelLocalization::getLocalizedURL($code) }}" class="{{ $code == LaravelLocalization::getCurrentLocale() ? 'local-active' : '' }}">{{ strtoupper($lang['native']) }}</a>
      @endforeach
    </div>
    {{-- <div class="sidebar-contact">
      <address class="mb-2">
        @lang('main.address')
      </address>
      <h6 class="font-16"><a href="tel:+998991110110" class="text-white">+998 (99) 111-01-10</a></h6>
      <h6 class="font-16"><a href="tel:+998991110100" class="text-white">+998 (99) 111-01-00</a></h6>
      <p class="mb-2"><a href="mailto:info@arcobuilding.uz">info@arcobuilding.uz</a></p>
      <ul class="social-media social-media--mobile">
        <li><a href="https://www.facebook.com/arcobuilding.uz/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://instagram.com/arcobuilding.uz" target="_blank"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://t.me/arcobuildinguz"><i class="fab fa-telegram-plane"></i></a></li>
      </ul>
      <div><small>© 2020 WISTON | @lang('main.reserved')</small> </div>
    </div> --}}
  </div>
  <!-- end menu -->
  <div class="side-content">
    <figure> <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Image"> </figure>
    <p>@lang('main.sidebar.info')</p>
    {{-- <ul class="gallery">
      <li><a href="images/gallery-thumb01.jpg" data-fancybox><img src="{{ asset('assets/frontend/images/gallery-thumb01.jpg') }}" alt="Image"></a></li>
      <li><a href="images/gallery-thumb02.jpg" data-fancybox><img src="{{ asset('assets/frontend/images/gallery-thumb02.jpg') }}" alt="Image"></a></li>
      <li><a href="images/gallery-thumb03.jpg" data-fancybox><img src="{{ asset('assets/frontend/images/gallery-thumb03.jpg') }}" alt="Image"></a></li>
    </ul> --}}
    <address>
      @lang('main.address')
    </address>
    <h6><a href="tel:+998991110110" class="text-white">+998 (99) 111-01-10</a></h6>
    <h6><a href="tel:+998991110100" class="text-white">+998 (99) 111-01-00</a></h6>
    <p><a href="mailto:info@arcobuilding.uz">info@arcobuilding.uz</a></p>
    <ul class="social-media">
      <li><a href="https://www.facebook.com/arcobuilding.uz/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
      <li><a href="https://instagram.com/arcobuilding.uz" target="_blank"><i class="fab fa-instagram"></i></a></li>
      <li><a href="https://t.me/arcobuildinguz"><i class="fab fa-telegram-plane"></i></a></li>
    </ul>
    <small>© 2020 WISTON | @lang('main.reserved')</small> </div>
  <!-- end side-content --> 
</div>
<!-- end side-navigation -->
<nav class="navbar {{ request()->routeIs('wiston.show') ? 'navbar--second' : ' ' }}">
  <div class="container">
    <div class="upper-side">
      <div class="logo"> <a href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Image"></a> </div>
      <!-- end logo -->
      <div class="phone-email"> <img src="{{ asset('assets/frontend/images/phone-call.svg') }}" alt="Image">
        <h4><a href="tel:+998991110110" class="text-white">+998 (99) 111-01-10</a></h4>
        {{-- <small><a href="mailto:info@arcobuilding.uz">info@arcobuilding.uz</a></small>  --}}
        <h4 class="mb-0"><a href="tel:+998991110100" class="text-white">+998 (99) 111-01-00</a></h4>
      </div>
      <!-- end phone -->
      <div class="language"> 
		@foreach(LaravelLocalization::getSupportedLocales() as $code => $lang)
	  		<a href="{{  LaravelLocalization::getLocalizedURL($code) }}" class="{{ $code == LaravelLocalization::getCurrentLocale() ? 'local-active' : '' }}">{{ strtoupper($lang['native']) }}</a>
		@endforeach
		</div>
      <!-- end language -->
      <div class="hamburger"> <span></span> <span></span> <span></span><span></span> </div>
      <!-- end hamburger --> 
    </div>
    <!-- end upper-side -->
    <div class="menu">
      <ul>
	  	<li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : ' ' }}">{{mb_strtoupper(__('main.menu.home'), 'UTF-8')}}</a></li>
      <li><a href="{{ route('page.show', ['o-proekte']) }}" class="{{ request()->routeIs('page.show') ? 'active' : '' }}">{{ mb_strtoupper(__('main.menu.about'), 'UTF-8')}}</a></li>
      <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">{{ mb_strtoupper(__('main.menu.gallery'), 'UTF-8')}}</a></li>
      	<li><a href="{{ route('news') }}" class="{{ request()->routeIs('news') || request()->routeIs('news-show') ? 'active' : ' ' }}">{{mb_strtoupper(__('main.menu.news'), 'UTF-8')}}</a></li>
      	<li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : ' ' }}">{{mb_strtoupper(__('main.menu.contact'), 'UTF-8')}}</a></li>
      </ul>
    </div>
    <!-- end menu --> 
  </div>
  <!-- end container --> 
</nav>
  @yield('content')
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-5 wow fadeInUp" data-wow-delay="0.05s"> <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Image" class="logo">
		{{-- <p>By aiming to take the life quality to an upper level with the whole realized Projects, Homepark continues to be the address of luxury.Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p> --}}
        {{-- <div class="select-box dropdown show"> <a class="dropdown-toggle" href="#" role="button" id="language-select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span><img src="{{ asset('assets/frontend/images/flag-tr.svg') }}" alt="Image"> Turkish</span> </a>
          <ul class="dropdown-menu" aria-labelledby="language-select">
            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/frontend/images/flag-en.svg') }}" alt="Image"> English</a></li>
            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/frontend/images/flag-ua.svg') }}" alt="Image"> Russian</a></li>
            <li><a class="dropdown-item" href="#"><img src="{{ asset('assets/frontend/images/flag-br.svg') }}" alt="Image"> Portugues</a></li>
          </ul>
        </div> --}}
        <!-- end select-box --> 
      </div>
      <!-- end col-4 -->
      <!-- end col-2 -->
      {{-- <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.15s">
        <ul class="footer-menu">
          <li><a href="#">ГЛАВНАЯ</a></li>
          <li><a href="#">О НАС</a></li>
          <li><a href="#">НОВОСТИ</a></li>
          <li><a href="#">КОНТАКТЫ</a></li>
        </ul>
      </div> --}}
      <!-- end col-2 -->
      <div class="col-sm-7 wow fadeInUp" data-wow-delay="0.20s">
        <div class="contact-box">
          {{-- <h5>CALL CENTER</h5> --}}
          <h3 class="mb-2"><a href="tel:+998991110110" class="text-white">+998 (99) 111-01-10</a></h3>
          <h3 class="mb-2"><a href="tel:+998991110100" class="text-white">+998 (99) 111-01-00</a></h3>
          <p>@lang('main.address')</p>
          <p><a href="mailto:info@arcobuilding.uz">info@arcobuilding.uz</a></p>
          <ul>
            <li><a href="https://www.facebook.com/arcobuilding.uz/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://instagram.com/arcobuilding.uz" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://t.me/arcobuildinguz"><i class="fab fa-telegram-plane"></i></a></li>
          </ul>
        </div>
        <!-- end contact-box --> 
      </div>
      <!-- end col-4 -->
	  <div class="col-12"> <span class="copyright">© 2020 ARCO BUILDING | @lang('main.reserved')</span> 
    <span class="creation">@lang('main.developed_in', ['logo' => ' <a href="https://esys.uz" target="_blank">
      <img src="'.asset('assets/frontend/images/esys.svg').'" width="70" alt="logo"></a>']) </span> </div>
      <!-- end col-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</footer>
@yield('modal')
<!-- end footer --> 
<!-- JS FILES --> 
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/swiper.min.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/fancybox.min.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/odometer.min.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script> 
{{-- <script src="{{ asset('assets/frontend/js/text-rotater.js') }}"></script>  --}}
<script src="{{ asset('assets/frontend/js/jquery.stellar.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/isotope.min.js') }}"></script> 
<script src="{{ asset('assets/frontend/js/scripts.js?v=1.6') }}"></script>
@yield('scripts')
</body>
</html>