@extends('teachers.layout')
@section('content')
    <section class="pt-10 my-md-5 h-100">
        <div class="container">
            <div class="row">
                <div class="col-10 col-sm-8 col-md-6 col-lg-4 offset-1 offset-sm-2 offset-md-3 offset-lg-4 row">
                    <div class="mb-4 mb-sm-0">
                        <h1 class="element-title font-weight-bold text-center mb-1">
                            تعديل السؤال 
                        </h1>

                        <div class="border rounded-bottom-md border-top-0">
                            <div class="p-3">
                                <form action="{{route('question.update',['id'=> $question->id])}}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group">
                                        
                                        <label for="exampleFormControlTextarea1" 
                                            style="color: #495057;padding-right: 13px;font-weight: 600;"> اكتب السؤال</label>
                                        <textarea class="form-control @error('question')  is-invalid @enderror" id="exampleFormControlTextarea1" 
                                            rows="3" name="question">@error('question') {{ old('question') }} @else {{ $question->question }} @enderror</textarea>
                                        @error('question')
                                        <span id="question" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                        <label class="col-4 text-color">نوع السؤال :</label>
                                        <div class="col-4 ">
                                            <input id="text" value="text" type="radio" class="answer-input"
                                                name="attach_type"{{ old('attach_type') ? (old('attach_type') == 'text' ?
                                                    'checked' : '' ) : ( $question->attach_type == 'text' ? 'checked' : ' ') }}>
                                            <label for="text" class="answer"></label>
                                            <span class="text-danger ml-1">نص</span>
                                        </div>
                                        <div class="col-4 pl-0">
                                            <input id="image"  value="image" type="radio" class="answer-input"
                                                name="attach_type" {{ old('attach_type') ? (old('attach_type') == 'image' ?
                                                    'checked' : '' ) : ( $question->attach_type == 'image' ? 'checked' : ' ') }}>
                                                <label for="image" class="answer"></label>
                                            <span class="text-danger ml-1"> صورة</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="wrapper">
                                            <h2>ارفع صورة</h2>
                                            <input type="file" id="file-input" name="attachment" 
                                                    class="@error('attachment') is-invalid @enderror" 
                                                    value="">
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

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea2" 
                                            style="color: #495057;padding-right: 13px;font-weight: 600;">الإجابة الأولى</label>
                                        <textarea class="form-control @error('answer1')  is-invalid @enderror" id="exampleFormControlTextarea2" 
                                            rows="2" name="answer1">@error('answer1') {{ old('answer1') }} @else {{ $answers['0']['answer'] }} @enderror</textarea>
                                        @error('answer1')
                                        <span id="answer1" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group form-group-icon">
                                        <label for="exampleFormControlTextarea3" 
                                            style="color: #495057;padding-right: 13px;font-weight: 600;">الإجابة الثانية</label>
                                        <textarea class="form-control @error('answer2')  is-invalid @enderror" id="exampleFormControlTextarea3" 
                                            rows="2" name="answer2">@error('answer2') {{ old('answer2') }} @else {{ $answers['1']['answer'] }} @enderror</textarea>
                                        @error('answer2')
                                        <span id="answer2" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea4" 
                                            style="color: #495057;padding-right: 13px;font-weight: 600;">الإجابة الثالثة</label>
                                        <textarea class="form-control @error('answer3')  is-invalid @enderror" id="exampleFormControlTextarea4" 
                                            rows="2" name="answer3">@error('answer3') {{ old('answer3') }} @else {{ $answers['2']['answer'] }} @enderror</textarea>
                                        @error('answer3')
                                        <span id="answer3" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea5" 
                                            style="color: #495057;padding-right: 13px;font-weight: 600;">الإجابة الرابعة</label>
                                        <textarea class="form-control @error('answer4')  is-invalid @enderror" id="exampleFormControlTextarea5" 
                                            rows="2" name="answer4">@error('answer4') {{ old('answer4') }} @else {{ $answers['3']['answer'] }} @enderror</textarea>
                                        @error('answer4')
                                        <span id="answer4" class="invalid-feedback d-block px-2 font-weight-bolder" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                

                                    
                                    <div class="form-group form-group-icon pl-4 row font-weight-bolder">
                                        <label class="col-12 text-color"> الاجابة الصحيحة :</label>
                                        <div class="col-6 pl-0">
                                            <input id="a1" value="answer1" type="radio" class="answer-input"
                                                name="correct_answer"  {{ old('correct_answer') ? (old('correct_answer') == 'answer1' ?
                                                    'checked' : '' ) : ($answers['0']['correct_answer'] == 'true' ? 'checked' : ' ') }}>
                                                <label for="a1" class="answer"></label>
                                            <span class="text-danger ml-1">الاجابة الاولي</span>
                                        </div>
                                        <div class="col-6 pl-0">
                                            <input id="a2"  value="answer2" type="radio" class="answer-input"
                                                name="correct_answer" {{ old('correct_answer') ? (old('correct_answer') == 'answer2' ?
                                                    'checked' : '' ): ($answers['1']['correct_answer'] == 'true' ? 'checked' : ' ') }}>
                                                <label for="a2" class="answer"></label>
                                            <span class="text-danger ml-1"> الاجابة الثانية </span>
                                        </div>

                                        <div class="col-6 pl-0 mt-2">
                                            <input id="a3"  value="answer3" type="radio" class="answer-input"
                                                name="correct_answer" {{ old('correct_answer') ? (old('correct_answer') == 'answer3' ?
                                                    'checked' : '' ): ($answers['2']['correct_answer'] == 'true' ? 'checked' : ' ') }}>
                                                <label for="a3" class="answer"></label>
                                            <span class="text-danger ml-1"> الاجابة الثالثة</span>
                                        </div>

                                        <div class="col-6 pl-0 mt-2">
                                            <input id="a4"  value="answer4" type="radio" class="answer-input"
                                                name="correct_answer" {{ old('correct_answer') ? (old('correct_answer') == 'answer4' ?
                                                    'checked' : '' ): ($answers['3']['correct_answer'] == 'true' ? 'checked' : ' ') }}>
                                                <label for="a4" class="answer"></label>
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
                                            حفظ التعديلات
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
            if($('input#text').prop('checked') == true) {
                    $('.wrapper').hide()
            } else {
                    $('.wrapper').show()
            }
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