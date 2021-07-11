@extends('app.layout')
@section('style')
    @parent
    <style>
        .loader {
            padding: 225px;
            padding-left: 390px;
            position: relative;
        }
        
        .one {
            position: absolute;
            border-radius: 50%;
            background: #0e0d0d;
            opacity: .0;
            animation: loading 1.3s .65s infinite;
            height: 20px;
            width: 20px;
        }
        
        .two {
            position: absolute;
            border-radius: 50%;
            background: #FF4081;
            opacity: .0;
            animation: loading 1.3s infinite;
            height: 20px;
            width: 20px;
        }
        
        
        @keyframes loading {
            0% {
                opacity: .0;
                transform: scale(.15);
                box-shadow: 0 0 2px rgba(black, .1);
            }
            50% {
                opacity: 1;
                transform: scale(2);
                box-shadow: 0 0 10px rgba(black, .1);
            }
            100% {
                opacity: .0;
                transform: scale(.15);
                box-shadow: 0 0 2px rgba(black, .1);
            }
        } 
    </style>
@endsection
@section('content')
    <section class="py-8  bg-white">
        <div class="container">
            <div class="card shadow-none bg-transparent mb-0">
                    <div class="position-relative">
                        <div dir="ltr" style='max-width: 800px; position: relative; margin: 0 auto; margin-top: 0px; margin-top: 64px;'>
                            <div class="loader" id="load">
                                <div class="one"></div>
                                <div class="two"></div>
                            </div> 
                            <video class="w-100 d-none" id="video" poster="{{ asset('img/video.jpg') }}" 
                                controls controlsList="nodownload">
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
                    document.getElementById('load').classList.add('d-none');
                    document.getElementById('video').classList.remove('d-none');
                }
            }
            request.send();

        }
        loading();
        
    </script>
@endsection
