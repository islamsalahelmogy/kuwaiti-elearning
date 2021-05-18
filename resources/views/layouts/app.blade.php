<!doctype html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kuwaiti-elearning') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('plugins/fancybox/jquery.fancybox.min.js') }}" defer></script>
    <script src="{{ asset('plugins/isotope/isotope.min.js') }}" defer></script>
    <script src="{{ asset('plugins/syotimer/jquery.syotimer.min.js') }}" defer></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}" defer></script>
    <script src="{{ asset('plugins/no-ui-slider/nouislider.min.js') }}" defer></script>
    <script src="{{ asset('plugins/lazyestload/lazyestload.js') }}" defer></script>
    <script src="{{ asset('plugins/velocity/velocity.min.js') }}" defer></script>
    <script src="{{ asset('plugins/smoothscroll/SmoothScroll.js') }}" defer></script>
    <script src="{{ asset('plugins/images-loaded/js/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}" defer></script>
    <script src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}" defer></script>
    <script src="{{ asset('plugins/wow/wow.min.js') }}" defer></script>

    <script src="{{ asset('js/main.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,600,700|Open+Sans:300,400,600,700"
        rel="stylesheet" />

    <!-- Styles -->

    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('plugins/no-ui-slider/nouislider.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('plugins/owl-carousel/owl.theme.default.min.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('plugins/fancybox/jquery.fancybox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/isotope/isotope.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/revolution/css/settings.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/revolution/css/layers.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/revolution/css/navigation.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link href="img/logo.jpg" rel="shortcut icon" />
</head>

<body id="body" class="up-scroll">



    <div id="preloader" class="smooth-loader-wrapper">
        <div class="smooth-loader">
            <div class="loader">
                <span class="dot dot-1"></span>
                <span class="dot dot-2"></span>
                <span class="dot dot-3"></span>
                <span class="dot dot-4"></span>
            </div>
        </div>
    </div>

    <!-- ====================================
          ——— HEADER
          ===================================== -->
    <header class="header" id="pageTop">
        <!-- Top Color Bar -->
        <div class="color-bars">
            <div class="container-fluid">
                <div class="row">
                    <div class="col color-bar bg-warning d-none d-md-block"></div>
                    <div class="col color-bar bg-success d-none d-md-block"></div>
                    <div class="col color-bar bg-danger d-none d-md-block"></div>
                    <div class="col color-bar bg-info d-none d-md-block"></div>
                    <div class="col color-bar bg-purple d-none d-md-block"></div>
                    <div class="col color-bar bg-pink d-none d-md-block"></div>
                    <div class="col color-bar bg-warning"></div>
                    <div class="col color-bar bg-success"></div>
                    <div class="col color-bar bg-danger"></div>
                    <div class="col color-bar bg-info"></div>
                    <div class="col color-bar bg-purple"></div>
                    <div class="col color-bar bg-pink"></div>
                </div>
            </div>
        </div>

        <!-- Top Bar-->
        <!-- d-none d-md-block -->
        <div class="bg-stone top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <ul class="
                                            list-inline
                                            d-flex
                                            justify-content-xl-start
                                            align-items-center
                                            h-100
                                            mb-0
                                        ">
                            <li>
                                <span class="bg-warning icon-header mr-xl-2">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                                <a href="mailto:info@yourdomain.com" class="
                                                    mr-lg-4 mr-xl-6
                                                    text-white
                                                    opacity-80
                                                ">info@yourdomain.com</a>
                            </li>
                            <li>
                                <span class="bg-success icon-header mr-xl-2">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </span>
                                <a href="tel:+1 234 567 8900" class="
                                                    mr-lg-4 mr-xl-6
                                                    text-white
                                                    opacity-80
                                                ">
                                    +1 234 567 8900
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <ul class="
                                            list-inline
                                            d-flex
                                            mb-0
                                            justify-content-xl-end
                                            justify-content-center
                                            align-items-center
                                            mr-xl-2
                                        ">



                            <li class="text-white mr-md-3 mr-lg-2 mr-xl-5">
                                <span class="
                                                    bg-purple
                                                    icon-header
                                                    mr-1 mr-md-2 mr-lg-1 mr-xl-2
                                                ">
                                    <i class="
                                                        fa fa-unlock-alt
                                                        text-white
                                                        font-size-17
                                                    " aria-hidden="true"></i>
                                </span>
                                <a class="
                                                    text-white
                                                    font-weight-medium
                                                    opacity-80
                                                " href="javascript:void(0)" data-toggle="modal"
                                    data-target="#modal-teacher-login">
                                    المدرسين
                                </a>
                                <span class="text-white opacity-80">|</span>
                                <a class="
                                                    text-white
                                                    font-weight-medium
                                                    opacity-80
                                                " href="javascript:void(0)" data-toggle="modal"
                                    data-target="#modal-student-login">الطلاب</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="
                            navbar
                            navbar-expand-md
                            navbar-scrollUp
                            navbar-sticky
                            navbar-white
                        ">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img class="d-inline-block" src="img/logo.jpg" alt="Kuwaiti-elearning" />
                </a>

                <button class="navbar-toggler py-2" type="button" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item dropdown bg-pink">
                            <a class="nav-link dropdown-toggle" href="component-default.html">
                                <i class="fa fa-home nav-icon" aria-hidden="true"></i>
                                <span>components</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="main-wrapper home">
        @yield('content')
    </div>
    <!-- ====================================
              ———	FOOTER
              ===================================== -->
    <footer class="footer-bg-img">
        <!-- Footer Color Bar -->
        <div class="color-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col color-bar bg-warning"></div>
                    <div class="col color-bar bg-danger"></div>
                    <div class="col color-bar bg-success"></div>
                    <div class="col color-bar bg-info"></div>
                    <div class="col color-bar bg-purple"></div>
                    <div class="col color-bar bg-pink"></div>
                    <div class="col color-bar bg-warning d-none d-md-block"></div>
                    <div class="col color-bar bg-danger d-none d-md-block"></div>
                    <div class="col color-bar bg-success d-none d-md-block"></div>
                    <div class="col color-bar bg-info d-none d-md-block"></div>
                    <div class="col color-bar bg-purple d-none d-md-block"></div>
                    <div class="col color-bar bg-pink d-none d-md-block"></div>
                </div>
            </div>
        </div>



        <!-- Copy Right -->
        <div class="copyright">
            <div class="container">
                <div class="row py-4 align-items-center">
                    <div class="col-sm-7 col-xs-12 order-1 order-md-0">
                        <p class="copyright-text">
                            © 2018 Copyright Kidz School Bootstrap Template
                            by
                            <a href="http://www.iamabdus.com/" target="_blank">Abdus.</a>
                        </p>
                    </div>

                    <div class="col-sm-5 col-xs-12">
                        <ul class="
                                            list-inline
                                            d-flex
                                            align-items-center
                                            justify-content-md-end
                                            justify-content-center
                                            mb-md-0
                                        ">
                            <li class="mr-3">
                                <a class="
                                                    icon-rounded-circle-small
                                                    bg-warning
                                                " href="javascript:void(0)">
                                    <i class="fa fa-facebook text-white" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="mr-3">
                                <a class="
                                                    icon-rounded-circle-small
                                                    bg-success
                                                " href="javascript:void(0)">
                                    <i class="fa fa-twitter text-white" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="mr-3">
                                <a class="
                                                    icon-rounded-circle-small
                                                    bg-danger
                                                " href="javascript:void(0)">
                                    <i class="fa fa-google-plus text-white" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="mr-3">
                                <a class="
                                                    icon-rounded-circle-small
                                                    bg-info
                                                " href="javascript:void(0)">
                                    <i class="fa fa-pinterest-p text-white" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="">
                                <a class="
                                                    icon-rounded-circle-small
                                                    bg-purple
                                                " href="javascript:void(0)">
                                    <i class="fa fa-vimeo text-white" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal teacher Login -->
    <div class="modal fade" id="modal-teacher-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        مرحباً
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <input type="email" class="form-control border @error('email')  is-invalid @enderror" placeholder="الإيميل" required autocomplete="email" autofocus/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group form-group-icon">
                                <input type="password" class="form-control border @error('password')  is-invalid @enderror" placeholder="كلمة السر" required autocomplete="current-password"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="
                                                    btn btn-danger
                                                    text-uppercase
                                                    w-100
                                                ">
                                    دخول
                                </button>
                            </div>
                            <div class="
                                                form-group
                                                text-secondary
                                                mb-0
                                                row
                                            ">

                                <div class="col-4 text-left">
                                    <input id="remember-token-t" type="checkbox" class="rememberMe-input"
                                        name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember-token-t" class="rememberMe"></label>
                                    <span class="text-danger ml-1">تذكرنى</label>
                                </div>
                                <div class="col-8 text-right">
                                    <a class="text-danger text-underline" href="javascript:void(0)" data-dismiss="modal"
                                        data-toggle="modal" data-target="#modal-reset-password-teacher">هل نسيت كلمة
                                        السر؟</a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal reset password teacher -->
    <div class="modal fade" id="modal-reset-password-teacher" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        مساعدة كلمة السر
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <input type="text" class="form-control border" placeholder="أدخل إيميلك الألكتورنى"
                                    required />
                            </div>


                            <div class="form-group">
                                <a class="btn btn-danger text-uppercase w-100" href="javascript:void(0)"
                                    data-dismiss="modal" data-toggle="modal"
                                    data-target="#modal-change-password-teacher">اٍستمر</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal change Password teacher -->
    <div class="modal fade" id="modal-change-password-teacher" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        إنشاء كلمة سر جديدة
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <input type="password" name="password" class="form-control border"
                                    placeholder="أدخل كلمة سر جديدة" required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="password" name="password-confirmation" class="form-control border"
                                    placeholder="أعد كتابتها مرة أخرى" required="" />
                            </div>

                            <div class="form-group text-left">
                                <input id="log-t" type="checkbox" class="log-input" name="logout-devices">
                                <label for="log-t" class="log"></label>
                                <span class="text-danger ml-1">قفل الحساب من جميع الأجهزة الأخرى</label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="
                                                            btn btn-danger
                                                            text-uppercase
                                                            w-100
                                                        ">
                                    تغيير كلمة السر
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal student Login -->
    <div class="modal fade" id="modal-student-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        مرحباً
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <input type="email" name="email" class="form-control border" placeholder="الإيميل"
                                    required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="password" name="password" class="form-control border"
                                    placeholder="كلمة السر" required="" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="
                                                        btn btn-danger
                                                        text-uppercase
                                                        w-100
                                                    ">
                                    دخول
                                </button>
                            </div>
                            <div class="
                                                    form-group
                                                    text-secondary
                                                    mb-0
                                                    row
                                                ">

                                <div class="col-4 text-left">
                                    <input id="remember-token-st" type="checkbox" class="rememberMe-input"
                                        name="remember-token">
                                    <label for="remember-token-st" class="rememberMe"></label>
                                    <span class="text-danger ml-1">تذكرنى</label>
                                </div>
                                <div class="col-8 text-right">
                                    <a class="text-danger text-underline" href="javascript:void(0)" data-dismiss="modal"
                                        data-toggle="modal" data-target="#modal-reset-password-st">هل نسيت كلمة
                                        السر؟</a>
                                </div>
                            </div>

                            <div class="
                                                            form-group
                                                            text-center text-secondary
                                                            mb-0
                                                        ">
                                <p class="mb-0">
                                    إذا كنت لا تمتلك حساب ؟
                                    <a class="text-danger" href="javascript:void(0)" data-dismiss="modal"
                                        data-toggle="modal" data-target="#modal-student-register">أنشئ حساب جديد</a>
                                </p>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal reset password student -->
    <div class="modal fade" id="modal-reset-password-st" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        مساعدة كلمة السر
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <input type="email" name="email" class="form-control border"
                                    placeholder="أدخل إيميلك الألكتورنى" required="" />
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <a class="btn btn-danger text-uppercase w-100" href="javascript:void(0)"
                                        data-dismiss="modal" data-toggle="modal"
                                        data-target="#modal-change-password-st">اٍستمر</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal change password Student -->

    <div class="modal fade" id="modal-change-password-st" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        إنشاء كلمة سر جديدة
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <input type="password" name="password" class="form-control border"
                                    placeholder="أدخل كلمة سر جديدة" required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="password" name="password-confirmation" class="form-control border"
                                    placeholder="أعد كتابتها مرة أخرى" required="" />
                            </div>
                            <div class="form-group text-left">
                                <input id="log-st" type="checkbox" class="log-input" name="logout-devices">
                                <label for="log-st" class="log"></label>
                                <span class="text-danger ml-1">قفل الحساب من جميع الأجهزة الأخرى</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="
                                                                btn btn-danger
                                                                text-uppercase
                                                                w-100
                                                            ">
                                    تغيير كلمة السر
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal student Account -->
    <div class="modal fade" id="modal-student-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm rounded" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        أنشاء حساب جديد
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <input type="text" name="name" class="form-control border" placeholder="الإسم"
                                    required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="email" name="email" class="form-control border" placeholder="الإيميل"
                                    required="" />
                            </div>


                            <div class="form-group form-group-icon">
                                <input type="password" name="password" class="form-control border"
                                    placeholder="كلمة السر" required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="password" name="password-confirmation" class="form-control border"
                                    placeholder="تأكيد كلمة السر" required="" />
                            </div>

                            <div class="form-group form-group-icon pl-4 row ">
                                <label class="col-4 text-color">الجنس :</label>
                                <div class="col-3">
                                    <input id="male-st" value="male" type="radio" class="gender-input" name="gender"
                                        checked="true">
                                    <label for="male-st" class="gender"></label>
                                    <span class="text-danger ml-1">ذكر</span>
                                </div>
                                <div class="col-3">
                                    <input id="female" value="female" type="radio" class="gender-input" name="gender">
                                    <label for="female" class="gender"></label>
                                    <span class="text-danger ml-1">أنثى</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="
                                                    btn btn-danger
                                                    text-uppercase
                                                    w-100
                                                ">
                                    أنشئ حسابك
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Teacher Account -->
    <div class="modal fade" id="modal-teacher-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm rounded" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        أنشاء حساب جديد
                    </h3>
                </div>


                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <input type="text" name="name" class="form-control border" placeholder="الإسم"
                                    required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="email" name="email" class="form-control border" placeholder="الإيميل"
                                    required="" />
                            </div>


                            <div class="form-group form-group-icon">
                                <input type="password" name="password" class="form-control border"
                                    placeholder="كلمة السر" required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="password" name="password-confirmation" class="form-control border"
                                    placeholder="تأكيد كلمة السر" required="" />
                            </div>
                            <div class="form-group form-group-icon">
                                <input type="text" name="phone" class="form-control border" placeholder="رقم الموبايل"
                                    required="" />
                            </div>
                            <div class="form-group form-group-icon pl-4 row ">
                                <label class="col-4 text-color">الجنس :</label>
                                <div class="col-3">
                                    <input id="male-t" value="male" type="radio" class="gender-input" name="gender"
                                        checked="true">
                                    <label for="male-t" class="gender"></label>
                                    <span class="text-danger ml-1">ذكر</label>
                                </div>
                                <div class="col-3">
                                    <input id="female-t" value="female" type="radio" class="gender-input" name="gender">
                                    <label for="female-t" class="gender"></label>
                                    <span class="text-danger ml-1">أنثى</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="
                                                        btn btn-danger
                                                        text-uppercase
                                                        w-100
                                                    ">
                                    أنشئ حسابك
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Enroll -->
    <div class="modal fade" id="modal-enrolAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm rounded" role="document">
            <div class="modal-content">
                <div class="bg-pink rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        Create An Account
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <input type="text" class="form-control border" placeholder="Name" required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="text" class="form-control border" placeholder="User name" required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="text" class="form-control border" placeholder="Phone" required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="password" class="form-control border" placeholder="Password" required="" />
                            </div>

                            <div class="form-group form-group-icon">
                                <input type="password" class="form-control border" placeholder="Re-Password"
                                    required="" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="
                                                    btn btn-pink
                                                    text-uppercase text-white
                                                    w-100
                                                ">
                                    Register
                                </button>
                            </div>

                            <div class="
                                                form-group
                                                text-center text-secondary
                                                mb-0
                                            ">
                                <p class="mb-0">
                                    Allready have an account?
                                    <a class="text-pink" href="#">Log in</a>
                                </p>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Products -->
    <div class="modal fade" id="modal-products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <img class="img-fluid d-block mx-auto" src=" img/products/products-preview01.jpg"
                                alt="preview01.jpg" />
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="product-single">
                                <h1>Barbie Racing Car</h1>

                                <span class="pricing font-size-55">$50 <del>$60</del></span>

                                <p class="mb-7">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris
                                    nisi.
                                </p>

                                <div class="add-cart mb-0">
                                    <div class="count-input">
                                        <input class="quantity btn-primary" type="text" value="1" />
                                        <a class="incr-btn incr-up" data-action="decrease" href="#"><i
                                                class="fa fa-caret-up" aria-hidden="true"></i></a>
                                        <a class="incr-btn incr-down" data-action="increase" href="#"><i
                                                class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    </div>
                                    <button type="button" class="
                                                        btn btn-danger
                                                        text-uppercase
                                                    " onclick="location.href='product-cart.html';">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--scrolling-->
    <div class="scrolling">
        <a href="#pageTop" class="back-to-top" id="back-to-top" style="opacity: 1">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </a>
    </div>

</body>

</html>