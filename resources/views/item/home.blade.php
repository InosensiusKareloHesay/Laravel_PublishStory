@extends('laravel.master')

@section('content')
<div class="tm-welcome-container text-center text-white">
    <div class="tm-welcome-container-inner" style="margin-top:0px;">
        <img class="card-img-top" src="{{asset('/img/logooo.png')}}" style="height:70%; width: 50%;">
        <!-- <h1 class="tm-welcome-text mb-4 text-white">CATATAN KECIL</h1> -->
        <p class="tm-welcome-text mb-2 text-white"></p>
        <a href="/cerita" class="btn tm-btn-animate tm-btn-cta tm-icon-down">
            <span><i class="fas fa-book-open"></i>
                <tr>&nbsp;&nbsp;Start Reading
            </span>
        </a>
        <a href="/cerita/create" class="btn tm-btn-animate tm-btn-cta tm-icon-down ml-2">
            <span><i class="fas fa-pen-alt"></i>&nbsp;&nbsp;Start Writing</span>
        </a>
    </div>
</div>
@endsection

@section('bg-vidio')
<div id="tm-video-container">
    <video autoplay muted loop id="tm-video">
        <!-- <source src="video/sunset-timelapse-video.mp4" type="video/mp4"> -->
        <source src="{{asset('video/book.mp4')}}" type="video/mp4">
    </video>
</div>

<i id="tm-video-control-button" class="fas fa-pause"></i>
@endsection