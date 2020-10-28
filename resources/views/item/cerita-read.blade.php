@extends('laravel.master2')

@section('header-img')
<div class="tm-welcome-container tm-fixed-header tm-fixed-header-2">
</div>
@endsection

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-lg-12">
        <h1 style="text-align: center;">{{ $cerita->judul }}</h1>
        <p style="text-align: center;">{{ $cerita->genre->nama }}</p>
        <div class="mt-5 mb-5 card shadow">
            <div class="card-body p-3 ml-5">
                {{($cerita->isi)}}
                <br>
                <br>
                Penulis: {{ $cerita->user->name }}
            </div>
        </div>
        <a href="/download/{{$cerita->id}}" type="submit" class="btn-primary btn-sm" style="color:white">Download Cerita</a>
        <div class="mt-5 mb-2 card shadow">
            <div class="card-body p-3 ml-2">
                <P>Add Comment</P>
                <form action="/komentar" method="GET">
                    @csrf
                    <input type="hidden" value="{{Auth::user()->id}}" name="user">
                    <input type="hidden" value="{{$cerita->id}}" name="cerita">
                    <div class="input-group input-group-sm mb-0">
                        <input class="form-control form-control-sm" name="isi" placeholder="Comment">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body p-3 ml-2">
                @foreach ($komentar as $komen)
                <div class="post clearfix">
                    <div class="user-block">
                        <span class="username" style="color:gray">
                            {{$komen->user->pena}}
                        </span>
                        <span class="description"> - Sent you a comment</span>
                    </div>
                    <input type="text" class="form-control mb-2" id="1" value="{{$komen->isi}}" disabled>
                    @if ($id==$komen->id_user)
                    <div class="input-group-append">
                        <a href="/komentar/edit/{{$komen->id}}" type="submit" class="btn-warning btn-sm" style="color:white">Edit</a>
                        &nbsp;&nbsp;&nbsp;
                        <form action="/komentar/delete/{{$komen->id}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
                <hr />
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection