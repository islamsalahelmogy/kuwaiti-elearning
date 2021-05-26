@extends('app.layout')
@section('content')
    <section class="py-10 bg-white">
        <div class="container">
            <div class="section-title justify-content-center mb-4 mb-md-8">
                <span class="shape shape-left bg-info"></span>
                <h2 class="text-danger">المدرسين</h2>
                <span class="shape shape-right bg-info"></span>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="card card-hover bg-transparent shadow-none">
                        <div class="card-img-wrapper position-relative shadow-sm rounded-circle mx-auto">
                            <img class="card-img-top rounded-circle" src="{{ asset('img/female.png')}}"
                                alt="carousel-img" />
                            {{-- <div class="card-img-overlay text-center rounded-circle">
                                <ul class="list-unstyled mb-0 d-flex align-items-center h-100 justify-content-center">
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="card-body text-center">
                            <a class="text-danger font-size-20 font-weight-medium d-block mb-1"
                                href="teachers-details.html">أ/حنان عبدالقادر</a>
                            <span class="text-muted font-size-15">عدد الفيديوهات | 25</span>

                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card card-hover bg-transparent shadow-none">
                        <div class="card-img-wrapper position-relative shadow-sm rounded-circle mx-auto">
                            <img class="card-img-top rounded-circle" src="{{ asset('img/male.png') }}"
                                alt="carousel-img" />
                            {{-- <div class="card-img-overlay text-center rounded-circle">
                                <ul class="list-unstyled mb-0 d-flex align-items-center h-100 justify-content-center">
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="card-body position-relative text-center pb-0">
                            <a class="text-danger font-size-20 font-weight-medium d-block mb-1"
                                href="teachers-details.html">أ/مجدى عبدالرؤوف</a>
                            <span class="text-muted font-size-15">عدد الفيديوهات | 10</span>

                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card card-hover bg-transparent shadow-none">
                        <div class="card-img-wrapper position-relative shadow-sm rounded-circle mx-auto">
                            <img class="card-img-top rounded-circle" src="{{ asset('img/female.png') }}"
                                alt="carousel-img" />
                            {{-- <div class="card-img-overlay text-center rounded-circle">
                                <ul class="list-unstyled mb-0 d-flex align-items-center h-100 justify-content-center">
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>

                        <div class="card-body position-relative text-center pb-0">
                            <a class="text-danger font-size-20 font-weight-medium d-block mb-1"
                                href="teachers-details.html">أ/عبير عبدالله</a>
                        <span class="text-muted font-size-15">عدد الفيديوهات | 20</span>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card card-hover bg-transparent shadow-none">
                        <div class="card-img-wrapper position-relative shadow-sm rounded-circle mx-auto">
                            <img class="card-img-top rounded-circle" src="{{ asset('img/male.png') }}"
                                alt="carousel-img" />
                            {{-- <div class="card-img-overlay text-center rounded-circle">
                                <ul class="list-unstyled mb-0 d-flex align-items-center h-100 justify-content-center">
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="text-white">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>

                        <div class="card-body position-relative text-center pb-0">
                            <a class="text-danger font-size-20 font-weight-medium d-block mb-1"
                                href="teachers-details.html">أ/حازم</a>
                            <span class="text-muted font-size-15">عدد الفيديوهات | 15</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection