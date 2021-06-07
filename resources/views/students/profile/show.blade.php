@extends('students.layout')
@section('content')
    <section class="pt-10 my-md-5 h-100">
        <div class="container">
            <div class="row">
                <div class="col-10 col-sm-8 col-md-6 col-lg-4 offset-1 offset-sm-2 offset-md-3 offset-lg-4 row">
                    <div class="card bg-danger card-hover col-12">
                        <div class="card-body text-center px-md-5 px-lg-6 my-2">
                            <div class="card-icon-border-large border-danger mtn-80">
                                <img class="" src="{{ asset('img/male.png') }}" alt="male.jpg">
                            </div>
                            <blockquote class="blockquote blockquote-sm mt-2">
                                <p class="font-normal mb-5"> 
                                    محمد عوض
                                </p>
                                <p class="font-normal mb-5"> 
                                    mohamed@gmail.com
                                </p>
                            </blockquote>
                        </div>
                    </div>
                    <a class="text-center btn btn-success col-sm-4 offset-sm-4 col-6 offset-3" href="javascript:void(0)"
                        data-dismiss="modal" data-toggle="modal"
                        data-target="#modal-Edit-student">
                        <i class="fa fa-edit mr-2"></i>تعديل</a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-Edit-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm rounded" role="document">
            <div class="modal-content">
                <div class="bg-warning rounded-top p-2">
                    <h3 class="text-white font-weight-bold mb-0 ml-2">
                        تعديل بياناتك الشخصية
                    </h3>
                </div>


                <div class="border rounded-bottom-md border-top-0">
                    <div class="p-3">
                        <form action="#" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0"
                                            id="basic-addon2">الأسم</span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('name')  is-invalid @enderror"
                                        autocomplete="name" dir="rtl">
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
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

                            <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                <label class="col-4 text-color">الجنس :</label>
                                <div class="col-3">
                                    <input id="male-te" value="male" type="radio" class="gender-input" name="gender"
                                        checked="true">
                                    <label for="male-te" class="gender"></label>
                                    <span class="text-danger ml-1">ذكر</label>
                                </div>
                                <div class="col-3">
                                    <input id="female-te" value="female" type="radio" class="gender-input" name="gender">
                                    <label for="female-te" class="gender"></label>
                                    <span class="text-danger ml-1">أنثى</label>
                                </div>
                            </div>
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0"
                                            id="basic-addon2">كلمة السر</span>
                                    </div>
                                    <input type="password"
                                        class="form-control @error('password')  is-invalid @enderror"
                                        autocomplete="password" dir="ltr">
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group font-weight-bolder">
                                <button type="submit" class="
                                                        btn btn-success
                                                        text-uppercase
                                                        w-100
                                                    ">
                                     حفظ التغييرات
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection