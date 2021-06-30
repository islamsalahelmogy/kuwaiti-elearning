@extends('layouts.app')
@section('style')
    <style>
        

        *:focus {
        outline: 0;
        }


        
        .square {
            align-items: center;
            display: flex;
            height: 210px;
            justify-content: center;
            position: relative;
            width: 210px;
        }

        .square span {
            animation-iteration-count: infinite;
            animation-name: animate;
            animation-timing-function: linear;
            border: 2px solid #000;
            border-radius: 50% / 34%;
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            transition: background-color 0.5s ease;
            width: 100%;
            z-index: 1;
        }

        .square:hover span,
        .square:focus span,
        .square:active span {
            background-color: rgba(255, 0, 0, 0.2);
            border-style: none;
        }

        .square span:nth-child(1) {
            animation-duration: 6s;
        }

        .square span:nth-child(2) {
            animation-duration: 4s;
        }

        .square span:nth-child(3) {
            animation-duration: 10s;
        }
        .square span:nth-child(4) {
            animation-duration: 8s;
        }
        .square span:nth-child(5) {
            animation-duration: 12s;
        }

        .square .content {
            color: #000;
            position: relative;
            text-align: center;
            transition: 0.5s ease all;
            z-index: 2;
        }
        

        @keyframes animate {
            to {
                transform: rotateZ(1turn);
            }
        }
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
        .list-fullwidth .media-list-view .media-img .media-img-overlay { 
            padding:6.25rem;
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
                                " href="@auth('teacher')
                                    {{ route('teacher.dashboard') }}
                                @else
                                    {{ route('student.dashboard') }}
                                @endauth">
                                <span class="bg-purple
                                    icon-header
                                    mr-1 mr-md-2 mr-lg-1 mr-xl-2">
                                    <i class="
                                        fa fa-cog
                                        text-white
                                        font-size-17
                                        
                                    " aria-hidden="true"></i>
                                </span>
                                @auth('teacher')
                                    {{ Auth::guard('teacher')->user()->name }}
                                @else
                                    {{ Auth::guard('student')->user()->name }}
                                @endauth
                            </a>
                            <a class="
                                    text-white
                                    font-weight-medium
                                    opacity-80 mr-1 mr-md-2 mr-lg-1 mr-xl-2
                                " href="@auth('teacher')
                                    {{ route('teacher.logout') }}
                                @else
                                    {{ route('student.logout') }}
                                @endauth">
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
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="d-inline-block" src="{{ asset('img/logo.jpg') }}" alt="Kuwaiti-elearning" />
        </a>

        <button class="navbar-toggler py-2" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item dropdown bg-warning">
                    <a class="nav-link dropdown-toggle" href="{{ route('home') }}">
                        <i class="fa fa-home nav-icon" aria-hidden="true"></i>
                        <span>الرئيسية</span>
                    </a>
                </li>
                <li class="nav-item dropdown bg-danger">
                    <a class="nav-link dropdown-toggle" href="{{ route('teacherslevels') }}">
                        <i class="fa fa-users nav-icon" aria-hidden="true"></i>
                        <span>المدرسين</span>
                    </a>
                </li>
                <li class="nav-item dropdown bg-success">
                    <a class="nav-link dropdown-toggle" href="{{ route('videos') }}">
                        <i class="fa fa-video-camera nav-icon" aria-hidden="true"></i>
                        <span>الفيديوهات</span>
                    </a>
                </li>
                <li class="nav-item dropdown bg-info">
                    <a class="nav-link dropdown-toggle" href="{{ route('stories') }}">
                        <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                        <span>القصص</span>
                    </a>
                </li>
                <li class="nav-item dropdown bg-pink">
                    <a class="nav-link dropdown-toggle" href="{{ route('activities') }}">
                        <i class="fa fa-question-circle nav-icon" aria-hidden="true"></i>
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
                    جميع الحقوق محفوظة  Kuwaiti-kids-e-learning © 2021              
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
