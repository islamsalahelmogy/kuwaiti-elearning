@extends('app.layout')

@section('content')
    <section class="py-4 list-fullwidth">
        <div class="container">
        @foreach ($stories as $story)
            <div class="media media-list-view mb-5">
                <a class="media-img" href="{{ route('teachers.stories.show',['id'=>$story->id]) }}">
                    <img src="/img/courses/courses-img3.jpg" alt="Image">
                    <div class="media-img-overlay">
                        <span class="badge badge-warning badge-rounded-circle"><i class="fa fa-headphones"></i></span>
                    </div>
                </a>

            <div class="media-body">
                <h3>
                    <a class="text-warning" href="{{ route('teachers.stories.show',['id'=>$story->id]) }}">
                        {{ $story->title }}
                    </a>
                </h3>

                <ul class="list-unstyled d-flex text-muted mb-3">
                    <li>
                        <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> 
                            {{ $story->created_at->locale('Ar')->diffForHumans() }}
                    </li>
                </ul>

                <p class="show-read-more text-justify mb-lg-2">{{ $story->description }}</p>

                <div class="">
                    <a href="{{ route('teachers.stories.show',['id'=>$story->id]) }}" class="btn btn-sm btn-white text-uppercase mb-1 mr-2 btn-hover-warning w-25">
                        <i class="fa fa-eye mr-2" aria-hidden="true"></i> عرض
                    </a>
                </div>
            </div>
        @endforeach
		</div>
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