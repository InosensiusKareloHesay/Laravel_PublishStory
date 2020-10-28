@extends('laravel.master2')
@push('tinymce')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            cleanup: true,
            selector:'#isi',
            width: 700,
            height: 300
        });
    </script>
@endpush

@section('header-img')
<div class="tm-welcome-container tm-fixed-header tm-fixed-header-4">
</div>
@endsection


@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Edit Your Story</h1>
    <p class="lead">{{$cerita->judul}}</p>
</div>

<div class="row justify-content-md-center"> 
    <div class="card col-9">
        <div class="card-body">
        <form action="/cerita/edit/{{$cerita->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <input type="hidden" value="{{Auth::user()->id}}" name="user">
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" value="{{$cerita->judul}}">
                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>       
                
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="genre">Genre</label><br>
                        <select name="genre" class="form-control">
                            <option readonly>Choose One</option>
                            @foreach ($genre as $gen)
                                @if ($cerita->id_genre == $gen->id)
                                    <option value="{{$cerita->id_genre}}" selected> {{$cerita->genre->nama}}</option>
                                @else
                                    <option value="{{$gen->id}}"> {{$gen->nama}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('genre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="cover">Cover</label>
                        <img class="card-img-top img-fluid" src="{{asset('/img/uploads/'. $cerita->cover)}} ">
                        <br>
                        <input type="file" name="cover" class="form-control-file" accept="image/*">

                        @error('cover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="dekripsi">Dekripsi</label>
                        <textarea class="form-control" name="dekripsi" rows="4">{{$cerita->dekripsi}}</textarea>
                        @error('dekripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="isi">Isi</label>
                        <textarea class="form-control" id="isi" name="isi">{{$cerita->isi}}</textarea>
                        @error('isi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Save Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
