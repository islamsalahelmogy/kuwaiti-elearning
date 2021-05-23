@extends('layouts.app')
@section('content')
<section class="py-2 py-md-4">
    <div class="container">
        <div class="row">
            <div class="col-5 col-sm-4 offset-sm-4 offset-3 my-3">
                <img class="d-block w-100 h-100 mx-auto" src="img/logo.jpg" alt="Kuwaiti-elearning" />
            </div>
            <div class="col-12 row">
                <div class="col-md-6 offset-lg-1 col-lg-5">
                    <div class="mb-4 mb-sm-0 ">
                        <h1 class="element-title font-weight-bold text-center mb-1">
                            المدرس
                        </h1>
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
                                            <input id="remember-token-t" type="checkbox" class="rememberMe-input"
                                                name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember-token-t" class="rememberMe"></label>
                                            <span class="text-danger ml-1">تذكرنى</span>
                                        </div>
                                        <div class="col-8 text-right">
                                            <a class="text-danger text-underline" href="javascript:void(0)"
                                                data-dismiss="modal" data-toggle="modal"
                                                data-target="#modal-reset-password-teacher">هل نسيت كلمة
                                                السر؟</a>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="mb-4 mb-sm-0">
                        <h1 class="element-title font-weight-bold text-center mb-1">
                            الطالب
                        </h1>
                        <div class="bg-warning rounded-top p-2">
                            <h3 class="text-white font-weight-bold mb-0 ml-2">
                                أنشاء حساب جديد
                            </h3>
                        </div>

                        <div class="border rounded-bottom-md border-top-0">
                            <div class="p-3">
                                <form action="#" method="POST" role="form">
                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">الإسم</span>
                                            </div>
                                            <input type="text" class="form-control @error('name')  is-invalid @enderror"
                                                autocomplete="name" dir="ltr">
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

                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append w-40">
                                                <span class="input-group-text border-right-0 w-100"
                                                    id="basic-addon2">أعد
                                                    كتابتها</span>
                                            </div>
                                            <input type="password" class="form-control" name="password-confirmation"
                                                dir="ltr" autocomplete="new-password">
                                        </div>

                                    </div>

                                    <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                        <label class="col-4 text-color">الجنس :</label>
                                        <div class="col-4 ">
                                            <input id="male-st" value="male" type="radio" class="gender-input"
                                                name="gender" checked="true">
                                            <label for="male-st" class="gender"></label>
                                            <span class="text-danger ml-1">ذكر</span>
                                        </div>
                                        <div class="col-4 pl-0">
                                            <input id="female-st" value="female" type="radio" class="gender-input"
                                                name="gender">
                                            <label for="female-st" class="gender"></label>
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
                                            أنشئ حسابك
                                        </button>
                                    </div>
                                    <div class="
                                        form-group
                                        text-center text-secondary
                                        mb-0
                                        font-weight-bolder
                                    ">
                                        <p class="mb-0">
                                            إذا كنت تمتلك حساب ؟
                                            <a class="text-danger" href="javascript:void(0)" data-dismiss="modal"
                                                data-toggle="modal" data-target="#modal-student-login">سجل الآن</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    @parent
    <script>
    </script>
@endsection