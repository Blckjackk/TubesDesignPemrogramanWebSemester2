@extends('layouts.main')


@section('judul-1')
    My
@endsection
@section('judul-2')
    Shooping
@endsection

@section('content')
<!--blog start -->
<section id="blog" class="blog" >
    <div class="container">
        <div class="section-header">
            <h2>Barang barang yang anda sewakan</h2>
            <p>Sewa dan nikmati barangnya, jangan lupa di kembalikan ehhehehe</p>
        </div><!--/.section-header-->
        <div class="blog-content">
            <div class="row">
                
                @foreach ($rentals as $item)
                  <div class="col-md-4 col-sm-6">
                    <div class="single-blog-item">
                        <div class="single-blog-item-img">
                            <img src="{{ asset('assets/img/Product/' . $item->foto) }}" alt="blog image">
                        </div>
                        <div class="single-blog-item-txt">
                            <h2><a href="#">{{ $item->product_name }}</a></h2>
                            <h4>Rental <span>From</span> <a href="#">{{ $item->rental_date }}</a>Rental Sampai <a href="#">After 7 hari</a></h4>
                            <p>
                              descripsi
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </div><!--/.container-->

    <div class="section-header">
        <h2>Rekap Penyewaan</h2>

        @if (Auth::user()->is_admin)
            <p>Rekap semua barang peminjaman</p>
        @else
            <p>Rekap semua barang Anda</p>
        @endif
    </div><!--/.section-header-->
    
    
    <div class="container">
        <div class="card" style="border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); overflow: hidden;">

            
            <div class="card-body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0" style="border-collapse: separate; border-spacing: 0 10px;">
                        <thead style="background-color: #343a40; color: white;">
                            <tr>
                                <th style="text-align: center; vertical-align: middle; padding: 15px; border: none;">Nama Pelanggan</th>
                                <th style="text-align: center; vertical-align: middle; padding: 15px; border: none;">Ulasan</th>
                                <th style="text-align: center; vertical-align: middle; padding: 15px; border: none;">Tanggal</th>
                                <th style="text-align: center; vertical-align: middle; padding: 15px; border: none;">status</th>
                                <th style="text-align: center; vertical-align: middle; padding: 15px; border: none;"></th>
                                <th style="text-align: center; vertical-align: middle; padding: 15px; border: none;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentaltable as $item)
                                <tr style="background-color: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); transition: transform 0.2s ease-in-out;">
                                    <td style="display: flex; align-items: center; padding: 15px; border: none;">
                                        <img src="assets/img/User/{{ $item->pelanggan_foto }}" alt="Foto" style="border-radius: 50%; margin-right: 10px; width: 40px; height: 40px;">
                                        <span>{{ $item->pelanggan_name }}</span>
                                    </td>
                                    <td style="vertical-align: middle; padding: 15px; border: none;">{{ $item->product_name }}</td>
                                    <td style="vertical-align: middle; padding: 15px; border: none;">{{ $item->rental_date }}</td>
                                    <td style="vertical-align: middle; padding: 15px; border: none;">{{ $item->status }}</td>
                                    <td style="vertical-align: middle; padding: 15px; border: none;">
                                        @if ($item->status == 'Di Booking')                                        
                                        <a href="{{ route('edit.booking', $item->id) }}">Bayar</a>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle; padding: 15px; border: none;">
                                        @if ($item->status == 'Di Booking')                                        
                                        <form id="deleteForm-{{ $item->id }}" action="{{ route('hapus.booking', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('deleteForm-{{ $item->id }}').submit();">Hapus</a>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <!-- Add hover effect and improved spacing -->
        <style>
            .table tbody tr:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        </style>
    </div>
    
    
</section><!--/.blog-->
<!--blog end -->
@endsection