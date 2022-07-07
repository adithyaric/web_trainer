<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Post') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Post</a></div>
        </div>
    </x-slot>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Post</h1>

    <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Post</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title') ? old('title') : $post->title }}">
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-2">
                <img src="/upload/post/{{ $post->sampul }}" width="100%" height="150px" class="mt-2"
                    alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="sampul">Sampul</label>
                    <input type="file" class="form-control" id="sampul" name="sampul"
                        value="{{ old('sampul') ? old('sampul') : $post->sampul }}">
                    @error('sampul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori">
                        <option selected disabled>Pilih Katgeori</option>
                        @foreach ($kategori as $row)
                            <option value="{{ $row->id }}"
                                {{ $row->id == $post->category_id ? 'selected' : '' }}>{{ $row->name }}</option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        @include('components.card-code-snippet')
        <div class="form-group">
            <label for="editor">Konten</label>
            <textarea class="form-control" id="editor" rows="10" name="konten">{{ old('konten') ? old('konten') : $post->konten }}</textarea>
            @error('konten')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/post" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
    @section('ck-editor')
        @include('ckeditor/setting')
    @endsection
</x-app-layout>
