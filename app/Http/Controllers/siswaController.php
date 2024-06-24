<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_sekolah = [];
        if (Auth::user()->role == 'admin' && Auth::user()->sekolah_id == 1) {
            // forsuper admin

            $data = Siswa::all();
        } else {
            // data guru dari sekolah tertentu
            $data_akun = User::where('role', 'siswa')->where('sekolah_id', Auth::user()->sekolah_id)->get();
            foreach ($data_akun as $item => $value) {
                $data[$item] = Siswa::where('user_id', $value->id)->first();
            }
        }

        return view('admin.siswa.index', compact('data', 'data_sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role == 'admin' && Auth::user()->sekolah_id == 1) {
            $data_sekolah = Sekolah::whereNot('id', 1)->get();
            $hidden = '';
        } else {
            $data_sekolah = [];
            $hidden = 'hidden';
        }

        return view('admin.siswa.create', compact('data_sekolah', 'hidden'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'nisn' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        //check validation
        if ($validasi->fails()) {
            return response()->json([
                'message' => 'error',
                'error' => $validasi->errors()
            ], 401);
        }

        if (Auth::user()->role == 'admin' && Auth::user()->sekolah_id == 1) {
            // forsuper admin
            $sekolah_id = $request->sekolah_id;
        } else {
            $sekolah_id = Auth::user()->sekolah_id;
        }

        $data = User::create([
            'sekolah_id' => $sekolah_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'siswa',
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
        ]);

        if ($request->hasFile('photo')) {
            // request file and save into storage
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->storeAs('public/img', $filename);
            $data->photo = $filename;
        } else {
            $data->photo = 'siswa-siswi.jpg';
        }
        $data->assignRole('siswa');
        $data->save();

        $data_siswa = Siswa::create([
            'user_id' => $data->id,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'tahun_masuk' => $request->tahun_masuk,
            'jurusan' => $request->jurusan
        ]);

        $data_siswa->save();
        return redirect('/data_siswa')->with('success', 'Data Siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tb_user = User::find($id);
        $tb_siswa = Siswa::where('user_id', $tb_user->id)->first();
        return view('admin.siswa.edit', compact('tb_user', 'tb_siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'nisn' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'kelas' => 'required',
        ]);

        //check validation
        if ($validasi->fails()) {
            return response()->json([
                'message' => 'error',
                'error' => $validasi->errors()
            ], 401);
        }


        $data = User::find($id);
        $data_guru = Siswa::where('user_id', $id)->first();


        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->birthday = $request->birthday;
        if ($request->hasFile('photo')) {
            // request file and save into storage
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->storeAs('public/img', $filename);
            $data->photo = $filename;
        }
        if ($request->password != null) {
            $data->password = bcrypt($request->password);
        }
        $data->save();


        $data_guru->nisn = $request->nisn;
        $data_guru->kelas = $request->kelas;
        $data_guru->tahun_masuk = $request->tahun_masuk;
        $data_guru->save();
        return redirect('/data_siswa')->with('success', 'Data Guru Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);

        if ($data) {
            // Delete photo from storage if it's not the default photo
            if ($data->photo != 'user2.png') {
                Storage::disk('public')->delete('img/' . $data->photo);
            }

            // Delete user
            $data->delete();

            return redirect('/data_siswa')->with('success', 'Data Siswa Berhasil Dihapus');
        }

        return redirect('/data_siswa')->with('error', 'Data Siswa Tidak Ditemukan');
    }

    public function active(string $id)
    {
        $data = User::find($id);
        if ($data->status == 'active') {
            $data->status = 'nonactive';
            $msg = 'Siswa atas nama' . $data->name . ' berhasil Di Nonaktifkan';
        } else {
            $data->status = 'active';
            $msg = 'Siswa atas nama' . $data->name . ' berhasil Di Aktifkan';
        }
        $data->save();
        return redirect('/data_siswa')->with('success', $msg);
    }
}
