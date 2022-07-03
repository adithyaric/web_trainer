<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
