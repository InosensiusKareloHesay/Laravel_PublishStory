@extends('laravel.master2')

@section('header-img')
<div class="tm-welcome-container tm-fixed-header tm-fixed-header-1">
</div>
@endsection

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-lg-12">
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="#tabs-all">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#tabs-horror">Horror</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#tabs-fantasy">Fantasy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#tabs-drama">Drama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#tabs-fan-fiction">Fan-Fiction</a>
                </li>
            </ul>
        </div>
        <div class="mt-5 card shadow">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-all">
                        <div class="row p-3 ml-5">
                            @foreach ($cerita as $item)
                                <div class="card mt-3 mr-3 mb-3" style="width: 30%;">
                                    <img class="card-img-top img-fluid" src="{{asset('/img/uploads/' . $item->cover)}}">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$item->judul}}</h4>
                                        <p class="card-text">{{$item->dekripsi}}</p>
                                        <a href="/cerita/read/{{$item->id}}" class="btn-primary stretched-link btn-lg center-block">Read</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="tabs-horror">
                        <div class="row p-3 ml-5">
                            @foreach ($cerita->where('id_genre', 1) as $item)
                                <div class="card mt-3 mr-3 mb-3" style="width: 30%;">
                                    <img class="card-img-top img-fluid" src="{{asset('/img/uploads/' . $item->cover)}}">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$item->judul}}</h4>
                                        <p class="card-text">{{$item->dekripsi}}</p>
                                        <a href="/cerita/read/{{$item->id}}" class="btn-primary stretched-link btn-lg center-block">Read</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tabs-fantasy">
                        <div class="row p-3 ml-5">
                            @foreach ($cerita->where('id_genre', 2) as $item)
                                <div class="card mt-3 mr-3 mb-3" style="width: 30%;">
                                    <img class="card-img-top img-fluid" src="{{asset('/img/uploads/' . $item->cover)}}">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$item->judul}}</h4>
                                        <p class="card-text">{{$item->dekripsi}}</p>
                                        <a href="/cerita/read/{{$item->id}}" class="btn-primary stretched-link btn-lg center-block">Read</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tabs-drama">
                        <div class="row p-3 ml-5">
                            @foreach ($cerita->where('id_genre', 3) as $item)
                                <div class="card mt-3 mr-3 mb-3" style="width: 30%;">
                                    <img class="card-img-top img-fluid" src="{{asset('/img/uploads/' . $item->cover)}}">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$item->judul}}</h4>
                                        <p class="card-text">{{$item->dekripsi}}</p>
                                        <a href="/cerita/read/{{$item->id}}" class="btn-primary stretched-link btn-lg center-block">Read</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tabs-fan-fiction">
                        <div class="row p-3 ml-5">
                            @foreach ($cerita->where('id_genre', 4) as $item)
                                <div class="card mt-3 mr-3 mb-3" style="width: 30%;">
                                    <img class="card-img-top img-fluid" src="{{asset('/img/uploads/' . $item->cover)}}">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$item->judul}}</h4>
                                        <p class="card-text">{{$item->dekripsi}}</p>
                                        <a href="/cerita/read/{{$item->id}}" class="btn-primary stretched-link btn-lg center-block">Read</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection