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
    @yield('style')

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
        @yield('topBar')

        <!-- Navbar -->
        @yield('navbar')

    </header>

    <div class="main-wrapper home">
        @yield('content')
    </div>
    <!-- ====================================
              ———	FOOTER
              ===================================== -->
    <footer id="footer" class="footer-bg-img">
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
        @yield('footer')
    </footer>

    <!-- Modal teacher Login -->
    

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
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">أدخل
                                            إيميلك</span>
                                    </div>
                                    <input type="email" class="form-control @error('email')  is-invalid @enderror"
                                        autocomplete="email" dir="ltr">
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group font-weight-bolder">
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
                        تغيير كلمة السر
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">كلمة سر
                                            جديد</span>
                                    </div>
                                    <input type="password" class="form-control @error('password')  is-invalid @enderror"
                                        autocomplete="new-password" name="password" dir="ltr">
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">أعد
                                            كتابتها</span>
                                    </div>
                                    <input type="password" class="form-control" name="password-confirmation" dir="ltr"
                                        autocomplete="new-password">
                                </div>

                            </div>

                            <div class="
                                    form-group
                                    text-secondary
                                    row font-weight-bolder
                                ">

                                <div class="col-12 text-left">
                                    <input id="log-t" type="checkbox" class="log-input " name="logout-devices">
                                    <label for="log-t" class="log"></label>
                                    <span class="text-danger ml-1">قفل الحساب من جميع الأجهزة الأخرى</span>
                                </div>
                            </div>

                            <div class="form-group font-weight-bolder">
                                <button type="button" onclick="submit_form();" name="submit" class="
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
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0"
                                            id="basic-addon2">الإيميل</span>
                                    </div>
                                    <input type="email"
                                        class="form-control @error('email')  is-invalid @enderror"
                                        autocomplete="email" dir="ltr">
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0" id="basic-addon2">كلمة
                                            السر</span>
                                    </div>
                                    <input type="password"
                                        class="form-control @error('password')  is-invalid @enderror"
                                        autocomplete="current-password" dir="ltr">
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group font-weight-bolder">
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
                                                    row font-weight-bolder
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
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">أدخل
                                            إيميلك</span>
                                    </div>
                                    <input type="email" class="form-control @error('email')  is-invalid @enderror"
                                        autocomplete="email" dir="ltr">
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group font-weight-bolder">
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
                        تغيير كلمة السر
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">كلمة سر
                                            جديد</span>
                                    </div>
                                    <input type="password" class="form-control @error('password')  is-invalid @enderror"
                                        autocomplete="new-password" name="password" dir="ltr">
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">أعد
                                            كتابتها</span>
                                    </div>
                                    <input type="password" class="form-control" name="password-confirmation" dir="ltr"
                                        autocomplete="new-password">
                                </div>

                            </div>

                            <div class="
                                    form-group
                                    text-secondary
                                    row
                                ">

                                <div class="col-12 text-left font-weight-bolder">
                                    <input id="log-st" type="checkbox" class="log-input " name="logout-devices">
                                    <label for="log-st" class="log"></label>
                                    <span class="text-danger ml-1">قفل الحساب من جميع الأجهزة الأخرى</span>
                                </div>
                            </div>

                            <div class="form-group font-weight-bolder">
                                <button type="button" onclick="submit_form();" name="submit" class="
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
                            <div class="form-group form-group-icon pl-4 row font-weight-bolder">
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

                            <div class="form-group font-weight-bolder">
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

    <!--scrolling-->
    <div class="scrolling">
        <a href="#pageTop" class="back-to-top" id="back-to-top" style="opacity: 1">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </a>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

    <script>
        // let image = document.querySelector(".navbar-brand");
        // image.addEventListener('click', () => {
        //     axios.get('{{ route('welcome') }}').then(
        //         (res) => {
        //             document.location.reload();
        //         }
        //     ).catch(
        //         (error) => {
        //             console.log(error);
        //         }
        //     );
        // });
        $(document).ready(function() {
        
        $('.dismiss, .overlay').on('click', function() {
            $('.sidebar').removeClass('active');
            $('.overlay').removeClass('active');
            $('.open-menu').css('display','inline-block');
            $('.navbar').css('display','block');

        });

        $('.open-menu').on('click', function(e) {
            e.preventDefault();
            $('.sidebar').addClass('active');
            $('.overlay').addClass('active');
            // close opened sub-menus
            $('.collapse.show').toggleClass('show');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            $('.open-menu').css('display','none');
            $('.navbar').css('display','none');
        });
            var p = $('#footer').position().top;
            var h = document.documentElement.clientHeight - 59;
            if(p < h) {
                    $('#footer').css({
                        position : "fixed",bottom : 0,width:'100%'
                    });
                }else {
                    $('#footer').css({
                            position : "relative",bottom : 0,width:'100%'
                    });
                }
            $(window).resize(function () {
                var p = $('#footer').position().top;
                var h = document.documentElement.clientHeight - 59;
                    console.log(p);
                    console.log(h);
                    if(p < h) {
                        $('#footer').css({
                            position : "fixed",bottom : 0,width:'100%'
                        });
                    } else {
                        $('#footer').css({
                            position : "relative",bottom : 0,width:'100%'
                        });
                    }
                    // $('#footer').css({
                    //     position : "relative",bottom : 0,width:'100%'
                    // });
            });

            
        })
        
        
    </script>
    @yield('script')

</body>

</html>
