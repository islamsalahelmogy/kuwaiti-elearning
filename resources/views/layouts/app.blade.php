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
    <link href="{{ asset('img/logo.jpg') }}" rel="shortcut icon" />
    
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
    
    @yield('modal')
    
    <!--scrolling-->
    <div class="scrolling">
        <a href="#pageTop" class="back-to-top" id="back-to-top" style="opacity: 1">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </a>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    

    <script>
        
        var perfEntries = performance.getEntriesByType("navigation");

        if (perfEntries[0].type === "back_forward") {
            location.reload(true);
        }
    
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
        function footer () {
            var p = $('#footer').position().top;
            var h = document.documentElement.clientHeight - 59;
            var scroll = document.documentElement.scrollHeight - 59;
            //console.log(p+" "+h)
            if(p < h) {
                $('#footer').css({
                    position : "fixed",bottom : 0,width:'100%'
                });
            }else {
                $('#footer').css({
                        position : "relative",bottom : 0,width:'100%'
                });
            }
            if(h < scroll) {
                $('#footer').css({
                        position : "relative",bottom : 0,width:'100%'
                });
            }
            
        }
        const resizeObserver = new ResizeObserver(() => {
            footer();
        });

        resizeObserver.observe(document.querySelector('#footer'))
        

            
        })
        
        $(document).ready(() => {
            function messageError(errorName,message) {
                $('input[name='+errorName+']').addClass('is-invalid');
                    $('input[name='+errorName+']').parent().append(
                        '<span id='+errorName+' class="invalid-feedback d-block px-2" role="alert">'+
                                '<strong>'+message+'</strong>'+
                        '</span>'
                );
            }
            //student login
            $('#stlogin').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('student.login') }}',$(e.target).serialize())
                .then((res) => {
                    console.log(res.data)

                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors.email_stl){
                            messageError('email_stl',errors.email_stl[0]);

                        }
                        if(errors.password_stl){
                            messageError('password_stl',errors.password_stl[0]);

                        }
                        if(errors.invalid_stl){
                            $(e.target).find('input[type="password"]').val('');
                            $('#stlogin').prepend(
                                '<span class="invalid-feedback d-block px-2 invalid form-group" role="alert">'+
                                        '<strong>'+errors.invalid_stl[0]+'</strong>'+
                                '</span>'
                            );
                        }
                    }else{
                        
                        window.location.replace("{{ route("student.dashboard") }}");
                    
                    }
                })
            })
            //student Register
            $('#stregister').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('student.register') }}',$(e.target).serialize())
                .then((res) => {
                    console.log(res)
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors.name_str){
                            messageError('name_str',errors.name_str[0]);
                        }
                        if(errors.email_str){
                            messageError('email_str',errors.email_str[0]);
                        }
                        if(errors.password_str){
                            messageError('password_str',errors.password_str[0]);
                        }
                        if(errors.password_confirmation_str){
                            messageError('password_confirmation_str',errors.password_confirmation_str[0]);
                        }
                    }else {
                        window.location.replace("{{ route("student.dashboard") }}");
                    }
                })
            })
            let email = "";
            //student Reset password
            $('#strp').submit((e) => {
                e.preventDefault();

                axios.post('{{ route('student.reset.password') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                    
                        if(errors.email_strp){
                            messageError('email_strp',errors.email_strp[0]);
                        }
                        if(errors.invalid_strp){
                            $(e.target).find('input[type="email"]').val('');
                            $('#strp').prepend(
                                '<span class="invalid-feedback d-block px-2 invalid form-group" role="alert">'+
                                        '<strong>'+errors.invalid_strp[0]+'</strong>'+
                                '</span>'
                            );
                        }
                    }else {
                    
                        email = res.data.email_strp;
                        $('#modal-reset-password-st').modal('hide')
                        $('#modal-change-password-st').modal('show')
                    }
                })
            })
            // student change Password
            $('#stcp').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('student.change.password') }}',$(e.target).serialize()+'&email='+email)
                .then((res) => {
                    console.log(res)
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors.password_stcp){
                            messageError('password_stcp',errors.password_stcp[0]);
                        }
                        if(errors.password_confirmation_stcp){
                            messageError('password_confirmation_stcp',errors.password_confirmation_stcp[0]);
                        }
                    }else {
                        window.location.replace("{{ route("student.dashboard") }}");


                    }
                })
            })
            $('#tlogin').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('teacher.login') }}',$(e.target).serialize())
                .then((res) => {
                    console.log(res.data)

                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors.email_tl){
                            messageError('email_tl',errors.email_tl[0]);

                        }
                        if(errors.password_tl){
                            messageError('password_tl',errors.password_tl[0]);
                        }
                        if(errors.invalid_tl){
                            $(e.target).find('input[type="password"]').val('');
                            $('#tlogin').prepend(
                                '<span class="invalid-feedback d-block px-2 invalid form-group" role="alert">'+
                                        '<strong>'+errors.invalid_tl[0]+'</strong>'+
                                '</span>'
                            );
                        }
                    }else{
                        
                       window.location.replace("{{ route("teacher.dashboard") }}");
                    
                    }
                })
            })
            $('#tregister').submit((e) => {
                e.preventDefault();

                axios.post('{{ route('admin.teacher.store') }}',$(e.target).serialize())
                .then((res) => {
                    console.log(res)
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors.name_tr){
                            messageError('name_tr',errors.name_tr[0]);
                        }
                        if(errors.email_tr){
                            messageError('email_tr',errors.email_tr[0]);
                        }
                        if(errors.phone_tr){
                            messageError('phone_tr',errors.phone_tr[0]);
                        }
                        if(errors.role_tr){
                            messageError('role_tr',errors.role_tr[0]);
                        }
                        if(errors.password_tr){
                            messageError('password_tr',errors.password_tr[0]);
                        }
                        if(errors.password_confirmation_tr){
                            messageError('password_confirmation_tr',errors.password_confirmation_tr[0]);
                        }
                    }else {
                        $('#modal-teacher-register').modal('hide');
                        window.location.replace("{{ route("admin.teacher.index") }}");
                    }
                })
            })
            $('#trp').submit((e) => {
                e.preventDefault();

                axios.post('{{ route('teacher.reset.password') }}',$(e.target).serialize())
                .then((res) => {
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                    
                        if(errors.email_trp){
                            messageError('email_trp',errors.email_trp[0]);
                        }
                        if(errors.invalid_trp){
                            $(e.target).find('input[type="email"]').val('');
                            $('#trp').prepend(
                                '<span class="invalid-feedback d-block px-2 invalid form-group" role="alert">'+
                                        '<strong>'+errors.invalid_trp[0]+'</strong>'+
                                '</span>'
                            );
                        }
                    }else {
                    
                        email = res.data.email_trp;
                        $('#modal-reset-password-t').modal('hide')
                        $('#modal-change-password-t').modal('show')
                    }
                })
            })
            
            $('#tcp').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('teacher.change.password') }}',$(e.target).serialize()+'&email='+email)
                .then((res) => {
                    console.log(res)
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors.password_tcp){
                            messageError('password_tcp',errors.password_tcp[0]);
                        }
                        if(errors.password_confirmation_tcp){
                            messageError('password_confirmation_tcp',errors.password_confirmation_tcp[0]);
                        }
                    }else {
                        window.location.replace("{{ route("teacher.dashboard") }}");


                    }
                })
            })

            $('input').on('focus',(e) => {
                var input = $(e.target)
                if(input.hasClass('is-invalid')) {
                    console.log(input);
                    input.removeClass('is-invalid');
                    $('#'+input.attr('name')).remove();
                }
                if($('span.invalid').length) {
                    $('span.invalid').remove();
                }
            })
           
        })
        
        
    </script>
    @yield('script')
    

</body>

</html>
