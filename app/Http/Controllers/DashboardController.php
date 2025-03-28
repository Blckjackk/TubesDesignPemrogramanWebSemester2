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
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
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
}
