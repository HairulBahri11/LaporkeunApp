<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{

    public function login_index()
    {
        return view('login');
    }

    public function register_index()
    {
        return view('register');
    }
    public function login(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // //check validation
        // if ($validasi->fails()) {
        //     return redirect('/registrasi')->with('error', 'Email dan Password Wajib Di isi ');
        // }


        //check credentials
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return redirect('/login')->with('error', 'Email dan Password Salah');
        }
        //get user5
        $user = User::where('email', $request->email)->get();

        return redirect('/home')->with('success', 'Login Berhasil');
    }

    public function register(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            // 'nis' => 'required',
            'nama_sekolah' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'logo' => 'required',
            'phone' => 'required',
            'visi' => 'required',
            'misi' => 'required',
        ]);

        //check validation
        if ($validasi->fails()) {
            return response()->json([
                'message' => 'error',
                'error' => $validasi->errors()
            ], 401);
        }

        $sekolah = Sekolah::create([
            'nama_sekolah' => $request->nama_sekolah,

            'visi' => $request->visi,
            'misi' => $request->misi,

        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->storeAs('public/img', $filename);
            $sekolah->logo = $filename;
        } else {
            $sekolah->logo = '-';
        }

        $sekolah->save();

        $user = User::create([
            'sekolah_id' => $sekolah->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
            'photo' => 'user3.png',
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $user->assignRole('admin');

        if ($user) {
            return redirect('/login')->with('success', 'Registrasi Berhasil Silahkan Login Terlebih Dahulu');
        } else {
            return redirect('/register')->with('error', 'Registrasi Gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout Berhasil');
    }
}
