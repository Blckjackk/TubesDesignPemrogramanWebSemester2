@extends('layouts.main')

@section('judul-1')
    Review
@endsection

@section('judul-2')
    Customer    
@endsection

@section('content')

<div style="padding: 50px;"></div>

<div class="container mb-5">

    <div>
        <a href="{{ route('review.create') }}" class="btn btn-primary">Tambahkan Ulasan</a>
        <br> <br>
    </div>

    @foreach ($data as $item)

        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="assets/images/user-profile/user.jpg" style="width: 100px; height: 100px;" class="img-fluid rounded-start" alt="Foto Profil">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_pelanggan }}</h5>
                        <p class="card-text">{{ $item->testimoni_content }}</p>
                        @if (Auth::check() && Auth::user()->is_admin)
                            <form action="{{ route('review.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">Hapus</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div style="padding: 10px;"></div>
    @endforeach

</div>

@endsection