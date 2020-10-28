@extends('laravel.master')
@push('tinymce')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#isi',
        width: 800,
        height: 300
    });
</script>
@endpush

@section('plusHome')
<li class="nav-item">
    <a class="nav-link tm-nav-link" href="/" style="color:white;font-weight: bold;"><i class="fas fa-home"></i> Home</a>
</li>
@endsection

@section('content')
<div class="tm-welcome-container text-center text-white">
    <div class="justify-content-center d-flex" style="border-radius:10px;">
        <div class="card tm-btn-cta" style="width:500px;" style="border-radius:50px;">
            <div class="card-body login-card-body">
                <p class="login-box-msg" style="color:white;">Register to PenFriends</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input placeholder="Nama Lengkap" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input placeholder="Nama Pena" id="pena" type="text" class="form-control @error('pena') is-invalid @enderror" name="pena" value="{{ old('pena') }}" required autocomplete="name" autofocus>

                        @error('pena')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center d-flex">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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