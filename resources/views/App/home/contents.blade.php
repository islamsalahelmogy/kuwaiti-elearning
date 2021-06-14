@extends('app.layout')
@section('style')
    @parent
    <style>
        
        .square:hover span,
        .square:focus span,
        .square:active span {
            background-color: rgba(255, 0, 0, 0.2);
            border-style: none;
        }


        .square .content {
            color: #000;
            position: relative;
            text-align: center;
            transition: 0.5s ease all;
            z-index: 2;
        }
        
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-around flex-wrap">
        @if (in_array('videos',$types))   
            <a class="square my-8 mx-10" 
                href="{{ route('home.videos',['levelId' => $levelId , 'topicId' => $topicId , 'teacherId' => $teacherId , 'type' => 'videos']) }}">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>

                <div class="content">		
                    <h2>
                        الفيديوهات
                    </h2>
                </div>
            </a>
        @endif
        @if (in_array('stories',$types))   
            <a class="square my-8 mx-10" 
                href="{{ route('home.stories',['levelId' => $levelId , 'topicId' => $topicId , 'teacherId' => $teacherId , 'type' => 'stories']) }}">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>

                <div class="content">		
                    <h2>
                        القصص
                    </h2>
                </div>
            </a>
        @endif
        @if (in_array('activites', $types))   
            <a class="square my-8 mx-10" 
                href="{{ route('home.activities',['levelId' => $levelId , 'topicId' => $topicId , 'teacherId' => $teacherId , 'type' => 'activities']) }}">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>

                <div class="content">		
                    <h2>
                        الأنشطة
                    </h2>
                </div>
            </a>
        @endif
    </div>
@endsection