<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ESYS ADMIN PANEL</title>

        <!-- custom css -->
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <!-- Icons -->
        <link href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

        @yield('stlye')

        <!-- Argon CSS -->
        <link type="text/css" href="{{asset('assets/css/argon.css')}}" rel="stylesheet">
    </head>

    <body>
        <!-- Sidenav -->
        <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
                <!-- Brand -->
                <div class="sidenav-header d-flex align-items-center">
                    <a class="navbar-brand" href="/syspanel">
                        <img src="{{asset('assets/img/brand/esys.svg')}}" class="navbar-brand-img" alt="...">
                    </a>
                    <div class="ml-auto">
                        <!-- Sidenav toggler -->
                        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-inner">
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel')) active @endif" href="/syspanel">
                                    <i class="ni ni-compass-04 text-default"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/page*')) active @endif" href="{{ route('backend.page.index') }}">
                                    <i class="fa fa-file"></i>
                                    <span class="nav-link-text">Страницы</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/objects')) active @endif" href="{{ route('backend.blocks.show') }}">
                                    <i class="ni ni-building text-default"></i>
                                    <span class="nav-link-text">Блоки</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/sliders')) active @endif" href="{{ route('backend.sliders.show') }}">
                                    <i class="ni ni-image text-default"></i>
                                    <span class="nav-link-text">Слайдеры</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/gallery')) active @endif" href="{{ route('backend.gallery.index') }}">
                                    <i class="ni ni-image text-default"></i>
                                    <span class="nav-link-text">Галерея</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/news')) active @endif" href="{{ route('backend.news.show') }}">
                                    <i class="ni ni-single-copy-04 text-default"></i>
                                    <span class="nav-link-text">Новости</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/partners')) active @endif" href="{{ route('backend.partners.show') }}">
                                    <i class="ni ni-briefcase-24 text-default"></i>
                                    <span class="nav-link-text">Партнеры</span>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('syspanel/applications')) active @endif" href="{{ route('backend.applications.show') }}">
                                    <i class="ni ni-align-left-2 text-default"></i>
                                    <span class="nav-link-text">Заявки</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('backend.fm.index') ? 'active' : ' ' }}" href="{{ route('backend.fm.index') }}">
                                    <i class="fa fa-image"></i>
                                    <span class="nav-link-text">Файл менеджер</span>
                                </a>
                            </li>  
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Header -->
            <header class="header header-body bg-primary pb-8">
                <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Navbar links -->
                            <ul class="navbar-nav align-items-center ml-md-auto">
                                <li class="nav-item d-xl-none">
                                    <!-- Sidenav toggler -->
                                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                        data-target="#sidenav-main">
                                        <div class="sidenav-toggler-inner">
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link notif" href="{{route('backend.applications.show')}}">
                                        <i class="@if(DB::table('applications')->where('seen', 0)->count() !== 0) bell @endif ni ni-bell-55"></i>
                                        <span class="notif-num @if(DB::table('applications')->where('seen', 0)->count() == 0) d-none @endif">{{DB::table('applications')->where('seen', 0)->count()}}</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link pr-0" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle">
                                                <img alt="Image placeholder" src="{{asset('assets/img/user.png')}}">
                                            </span>
                                            <div class="media-body ml-2 d-none d-lg-block">
                                                <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{route('backend.password.index')}}" class="dropdown-item">
                                            <i class="ni ni-single-02"></i>
                                            <span>Мой профиль</span>
                                        </a>
                                        <a href="{{route('logout')}}" class="dropdown-item">
                                            <i class="ni ni-user-run"></i>
                                            <span>Выйти</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            @yield('content')

            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6">
                            <div class="copyright text-center text-lg-left text-muted">
                                &copy; 2020 <a href="https://www.esys.uz" class="text-default font-weight-bold ml-1"
                                    target="_blank">esys.uz</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Optional JS -->
        <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
        <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
        <script src="{{ asset('backend/plugins/tinymce/tinymce.min.js') }}"></script>
        <script>
            tinymce.init({
                selector: ".js-selector",
                theme: "silver",
                height:500,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Title', block: 'h2', classes: 'title-redactor'},
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h3', styles: {color: 'green'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ],
                file_picker_callback : function(callback, value, meta) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                    
                    tinymce.activeEditor.windowManager.openUrl({
                        url : '/file-manager/tinymce5',
                        title : 'Laravel File manager',
                        width : x * 0.8,
                        height : y * 0.8,
                        onMessage: (api, message) => {
                        callback(message.content, { text: message.text })
                        }
                    })
                }
            });  
        </script>
        
        @yield('script')
        <!-- Argon JS -->
        <script src="{{asset('assets/js/argon.min.js')}}"></script>
        
        <!-- Custom JS -->
        <script src="{{asset('assets/js/custom.js')}}"></script>
        
        <script>
            $('.notif').on('click', function(e){
                $('.notif').removeClass('bell');
                $('.notif-num').addClass('d-none');
            })
        </script>

    </body>

</html>