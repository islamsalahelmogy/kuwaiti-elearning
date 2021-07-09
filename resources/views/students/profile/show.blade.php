@extends('students.layout')
@section('content')
    <section class="pt-10 my-md-5 h-100">
        <div class="container">
            <div class="row">
                <div class="col-10 col-sm-8 col-md-6 col-lg-4 offset-1 offset-sm-2 offset-md-3 offset-lg-4 row">
                    <div class="card bg-danger card-hover col-12">
                        <div class="card-body text-center px-md-5 px-lg-6 my-2">
                            <div class="card-icon-border-large border-danger mtn-80">
                                <img class="" src="@if($student->gender == 'male') {{ asset('img/kidsmale.png') }} @else {{ asset('img/kidsfemale.jpg') }} @endif" alt="male.jpg">
                            </div>
                            <blockquote class="blockquote blockquote-sm mt-2">
                                <p class="font-normal mb-5"> 
                                    {{ $student->name }}
                                </p>
                                <p class="font-normal mb-5"> 
                                    {{ $student->email }}
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
                        <form id="stedit" action="" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0"
                                            id="basic-addon2">الأسم</span>
                                    </div>
                                    <input type="text"
                                        class="form-control" name="name"
                                        autocomplete="name" dir="rtl" value="{{ $student->name }}">
                                </div>
                                
                            </div>

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0"
                                            id="basic-addon2">الإيميل</span>
                                    </div>
                                    <input type="email"
                                        class="form-control" name="email"
                                        autocomplete="email" dir="ltr" value="{{ $student->email }}">
                                </div>
                            
                            </div>

                            <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                <label class="col-4 text-color">الجنس :</label>
                                <div class="col-3">
                                    <input id="male-te" value="male" type="radio" class="gender-input" name="gender"
                                        {{ $student->gender == 'male' ? 'checked' : '' }}>
                                    <label for="male-te" class="gender"></label>
                                    <span class="text-danger ml-1">ذكر</label>
                                </div>
                                <div class="col-3">
                                    <input id="female-te" value="female" type="radio" class="gender-input" name="gender"
                                        {{ $student->gender == 'female' ? 'checked' : '' }}>
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
                                        class="form-control" name="password"
                                        autocomplete="password" dir="ltr">
                                </div>
                                
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
@section('script')
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

        $('#stedit').submit((e) => {
            e.preventDefault();
            axios.post('{{ route('student.update') }}',$(e.target).serialize())
            .then((res) => {
                console.log(res.data)
                var errors = res.data.errors;
                console.log(errors);
                if(errors) {
                    console.log(errors)
                    if(errors.name){
                        messageError('name',errors.name[0]);

                    }
                    if(errors.email){
                        messageError('email',errors.email[0]);

                    }
                    if(errors.gender){
                        messageError('gender',errors.gender[0]);

                    }
                    if(errors.password){
                        messageError('password',errors.password[0]);

                    }
                
                }else{
                    $('#modal-Edit-student').modal('hide');
<<<<<<< HEAD
                    window.location.replace("http://127.0.0.1:8000/student/dashboard");
=======
                    window.location.replace("{{ route("student.dashboard") }}");
>>>>>>> main2/master
                }
            })
        })


        })

</script>

@endsection