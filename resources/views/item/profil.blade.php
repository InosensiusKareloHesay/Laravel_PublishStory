@extends('laravel.master2')

@section('header-img')
<div class="tm-welcome-container tm-fixed-header tm-fixed-header-5">
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="mt-5 nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="#my-profil">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#edit-profil">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#my-comments">My Comments</a>
                </li>
            </ul>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <div class="mt-5 card shadow">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active text-center mt-1" id="my-profil">
                        <h1><strong>{{Auth::user()->name}}</strong></h1>
                        <div class="h5 font-weight-500">{{Auth::user()->pena}}</div>

                        <hr>
                        <h3>My Story</h3>
                        <div class="row p-3 ml-5">
                            @foreach ($cerita as $item)
                            <div class="card mt-3 mr-3 mb-3" style="width: 30%;">
                                <img class="card-img-top img-fluid" src="{{asset('/img/uploads/' . $item->cover)}}">
                                <div class="card-body">
                                    <h4 class="card-title">{{$item->judul}}</h4>
                                    <p class="card-text">{{$item->dekripsi}}</p>
                                    <div class="d-flex justify-content-center">
                                        <table>
                                            <thead>
                                                <th rowspan="3"></th>
                                            </thead>

                                            <td><a href="/cerita/read/{{$item->id}}" class="btn btn-outline-primary"><i class="fas fa-book"></i></a></td>
                                            <td><a href="/cerita/edit/{{$item->id}}" class="btn btn-outline-success"><i class="fas fa-edit"></i></a></td>
                                            <td>
                                                <form method="POST" action="/cerita/delete/{{$item->id}}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="tab-pane fade mt-1" id="edit-profil">
                        <form action="/profil/update/{{Auth::user()->id}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Fullname" value="{{Auth::user()->name}}">
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penname">Nama Pena</label>
                                <input type="text" class="form-control" name="penname" placeholder="Penname" value="{{Auth::user()->pena}}">
                                @error('penname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{Auth::user()->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Penname" value="{{Auth::user()->password}}">
                                @error('penname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-md">Update</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade mt-1" id="my-comments">
                        @foreach ($komentar as $comm)
                        <div class="post clearfix">
                            <div class="user-block">
                                <span class="username">
                                    <a href="/cerita/read/{{$comm->cerita->id}}">{{$comm->cerita->judul}}</a>
                                </span>
                                <span class="description"> - You commented</span>
                            </div>
                            <p>
                                {{$comm->isi}}
                            </p>
                            <div class="input-group-append">
                                <a href="/komentar/edit/{{$comm->id}}" class="btn btn-outline-success btn-sm">Edit</a>
                                &nbsp;&nbsp;&nbsp;
                                <form action="/komentar/delete/{{$comm->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>

                            </div>
                        </div>
                        <hr />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection