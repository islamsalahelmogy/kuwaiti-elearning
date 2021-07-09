@extends('teachers.layout')
@section('content')
<section class="pt-8 my-md-5 h-100">
    <div class="container">
        <div class="row">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 offset-1 offset-sm-2 offset-md-3 offset-lg-4 row">
                <div class="mb-4 mb-sm-0 ">

                    <div class="bg-warning rounded-top p-2">
                        <h3 class="text-white font-weight-bold mb-0 ml-2">
                            تغيير كلمة السر
                        </h3>
                    </div>

                    <div class="border rounded-bottom-md border-top-0">
                        <div class="p-3">
                            <form action="" id="tpu" method="POST" role="form">
                                <div class="form-group form-group-icon">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-right-0" id="basic-addon2">كلمة السر
                                                القديمة</span>
                                        </div>
                                        <input type="password" name="old_password_t"
                                            class="form-control"
                                            dir="ltr">
                                    </div>
                                    
                                </div>

                                <div class="form-group form-group-icon">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append w-40">
                                            <span class="input-group-text border-right-0 w-100" id="basic-addon2">كلمة السر الجديدة
                                                </span>
                                        </div>
                                        <input type="password" name="new_password_t"
                                            class="form-control"
                                            autocomplete="new_password_t"  dir="ltr">
                                    </div>
                                    
                                </div>
                                <div class="form-group form-group-icon">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append w-40">
                                            <span class="input-group-text border-right-0 w-100" id="basic-addon2">أعد
                                                كتابتها</span>
                                        </div>
                                        <input type="password" class="form-control" name="new_password_confirmation_t"
                                            dir="ltr" autocomplete="new_password_confirmation_t">
                                    </div>

                                </div>

                                {{-- <div class="
                                    form-group
                                    text-secondary
                                    row
                                ">

                                     <div class="col-12 text-left font-weight-bolder">
                                        <input id="t-log-t" type="checkbox" class="log-input" name="logout_devices_t">
                                        <label for="t-log-t" class="log"></label>
                                        <span class="text-danger ml-1">قفل الحساب من جميع الأجهزة الأخرى</span>
                                    </div> 
                                </div> --}}

                                <div class="form-group font-weight-bolder">
                                    <button type="submit" name="submit" class="
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
    </div>
</section>
@endsection
@section('script')
    @parent
    <script>
        $(document).ready(() => {
            function messageError(errorName,message) {
                $('input[name='+errorName+']').addClass('is-invalid');
                    $('input[name='+errorName+']').parent().append(
                        '<span id='+errorName+' class="invalid-feedback d-block px-2" role="alert">'+
                                '<strong>'+message+'</strong>'+
                        '</span>'
                );
            }
            $('#tpu').submit((e) => {
                e.preventDefault();
                axios.post('{{ route('teacher.password.update') }}',$(e.target).serialize())
                .then((res) => {
                    console.log(res)
                    var errors = res.data.errors;
                    if(errors) {
                        console.log(errors)
                        if(errors.old_password_t){
                            messageError('old_password_t',errors.old_password_t[0]);
                        }
                        if(errors.new_password_t){
                            messageError('new_password_t',errors.new_password_t[0]);
                        }
                        if(errors.new_password_confirmation_t){
                            messageError('new_password_confirmation_t',errors.new_password_confirmation_t[0]);
                        }
                    }else {
                        
                        window.location.replace("{{ route("teacher.dashboard") }}");
                    }
                })
            })
        })
    </script>
@endsection