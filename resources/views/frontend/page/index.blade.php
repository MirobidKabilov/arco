@extends('layouts.frontend')

@section('content')
    <!-- end navbar -->
<header class="slider overflow">
    <div class="slider-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide" data-background="{{ asset('assets/frontend/images/slider/slider-wiston-01.jpg') }}">
          <div class="container container-intial">
            <h1><span></span> <img src="{{ asset('assets/frontend/images/wiston-h.png') }}" class="slider__title-image" alt=""></h1>
            <h2>@lang('main.slider.wiston.1')</h2>
            <a href="{{ route('wiston') }}">@lang('main.more') <i class="fas fa-caret-right"></i></a>
          </div>
          <!-- end container container-intial --> 
        </div>
        <!-- end swiper-slide -->
        <div class="swiper-slide" data-background="{{ asset('assets/frontend/images/slider/slider-wiston-02.jpg') }}">
          <div class="container container-intial">
            <h1><span></span> <img src="{{ asset('assets/frontend/images/wiston-h.png') }}" class="slider__title-image" alt=""></h1>
			<h2>@lang('main.slider.wiston.2')</h2>
			<a href="{{ route('wiston') }}">@lang('main.more') <i class="fas fa-caret-right"></i></a>
             <!-- <a href="#">УЗНАТЬ ПОДРОБНЕЕ <i class="fas fa-caret-right"></i></a>  -->
          </div>
        </div>
        <!-- end swiper-slide -->
      </div>
      <!-- Add Pagination -->
      <div class="inner-elements">
        <div class="container">
          <div class="pagination"></div>
          <!-- end pagination -->
            <div class="button-prev"><img src="{{ asset('assets/frontend/images/left-arrow.svg') }}" alt=""></div>
          <!-- end button-prev -->
          <div class="button-next"><img src="{{ asset('assets/frontend/images/right-arrow.svg') }}" alt=""></div>
          <!-- end button-next -->
          {{-- <div class="social-media">
            <h6>@lang('main.social_media')</h6>
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
            </ul>
          </div> --}}
          <!-- end social-media --> 
        </div>
        <!-- end container --> 
      </div>
      <!-- end inner-elements --> 
    </div>
    <!-- end slider-container --> 
</header>
  <!-- end slider -->
<section class="intro pt-layout">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <figure>
                <div class="pattern-bg"></div>
                <!-- end pattern-bg -->
                <div class="holder" data-stellar-ratio="1.10" style="background-image: url('{{ asset('assets/frontend/images/wiston/video-image-wiston.png') }}')"> 
                    <a class="video" data-fancybox data-width="" data-height="" href="{{ asset('assets/frontend/images/wiston/wiston-video.mp4') }}">
                        {{-- <img src="{{ asset('assets/frontend/images/about-min.jpg') }}" alt="Image"> --}}
                        <i class="fa fa-play video__icon"></i>
                    </a>
                </div>
                </figure>
            </div>
            {{-- <div class="col-lg-6 wow fadeInUp">
                <h3 class="text-uppercase">@lang('main.menu.about')</h3>
                <p>@lang('main.about_info.info_1')</p>
                <p>@lang('main.about_info.info_2')</p>
                <a href="{{ route('page.show') }}" class="btn mt-15">@lang('main.more')<i class="fas fa-caret-right"></i></a> </div>
            </div> --}}
        </div>
        <!-- end row --> 
       <div class="text-center mt-4 mb-5">
            <a href="" class="btn btn--blue">@lang('main.download')<i class="fas fa-file-download"></i></a></a>
       </div>
    </div>
<!-- end container --> 
</section>
{{-- <section class="facilities pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0s">
                <figure>
                    <img src="{{ asset('assets/frontend/images/location-pointer.svg') }}" alt="Image">
                    <figcaption>
                    <h5>МЕСТА ПОБЛИЗОСТИ</h5>
                    <p>Жилой комплекс премиум класса «WISTON» расположен в центральной части Ташкента с развитой социальной инфраструктурой.</p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0s">
              <figure>
                <img src="{{ asset('assets/frontend/images/antivirus.svg') }}" alt="Image">
                <figcaption>
                <h5>КРУГЛОСУТОЧНАЯ БЕЗОПАСНОСТЬ</h5>
                <p>TКонцепция безопасности ЖК «Wiston» предусматривает круглосуточное видеонаблюдение на всей территории комплекса, в том числе в подъездах и паркингах.</p>
                </figcaption>
              </figure>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0s">
              <figure>
                <img src="{{ asset('assets/frontend/images/elevator.svg') }}" alt="Image">
                <figcaption>
                <h5>СОВРЕМЕННЫЕ ЛИФТЫ</h5>
                <p>У нас в доме только современные бесшумные и безопасные лифты от лучших производителей. В них легко можно уместить багаж, велосипед или даже новую мебель.</p>
                </figcaption>
              </figure>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0s">
                <figure>
                  <img src="{{ asset('assets/frontend/images/send.svg') }}" alt="Image">
                  <figcaption>
                  <h5>БЛАГОУСТРОЙСТВО</h5>
                  <p>В нашем дворе обустраивается современная и безопасная детская площадка, зелёная зона, беседка и фонтан.</p>
                  </figcaption>
                </figure>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0s">
                <figure>
                  <img src="{{ asset('assets/frontend/images/checklist.svg') }}" alt="Image">
                  <figcaption>
                  <h5>ПЛАНИРОВКИ</h5>
                  <p>Свободная планировка наших квартир позволяет воплотить Вашу мечту в реальность и сделать максимально удобную планировку, подходящую именно для Вас. </p>
                  </figcaption>
                </figure>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0s">
                <figure>
                  <img src="{{ asset('assets/frontend/images/parking.svg') }}" alt="Image">
                  <figcaption>
                  <h5>2-УРОВНЕВЫЙ ПОДЗЕМНЫЙ ПАРКИНГ</h5>
                  <p>В проекте «Wiston» предусмотрен собственный 2-х уровневый просторный подземный паркинг, вместительностью более 100 машин. </p>
                  </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section> --}}
<!-- end intro -->
{{-- <section class="benefits py-layout">
    <div class="container">
        <div class="row">
        <div class="col wow fadeInUp" data-wow-delay="0s">
            <figure> <img src="{{ asset('assets/frontend/images/icon-benefits01.png') }}" alt="Image"> <b></b> </figure>
            <h6>Площадь проектов</h6>
            <span class="odometer" data-count="10000" data-status="yes">0</span> <span class="extra">m <sup>2</sup></span> </div>
        <!-- end col -->
        <div class="col wow fadeInUp" data-wow-delay="0.05s">
            <figure> <img src="{{ asset('assets/frontend/images/icon-benefits02.png') }}" alt="Image"> <b></b> </figure>
            <h6>Проектов</h6>
            <span class="odometer" data-count="2" data-status="yes">0</span> <span class="extra">+</span> </div>
        <!-- end col -->
        <div class="col wow fadeInUp" data-wow-delay="0.10s">
            <figure> <img src="{{ asset('assets/frontend/images/icon-benefits03.png') }}" alt="Image"> <b></b> </figure>
            <h6>Количество квартир</h6>
            <span class="odometer" data-count="589" data-status="yes">0</span></div>
        <!-- end col -->
        <div class="col wow fadeInUp" data-wow-delay="0.15s">
            <figure> <img src="{{ asset('assets/frontend/images/icon-benefits04.png') }}" alt="Image"> <b></b> </figure>
            <h6>Площадь проектов</h6>
            <span class="odometer" data-count="780" data-status="yes">0</span> <span class="extra">m <sup>2</sup></span> </div>
        <!-- end col -->
        <div class="col wow fadeInUp" data-wow-delay="0.20s">
            <figure> <img src="{{ asset('assets/frontend/images/icon-benefits05.png') }}" alt="Image"> <b></b> </figure>
            <h6>Проданных квартир</h6>
            <span class="extra">+</span> 
            <span class="odometer" data-count="100" data-status="yes">0</span></div>
        <!-- end col --> 
        </div>
        <!-- end row --> 
    </div>
<!-- end container --> 
</section> --}}

<!-- end benefits -->
{{-- <section class="py-layout">
    <div class="container">
        <h3 class="mb-15">@lang('main.info_appartment'):</h3>
    <!-- end col-6 -->
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="pill" href="#tab-one">2 - комнатные </a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-two" role="tab">3 - комнатные </a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-three" role="tab">3 - комнатные </a> </li>
        </ul>
        <div class="tab-content wow fadeInUp">
            <div class="tab-pane fade show active" id="tab-one">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table-appartment">
                            <tbody>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">№</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">1</td>
                                </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.block')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2 text-uppercase">A</td>
                                </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.floor')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">2</td>
                                </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.room')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">3</td>
                                    </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.area')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">106 м<sup>2</sup></td>
                                    </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.ceiling_height')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">3.5 м</td>
                                    </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.price')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">10 000 000 сумм / м<sup>2</sup></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <figure><img src="{{ asset('assets/frontend/images/plan01.jpg') }}" alt="Image"></figure>
                    </div>
                </div>
            </div>
            <!-- end tab-pane -->
            <div class="tab-pane fade" id="tab-two">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table-appartment">
                            <tbody>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">№</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">2</td>
                                </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.block')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2 text-uppercase">A</td>
                                </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.floor')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">2</td>
                                </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.room')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">3</td>
                                    </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.area')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">106 м<sup>2</sup></td>
                                    </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.ceiling_height')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">3.5 м</td>
                                    </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.price')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">10 000 000 сумм / м<sup>2</sup></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <figure><img src="{{ asset('assets/frontend/images/plan01.jpg') }}" alt="Image"></figure>
                    </div>
                </div>
            </div>
            <!-- end tab-pane -->
            <div class="tab-pane fade" id="tab-three">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table-appartment">
                            <tbody>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">№</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">3</td>
                                </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.block')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2 text-uppercase">A</td>
                                </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.floor')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">2</td>
                                </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.room')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">3</td>
                                    </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.area')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">106 м<sup>2</sup></td>
                                    </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.ceiling_height')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">3.5 м</td>
                                    </tr>
                                <tr>
                                    <td class="table-appartment__td1">
                                        <div class="table-appartment__dots">
                                            <span class="table-appartment__info">@lang('main.show_page.price')</span>
                                        </div>
                                    </td>
                                    <td class="table-appartment__td2">10 000 000 сумм / м<sup>2</sup></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <figure><img src="{{ asset('assets/frontend/images/plan01.jpg') }}" alt="Image"></figure>
                    </div>
                </div>
            </div>
        <!-- end tab-pane -->
        </div>
    </div>
<!-- end container --> 
</section> --}}
<!-- property-plans -->

<section class="press-relases bg-silver py-layout overflow">
    <div class="container">
        <h3>@lang('main.menu.news')</h3>
      <div class="row">
            <!-- end col-4 -->
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
      <div class="text-center">
        <a href="{{ route('news') }}" class="btn mt-15">@lang('main.all_news')<i class="fas fa-caret-right"></i></a>
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
</section>

<!-- end recent-posts -->
@endsection

@section('scripts')
    <script>
        // $('.video').parent().click(function () {
        //     if($(this).children(".video").get(0).paused) {
        //         $(this).children(".video").get(0).play();   $(this).children(".js-video-play").fadeOut();
        //     }else{       
        //         $(this).children(".video").get(0).pause();
        //         $(this).children(".js-video-play").fadeIn();
        //     }
        // });
    </script>
@endsection