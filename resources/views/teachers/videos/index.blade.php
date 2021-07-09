@extends('teachers.layout')
@section('style')
    <style>
        .card-img-overlay {padding:100px}
    </style>
@endsection
@section('content')
<section class="py-8 bg-white">
    <div class="container">
        <div class="section-title justify-content-center mb-4 mb-md-8">
            <a class="btn btn-info font-size-20 font-weight-medium d-block"
                href="{{ route('teacher.video.create') }}">إضافة فيديو جديد</a>
        </div>
        <div class="section-title justify-content-center mb-4 mb-md-8">
            <span class="shape shape-left bg-info"></span>
            <h2 class="text-danger">الفيديوهات</h2>
            <span class="shape shape-right bg-info"></span>
        </div>

        <div class="row">
            @if($videos->count() > 0)
            
                        @foreach ($videos as $video)
                        	<div class="col-sm-6 col-lg-3 col-xs-12">
                                <div class="card">
                                    <a href="{{ route('teacher.video.show' ,['id'=>$video->id]) }}" class="position-relative">
<<<<<<< HEAD
                                        <img class="card-img-top" src="/img/courses/courses-img4.jpg" alt="Card image">
=======
                                        <img class="card-img-top" src="{{ asset('img/courses/courses-img4.jpg') }}" alt="Card image">
>>>>>>> main2/master
                                        <div class="card-img-overlay">
                                            <span class="badge badge-info badge-rounded-circle">
                                                <i class="fa fa-youtube-play"></i></span>
                                        </div>
                                    </a>
                                    <div class="card-body border-top-5 px-3 rounded-bottom border-info">
                                        <h3 class="card-title">
                                            <a class="text-info text-capitalize d-block text-truncate" 
                                                href="{{ route('teacher.video.show' ,['id'=>$video->id]) }}">{{ $video->title }}</a>
                                        </h3>
                                        <ul class="list-unstyled text-muted">
                                            <li>
                                                <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> 
                                                    {{ $video->created_at->locale('Ar')->diffForHumans() }}
                                            </li>
                                        </ul>
                                        <p class="show-read-more" style="height: 145px;">{{ $video->description }}</p>
                                        <div class="d-block">
                                            <div class="row">
                                                <a href="{{ route('teacher.video.edit',['id'=>$video->id]) }}"
                                                    class="btn btn-sm btn-white text-hover-purple text-uppercase col-5 ml-2">
                                                    <i class="fa fa-edit mr-2" aria-hidden="true"></i>تعديل
                                                </a>
                                                <a href="{{ route('teacher.video.delete',['id'=>$video->id]) }}"
                                                    class="btn btn-sm btn-white text-hover-purple text-uppercase col-5 ml-3">
                                                    <i class="fa fa-times mr-2" aria-hidden="true"></i>حذف
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    
                
            @else
                    <div class="w-50 text-dark text-center font-weight-bolder mx-auto">
                        <h3>لا يوجد فيديوهات</h3>
                    </div>
            @endif
        </div>
</section>
@endsection
@section('script')
    @parent
    <script>
        $(document).ready(()=>{
            var maxLength = 300;
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