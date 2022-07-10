<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index()
    {
        request()->session()->forget('search');
        if (request()->search) {
            $artikel = Post::select('sampul', 'title', 'slug', 'created_at')->where('title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(6);

            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Post yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $artikel = Post::select('sampul', 'title', 'slug', 'created_at')->latest()->paginate(6);
            $search = '';
        }

        $kategori = Category::select('slug', 'name')->orderBy('name', 'asc')->get();
        $home = true;
        return view('artikel/index', compact('artikel', 'kategori', 'home', 'search'));
    }

    public function artikel($slug)
    {
        $artikel = Post::select('id', 'title', 'konten', 'category_id', 'created_at', 'sampul')->where('slug', $slug)->firstOrFail();
        $kategori = Category::select('slug', 'name')->orderBy('name', 'asc')->get();
        return view('artikel/artikel', compact('artikel', 'kategori'));
    }

    public function kategori($slug)
    {
        $kategori = Category::select('id')->where('slug', $slug)->firstOrFail();

        request()->session()->forget('search');
        if (request()->search) {
            $artikel = Post::select('sampul', 'title', 'slug', 'created_at')->where('category_id', $kategori->id)->where('title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(6);
            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Post yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $artikel = Post::select('sampul', 'title', 'slug', 'created_at')->where('category_id', $kategori->id)->latest()->paginate(6);
            $search = '';
        }

        $kategori = Category::select('slug', 'name')->orderBy('name', 'asc')->get();
        $kategori_dipilih = Category::select('name', 'slug')->where('slug', $slug)->firstOrFail();        
        return view('artikel/index', compact('artikel', 'kategori', 'kategori_dipilih', 'search'));
    }
}
