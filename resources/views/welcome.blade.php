@extends('layouts.app')
@section('style')
    @parent
    <style>
        .navbar-nav .dropdown .dropdown-toggle:after {
            content:"";
        }
        li.nav-item.dropdown {
            border-bottom : 1px solid #000;
        }
        li.nav-item.dropdown:last-child {
            border-bottom : 0px;
        }
        @media(min-width: 768px) {
            li.nav-item.dropdown {
                border-bottom : 0px;
            }
        }
    </style>
@endsection
@section('topBar')
    <div class="bg-stone top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <ul class="
                            list-inline
                            d-flex
                            mb-0
                            justify-content-center
                            align-items-center
                            mr-xl-2
                        ">
                        <li class="text-white mr-md-3 mr-lg-2 mr-xl-5">
                            <a class="
                                        text-white
                                        font-weight-medium
                                        opacity-80 mr-1 mr-md-2 mr-lg-1 mr-xl-2
                                " href="{{ route('welcome') }}">
                                Kuwaiti Kids Elearning
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('navbar')
    <nav class="
            navbar
            navbar-expand-md
            navbar-scrollUp
            navbar-sticky
            navbar-white
                ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img class="d-inline-block" src="{{ asset('img/logo.jpg') }}" alt="Kuwaiti-elearning" />
            </a>

            <button class="navbar-toggler py-2" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item dropdown bg-warning">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-dismiss="modal"
                            data-toggle="modal" data-target="#modal-student-login">
                            <i class="fa fa-sign-in nav-icon" aria-hidden="true"></i>
                            <span>تسجيل دخول الطالب</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown bg-danger">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-dismiss="modal"
                            data-toggle="modal" data-target="#modal-login-t">
                            <i class="fa fa-sign-in nav-icon" aria-hidden="true"></i>
                            <span>تسجيل دخول المدرس</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <section class="rev_slider_wrapper fullwidthbanner-container over" dir="ltr">
        <!-- the ID here will be used in the JavaScript below to initialize the slider -->
        <div id="rev_slider_1" class="rev_slider rev-slider-kidz-school" data-version="5.4.5" style="display: none">
            <ul>
                <!-- SLIDE 1  -->
                <li data-transition="fade">
                    <img src="{{ asset('img/banner/slider-1/img-1.jpg') }}" alt="Sky" class="rev-slidebg" />
                    <!-- LAYERS -->
    
                    <!-- LAYER NR. 1 -->
                    <div class="
                            tp-caption tp-resizeme
                            font-dosis font-weight-bold
                        " data-frames='[{
                  "delay":1600,"speed":1000,"frame":"500","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                  {"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="on" data-x="center" data-y="middle" data-hoffset="['10', '40', '15', '30']"
                        data-voffset="['-75', '-75', '-65', '-45']" data-fontsize="['50', '45', '40', '30']"
                        data-lineheight="['50', '45', '40', '30']" data-color="#FFF" data-width="auto" data-basealign="grid"
                        data-responsive_offset="off" style="z-index: 1">
                        <span class="text-white">تعليم الأطفال عن بعد</span>
                    </div>
    
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme" data-frames='[{
                "delay":2000,"speed":1300,"frame":"500","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                {"delay":"wait","speed":200,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="on" data-x="center" data-y="middle" data-hoffset="['10', '40', '15', '30']"
                        data-voffset="['0', '0', '0', '0']" data-width="['550','500','500','420']"
                        data-fontsize="['25', '23', '23', '23']" data-lineheight="['30', '25', '25', '25']"
                        data-color="#FFF" data-textAlign="center" data-basealign="grid" data-responsive_offset="off"
                        data-type="text" data-whitespace="normal" style="z-index: 10">
                        الموقع الأمثل لأطفال الروضة و للمعلمين لتدريس ومتابعة الاطفال أونلاين
                    </div>                    
                </li>
    
                <!-- SLIDE 2  -->
                <li data-transition="fade">
                    <img src="{{ asset('img/banner/slider-1/img-2.jpg') }}" alt="Sky" class="rev-slidebg" />
                    <!-- LAYERS-->
    
                    <!-- LAYER NR. 1 -->
                    <div class="
                                        tp-caption tp-resizeme
                                        font-dosis font-weight-bold
                                    " data-frames='[{
                "delay":1600,"speed":1000,"frame":"500","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                {"delay":"wait","speed":200,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="on" data-x="center" data-y="middle" data-hoffset="['10', '40', '15', '30']"
                        data-voffset="['-75', '-75', '-65', '-45']" data-fontsize="['50', '45', '40', '30']"
                        data-lineheight="['50', '45', '40', '30']" data-color="#FFF" data-width="auto" data-basealign="grid"
                        data-responsive_offset="off" style="z-index: 1">
                        <span class="text-white">دروسنا</span>
                    </div>
    
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme" data-frames='[{
                "delay":2000,"speed":1300,"frame":"500","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                {"delay":"wait","speed":200,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="on" data-x="center" data-y="middle" data-hoffset="['10', '40', '15', '30']"
                        data-voffset="['0', '0', '0', '0']" data-width="['550','500','500','420']"
                        data-fontsize="['25', '23', '23', '23']" data-lineheight="['30', '25', '25', '25']"
                        data-color="#FFF" data-textAlign="center" data-basealign="grid" data-responsive_offset="off"
                        data-type="text" data-whitespace="normal" style="z-index: 10">
                        حضّر دروسك بسرعة فائقة
                    </div>
                </li>
    
                <!-- SLIDE 3 -->
                <li data-transition="fade">
                    <img src="{{ asset('img/banner/slider-1/img-3.jpg') }}" alt="Sky" class="rev-slidebg" />
                    <!-- LAYERS -->
    
                    <!-- LAYER NR. 1 -->
                    <div class="
                                        tp-caption tp-resizeme
                                        font-dosis font-weight-bold
                                    " data-frames='[{
                "delay":1600,"speed":1200,"frame":"500","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                {"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="on" data-x="center" data-y="middle" data-hoffset="['10', '40', '15', '30']"
                        data-voffset="['-75', '-75', '-65', '-45']" data-fontsize="['50', '45', '40', '30']"
                        data-lineheight="['50', '45', '40', '30']" data-color="#FFF" data-width="auto" data-basealign="grid"
                        data-responsive_offset="on" style="z-index: 1">
                        <span class="text-white">فيديوهاتنا</span>
                    </div>
    
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme" data-frames='[{
                "delay":2000,"speed":1300,"frame":"500","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                {"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="on" data-x="center" data-y="middle" data-hoffset="['10', '40', '15', '30']"
                        data-voffset="['0', '0', '0', '0']" data-width="['550','500','500','420']"
                        data-fontsize="['25', '23', '23', '23']" data-lineheight="['30', '25', '25', '25']"
                        data-color="#FFF" data-textAlign="center" data-basealign="grid" data-responsive_offset="on"
                        data-type="text" data-whitespace="normal" style="z-index: 10">
                        صمم فيديوهات تعليمية مخصصة لطلابك
                    </div>
                </li>
    
                <!-- SLIDE 4  -->
                <li data-transition="fade">
                    <img src="{{ asset('img/banner/slider-1/img-4.jpg') }}" alt="Sky" class="rev-slidebg" />
                    <!-- LAYERS -->
    
                    <!-- LAYER NR. 1 -->
                    <div class="
                                        tp-caption tp-resizeme
                                        font-dosis font-weight-bold
                                    " data-frames='[{
                "delay":1600,"speed":1000,"frame":"500","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                {"delay":"wait","speed":200,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="on" data-x="center" data-y="middle" data-hoffset="['10', '40', '15', '30']"
                        data-voffset="['-75', '-75', '-65', '-45']" data-fontsize="['50', '45', '40', '30']"
                        data-lineheight="['50', '45', '40', '30']" data-color="#FFF" data-width="auto" data-basealign="grid"
                        data-responsive_offset="off" style="z-index: 1">
                        <span class="text-white">أنشطتنا</span>
                    </div>
    
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption tp-resizeme" data-frames='[{
                "delay":2000,"speed":1300,"frame":"500","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                  {"delay":"wait","speed":200,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="on" data-x="center" data-y="middle" data-hoffset="['10', '40', '15', '30']"
                        data-voffset="['0', '0', '0', '0']" data-width="['550','500','500','420']"
                        data-fontsize="['25', '23', '23', '23']" data-lineheight="['30', '25', '25', '25']"
                        data-color="#FFF" data-textAlign="center" data-basealign="grid" data-responsive_offset="off"
                        data-type="text" data-whitespace="normal" style="z-index: 10">
                        الواجبات والاختبارات المميزة من أجل طلابنا 
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="py-8 py-md-8">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 order-md-1">
                    <div class="image mb-4 mb-md-0">
                        <img class="img-fluid rounded" src="{{ asset('img/features/features-img1.jpg') }}" alt="features-img1.jpg">
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="">
                        <div class="section-title mb-4">
                            <h2 class="text-danger pl-0 font-size-32">مرحباَ بك فى موقعنا</h2>
                        </div>
                        <p class="text-dark font-size-24 mb-4"> افضل موقع عربى لتعليم الأطفال عن بعد حيث يضم المدرسين والأطفال <br/>
وذلك لنساعد على إرتقاء مستوى اطفالنا التعليمى</p>
                        <p class="text-danger font-size-24 mb-4">خدماتنا</p>
                        <ul class="list-unstyled mb-5 font-size-20">
                            <li class="d-flex align-items-baseline text-muted mb-2">
                                <i class="fa fa-check mr-2" aria-hidden="true"></i>
                                تعليم الأطفال عن طريق قصص مسجلة مسموعة
                            </li>
                            <li class="d-flex align-items-baseline text-muted mb-2">
                                <i class="fa fa-check mr-2" aria-hidden="true"></i>
                                تعليم الأطفال عن طريق دروس مسجلة فيديو
                            </li>
                            <li class="d-flex align-items-baseline text-muted mb-2">
                                <i class="fa fa-check mr-2" aria-hidden="true"></i>
                                ممارسة الطفل أنشطة مرئية لسهولة التعلم
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    <div class="copyright">
        <div class="container">
            <div class="row py-4 align-items-center">
                <div class="col-sm-6 offset-sm-3">
                    <p class="copyright-text text-center">
                        جميع الحقوق محفوظة Kuwaiti-kids-e-learning © 2021
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="modal-register-st" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        انشئ حساب جديد
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form id="stregister" action="" method="POST" role="form">
                            @csrf
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0" id="basic-addon2">الإسم</span>
                                    </div>
                                    <input type="text" name="name_str" value="{{ old('name_str') }}" class="form-control
                                                    @error('name_str')  is-invalid @enderror" autocomplete="name_str"
                                        dir="ltr">
                                </div>
                                @error('name_str')
                                <span id="name_str" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0" id="basic-addon2">الإيميل</span>
                                    </div>
                                    <input type="email" name="email_str" value="{{ old('email_str') }}"
                                        class="form-control @error('email_str')  is-invalid @enderror"
                                        autocomplete="email_str" dir="ltr">
                                </div>
                                @error('email_str')
                                <span id="email_str" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
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
                                    <input type="password" name="password_str"
                                        class="form-control @error('password_str')  is-invalid @enderror"
                                        autocomplete="password_str" dir="ltr">
                                </div>
                                @error('password_str')
                                <span id="password_str" class="invalid-feedback d-block px-2 font-weight-bolder"
                                    role="alert">
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
                                    <input type="password" class="form-control" name="password_confirmation_str" dir="ltr">
                                </div>

                            </div>

                            <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                <label class="col-4 text-color">الجنس :</label>
                                <div class="col-4 ">
                                    <input id="male-st" value="male" type="radio" class="gender-input" name="gender_str"
                                        {{ old('gender_str','male') == 'male' ? 'checked' : '' }}>
                                    <label for="male-st" class="gender"></label>
                                    <span class="text-danger ml-1">ذكر</span>
                                </div>
                                <div class="col-4 pl-0">
                                    <input id="female-st" value="female" type="radio" class="gender-input" name="gender_str"
                                        {{ old('gender_str','male') == 'female' ? 'checked' : '' }}>
                                    <label for="female-st" class="gender"></label>
                                    <span class="text-danger ml-1">أنثى</span>
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
    <div class="modal fade" id="modal-login-t" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form id="tlogin" action="" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0" id="basic-addon2">الإيميل</span>
                                    </div>
                                    <input type="email" name="email_tl" class="form-control" autocomplete="email_tl"
                                        dir="ltr">
                                </div>

                            </div>

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0" id="basic-addon2">كلمة
                                            السر</span>
                                    </div>
                                    <input type="password" name="password_tl" class="form-control"
                                        autocomplete="password_tl" dir="ltr">
                                </div>

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

                                <div class="col-4 text-center">
                                    <input id="remember-token-t" type="checkbox" class="rememberMe-input" name="remember_tl"
                                        {{ old('remember-tl') ? 'checked' : '' }}>
                                    <label for="remember-token-t" class="rememberMe"></label>
                                    <span class="text-danger ml-1">تذكرنى</span>
                                </div>
                                <div class="col-8 text-right">
                                    <a class="text-danger text-underline" href="javascript:void(0)" data-dismiss="modal"
                                        data-toggle="modal" data-target="#modal-reset-password-t">هل نسيت كلمة
                                        السر؟</a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--modal reset password teacher-->
    <div class="modal fade" id="modal-reset-password-t" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form id="trp" action="" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">أدخل
                                            إيميلك</span>
                                    </div>
                                    <input type="email" name="email_trp" class="form-control" autocomplete="email_trp"
                                        dir="ltr">
                                </div>

                            </div>


                            <div class="form-group font-weight-bolder">
                                <button type="submit" class="
                                                        btn btn-danger
                                                        text-uppercase
                                                        w-100
                                                    ">
                                    إستمر
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal change Password teacher -->
    <div class="modal fade" id="modal-change-password-t" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        تغيير كلمة السر
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form id="tcp" action="" method="POST" role="form">

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">كلمة سر
                                            جديد</span>
                                    </div>
                                    <input type="password" class="form-control" autocomplete="password_tcp"
                                        name="password_tcp" dir="ltr">
                                </div>

                            </div>
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">أعد
                                            كتابتها</span>
                                    </div>
                                    <input type="password" class="form-control" name="password_confirmation_tcp" dir="ltr">
                                </div>

                            </div>

                            {{-- <div class="
                                            form-group
                                            text-secondary
                                            row font-weight-bolder
                                        ">

                                    {{-- <div class="col-12 text-center">
                                        <input id="log-t" type="checkbox" class="log-input " name="logout-devices_tcp">
                                        <label for="log-t" class="log"></label>
                                        <span class="text-danger ml-1">قفل الحساب من جميع الأجهزة الأخرى</span>
                                    </div>
                                </div> --}}

                            <div class="form-group font-weight-bolder">
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
                        <form action="" id="stlogin" method="POST" role="form">
                            @csrf
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0" id="basic-addon2">الإيميل</span>
                                    </div>
                                    <input type="email" name="email_stl" class="form-control " autocomplete="email_stl"
                                        dir="ltr">
                                </div>

                            </div>

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0" id="basic-addon2">كلمة
                                            السر</span>
                                    </div>
                                    <input type="password" name="password_stl" class="form-control"
                                        autocomplete="password_stl" dir="ltr">
                                </div>

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

                                <div class="col-4 text-center">
                                    <input id="remember-token-st" type="checkbox" class="rememberMe-input"
                                        name="remember_stl" {{ old('remember_stl') ? 'checked' : '' }}>
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
                                            font-weight-bolder
                                        ">
                                <p class="mb-0">
                                    إذا كنت لا تمتلك حساب ؟
                                    <a class="text-danger" href="javascript:void(0)" data-dismiss="modal"
                                        data-toggle="modal" data-target="#modal-register-st">إنشئ حساب الآن</a>
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
                        <form id="strp" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">أدخل
                                            إيميلك</span>
                                    </div>
                                    <input type="email" name="email_strp" class="form-control" autocomplete="email_strp"
                                        dir="ltr">
                                </div>
                            </div>

                            <div class="form-group font-weight-bolder">
                                <div class="form-group">
                                    <button type="submit" class="
                                            btn btn-danger
                                            text-uppercase
                                            w-100
                                            ">
                                        إستمر
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal change password Student -->

    <div class="modal fade" id="modal-change-password-st" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        تغيير كلمة السر
                    </h3>
                </div>

                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form id="stcp" action="#" method="POST" role="form">

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">كلمة سر
                                            جديد</span>
                                    </div>
                                    <input type="password" class="form-control " autocomplete="password_stcp"
                                        name="password_stcp" dir="ltr">
                                </div>
                            </div>
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">أعد
                                            كتابتها</span>
                                    </div>
                                    <input type="password" class="form-control" name="password_confirmation_stcp" dir="ltr">
                                </div>

                            </div>

                            {{-- <div class="
                                            form-group
                                            text-secondary
                                            row
                                        ">

                                    <div class="col-12 text-center font-weight-bolder">
                                        <input id="log-st" type="checkbox" class="log-input" name="logout_devices_stcp">
                                        <label for="log-st" class="log"></label>
                                        <span class="text-danger ml-1">قفل الحساب من جميع الأجهزة الأخرى</span>
                                    </div>
                                </div> --}}

                            <div class="form-group font-weight-bolder">
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
@endsection
@section('script')
    <script>
        $(document).ready(() => {
        $('.modal').on('show.bs.modal', (e) =>{
                    $(e.target).find('input.is-invalid').removeClass('is-invalid');
                    $(e.target).find('span.invalid-feedback').remove();
                    $(e.target).find('input.form-control').val('');
                    $(e.target).find('input[type="checkbox"]').prop('checked',false);

                })
            
            })
    </script>
@endsection