@extends('app.layout')
@section('content')
    <section class="py-8  bg-white">
        <div class="container">
            <div class="card shadow-none bg-transparent mb-0">
                    <div class="position-relative">
                        <div dir="ltr" style='max-width: 800px; position: relative; margin: 0 auto; margin-top: 0px; margin-top: 64px;'>
                            <video class="w-100" id="video" poster="" controls controlsList="nodownload">
                                Your browser does not support the video tag.
                            </video>
                    
                        </div>
                    </div>
                    
                    <div class="card-body border-top-5 border-warning p-3 p-md-5 w-75 mx-auto my-8">
                        <h3 class="card-title text-warning mb-4">{{ $video->title }}</h3>
                        <ul class="list-unstyled text-muted">
                            <li>
                                <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> 
                                    {{ $video->created_at->locale('Ar')->diffForHumans() }}
                            </li>
                        </ul>
                        <p class="">{{ $video->description }}</p>
                    
                        <p class="mb-0">بواسطة : {{ $video->teacher->name }}</p>
                    </div>
                </div> 
        </div>
    </section>
@endsection
@section('script')
    <script>
        let track = document.getElementById("video");
        function loading() {
            var request = new XMLHttpRequest();
            var storyPath = {!!json_encode($video->path) !!};
            console.log(storyPath);
            request.open("GET", storyPath, true);
            request.responseType = "blob";
            request.onload = function () {
                if (this.status == 200) {
                    track.src = URL.createObjectURL(this.response);
                    track.load();
                }
            }
            request.send();

        }
        loading();
        
    </script>
@endsection
