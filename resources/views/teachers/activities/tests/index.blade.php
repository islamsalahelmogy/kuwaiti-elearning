@extends('teachers.layout')

@section('content')
    <section class="py-4 list-fullwidth">
        <div class="container">


        <div class="section-title justify-content-center mb-4 mb-md-8">
            <a class="btn btn-info font-size-20 font-weight-medium d-block"
                href="{{ route('test.create') }}">إضافة نشاط جديد</a>
        </div>
        <div class="section-title justify-content-center mb-4 mb-md-8">
                <span class="shape shape-left bg-info"></span>
                    <h2 class="text-danger">الانشطة</h2>
                <span class="shape shape-right bg-info"></span>
        </div>

            @foreach ($activities as $activity)
                <div class="media media-list-view mb-5">
                    <a class="media-img" href="{{ route('question.index',['id'=>$activity->id]) }}">
                        <img src="/img/courses/courses-img3.jpg" alt="Image">
                        <div class="media-img-overlay">
                            <span class="badge badge-warning badge-rounded-circle"><i class="fa fa-question-circle"></i></span>
                        </div>
                    </a>

                    <div class="media-body">
                        <h3>
                            <a class="text-warning" href="{{ route('question.index',['id'=>$activity->id]) }}">
                                {{ $activity->title }}
                            </a>
                        </h3>

                        <ul class="list-unstyled d-flex text-muted mb-3">
                            <li>
                                <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> 
                                    {{ $activity->created_at->locale('Ar')->diffForHumans() }}
                            </li>
                        </ul>

                        <p class="show-read-more text-justify mb-lg-2 ">{{ $activity->description }}</p>

                        <div class="row">
                            <a href="{{ route('question.index',['id'=>$activity->id]) }}" class="btn btn-sm btn-white text-uppercase mb-1  btn-hover-warning col-3 offset-2">
                                <i class="fa fa-eye mr-2" aria-hidden="true"></i> عرض الأسئلة
                            </a>
                        
                        
                            <a href="{{route('test.result',['id'=>$activity->id])}}" class="btn btn-sm btn-white text-uppercase mb-1  btn-hover-warning col-3 offset-1 ">
                                <i class="fa fa-eye mr-2" aria-hidden="true"></i> عرض النتائج
                            </a>
                        </div>

                        <div class="row">
                            <a href="{{ route('test.edit',['id'=>$activity->id]) }}" class="btn btn-sm btn-white text-uppercase mb-1  btn-hover-success col-3 offset-2">
                                <i class="fa fa-edit mr-2" aria-hidden="true"></i>تعديل
                            </a>

                            <a href="{{ route('test.delete',['id'=>$activity->id]) }}" class="btn btn-sm btn-white text-uppercase mb-1  btn-hover-danger col-3 offset-1">
                                <i class="fa fa-times mr-2" aria-hidden="true"></i>حذف
                            </a>
                        </div> 
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
@section('script')
    @parent
    <script>
        $(document).ready(()=>{
            var maxLength = 600;
            $(".show-read-more").each(function(){
                var myStr = $(this).text();
                if($.trim(myStr).length > maxLength){
                    var newStr = myStr.substring(0, maxLength);
                    var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                    $(this).empty().html(newStr);
                    $(this).append('...');
                    
                }
            });
        });
    </script>
@endsection