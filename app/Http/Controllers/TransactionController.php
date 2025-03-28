<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Rental;

class TransactionController extends Controller
{
    public function edit($id)
    {
        // Mengambil data booking berdasarkan ID
        $booking = DB::table('rental')
            ->join('product', 'rental.id_product', '=', 'product.id')
            ->join('pelanggan', 'rental.id_user', '=', 'pelanggan.id')
            ->select('rental.id as id', 'rental.rental_date', 'rental.status', 'product.name as product_name', 'pelanggan.name as customer_name', 'pelanggan.foto')
            ->where('rental.id', $id) // Filter berdasarkan ID
            ->first(); // Mengambil hanya satu objek

        // Mengirim data booking dan transaksi ke view
        return view('transaction.edit', compact('booking'));
    }

    public function transaksi(Request $request, $id)
    {
        // Debugging: Tampilkan semua data request
        Log::info('Request data: ', $request->all());

        // Validasi input jika diperlukan
        $validated = $request->validate([
            'status' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Temukan rental berdasarkan ID
        $rental = Rental::find($id);

        if (!$rental) {
            Log::error('Rental not found for ID: ' . $id);
            return redirect()->route('pages.myshooping')->with('error', 'Rental not found.');
        }

        // Cek apakah atribut status telah diisi dengan benar
        $rental->status = $request->status;

        // Simpan perubahan
        if (!$rental->save()) {
            Log::error('Failed to update rental status for ID: ' . $id);
            return redirect()->route('pages.myshooping')->with('error', 'Failed to update rental status.');
        }

        // Redirect atau kembalikan respon sesuai kebutuhan
        return redirect()->route('pages.myshooping')->with('success', 'Booking updated successfully.');
    }

    public function hapusBooking($id)
    {
        // Cari rental berdasarkan ID
        $rental = Rental::find($id);

        if (!$rental) {
            // Jika rental tidak ditemukan, kembalikan response error
            return redirect()->route('pages.myshooping')->with('error', 'Rental not found.');
        }

        // Hapus rental
        $rental->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('pages.myshooping')->with('success', 'Rental deleted successfully.');
    }
}
