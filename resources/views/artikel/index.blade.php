@extends('artikel/template/base')
@isset($kategori_dipilih)
    @section('title')
        Kategori : {{$kategori_dipilih->nama}}
    @endsection
    @section('kategori', 'active')
@endisset

@section('content')
<div class="row mt-4">
    @foreach ($artikel as $row)
        <div class="col-md-4 mt-5">
            <div class="card shadow-sm">
                <a href="/{{ $row->slug }}"><img src="/upload/post/{{ $row->sampul }}" class="card-img-top"
                        alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title">{{ $row->title }}</h5>
                    <p class="card-text"><small
                            class="text-muted">{{ $row->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection