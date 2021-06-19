@extends('teachers.layout')
@section('content')
    <section class="pt-10 my-md-5 h-100">
        <div class="container">
            <div class="row">
                <div class="col-10 col-sm-8 col-md-6 col-lg-4 offset-1 offset-sm-2 offset-md-3 offset-lg-4 row">
                    <div class="mb-4 mb-sm-0">
                        <h1 class="element-title font-weight-bold text-center mb-1">
                            إضافة سؤال جديد
                        </h1>

                        <div class="border rounded-bottom-md border-top-0">
                            <div class="p-3">
                                <form action="{{route('question.store',['id'=> $activity_id])}}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2">اكتب السؤال</span>
                                            </div>
                                            <input type="text" name="question" value="{{ old('question') }}"class="form-control
                                                @error('question') is-invalid @enderror"
                                                autocomplete="question" dir="rtl">
                                        </div>
                                        @error('question')
                                        <span id="question" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                        <label class="col-4 text-color">نوع السؤال :</label>
                                        <div class="col-4 ">
                                            <input id="text" value="text" type="radio" class="gender-input"
                                                name="attach_type" checked {{ old('attach_type') == 'text' ? 'checked' : '' }}>
                                               <label for="text" class="gender"></label>
                                            <span class="text-danger ml-1">نص</span>
                                        </div>
                                        <div class="col-4 pl-0">
                                            <input id="image"  value="image" type="radio" class="gender-input"
                                                name="attach_type" {{ old('attach_type') == 'image' ? 'checked' : '' }}>
                                                <label for="image" class="gender"></label>
                                            <span class="text-danger ml-1"> صورة</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="wrapper">
                                            <h2>ارفع صورة</h2>
                                            <input type="file" id="file-input" name="attachment" 
                                                    class="@error('attachment') is-invalid @enderror">
                                            <label for="file-input">
                                                <i class="fa fa-paperclip fa-2x"></i>
                                                <span></span>
                                            </label>
                                            <i class="fa fa-times-circle remove"></i>
                                        </div>
                                        @error('attachment')
                                                <span id="attachment" 
                                                        class="invalid-feedback d-block px-2 font-weight-bolder"
                                                        role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2"> الاجابة الاولي</span>
                                            </div>
                                            <input type="text" name="answer1" value="{{ old('answer1') }}"class="form-control
                                                @error('answer1') is-invalid @enderror"
                                                autocomplete="answer1" dir="rtl">
                                        </div>
                                        @error('answer1')
                                        <span id="answer1" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2"> الاجابة  الثانية</span>
                                            </div>
                                            <input type="text" name="answer2" value="{{ old('answer2') }}"class="form-control
                                                @error('answer2') is-invalid @enderror"
                                                autocomplete="answer2" dir="rtl">
                                        </div>
                                        @error('answer2')
                                        <span id="answer2" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2"> الاجابة  الثالثة</span>
                                            </div>
                                            <input type="text" name="answer3" value="{{ old('answer3') }}"class="form-control
                                                @error('answer3') is-invalid @enderror"
                                                autocomplete="answer3" dir="rtl">
                                        </div>
                                        @error('answer3')
                                        <span id="answer3" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group form-group-icon">
                                        <div class="input-group mb-3">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-right-0"
                                                    id="basic-addon2"> الاجابة  الرابعة</span>
                                            </div>
                                            <input type="text" name="answer4" value="{{ old('answer4') }}"class="form-control
                                                @error('answer4') is-invalid @enderror"
                                                autocomplete="answer4" dir="rtl">
                                        </div>
                                        @error('answer4')
                                        <span id="answer4" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>



                                    <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                        <label class="col-12 text-color"> الاجابة الصحيحة :</label>
                                        <div class="col-6 pl-0">
                                            <input id="a1" value="answer1" type="radio" class="gender-input"
                                                name="correct_answer" {{ old('correct_answer') == 'answer1' ? 'checked' : '' }}>
                                               <label for="a1" class="gender"></label>
                                            <span class="text-danger ml-1">الاجابة الاولي</span>
                                        </div>
                                        <div class="col-6 pl-0">
                                            <input id="a2"  value="answer2" type="radio" class="gender-input"
                                                name="correct_answer" {{ old('correct_answer') == 'answer2' ? 'checked' : '' }}>
                                                <label for="a2" class="gender"></label>
                                            <span class="text-danger ml-1"> الاجابة الثانية </span>
                                        </div>

                                        <div class="col-6 pl-0 mt-2">
                                            <input id="a3"  value="answer3" type="radio" class="gender-input"
                                                name="correct_answer" {{ old('correct_answer') == 'answer3' ? 'checked' : '' }}>
                                                <label for="a3" class="gender"></label>
                                            <span class="text-danger ml-1"> الاجابة الثالثة</span>
                                        </div>

                                        <div class="col-6 pl-0 mt-2">
                                            <input id="a4"  value="answer4" type="radio" class="gender-input"
                                                name="correct_answer" {{ old('correct_answer') == 'answer4' ? 'checked' : '' }}>
                                                <label for="a4" class="gender"></label>
                                            <span class="text-danger ml-1"> الاجابة الرابعة</span>
                                        </div>
                                    </div>

                                    <div class="form-group font-weight-bolder">
                                        <button type="submit" 
                                            class="
                                                btn btn-danger
                                                text-uppercase
                                                w-100
                                        ">
                                            إضافة
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
            $('input ,textarea ,select').on('focus',(e) => {
                var input = $(e.target)
                if(input.hasClass('is-invalid')) {
                    console.log(input);
                    input.removeClass('is-invalid');
                    $('#'+input.attr('name')).remove();
                }
                if($('span.invalid').length) {
                    $('span.invalid').remove();
                }
            })
            $('.wrapper').hide()
            $('input[name="attach_type"]').on('change',function () {
                if($('input#text').prop('checked') == true) {
                    $('.wrapper').hide()
                } else {
                    $('.wrapper').show()
                }
            })
        })
    </script>
@endsection