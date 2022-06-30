<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Kategori') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="/kategori">Kategori</a></div>
        </div>
    </x-slot>

    <form action="/kategori/{{$kategori->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama">Kategori</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategori->name }}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/kategori" class="btn btn-secondary btn-sm">Kembali</a>
    </form>

</x-app-layout>
