<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerekController extends Controller
{
    //
    public function index()
    {
        $merek = Merek::all();
        return view('merek.viewData', compact('merek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('products.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'desc' => 'required|string',
    //         'price' => 'required|numeric',
    //         'stok' => 'required|integer',
    //         'jenis' => 'required|string|in:Sepatu,Tas',
    //         'id_merek' => 'required|exists:mereks,id',
    //     ]);

    //     $product = new Merek();
    //     $product->name = $validatedData['name'];
    //     $product->desc = $validatedData['desc'];
    //     $product->price = $validatedData['price'];
    //     $product->stok = $validatedData['stok'];
    //     $product->jenis = $validatedData['jenis'];
    //     $product->id_merek = $validatedData['id_merek'];
    //     $product->save();

    //     return redirect()->route('products.index')->with('success', 'Product created successfully.');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Merek $product)
    // {
    //     return view('products.show', compact('product'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Merek $product)
    // {
    //     return view('products.edit', compact('product'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Merek $product)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'desc' => 'required|string',
    //         'price' => 'required|numeric',
    //         'stok' => 'required|integer',
    //         'jenis' => 'required|string|in:Sepatu,Tas',
    //         'id_merek' => 'required|exists:mereks,id',
    //     ]);

    //     $product->name = $validatedData['name'];
    //     $product->desc = $validatedData['desc'];
    //     $product->price = $validatedData['price'];
    //     $product->stok = $validatedData['stok'];
    //     $product->jenis = $validatedData['jenis'];
    //     $product->id_merek = $validatedData['id_merek'];
    //     $product->save();

    //     return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Merek $product)
    // {
    //     $product->delete();
    //     return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    // }
}
