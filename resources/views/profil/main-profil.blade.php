@extends('layouts.main')
@section('judul-1')
    Profil
@endsection

@section('judul-2')
    Pages
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #FF7D29; color: white; padding: 15px; font-size: 18px; font-weight: bold; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    {{ __('Profile Saya') }}
                </div>
                
                <div class="card-body" style="padding: 20px; border: 1px solid #ddd; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-top: none;">
                    <div class="row">
                        <div class="col-md-4" style="text-align: center;">
                            <img src="{{ asset('assets/img/User/default.jpeg') }}" class="img-fluid rounded-circle mb-3" alt="Profile Picture" style="width: 100%; max-width: 150px;">

                        </div>
                        <div class="col-md-8" style="padding-left: 20px;">
                            <h4 style="margin-bottom: 10px;">{{ $userData->name }}</h4>
                            <p class="text-muted" style="margin-bottom: 10px;">{{ $userData->email }}</p>
                            <hr style="border-top: 1px solid #ccc; margin: 20px 0;">
                            <p style="margin-bottom: 20px;">{{ $userData->desc }}</p>
                            <hr style="border-top: 1px solid #ccc; margin: 20px 0;">
                            <p style="margin-bottom: 20px;">{{ $userData->harapan}}</p>
                            <a href="{{ route('edit.profil.form') }}" class="btn btn-primary" style="background-color: #FF7D29; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-decoration: none;">Edit Profile</a>
                        </div>
                    </div>
                </div>
                
                
                

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            <button type="button" class="pt-10" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                style="background-color: #FF7D29; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin: 10px;">
                Logout
            </button>


            
        </div>
    </div>
</div>

@endsection
