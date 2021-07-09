@extends('teachers.layout')
@section('style')
    @parent
    <style>
        
        .box{width: 100%}
        .box .info{
            background-color: #f5f5f5;
            padding: 11px 6px;
            font-size: 12px;
            text-indent: 12px;
            font-family: monospace;
            cursor: pointer;
            border :1px solid #ddd;
            border-top: 0;
            margin-bottom: 5px;
        }
        .box .ocs{
            background-color: #fff;
            padding: 10px 6px;
            border:1px solid  #ddd;
            display: none;
            margin-bottom: 5px;
        }
        .box .ocs p{
            line-height: 1.8;
            padding-left: 12px;
        }
        .box.is-invalid {
            border-color: #dd3d2e;
            box-shadow: 0 0 0 0.2rem rgba(234, 112, 102, 1);
        }
    </style>
@endsection
@section('content')
<section class="py-8 list-fullwidth">
    <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8">
            <a class="btn btn-info font-size-20 font-weight-medium d-block"
                href="{{ route('question.create',['id'=> $activity->id]) }}">إضافة سؤال جديد</a>
        </div>
        <div class="section-title justify-content-center mb-4 mb-md-8">
                <span class="shape shape-left bg-info"></span>
                    <h2 class="text-danger">الأسئلة</h2>
                <span class="shape shape-right bg-info"></span>
        </div>
        
        <div class="row">
            
            <div class="col-sm-10 offset-sm-1">
                    @foreach($activity->questions as $q) 
                        <div class="box @error('question_'.$q->id)is-invalid @enderror" id="{{ $q->id }}">
                            <div class="info">
                                <h2>س {{ strtr($loop->iteration, array('0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩')) }}</h2>
                            </div>
                            <div class="ocs px-5 font-weight-bolder">
                                <p class="font-size-28">- {{ $q->question }} ؟</p>
                                @if ($q->attach_type == 'image')
                                    <img class="mx-auto d-block mb-6" src="{{ asset('storage/activities')."/".$activity->teacher_id."/".$activity->id."/".$q->attachment }}" width="200" height="200">
                                @endif
                                <div class="form-group form-group-icon pl-4 row">
                                    @foreach ($q->answers as $a)
                                        @if ($a->correct_answer == 'true' )
                                            <div class="col-6 pl-0 pb-3">
                                                <input id="{{ $a->id }}" value="{{ $a->id }}" type="radio" 
                                                    class="answer-input" name="question_{{ $q->id }}" checked>
                                                <label for="{{ $a->id }}" class="answer"></label>
                                                <span class="text-secondary ml-1 font-size-20">{{ $a->answer}}</span>
                                            </div> 
                                        
                                        @else

                                            <div class="col-6 pl-0 pb-3">
                                                <input id="{{ $a->id }}" value="{{ $a->id }}" type="radio" 
                                                    class="answer-input" name="question_{{ $q->id }}">
                                                <label for="{{ $a->id }}" class="answer"></label>
                                                <span class="text-secondary ml-1 font-size-20">{{ $a->answer}}</span>
                                            </div> 
                                        @endif
                                    @endforeach 
                                </div>
                                <div class="row">
                                        <a href="{{ route('question.edit',['id'=>$q->id]) }}" class="btn btn-sm btn-white text-uppercase mb-1 btn-hover-success col-3 offset-2">
                                        <i class="fa fa-edit mr-2" aria-hidden="true"></i>تعديل
                                        </a>
                            
                            
                                        <a href="{{ route('question.delete',['id'=>$q->id]) }}" class="btn btn-sm btn-white text-uppercase mb-1  btn-hover-danger col-3 offset-1">
                                            <i class="fa fa-times mr-2" aria-hidden="true"></i>حذف
                                        </a>
                                </div>
                            </div>
                        </div>
                    @endforeach        
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    @parent
    <script>
        $(function () {
            $(".box .info").click(function () {
                $(this).next().slideToggle();
                $(".box .ocs").not($(this).next()).slideUp();
                
            });
            $(".box").click(function (e) {
                var id = $(e.currentTarget).attr('id');
                $(e.currentTarget).parent().find('.box#'+id+'.is-invalid').removeClass('is-invalid');
                $(e.currentTarget).parent().find('span#question_'+id+'.invalid-feedback').remove();
            })
        });
    </script>
@endsection