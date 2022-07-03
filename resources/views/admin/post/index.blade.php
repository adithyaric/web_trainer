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

    <a href="/post/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Post</a>

    @if ($post[0])
        {{-- table --}}
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $row)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="/upload/post/{{ $row->sampul }}" alt="" width="80px" height="80px">
                        </td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->category->name }}</td>
                        <td width="35%">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/post/{{ $row->id }}" class="btn btn-info btn-sm mr-1"><i
                                        class="fas fa-eye"></i> Detail</a>
                                <a href="/post/{{ $row->id }}/edit" class="btn btn-primary btn-sm mr-1"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <a href="/post/{{ $row->id }}/konfirmasi" class="btn btn-danger btn-sm mr-1"><i
                                        class="fas fa-trash"></i> Hapus</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $post->links() }}
    @endif
</x-app-layout>
