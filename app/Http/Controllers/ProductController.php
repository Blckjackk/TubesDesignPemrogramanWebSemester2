<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function createProduct()
    {
        $mereks = Merek::all();
        // return dd($mereks);
        return view('product.create_product', compact('mereks'));
    }

    public function storeProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'stok' => 'required',
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
        $product->foto = "default.jpg";
        $product->save();

        return redirect()->route('product.store')->with('success', 'Product created successfully.');
    }

    public function editProduct(Request $request, $id)
    {
        // Mengambil data produk berdasarkan ID
        $product = Product::findOrFail($id);
        $mereks = Merek::all();

        // Menampilkan view edit dengan data produk
        return view('product.edit_product', compact('product', 'mereks'));
    }

    public function updateProduct(Request $request, $id)
    {
        // Validasi data yang dikirimkan dari form
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'jenis' => 'required',
            'id_merek' => 'required',
        ]);

        // Mengambil data produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Memperbarui data produk
        $product->name = $validatedData['name'];
        $product->desc = $validatedData['desc'];
        $product->price = $validatedData['price'];
        $product->stok = $validatedData['stok'];
        $product->jenis = $validatedData['jenis'];
        $product->id_merek = $validatedData['id_merek'];
        $product->foto = "default.jpg";
        $product->save();

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('product.store')->with('success', 'Product updated successfully');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('product.delete_product', compact('product'));
    }

    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('pages.product')->with('success', 'Product berhasil dihapus.');
    }
}
