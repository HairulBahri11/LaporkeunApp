<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Jawaban;
use App\Models\Pengaduan;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Models\Pengaduan_Detail;
use Illuminate\Support\Facades\Auth;

class pengaduanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'guru') {
            $akun_id = Auth::user()->id;
            $guru = Guru::where('user_id', $akun_id)->first();
            $data = Pengaduan::where('guru_id', $guru->id)->orderBy('created_at', 'desc')->get();
        } elseif (Auth::user()->role == 'siswa') {
            $akun_id = Auth::user()->id;
            $siswa = Siswa::where('user_id', $akun_id)->first();
            $data = Pengaduan::where('siswa_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        } elseif (Auth::user()->role == 'admin' && Auth::user()->sekolah_id == 1) {

            $data = Pengaduan::orderBy('created_at', 'desc')->get();
        } else {
            // ambil data pengaduan berdasarkan sekolah dari akun yang sedang login
            $sekolah_id = Auth::user()->sekolah_id;
            $data = Pengaduan::join('siswa', 'pengaduan.siswa_id', '=', 'siswa.user_id')
                ->join('users', 'siswa.user_id', '=', 'users.id')
                ->where('users.sekolah_id', $sekolah_id)
                ->orderBy('pengaduan.id', 'desc')
                ->select('pengaduan.*') // Select columns explicitly to avoid potential conflicts
                ->get();
        }

        $data_siswa_available = [];
        $siswa = [];

        if (Auth::user()->role == 'admin' && Auth::user()->sekolah_id == 1) {
            $siswa = User::where('role', 'siswa')->where('status', 'active')->get();
        } else {
            $siswa = User::where('role', 'siswa')->where('sekolah_id', Auth::user()->sekolah_id)->where('status', 'active')->get();
        }



        foreach ($siswa as $valuenya) {
            $data_siswa = Pengaduan::where('siswa_id', $valuenya->id)->where('status_pengaduan', '!=', 'selesai')->get();
            if ($data_siswa->isEmpty()) {
                $data_siswa_available[] = [
                    'siswa_id' => $valuenya->id,
                    'name' => $valuenya->name,
                    'email' => $valuenya->email
                ];
            }
        }


        // mengambil index array berdata
        $data_siswa_available = array_filter($data_siswa_available);

        $data_guru = Guru::join('users', 'users.id', '=', 'guru.user_id')
            ->where('users.sekolah_id', Auth::user()->sekolah_id)
            ->where('users.status', 'active')
            ->select('users.*', 'guru.*')
            ->get();


        $pertanyaan = Pertanyaan::where('status', 'active')->get();
        return view(
            'admin.pengaduan.index',
            compact(
                'data',
                'data_siswa_available',
                'pertanyaan',
                'data_guru'
            )
        );
    }

    public function show($id)
    {
        $data = Pengaduan::find($id);
        $detail_data_pelapor = Siswa::where('user_id', $data->siswa_id)->first();
        $data_detail = Pengaduan_Detail::where('pengaduan_id', $id)->get();

        return view('admin.pengaduan.show', compact('data', 'data_detail', 'data_detail',  'detail_data_pelapor'));
    }

    public function store(Request $request)
    {

        // data pengaduan
        $data = new Pengaduan();
        if (Auth::user()->role == 'siswa') {
            $data->siswa_id = Auth::user()->id;
            $data->guru_id = 1;
        } else if (Auth::user()->role == 'admin') {
            $data->siswa_id = $request->siswa_id;
            $data_guru = Guru::where('id', $request->guru_id)->first();
            $data_akun = User::where('id', $data_guru->user_id)->first();
            $data->guru_id = $data_akun->id;
        } else {
            $data->siswa_id = $request->siswa_id;
            $data->guru_id = Auth::user()->id;
        }
        $data->isi_pengaduan = $request->isi_pengaduan;
        $data->lokasi = $request->lokasi;
        $data->tgl_pengaduan = $request->tgl_kejadian;
        $data->status_pengaduan = 'pengajuan';
        $data->save();

        $id_data_pengaduan = $data->id;
        // dd($id_data_pengaduan);
        // array data all_jawaban
        $arr_jawaban = $request->input('hasilfaq');
        $arr_jawaban = explode(',', $arr_jawaban);

        $data_pertanyaan = Pertanyaan::where('status', 'active')->get();

        foreach ($data_pertanyaan as $key => $value) {
            // Ensure the $data object is instantiated within the loop to avoid overwriting the same object
            $data = new Pengaduan_Detail();
            $data->pengaduan_id = $id_data_pengaduan;
            $data->pertanyaan_id = $value->id;

            // Set the jawaban attribute from $arr_jawaban, assuming the keys match
            if (isset($arr_jawaban[$key])) {
                $data->jawaban = $arr_jawaban[$key];
            }

            // Save the $data object
            $data->save();
        }

        return redirect('/data_pengaduan')->with('success', 'Data Pengaduan Berhasil Dibuat');
    }

    public function detail_ajax(String  $id)
    {

        $data = Pengaduan::find($id);
        $data_detail = Pengaduan_Detail::where('pengaduan_id', $id)->with('faq')->get();

        $data_pelapor = User::where('id', $data->siswa_id)->first();
        $detail_data_pelapor = Siswa::where('user_id', $data->siswa_id)->first();
        $pertanyaan = Pertanyaan::where('status', 'active')->get();

        return response()->json(
            [
                'tb_pengaduan' => $data,
                'tb_pengaduan_detail' => $data_detail,
                'detail_data_pelapor' => $detail_data_pelapor,
                'data_pelapor' => $data_pelapor,
                'pertanyaan' => $pertanyaan
            ]
        );
    }

    public function proses_laporan($id)
    {

        $data = Pengaduan::find($id);

        if (Auth::user()->role == 'admin') {
            $data->status_pengaduan = 'selesai';
        } else {
            if ($data->status_pengaduan == 'proses') {
                $data->guru_id = Auth::user()->id;
                $data->status_pengaduan = 'selesai';
            } else {
                $data->guru_id = Auth::user()->id;
                $data->status_pengaduan = 'proses';
            }
        }


        $data->save();
        return redirect('/data_pengaduan')->with('success', 'Data Pengaduan Berhasil Diproses');
    }
}
