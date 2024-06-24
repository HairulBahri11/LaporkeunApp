<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class sekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin' && Auth::user()->sekolah_id == 1) {
            $data = Sekolah::whereNotIn('id', [1])->get();
        } else {
            $data = [];
        }


        return view('admin.sekolah.index', compact('data',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [

            'visi' => 'required',
            'misi' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'logo' => 'required',
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

        $akun = User::create([
            'sekolah_id' => $sekolah->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'admin',
            'photo' => 'user3.png',
            'status' => 'active',
        ]);

        $akun->save();
        return redirect('/data_sekolah')->with('success', 'Sekolah Berhasil Ditambahkan');
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
        $data = Sekolah::find($id);
        $akun = User::where('sekolah_id', $id)->where('role', 'admin')->first();
        return view('admin.sekolah.edit', compact('data', 'akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [

            'visi' => 'required',
            'misi' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'logo' => 'required',
        ]);

        //check validation
        if ($validasi->fails()) {
            return response()->json([
                'message' => 'error',
                'error' => $validasi->errors()
            ], 401);
        }

        $sekolah = Sekolah::find($id);

        $sekolah->update([
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

        $akun = User::where('sekolah_id', $id)->where('role', 'admin')->first();
        $akun->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($request->password != null) {
            $akun->update([
                'password' => bcrypt($request->password),
            ]);
        }

        $akun->save();


        return redirect('/data_sekolah')->with('success', 'Sekolah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function active(string $id)
    {

        $data = User::where('sekolah_id', $id)->where('role', 'admin')->first();

        if ($data->status == 'active') {
            $data->status = 'nonactive';
            $msg = 'Sekolah atas ID : ' . $data->id . ' Berbayar Di Nonaktifkan';
        } else {
            $data->status = 'active';
            $msg = 'Sekolah atas ID : ' . $data->id . ' Berbayar Di Aktifkan';
        }
        $data->save();
        return redirect('/data_sekolah')->with('success', $msg);
    }
}
