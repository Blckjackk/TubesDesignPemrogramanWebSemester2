<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function viewProfil()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the data of the authenticated user only
        $userData = Pelanggan::where('id', $user->id)->first();

        return view('profil.main-profil', compact('userData'));
    }

    public function viewlogin()
    {
        return view('main-layout.login');
    }

    public function viewregister()
    {
        return view('main-layout.register'); // Pastikan view register ada dan berbeda dengan login
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info('Attempting login with credentials:', $credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        Log::warning('Login failed for credentials:', $credentials);
        return back()->withErrors(['loginError' => 'Login failed!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function Register(Request $request)
    {
        // Mencatat bahwa metode Register telah dipanggil
        Log::info('Masuk ke metode Register');

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Mencatat data yang telah divalidasi
        Log::info('Data validasi:', $validatedData);

        // Buat data Pelanggan baru
        $pelanggan = new Pelanggan();
        $pelanggan->name = $validatedData['name'];
        $pelanggan->email = $validatedData['email'];
        $pelanggan->password = Hash::make($validatedData['password']); // Hash password
        $pelanggan->foto = "default.jpg";
        $pelanggan->save();

        // Mencatat bahwa data Pelanggan telah disimpan
        Log::info('Data Pelanggan disimpan:', ['pelanggan' => $pelanggan]);

        // Buat data User baru
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']); // Hash password
        $user->save();

        // Mencatat bahwa data User telah disimpan
        Log::info('Data User disimpan:', ['user' => $user]);

        return redirect()->route('view.login')->with('success', 'Anda adalah Pelanggan Baru');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Cek kredensial dan autentikasi pengguna
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            $request->session()->regenerate();
            return redirect()->route('pages.home')->with('success', 'Anda berhasil login.');
        }

        return back()->withErrors(['loginError' => 'Login failed!']);
    }

    public function updateProfil(Request $request)
    {
        // Retrieve the authenticated user based on the Pelanggan model
        $user = Pelanggan::find(auth()->user()->id);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'desc' => 'required|string',
            'harapan' => 'required|string',
            'foto' => 'max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($user->foto) {
                Storage::delete('assets/img/User/' . $user->foto);
            }

            // Store uploaded photo
            $foto = $request->file('foto');
            $fotoName = Str::random(20) . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('assets/img/User', $fotoName);

            $user->foto = $fotoName;
        }

        // Manually update other profile information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->desc = $request->desc;
        $user->harapan = $request->harapan;
        // Add other attributes as needed
        $user->save();

        return redirect()->route('view.profil')->with('success', 'Profile updated successfully!');
    }

    public function editProfilForm()
    {
        // Retrieve the authenticated user
        $user = Pelanggan::find(auth()->user()->id);

        // Pass the user data to the view
        return view('profil.update_profil', compact('user'));
    }
}
