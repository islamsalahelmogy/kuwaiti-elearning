@extends('teachers.layout')
@section('content')
    <section class="py-8  bg-white">
        <div class="container">
            <div class="section-title justify-content-center mb-4 mb-md-8">
                <a class="btn btn-info font-size-20 font-weight-medium d-block"
                    href="javascript:void(0)" data-dismiss="modal"
                    data-toggle="modal" data-target="#modal-teacher-register">إضافة مدرس جديد</a>
            </div>
            <div class="section-title justify-content-center mb-4 mb-md-8">
                <span class="shape shape-left bg-info"></span>
                <h2 class="text-danger">المدرسين</h2>
                <span class="shape shape-right bg-info"></span>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="card card-hover bg-transparent shadow-none">
                        <div class="card-img-wrapper shadow-sm rounded-circle mx-auto">
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
                        <div class="text-center row">
                            <a class="btn btn-danger font-size-20 font-weight-medium d-block mb-1 offset-1 col-5 "
                                href="teachers-details.html">&times; حذف</a>
                            <a class="btn btn-success font-size-20 font-weight-medium d-block mb-1 ml-2 col-5"
                                href="teachers-details.html"><i class="fa fa-edit mr-2"></i>تعديل</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card card-hover bg-transparent shadow-none">
                        <div class="card-img-wrapper shadow-sm rounded-circle mx-auto">
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
                        <div class="card-body text-center">
                            <a class="text-danger font-size-20 font-weight-medium d-block mb-1"
                                href="teachers-details.html">أ/مجدى عبدالرؤوف</a>
                            <span class="text-muted font-size-15">عدد الفيديوهات | 10</span>

                        </div>
                        <div class="text-center row">
                            <a class="btn btn-danger font-size-20 font-weight-medium d-block mb-1 offset-1 col-5 "
                                href="teachers-details.html">&times; حذف</a>
                            <a class="btn btn-success font-size-20 font-weight-medium d-block mb-1 ml-2 col-5"
                                href="teachers-details.html"><i class="fa fa-edit mr-2"></i>تعديل</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card card-hover bg-transparent shadow-none">
                        <div class="card-img-wrapper shadow-sm rounded-circle mx-auto">
                            <img class="card-img-top rounded-circle" src="{{ asset('img/female.png') }}"
                                alt="carousel-img" />
                        </div>

                        <div class="card-body text-center">
                            <a class="text-danger font-size-20 font-weight-medium d-block mb-1"
                                href="teachers-details.html">أ/عبير عبدالله</a>
                        <span class="text-muted font-size-15">عدد الفيديوهات | 20</span>

                        </div>
                        <div class="text-center row">
                            <a class="btn btn-danger font-size-20 font-weight-medium d-block mb-1 offset-1 col-5 "
                                href="teachers-details.html">&times; حذف</a>
                            <a class="btn btn-success font-size-20 font-weight-medium d-block mb-1 ml-2 col-5"
                                href="teachers-details.html"><i class="fa fa-edit mr-2"></i>تعديل</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card card-hover bg-transparent shadow-none">
                        <div class="card-img-wrapper shadow-sm rounded-circle mx-auto">
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

                        <div class="card-body text-center">
                            <a class="text-danger font-size-20 font-weight-medium d-block mb-1"
                                href="teachers-details.html">أ/حازم</a>
                            <span class="text-muted font-size-15">عدد الفيديوهات | 15</span>
                        </div>
                        <div class="text-center row">
                            <a class="btn btn-danger font-size-20 font-weight-medium d-block mb-1 offset-1 col-5 "
                                href="teachers-details.html">&times; حذف</a>
                            <a class="btn btn-success font-size-20 font-weight-medium d-block mb-1 ml-2 col-5"
                                href="teachers-details.html"><i class="fa fa-edit mr-2"></i>تعديل</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('modal')
    <!-- Modal Teacher Account -->
    <div class="modal fade" id="modal-teacher-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm rounded" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                            <h3 class="text-white font-weight-bold mb-0 ml-2">
                                أنشاء مدرس جديد
                            </h3>
                        </div>

                        <div class="border rounded-bottom-md border-top-0">
                            <div class="p-3">
                                <form id="tregister" action="" method="POST" role="form">
                                    @csrf
                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">الإسم</span>
                                            </div>
                                            <input type="text" name="name_tr" value="{{ old('name_tr') }}"class="form-control
                                                @error('name_tr')  is-invalid @enderror"
                                                autocomplete="name_tr" dir="ltr">
                                        </div>
                                        @error('name_tr')
                                        <span class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">الإيميل</span>
                                            </div>
                                            <input type="email" name="email_tr" value="{{ old('email_tr') }}"
                                                class="form-control @error('email_tr')  is-invalid @enderror"
                                                autocomplete="email_tr" dir="ltr">
                                        </div>
                                        @error('email_tr')
                                        <span class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">الموبايل</span>
                                            </div>
                                            <input type="text" name="phone_tr" value="{{ old('phone_tr') }}"
                                                class="form-control @error('phone_tr')  is-invalid @enderror"
                                                autocomplete="phone_tr" dir="ltr">
                                        </div>
                                        @error('phone_tr')
                                        <span class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
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
                                            <input type="password" name="password_tr"
                                                class="form-control @error('password_tr')  is-invalid @enderror"
                                                autocomplete="password_tr" dir="ltr">
                                        </div>
                                        @error('password_tr')
                                            <span class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append w-40">
                                                <span class="input-group-text border-right-0 w-100"
                                                    id="basic-addon2">أعد
                                                    كتابتها</span>
                                            </div>
                                            <input type="password" class="form-control" name="password_confirmation_tr"
                                                dir="ltr">
                                        </div>

                                    </div>

                                    <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                        <label class="col-4 text-color">الجنس :</label>
                                        <div class="col-4 ">
                                            <input id="male-t" value="male" type="radio" class="gender-input"
                                                name="gender_tr" {{ old('gender_tr','male') == 'male' ? 'checked' : '' }}>
                                            <label for="male-t" class="gender"></label>
                                            <span class="text-danger ml-1">ذكر</span>
                                        </div>
                                        <div class="col-4 pl-0">
                                            <input id="female-t" value="female" type="radio" class="gender-input"
                                                name="gender_tr" {{ old('gender_tr','male') == 'female' ? 'checked' : '' }}>
                                            <label for="female-t" class="gender"></label>
                                            <span class="text-danger ml-1">أنثى</span>
                                        </div>
                                    </div>

                                    <div class="form-group font-weight-bolder">
                                        <button type="submit" 
                                            class="
                                                btn btn-danger
                                                text-uppercase
                                                w-100
                                        ">
                                            أنشئ مدرس
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
        </div>
    </div>

@endsection
