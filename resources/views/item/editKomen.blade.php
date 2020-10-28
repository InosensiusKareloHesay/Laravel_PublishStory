@extends('laravel.master2')

@section('header-img')
<div class="tm-welcome-container tm-fixed-header tm-fixed-header-5">
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Edit Komentar</h1>
        </div>
        <div class="mt-2 card shadow">
            <div class="card-body">
                <form action="/komentar/update/{{$komentar->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="post clearfix">
                        <div class="user-block">
                            <span class="username">
                                <a href="/cerita/read/{{$cerita->id}}">{{$cerita->judul}}</a>
                            </span>
                            <span class="description"> - You comment</span>
                        </div>
                        <textarea class="form-control" name="isi">{{$komentar->isi}}</textarea>
                        @error('komen')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-2 input-group-append">
                        <button class="btn btn-warning btn-sm" onclick="goBack()">Back</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('back')
    <script>
        function goBack(){
            window.history.back();
        }
    </script>
@endpush