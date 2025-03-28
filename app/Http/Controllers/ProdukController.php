<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Product::join('merek', 'product.id_merek', '=', 'merek.id')
            ->select('product.name', 'product.desc', 'product.price', 'product.stok')
            ->get();


        return view('product.allProductTest', compact('data'));
    }

    public function viewSepatu()
    {
        $data = Product::join('merek', 'product.id_merek', '=', 'merek.id')
            ->select('product.name', 'product.desc', 'product.price', 'product.stok')
            ->where('product.jenis', '=', 'Sepatu')
            ->get();

        return view('product.sepatuTest', compact('data'));
    }

    public function viewTas()
    {
        $data = Product::join('merek', 'product.id_merek', '=', 'merek.id')
            ->select('product.name', 'product.desc', 'product.price', 'product.stok')
            ->where('product.jenis', '=', 'Tas')
            ->get();

        return view('product.tasTest', compact('data'));
    }

    public function create()
    {
        $mereks = Merek::all();
        return view('product.createProduct', compact('mereks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'stok' => 'required|integer',
            'jenis' => 'required',
            'id_merek' => 'required'
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->desc = $validatedData['desc'];
        $product->price = $validatedData['price'];
        $product->stok = $validatedData['stok'];
        $product->jenis = $validatedData['jenis'];
        $product->id_merek = $validatedData['id_merek'];
        $product->save();

        return redirect()->route('index.view')->with('success', 'Product created successfully.');
    }
}
