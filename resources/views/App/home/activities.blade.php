@extends('app.layout')

@section('content')
    <section class="py-4 list-fullwidth">
        <div class="container">
        @foreach ($activities as $activity)
            <div class="media media-list-view mb-5">
                <a class="media-img" href="{{ route('home.activities.show',['id'=>$activity->id]) }}">
                    <img src="/img/courses/courses-img3.jpg" alt="Image">
                    <div class="media-img-overlay">
                        <span class="badge badge-warning badge-rounded-circle"><i class="fa fa-question-circle"></i></span>
                    </div>
                </a>

                <div class="media-body">
                    <h3>
                        <a class="text-warning" href="{{ route('home.activities.show',['id'=>$activity->id]) }}">
                            {{ $activity->title }}
                        </a>
                    </h3>

                    <ul class="list-unstyled d-flex text-muted mb-3">
                        <li>
                            <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> 
                                {{ $activity->created_at->locale('Ar')->diffForHumans() }}
                        </li>
                    </ul>

                    <p class="show-read-more text-justify mb-lg-2">{{ $activity->description }}</p>

                    
                        <a href="{{ route('home.activities.show',['id'=>$activity->id]) }}" class="btn btn-sm btn-white text-uppercase mb-1 mr-2 btn-hover-warning w-25">
                            <i class="fa fa-eye mr-2" aria-hidden="true"></i> عرض الأسئلة
                        </a>
                    
                    
                        <a href="{{ route('home.activities.show.results',['id'=>$activity->id]) }}" class="btn btn-sm btn-white text-uppercase mb-1 mr-2 btn-hover-warning w-25">
                            <i class="fa fa-eye mr-2" aria-hidden="true"></i> عرض النتائج
                        </a>
                    
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