<?php

namespace App\Http\Controllers;

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
            $data = Pengaduan::where('guru_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        } elseif (Auth::user()->role == 'siswa') {
            $data = Pengaduan::where('siswa_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        } else {

            $data = Pengaduan::orderBy('created_at', 'desc')->get();
        }

        // $siswa = User::where('role', 'siswa')->where('status', 'active')->get();
        // foreach ($siswa as $key => $valuenya) {
        //     // cek dulu apakah data siswa ada dipengaduan atau tidak, kalau  ada
        //     $data_siswa = Pengaduan::where('siswa_id', $valuenya->id)->where('status_pengaduan', '==', 'selesai')->get();
        //     $data_siswa_available[$key] = [];

        //     foreach ($data_siswa as $value) {
        //         $data_siswa_available[$key] = [
        //             'siswa_id' => $value->siswa_id,
        //             'name' => $value->siswa->name,
        //             'email' => $value->siswa->email
        //         ];
        //     }
        //     // lalu foreach lagi data siswa kecuali yang ada dipengaduan


        // }
        $siswa = User::where('role', 'siswa')->where('status', 'active')->get();
        $data_siswa_available = [];

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

        $pertanyaan = Pertanyaan::where('status', 'active')->get();
        return view('admin.pengaduan.index', compact('data', 'data_siswa_available', 'pertanyaan',));
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
        $data->siswa_id = $request->siswa_id;
        $data->guru_id = Auth::user()->id;
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
