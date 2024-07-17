<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Jawaban;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Pengaduan_Detail;
use App\Charts\kasusBulananChart;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    protected $kasusBulananChart;

    public function __construct(kasusBulananChart $kasusBulananChart)
    {
        $this->kasusBulananChart = $kasusBulananChart;
    }

    public function index(Request $request)
    {
        // $years = range(date('Y'), date('Y') - 4); // Mengambil 10 tahun terakhir
        // $selectedYear = $request->input('year', date('Y')); // Tahun default atau tahun yang dipilih



        // $totalKasusVerbal = array_fill(0, 12, 0);
        // $totalKasusFisik = array_fill(0, 12, 0);
        // $totalKasusDigital = array_fill(0, 12, 0);
        // $totalKasusCyberbullying = array_fill(0, 12, 0);

        // $currentYear = date('Y');
        // for ($i = 1; $i <= 12; $i++) {
        //     $totalKasusVerbal[$i - 1] = Pengaduan_Detail::join('pengaduan', 'pengaduan.id', '=', 'pengaduan_detail.pengaduan_id')

        //         ->whereMonth('pengaduan.tgl_pengaduan', $i)
        //         ->whereYear('pengaduan.tgl_pengaduan', $currentYear)
        //         ->where('pengaduan_detail.pertanyaan_id', 5)
        //         ->where('pengaduan_detail.jawaban', 'verbal')
        //         ->count();

        //     $totalKasusFisik[$i - 1] = Pengaduan_Detail::join('pengaduan', 'pengaduan.id', '=', 'pengaduan_detail.pengaduan_id')
        //         ->whereMonth('pengaduan.tgl_pengaduan', $i)
        //         ->whereYear('pengaduan.tgl_pengaduan', $currentYear)
        //         ->where('pengaduan_detail.pertanyaan_id', 5)
        //         ->where('pengaduan_detail.jawaban', 'fisik')
        //         ->count();

        //     $totalKasusDigital[$i - 1] = Pengaduan_Detail::join('pengaduan', 'pengaduan.id', '=', 'pengaduan_detail.pengaduan_id')
        //         ->whereMonth('pengaduan.tgl_pengaduan', $i)
        //         ->whereYear('pengaduan.tgl_pengaduan', $currentYear)
        //         ->where('pengaduan_detail.pertanyaan_id', 5)
        //         ->where('pengaduan_detail.jawaban', 'relasional')
        //         ->count();

        //     $totalKasusCyberbullying[$i - 1] = Pengaduan_Detail::join('pengaduan', 'pengaduan.id', '=', 'pengaduan_detail.pengaduan_id')
        //         ->whereMonth('pengaduan.tgl_pengaduan', $i)
        //         ->whereYear('pengaduan.tgl_pengaduan', $currentYear)
        //         ->where('pengaduan_detail.pertanyaan_id', 5)
        //         ->where('pengaduan_detail.jawaban', 'cyberbullying')
        //         ->count();
        // }

        // Inisialisasi array untuk menyimpan jumlah kasus per bulan
        $totalKasusVerbal = array_fill(0, 12, 0);
        $totalKasusFisik = array_fill(0, 12, 0);
        $totalKasusDigital = array_fill(0, 12, 0);
        $totalKasusCyberbullying = array_fill(0, 12, 0);

        $currentYear = date('Y');

        // Fungsi untuk menghitung jumlah kasus berdasarkan jenis jawaban
        function getTotalKasusByJawaban($month, $year, $jawaban)
        {
            return Pengaduan_Detail::join('pengaduan', 'pengaduan.id', '=', 'pengaduan_detail.pengaduan_id')
                ->join('users', 'users.id', '=', 'pengaduan.siswa_id')
                ->where('users.sekolah_id', Auth::user()->sekolah_id)
                ->whereMonth('pengaduan.tgl_pengaduan', $month)
                ->whereYear('pengaduan.tgl_pengaduan', $year)
                ->where('pengaduan_detail.pertanyaan_id', 5)
                ->where('pengaduan_detail.jawaban', $jawaban)
                ->count();
        }

        // Mengisi array dengan data dari Januari hingga Desember
        for ($i = 1; $i <= 12; $i++) {
            $totalKasusVerbal[$i - 1] = getTotalKasusByJawaban($i, $currentYear, 'verbal');
            $totalKasusFisik[$i - 1] = getTotalKasusByJawaban($i, $currentYear, 'fisik');
            $totalKasusDigital[$i - 1] = getTotalKasusByJawaban($i, $currentYear, 'relasional');
            $totalKasusCyberbullying[$i - 1] = getTotalKasusByJawaban($i, $currentYear, 'cyberbullying');
        }

        // Hasilnya adalah empat array yang berisi jumlah kasus dari Januari hingga Desember


        if (Auth::check() == true) {

            $jumlah_pengaduan = Pengaduan::join('siswa', 'pengaduan.siswa_id', '=', 'siswa.user_id')
                ->join('users', 'siswa.user_id', '=', 'users.id')
                ->where('users.sekolah_id', Auth::user()->sekolah_id)
                ->where('status_pengaduan', 'pengajuan')->count();

            $jumlah_proses = Pengaduan::join('siswa', 'pengaduan.siswa_id', '=', 'siswa.user_id')
                ->join('users', 'siswa.user_id', '=', 'users.id')
                ->where('users.sekolah_id', Auth::user()->sekolah_id)
                ->where('status_pengaduan', 'proses')->count();

            $jumlah_selesai = Pengaduan::join('siswa', 'pengaduan.siswa_id', '=', 'siswa.user_id')
                ->join('users', 'siswa.user_id', '=', 'users.id')
                ->where('users.sekolah_id', Auth::user()->sekolah_id)
                ->where('status_pengaduan', 'selesai')->count();
            $data_pengaduan = Pengaduan::join('siswa', 'pengaduan.siswa_id', '=', 'siswa.user_id')
                ->join('users', 'siswa.user_id', '=', 'users.id')
                ->where('users.sekolah_id', Auth::user()->sekolah_id)
                ->where('status_pengaduan', 'pengajuan')->orderBy('pengaduan.created_at', 'desc')->paginate(4);
        } else {
            // cek jumlahkasus yang sudah selesai
            $jumlah_pengaduan = Pengaduan::where('status_pengaduan', 'pengajuan')->count();
            $jumlah_proses = Pengaduan::where('status_pengaduan', 'proses')->count();
            $jumlah_selesai = Pengaduan::where('status_pengaduan', 'selesai')->count();
            $data_pengaduan = Pengaduan::where('status_pengaduan', 'pengajuan')->orderBy('created_at', 'desc')->paginate(4);
        }



        $chartData = [
            'verbal' => $totalKasusVerbal,
            'fisik' => $totalKasusFisik,
            'relasional' => $totalKasusDigital,
            'cyberbullying' => $totalKasusCyberbullying
        ];

        $chart = $this->kasusBulananChart->build($chartData);

        if ($request->ajax()) {
            return response()->json([
                'chart' => $chart->container(),
                'chartScript' => $chart->script(),
                // 'years' => $years,
                // 'selectedYear' => $selectedYear
            ]);
        }


        return view('index', compact(
            'chart',
            // 'years',
            // 'selectedYear',
            'jumlah_pengaduan',
            'jumlah_selesai',
            'jumlah_proses',
            'data_pengaduan'
        ));
    }

    public function myChart(Request $request)
    {
        // $years = range(date('Y'), date('Y') - 4); // Mengambil 10 tahun terakhir
        // $selectedYear = $request->input('year', date('Y')); // Tahun default atau tahun yang dipilih

        $totalKasusVerbal = array_fill(0, 12, 0);
        $totalKasusFisik = array_fill(0, 12, 0);
        $totalKasusDigital = array_fill(0, 12, 0);
        $totalKasusCyberbullying = array_fill(0, 12, 0);

        for ($i = 1; $i <= 12; $i++) {
            $totalKasusVerbal[$i - 1] = Pengaduan_Detail::whereMonth('tgl_pengaduan', $i)
                ->whereYear('tgl_pengaduan')
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'verbal')
                ->count();
            $totalKasusFisik[$i - 1] = Pengaduan_Detail::whereMonth('tgl_pengaduan', $i)
                ->whereYear('tgl_pengaduan')
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'fisik')
                ->count();
            $totalKasusDigital[$i - 1] = Pengaduan_Detail::whereMonth('tgl_pengaduan', $i)
                ->whereYear('tgl_pengaduan')
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'Relasional')
                ->count();
            $totalKasusCyberbullying[$i - 1] = Pengaduan_Detail::whereMonth('tgl_pengaduan', $i)
                ->whereYear('tgl_pengaduan')
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'cyberbullying')
                ->count();
        }

        $chartData = [
            'verbal' => $totalKasusVerbal,
            'fisik' => $totalKasusFisik,
            'digital' => $totalKasusDigital,
            'cyberbullying' => $totalKasusCyberbullying
        ];

        $chart = $this->kasusBulananChart->build($chartData);



        if ($request->ajax()) {
            return response()->json([
                'chart' => $chart->container(),
                'chartScript' => $chart->script(),

                // 'selectedYear' => $selectedYear
            ]);
        }



        return redirect('/mychart', compact('chart', 'years',));
    }

    public function dataLaporan()
    {
    }

    public function profile()
    {
        $data_akun = User::find(Auth::user()->id);
        $data_siswa = Siswa::where('user_id', $data_akun->id)->first();

        $data_guru = Guru::where('user_id', $data_akun->id)->first();

        return view('admin.profil.index', compact('data_akun', 'data_siswa', 'data_guru'));
    }
}
