@extends('App.layout')
@section('style')
    <style>
        #load {
            padding: 125px;
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
        #background {
        object-fit: cover;
        height: 100vh;
        width: 100vw;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        filter: blur(7px);
        z-index: -1;
        }
        
        .outer-container {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        }
        
        .player-container {
        display: flex;
        flex-direction: column;
        height: 250px;
        width: 425px;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        box-shadow: 0px 0px 20px black;
        }
        
        #thumbnail {
        position: absolute;
        object-fit: fill;
        height: 100%;
        width: 100%;
        top: -10%;
        transition: 1s;
        z-index: 3;
        }
        
        .box {
        position: relative;
        height: 100%;
        width: 100%;
        background: #EA7066;
        z-index: 4;
        }
        
        .play-pause {
        grid-area: one;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -10px;
        margin-bottom: 15px;
        }
        .fa-pause-circle {
        filter: invert(1);
        cursor: pointer;
        margin-top: 15px;
        display: none;
        }
        
        #play,
        #prev-track,
        #next-track,
        #back10,
        #forward10,
        #stop,
        #pause{
        filter: invert(1);
        cursor: pointer;
        margin-top: 15px;
        transition: transform ease-in-out 0.5s;
        
        }
        #play:hover,
        #pause:hover,
        #prev-track:hover,
        #next-track:hover,
        #back10:hover,
        #forward10:hover,
        #stop:hover {
            transform:scale(1.5);
            color:black
        }
        .next-prev {
        grid-area: three;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        width: 85%;
        margin: 0 auto;
        }
        
        .progress-bar {
        grid-area: four;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 15px;
        }
        
        #progressBar {
        height: 15px;
        background: white;
        width: 85%;
        outline: none;
        border-radius: 30px;
        cursor:pointer;
        }
        
        #progressBar::-webkit-slider-thumb {
        width: 11px;
        border-radius: 30px;
        }
        input[type='range']::-webkit-slider-runnable-track:hover {
        outline:none;
        border:none;
        background: white;
        }
        .track-time {
        grid-area: five;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        width: 85%;
        margin: 10px auto;
        }
        
        #currentTime {
        font-family: "Lato", sans-serif;
        font-size: 1rem;
        font-weight: bolder;
        color: white;
        }
        
        #durationTime {
        font-family: "Lato", sans-serif;
        font-size: 1rem;
        color: #363535;
        font-weight: bolder;
        }
        .progress-bar {
        background-color : transparent
        }
    </style>
@endsection
@section('content')
    <section class="py-8  bg-white">
        <div class="container">
                <div class="card shadow-none bg-transparent mb-0">
                    <div id="load" style="padding-right:50%">
                            <div class="one"></div>
                            <div class="two"></div>
                    </div>
                    <div class="position-relative d-none" id="story">
                            <div class="outer-container">
                            <audio id="track">
                            </audio>
                        </div>
                        <div class="player-container" dir="ltr">
                            <div class="box pt-8">
                                <div>
                                    <div class="next-prev">
                                        <i class="fa fa-undo fa-2x" title="Back 10 seconds" id="back10"></i>
                                        <i class="fa fa-stop-circle fa-2x" id="stop"></i>
                                        <div class="play-pause">
                                            <i class="fa fa-play-circle fa-3x" id="play"></i>
                                            <i class="fa fa-pause-circle fa-3x" id="pause"></i>
                                        </div>
                                        <i class="fa fa-repeat fa-2x" title="Forward 10 seconds" id="forward10"></i>
                                    </div>
                                </div>
                                <div class="progress-bar">
                                    <input type="range" id="progressBar" min="0" max="" value="0" />
                                </div>
                                <div class="track-time">
                                    <div id="currentTime"></div>
                                    <div id="durationTime"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body border-top-5 border-warning p-3 p-md-5 w-75 mx-auto my-8">
                        <h3 class="card-title text-warning mb-4">{{ $story->title }}</h3>
                        <ul class="list-unstyled text-muted">
                            <li>
                                <i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
                                {{ $story->created_at->locale('Ar')->diffForHumans() }}
                            </li>
                        </ul>
                        <p class="">{{ $story->description }}</p>
                    
                        <p class="mb-0">بواسطة : {{ $story->teacher->name }}</p>
                    </div>
                </div>            
        </div>
    </section>
@endsection

@section('script')
    <script>
        let track = document.getElementById("track");

        //const thumbnail = document.getElementById("thumbnail");
        const background = document.getElementById("background");

        const progressBar = document.getElementById("progressBar");
        const currentTime = document.getElementById("currentTime");
        const durationTime = document.getElementById("durationTime");

        let play = document.getElementById("play");
        let pause = document.getElementById("pause");
        let stop = document.getElementById("stop");
        let back = document.getElementById("back10");
        let forward = document.getElementById("forward10");
        trackIndex = 0;
        let playing = true;
        let load = false;

        function loading() {
            var request = new XMLHttpRequest();
            var storyPath = {!!json_encode($story->path) !!};
            console.log(storyPath);
            request.open("GET", storyPath, true);
            request.responseType = "blob";
            request.onload = function () {
                if (this.status == 200) {
                    track.src = URL.createObjectURL(this.response);
                    track.load();
                    setInterval(progressValue, 500);
                    document.getElementById('load').classList.add('d-none');
                    document.getElementById('story').classList.remove('d-none');
                }
            }
            request.send();

        }
        loading();

        function pausePlay() {

            if (playing) {
                play.style.display = "none";
                pause.style.display = "block";

                //thumbnail.style.transform = "scale(1.25)";
                track.play();
                playing = false;
            } else {
                pause.style.display = "none";
                play.style.display = "block";

                //thumbnail.style.transform = "scale(1)";

                track.pause();
                playing = true;
            }

        }

        play.addEventListener("click", pausePlay);
        pause.addEventListener("click", pausePlay);

        function stoptrack() {
            playing = false;
            pausePlay();
            track.currentTime = 0;
        }
        stop.addEventListener("click", stoptrack);

        function back10() {
            track.currentTime = track.currentTime - 10;
        }
        back.addEventListener("click", back10);

        function forward10() {
            //var currentTime = HTMLMediaElement.currentTime + 10 ;
            track.currentTime += 10;
        }
        forward.addEventListener("click", forward10);

        function progressValue() {
            progressBar.max = track.duration;
            progressBar.value = track.currentTime;

            currentTime.textContent = formatTime(track.currentTime);
            if (Number.isNaN(track.duration)) {
                durationTime.textContent = "--:--";
            } else {
                durationTime.textContent = formatTime(track.duration);
            }
            if(track.currentTime == track.duration) {
                stoptrack();
            }
        }


        function formatTime(sec) {
            let hours =  Math.floor(sec / 60 / 60);
            let minutes = 0;
            if(hours > 0)
                minutes = Math.floor(sec - hours * 60 * 60);
            else
                minutes = Math.floor(sec / 60);
            let seconds = Math.floor(sec - minutes * 60);
            if (seconds < 10) {
                seconds = `0${seconds}`;
            }
            if (minutes < 10) {
                minutes = `0${minutes}`;
            }
            if (hours < 10) {
                hours = `0${hours}`;
            }
            if(hours > 0)
                return `${hours}:${minutes}:${seconds}`;
            return `${minutes}:${seconds}`;
        }

        function changeProgressBar() {
            track.currentTime = progressBar.value;
        }

        progressBar.addEventListener("click", changeProgressBar);

    </script>
@endsection