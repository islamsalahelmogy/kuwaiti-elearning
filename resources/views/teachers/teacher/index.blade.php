@extends('teachers.layout')
@section('style')

<style>

.bg-graylight{
  background-color: white;
  box-shadow:0px 0px 20px gray;
}

</style>
    
@endsection
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

                @foreach ($teachers as $t)
                <div class="col-sm-3">
                    <div class="card card-hover bg-graylight py-3 ">
                        <div class="card-img-wrapper shadow-sm rounded-circle mx-auto">
                            <img class="card-img-top rounded-circle" src="@if($t->gender == 'male') {{ asset('img/male.png') }} @else {{ asset('img/female.png') }} @endif"
                                alt="teacher-img"/>
                            
                        </div>
                        <div class="card-body">
                            <a class="text-danger font-size-20 font-weight-medium d-block mb-1 text-center"
                                href="">أ/{{$t->name}}</a>
                            <div class="text-muted font-size-15 d-block w-75 mx-auto pl-5">
                                <span class="w-75 d-inline-block">عدد الفيديوهات</span> 
                                <span class="d-inline-block">{{$t->contents->where('attach_type','video')->count()}}</span>
                            </div>
                            <div class="text-muted font-size-15 d-block w-75 mx-auto pl-5">
                                <span class="w-75 d-inline-block">عدد القصص</span> 
                                <span class="d-inline-block">{{$t->contents->where('attach_type','audio')->count()}}</span>
                            </div>
                            <div class="text-muted font-size-15 d-block w-75 mx-auto pl-5">
                                <span class="w-75 d-inline-block">عدد الانشطة</span> 
                                <span class="d-inline-block">{{$t->activities->count()}}</span>
                            </div>

                        </div>
                        <div class="text-center row">
                            <a class="btn btn-danger font-size-20 font-weight-medium d-block mb-1 ml-4 col-5 "
                                href="{{route('admin.teacher.delete',['id'=>$t->id])}}" >&times; حذف</a>
                                
                            <a class="btn btn-success font-size-20 font-weight-medium d-block mb-1 ml-2 col-5  admin-update-teacher"
                                href="javascript:void(0)" id="{{$t->id}}"><i class="fa fa-edit mr-2"></i>تعديل</a>
                        </div>
                    </div>
                </div>
                @endforeach

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
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">صلاحيات المدرس</span>
                                            </div>

                                            
                                            <select class="form-control  @error('role_tr') is-invalid @enderror"  name="role_tr">
                                            <option selected disabled>اختار صلاحيات المدرس</option>
                                               
                                                <option value="user" >مدرس</option>
                                                <option value="admin" >مدير</option>
                                                <option value="not_active">غير مفعل</option>
                                              
                                             </select>

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

   <!-- Modal Edit teacher -->
    <div class="modal fade" id="modal-admin-Edit-teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form action="" id="admin-update-t" method="POST" role="form">
                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0"
                                            id="basic-addon2">الأسم</span>
                                    </div>
                                    <input type="text" name="name"
                                        class="form-control"
                                        autocomplete="name" dir="rtl" id="update-name-t">
                                </div>
                                
                            </div>

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0"
                                            id="basic-addon2">الإيميل</span>
                                    </div>
                                    <input type="email" name="email"
                                        class="form-control" id="update-email-t"
                                        autocomplete="email" dir="ltr" >
                                </div>
                            
                            </div>

                        


                            <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">صلاحيات المدرس</span>
                                            </div>

                                            
                                            <select class="form-control"  name="role">
                                                <option selected disabled>اختار صلاحيات المدرس</option>
                                                
                                                <option value="user" id="user" >مدرس</option>
                                                <option value="admin" id="admin">مدير</option>
                                                <option value="not_active" id="not_active">غير مفعل</option>
                                            
                                            </select>

                                        </div>
                            
                            </div>

                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0"
                                            id="basic-addon2">رقم الموبايل</span>
                                    </div>
                                    <input type="text" name="phone"
                                        class="form-control "
                                        autocomplete="phone" dir="ltr" id="update-phone-t">
                                </div>
                            
                            </div>





                            <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                        <label class="col-4 text-color">الجنس :</label>
                                        <div class="col-4 ">
                                            <input id="update-male-t" value="male" type="radio" class="gender-input"
                                                name="gender"
                                                >
                                            <label for="update-male-t" class="gender"></label>
                                            <span class="text-danger ml-1">ذكر</span>
                                        </div>
                                        <div class="col-4 pl-0">
                                            <input id="update-female-t" value="female" type="radio" class="gender-input"
                                                name="gender">
                                            <label for="update-female-t" class="gender"></label>
                                            <span class="text-danger ml-1">أنثى</span>
                                        </div>
                                    </div>




                            <div class="form-group form-group-icon">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text border-right-0"
                                            id="basic-addon2">كلمة السر</span>
                                    </div>
                                    <input type="password"
                                        class="form-control"
                                        autocomplete="password" dir="ltr" name="password">
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
            
            var id;
            $('.admin-update-teacher').on('click',(e) => {
                e.preventDefault();
                id= $(e.target).attr('id');
                console.log(id);
                axios.get('/admin/teacher/edit/'+id)
                        .then((res) => {
                            console.log(res);
                            var teacher=res.data.teacher;
                            $('#update-name-t').val(teacher.name)
                            $('#update-email-t').val(teacher.email)
                            $('#update-phone-t').val(teacher.phone)
                            if(teacher.gender=="male") {
                            $('#update-male-t').prop('checked',true)
                            } else {
                                $('#update-female-t').prop('checked',true)
                            }

                            if(teacher.role=="admin") {
                                $('#admin').attr('selected',true)
                            } else if (teacher.role=="user") {
                                $('#user').attr('selected',true)
                            } else {
                                $('#not_active').attr('selected',true)
                            }
                        
                            $('#modal-admin-Edit-teacher').modal('show');
                        });
            })


            $('#admin-update-t').submit((e) => {

                        e.preventDefault();
                        axios.post('/admin/teacher/update/'+id,$(e.target).serialize())
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
                                if(errors.role){
                                    messageError('role',errors.role[0]);

                                }
                                if(errors.phone){
                                    messageError('phone',errors.phone[0]);

                                }
                                if(errors.gender){
                                    messageError('gender',errors.gender[0]);

                                }
                                if(errors.password){
                                    messageError('password',errors.password[0]);

                                }
                            
                            }else{
                                $('#modal-admin-Edit-teacher').modal('hide');
                                window.location.replace("http://127.0.0.1:8000/admin/teacher/index");
                            
                            }
                        })
            })
                        
            $('#modal-teacher-register').on('show.bs.modal', (e) => {
                    $(e.target).find('input.is-invalid').removeClass('is-invalid');
                    $(e.target).find('span.invalid-feedback').remove();
                    $(e.target).find('input.form-control').val('');
                    $(e.target).find('input[type="checkbox"]').prop('checked',false);
                    $(e.target).find('select>option:first').attr('selected',true);

            })
        })


    </script>

@endsection
