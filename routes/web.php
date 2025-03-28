<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TasGunungController;
use App\Http\Controllers\SepatuGunungController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk Login user bang
Route::get('login', [LoginController::class, 'viewlogin'])->name('view.login');

Route::post('login', [LoginController::class, 'authenticate'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Route untuk Logout bang

Route::post('/login', [LoginController::class, 'authenticate'])->name('login'); // Route untuk login

Route::post('/register', [LoginController::class, 'Register'])->name('register'); // Route untuk registrasi

// Route untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/profil', [LoginController::class, 'viewProfil'])->name('view.profil');
Route::get('/profil/edit', [LoginController::class, 'editProfilForm'])->name('edit.profil.form');
Route::put('/profil/update/{id}', [LoginController::class, 'updateProfil'])->name('update.profil');

Route::get('/', [MainController::class, 'home'])->name('pages.home');
Route::get('/product', [MainController::class, 'product'])->name('pages.product');
Route::get('/product/{id}', [MainController::class, 'showProduct'])->name('product.show');

// !!!CRUD bagian Product
Route::post('/product', [ProductController::class, 'storeProduct'])->name('product.store');
Route::get('/product/tambah/product', [ProductController::class, 'createProduct'])->name('product.create');
Route::get('/product/{id}/edit', [ProductController::class, 'editProduct'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'updateProduct'])->name('product.update');
Route::get('/product/{id}/delete', [ProductController::class, 'deleteProduct'])->name('product.delete');
Route::delete('/product/{id}', [ProductController::class, 'destroyProduct'])->name('product.destroy');
Route::post('/product/{id}/rental', [MainController::class, 'storeRental'])->name('product.rental.store');
// !!!ENDCRUD bagian Product

// !!!CRUD bagian Review Ulasan
Route::get('/review', [ReviewController::class, 'index'])->name('pages.review');
Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
Route::get('/review/{id}', [ReviewController::class, 'show'])->name('review.show');
Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
Route::put('/review/{id}', [ReviewController::class, 'update'])->name('review.update');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

// !!!CRUD bagian Review
Route::get('/about-us', function () {
    return view('pages.aboutUs');
})->name('pages.aboutUs');
// !!!ENDCRUD bagian Review

Route::get('/myshooping', [MainController::class, 'shooping'])->name('pages.myshooping');

Route::get('/bookings/{id}', [TransactionController::class, 'edit'])->name('edit.booking');
Route::put('/bookings/{id}', [TransactionController::class, 'transaksi'])->name('update.booking');
Route::delete('/booking/{id}', [TransactionController::class, 'hapusBooking'])->name('hapus.booking');
