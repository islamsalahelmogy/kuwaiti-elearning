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
                                <form id="tlogin" action="" method="POST" role="form">
                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">الإيميل</span>
                                            </div>
                                            <input type="email" name="email_tl"
                                                class="form-control"
                                                autocomplete="email_tl" dir="ltr">
                                        </div>
                                        
                                    </div>

                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0" id="basic-addon2">كلمة
                                                    السر</span>
                                            </div>
                                            <input type="password" name="password_tl"
                                                class="form-control"
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

                                        <div class="col-4 text-left">
                                            <input id="remember-token-t" type="checkbox" class="rememberMe-input"
                                                name="remember_tl" {{ old('remember-tl') ? 'checked' : '' }}>
                                            <label for="remember-token-t" class="rememberMe"></label>
                                            <span class="text-danger ml-1">تذكرنى</span>
                                        </div>
                                        <div class="col-8 text-right">
                                            <a class="text-danger text-underline" href="javascript:void(0)"
                                                data-dismiss="modal" data-toggle="modal"
                                                data-target="#modal-reset-password-t">هل نسيت كلمة
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
                                <form id="stregister" action="" method="POST" role="form">
                                    @csrf
                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">الإسم</span>
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
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">الإيميل</span>
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
                                        <span id="password_str" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
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
                                            <input type="password" class="form-control" name="password_confirmation_str"
                                                dir="ltr">
                                        </div>

                                    </div>

                                    <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                        <label class="col-4 text-color">الجنس :</label>
                                        <div class="col-4 ">
                                            <input id="male-st" value="male" type="radio" class="gender-input"
                                                name="gender_str"
                                                {{ old('gender_str','male') == 'male' ? 'checked' : '' }}>
                                            <label for="male-st" class="gender"></label>
                                            <span class="text-danger ml-1">ذكر</span>
                                        </div>
                                        <div class="col-4 pl-0">
                                            <input id="female-st" value="female" type="radio" class="gender-input"
                                                name="gender_str"
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
@section('modal')
    <!--modal reset password teacher-->
    <div class="modal fade" id="modal-reset-password-t" tabindex="-1" role="dialog"
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
                        <form id="trp" action="" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">أدخل
                                            إيميلك</span>
                                    </div>
                                    <input type="email" name="email_trp" class="form-control" autocomplete="email_trp" dir="ltr">
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
    <div class="modal fade" id="modal-change-password-t" tabindex="-1" role="dialog"
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
                        <form id="tcp" action="" method="POST" role="form">

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append w-40">
                                        <span class="input-group-text border-right-0 w-100" id="basic-addon2">كلمة سر
                                            جديد</span>
                                    </div>
                                    <input type="password" class="form-control"
                                        autocomplete="password_tcp" name="password_tcp" dir="ltr">
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

                                {{-- <div class="col-12 text-left">
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
                                    <input type="email" name="email_stl"
                                        class="form-control "
                                        autocomplete="email_stl" dir="ltr">
                                </div>
                                
                            </div>

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0" id="basic-addon2">كلمة
                                            السر</span>
                                    </div>
                                    <input type="password" name="password_stl"
                                        class="form-control"
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

                                <div class="col-4 text-left">
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
                                    <input type="email" name="email_strp"
                                        class="form-control"
                                        autocomplete="email_strp" dir="ltr">
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
                                    <input type="password"
                                        class="form-control "
                                        autocomplete="password_stcp" name="password_stcp" dir="ltr">
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

                                <div class="col-12 text-left font-weight-bolder">
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