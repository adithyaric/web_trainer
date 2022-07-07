<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::latest()->paginate(10);
        return view('admin.post.index', compact('post'));
    }

    public function create()
    {
        $kategori = Category::get();
        return view('admin.post.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sampul' => 'required|mimes:jpg,jpeg,png',
            'konten' => 'required',
            'kategori' => 'required',
        ]);

        $sampul = time() . '-' . $request->sampul->getClientOriginalName();
        $request->sampul->move('upload/post', $sampul);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'sampul' => $sampul,
            'excerpt' => Str::limit(strip_tags($request->konten), 200, '...'),
            'konten' => $request->konten,
            'category_id' => $request->kategori,
            'user_id' => Auth::user()->id,
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        ');

        return redirect('/post');

    }

    public function show($id)
    {
        $post = Post::whereId($id)->firstOrFail();
        return view('admin.post.show', compact('post'));

    }

    public function edit($id)
    {
        $kategori = Category::get();
        $post = Post::whereId($id)->firstOrFail();
        return view('admin.post.edit', compact('post', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'sampul' => 'required|mimes:jpg,jpeg,png',
            'konten' => 'required',
            'kategori' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'konten' => $request->konten,
            'category_id' => $request->kategori,
            'excerpt' => Str::limit(strip_tags($request->konten), 200, '...'),
            'slug' => Str::slug($request->title, '-'),
        ];

        $post = Post::select('sampul', 'id')->whereId($id)->first();
        if ($request->sampul) {
            File::delete('upload/post/' . $post->sampul);

            $sampul = time() . '-' . $request->sampul->getClientOriginalName();
            $request->sampul->move('upload/post', $sampul);

            $data['sampul'] = $sampul;
        }

        $post->update($data);

        $request->session()->flash('sukses', '
            <div class="alert alert-warning" role="alert">
                Data berhasil diubah
            </div>
        ');

        return redirect('/post');

    }

    public function destroy(Request $request, $id)
    {
        $post = Post::select('sampul', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/post/' . $post->sampul);
        $post->delete();

        $request->session()->flash('sukses', '
            <div class="alert alert-danger" role="alert">
                Data berhasil dihapus
            </div>
        ');

        return redirect('/post');

    }
}
