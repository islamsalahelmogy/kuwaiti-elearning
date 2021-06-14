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
        @foreach ($levels as $level)
            <a class="square my-8 mx-10" href="{{ route('home.topics',['levelId' => $level->id]) }}">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>

                <div class="content">		
                    <h2>
                        {{ $level->name }}
                    </h2>
                </div>
            </a>
        @endforeach
        
    </div>
@endsection