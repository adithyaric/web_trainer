<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Post') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Post</a></div>
        </div>
    </x-slot>

    <a href="/post/{{ $post->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/post" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/post/{{ $post->sampul }}" height="450px" class="card-img-top" alt="...">
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
            <h2 class="card-title">{{ $post->category->name }}</h2>
            <p class="card-text">{!! $post->konten !!}</p>
            <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
        </div>
    </div>
</x-app-layout>
