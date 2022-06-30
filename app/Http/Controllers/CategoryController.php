<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Category::latest()->paginate(10);

        return view('admin/category/index', compact('kategori'));
    }

    public function create()
    {
        return view('admin/category/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Category::create([
            'name' => Str::title($request->nama),
            'slug' => Str::slug($request->nama, '-'),
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        ');
        return redirect('/kategori');
    }

    public function edit($id)
    {
        $kategori = Category::whereId($id)->first();

        return view('admin/category/edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Category::whereId($id)->update([
            'name' => Str::title($request->nama),
            'slug' => Str::slug($request->nama, '-'),
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');
        return redirect('/kategori');
    }

    public function destroy(Request $request, $id)
    {
        Category::whereId($id)->delete();

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/kategori');
    }
}
