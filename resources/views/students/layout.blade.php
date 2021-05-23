@extends('layouts.app')
@section('topBar')
<div class="overlay"></div>

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
                                " href="#">
                            <span class="bg-purple
                                    icon-header
                                    mr-1 mr-md-2 mr-lg-1 mr-xl-2">
                                <i class="
                                        fa fa-cog
                                        text-white
                                        font-size-17
                                        
                                    " aria-hidden="true"></i>
                            </span>
                            وحدة التحكم للطالب
                        </a>
                        <a class="
                                    text-white
                                    font-weight-medium
                                    opacity-80 mr-1 mr-md-2 mr-lg-1 mr-xl-2
                                " href="#">
                            <span class="bg-purple
                                    icon-header
                                    mr-1 mr-md-2 mr-lg-1 mr-xl-2">
                                <i class="
                                        fa fa-sign-out
                                        text-white
                                        font-size-17
                                        
                                    " aria-hidden="true"></i>
                            </span>
                            خروج
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('navbar')
    <nav class="sidebar">

        <!-- close sidebar menu -->
        <div class="dismiss">
            <i class="fa fa-arrow-left"></i>
        </div>

        

        <ul class="list-unstyled menu-elements mt-7 text-left">
            <li>
                <a class="scroll-link" href="#"><i class="fa fa-user mx-2"></i>الصفحة الشخصية</a>
            </li>
            <li>
                <a class="scroll-link" href="#"><i class="fa fa-key mx-2"></i>تغيير كلمة السر</a>
            </li>
        </ul>

    </nav>
    <nav class="
            navbar
            navbar-white
                ">
        <div class="container">
            <a class="navbar-brand" href="{{ Route('home') }}">
                <img class="d-inline-block" src="{{ asset('img/logo.jpg') }}" alt="Kuwaiti-elearning" />
            </a>
            <a class="btn btn-primary btn-customized open-menu" href="#" role="button">
                    <i class="fa fa-align-right"></i> <span>القائمة</span>
            </a>
        </div>
    </nav>

@endsection
@section('footer')
<div class="copyright">
    <div class="container">
        <div class="row py-4 align-items-center">
            <div class="col-sm-6 offset-sm-3">
                <p class="copyright-text text-center">
                    جميع الحقوق محفوظة © 2021
                </p>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    @parent
    <script>
    $(document).ready(function() {
        
        $('.dismiss, .overlay').on('click', function() {
        $('.sidebar').removeClass('active');
        $('.overlay').removeClass('active');
        });

        $('.open-menu').on('click', function(e) {
        e.preventDefault();
        $('.sidebar').addClass('active');
        $('.overlay').addClass('active');
        // close opened sub-menus
        $('.collapse.show').toggleClass('show');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
        /* change sidebar style */
        $('a.btn-customized-dark').on('click', function(e) {
        e.preventDefault();
        $('.sidebar').removeClass('light');
        });
        $('a.btn-customized-light').on('click', function(e) {
        e.preventDefault();
        $('.sidebar').addClass('light');
        });
        

        })
    </script>
@endsection