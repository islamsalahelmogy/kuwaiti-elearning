@extends('layouts.app')
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
                                " href="{{ route('student.logout') }}">
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
    <nav class="
        navbar
        navbar-expand-md
        navbar-scrollUp
        navbar-sticky
        navbar-white
            ">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="d-inline-block" src="{{ asset('img/logo.jpg') }}" alt="Kuwaiti-elearning" />
        </a>

        <button class="navbar-toggler py-2" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item dropdown bg-warning">
                    <a class="nav-link dropdown-toggle" href="#">
                        <i class="fa fa-home nav-icon" aria-hidden="true"></i>
                        <span>الرئيسية</span>
                    </a>
                </li>
                <li class="nav-item dropdown bg-danger">
                    <a class="nav-link dropdown-toggle" href="">
                        <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                        <span>المدرسين</span>
                    </a>
                </li>
                <li class="nav-item dropdown bg-success">
                    <a class="nav-link dropdown-toggle" href="">
                        <i class="fa fa-tv nav-icon" aria-hidden="true"></i>
                        <span>الفيديوهات</span>
                    </a>
                </li>
                <li class="nav-item dropdown bg-info">
                    <a class="nav-link dropdown-toggle" href="">
                        <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                        <span>القصص</span>
                    </a>
                </li>
                <li class="nav-item dropdown bg-pink">
                    <a class="nav-link dropdown-toggle" href="">
                        <i class="fa fa-pencil-square-o nav-icon" aria-hidden="true"></i>
                        <span>الأنشطة</span>
                    </a>
                </li>
            </ul>
        </div>
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

@section('style')
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