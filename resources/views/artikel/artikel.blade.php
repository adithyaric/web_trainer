@extends('artikel/template/base')

@section('header_content')
    <h1>{{ __('Post') }}</h1>

    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Post</a></div>
    </div>
@endsection
@section('content')
    <div class="card mt-4 shadow-sm">
        <img src="/upload/post/{{ $artikel->sampul }}" height="400px" class="card-img-top" alt="...">
        <div class="card-body">
            <h3 class="card-title">{{ $artikel->title }}</h3>
            <small class="card-text">
                <span class="text-muted"><a
                        href="/artikel-kategori/{{ $artikel->category->slug }}">{{ $artikel->category->name }}</a></span>
                -
                <span class="text-muted">{{ $artikel->created_at->diffForHumans() }}</span>
                -
            </small>
            <br>
            <p class="card-text">{!! $artikel->konten !!}</p>
        </div>
    </div>
@endsection
