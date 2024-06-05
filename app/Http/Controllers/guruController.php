<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $data = Guru::all();
        return view('admin.guru.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'nip' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'jabatan' => 'required',
        ]);

        //check validation
        if ($validasi->fails()) {
            return response()->json([
                'message' => 'error',
                'error' => $validasi->errors()
            ], 401);
        }

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'guru',
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
            $data->photo = 'user2.png';
        }
        $data->assignRole('guru');
        $data->save();

        $data_guru = Guru::create([
            'user_id' => $data->id,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
        ]);
        $data_guru->save();


        return redirect('/data_guru')->with('success', 'Data Guru Berhasil Ditambahkan');
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
        $tb_guru = Guru::where('user_id', $tb_user->id)->first();
        return view('admin.guru.edit', compact('tb_user', 'tb_guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'nip' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'jabatan' => 'required',
        ]);

        //check validation
        if ($validasi->fails()) {
            return response()->json([
                'message' => 'error',
                'error' => $validasi->errors()
            ], 401);
        }


        $data = User::find($id);
        $data_guru = Guru::where('user_id', $id)->first();


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


        $data_guru->nip = $request->nip;
        $data_guru->jabatan = $request->jabatan;
        $data_guru->save();
        return redirect('/data_guru')->with('success', 'Data Guru Berhasil Diupdate');
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

            return redirect('/data_guru')->with('success', 'Data Guru Berhasil Dihapus');
        }

        return redirect('/data_guru')->with('error', 'Data Guru Tidak Ditemukan');
    }

    public function active(string $id)
    {

        $data = User::find($id);
        if ($data->status == 'active') {
            $data->status = 'nonactive';
            $msg = 'Guru atas nama' . $data->name . ' berhasil di Nonaktifkan';
        } else {
            $data->status = 'active';
            $msg = 'Guru atas nama' . $data->name . 'Berhasil di Aktifkan';
        }
        $data->save();
        return redirect('/data_guru')->with('success', $msg);
    }
}
