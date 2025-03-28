<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Rental;
use App\Models\Report;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Kerusakan;
use App\Models\Pelanggan;
use App\Models\Testimoni;
use App\Models\RentalItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home()
    {
        $pelanggan = Pelanggan::all();
        $merek = Merek::all();
        $products = Product::take(5)->get();
        $rental = Rental::all();
        $payment = Payment::all();
        $testimoni = Testimoni::join('pelanggan', 'testimoni.id_user', '=', 'pelanggan.id')
            ->select('pelanggan.name AS nama_pelanggan', 'testimoni.content AS content_testimoni')->get();
        $kerusakan = Kerusakan::all();
        $report = Report::all();
        return view('pages.home', compact('pelanggan', 'merek', 'products', 'rental', 'payment', 'testimoni', 'kerusakan', 'report'));
    }

    public function product()
    {
        $sepatu = Product::where('jenis', 'Sepatu')->get();
        $tas = Product::where('jenis', 'Tas')->get();

        return view('pages.product', compact('sepatu', 'tas'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        $user = auth()->user();

        return view('pages.singleProduct', compact('product', 'user'));
    }

    public function sewaProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.singleProduct', compact('product'));
    }

    public function storeRental(Request $request, $id)
    {
        $rental = new Rental();
        $rental->id_user = $request->user_id;
        $rental->id_product = $request->product_id;
        $rental->quantity = $request->quantity;
        $rental->price = $request->price;
        $rental->status = "Di Booking";
        $rental->rental_date = now();
        // Set return_date and status as required
        $rental->save();

        return redirect()->back()->with('success', 'Produk berhasil disewa.');
    }

    public function createProduct()
    {
        $mereks = Merek::all();
        return view('product.create_product', compact('mereks'));
    }

    public function shooping()
    {
        // Mendapatkan user yang sedang autentikasi
        $user = Auth::user();

        // Cek apakah user terautentikasi
        if ($user === null) {
            // Jika user tidak terautentikasi, arahkan ke halaman login atau tampilkan pesan error
            return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
        }

        // Mengambil data rental yang dimiliki oleh user
        $rentals = Rental::where('id_user', $user->id)->get();
        $rentals = DB::table('rental')
            ->join('product', 'rental.id_product', '=', 'product.id')
            ->where('rental.id_user', $user->id)
            ->select('rental.*', 'product.name as product_name', 'product.desc as product_desc', 'product.foto as foto')
            ->get();

        // Mengambil data rekap berdasarkan status is_admin
        if ($user->is_admin) {
            $rentaltable = DB::table('rental')
                ->join('product', 'rental.id_product', '=', 'product.id')
                ->join('pelanggan', 'rental.id_user', '=', 'pelanggan.id')
                ->select('product.name as product_name', 'product.price as product_price', 'product.foto as foto', 'pelanggan.name as pelanggan_name', 'pelanggan.foto as pelanggan_foto', 'rental.rental_date', 'rental.status as status', 'rental.id as id')
                ->get();
        } else {
            $rentaltable = DB::table('rental')
                ->join('product', 'rental.id_product', '=', 'product.id')
                ->join('pelanggan', 'rental.id_user', '=', 'pelanggan.id')
                ->where('rental.id_user', $user->id)
                ->select('product.name as product_name', 'product.price as product_price', 'product.foto as foto',  'pelanggan.name as pelanggan_name', 'pelanggan.foto as pelanggan_foto', 'rental.rental_date', 'rental.status as status', 'rental.id as id')
                ->get();
        }

        // Mengirim data rental dan rentaltable ke view 'pages.myshooping'
        return view('pages.myshooping', compact('rentals', 'rentaltable', 'user'));
    }
}
