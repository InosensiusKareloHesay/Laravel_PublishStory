@extends('laravel.master2')
@push('tinymce')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector:'#isi',
            width: 700,
            height: 300
        });
    </script>
@endpush

@section('header-img')
<div class="tm-welcome-container tm-fixed-header tm-fixed-header-5">
        <img src="{{asset('img/4.jpg')}}" style="height:100%;">
</div>
@endsection


@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Create Your Own Story</h1>
    <p class="lead">Starts Here</p>
</div>

<div class="row justify-content-md-center"> 
    <div class="card col-9">
        <div class="card-body">
            <form action="/cerita" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{Auth::user()->id}}" name="user">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>       
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="genre">Genre</label><br>
                        <select class="form-control" name="genre">
                            <option value="" disabled selected>Choose One </option>
                            @foreach ($genre as $item)
                                <option value="{{$item->id}}">
                                    {{$item->nama}}
                                </option>
                            @endforeach
                        </select>
                        @error('genre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cover">Cover</label>
                        <input type="file" name="cover" class="form-control-file" accept="image/*">
                        @error('cover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  

                <div class="form-group">
                    <label for="dekripsi">Dekripsi</label>
                    <textarea class="form-control" name="dekripsi" rows="4"></textarea>
                    @error('dekripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="isi">Isi</label>
                    <textarea class="form-control" id="isi" name="isi"></textarea>
                    @error('isi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-sm">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
