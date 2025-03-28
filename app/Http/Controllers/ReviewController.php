<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {

        $data = Testimoni::join('pelanggan', 'pelanggan.id', '=', 'testimoni.id_user')
            ->select('pelanggan.name as nama_pelanggan', 'testimoni.content as testimoni_content', 'testimoni.id as id')
            ->get();

        return view('pages.review', compact('data'));
    }

    public function tampilan()
    {

        $data = Testimoni::join('pelanggan', 'pelanggan.id', '=', 'testimoni.id_user')
            ->select('pelanggan.name as nama_pelanggan', 'testimoni.content as testimoni_content')
            ->get();

        return view('pages.review', compact('data'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'content' => 'required',
            // Tambahkan validasi lainnya jika diperlukan
        ]);

        $review = new Testimoni();
        $review->id_user = $validatedData['user_id'];
        $review->content = $validatedData['content'];
        $review->save();

        return redirect()->route('pages.review')->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function show($id)
    {
        $review = Testimoni::findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = Testimoni::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'content' => 'required',
            // Tambahkan validasi lainnya jika diperlukan
        ]);

        $review = Testimoni::findOrFail($id);
        $review->id_user = $validatedData['user_id'];
        $review->content = $validatedData['content'];
        $review->save();

        return redirect()->route('pages.review')->with('success', 'Ulasan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $review = Testimoni::findOrFail($id);
        $review->delete();

        return redirect()->route('pages.review')->with('success', 'Ulasan berhasil dihapus');
    }
}
