<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Kategori Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kategori</a></div>
            <div class="breadcrumb-item"><a href="">Buat Kategori Baru</a></div>
        </div>
    </x-slot>

    {{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kategori</h1>

    <a href="/kategori/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kategori</a>

    @if ($kategori[0])
        {{-- table --}}
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $row)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->slug }}</td>
                        <td width="20%">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/kategori/{{ $row->id }}/edit" class="btn btn-primary mr-1"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <form action="/kategori/{{ $row->id }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $kategori->links() }}
    @endif
</x-app-layout>
