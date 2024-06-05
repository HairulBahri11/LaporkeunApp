<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\Pengaduan_Detail;
use App\Charts\kasusBulananChart;
use App\Models\Jawaban;

class homeController extends Controller
{
    protected $kasusBulananChart;

    public function __construct(kasusBulananChart $kasusBulananChart)
    {
        $this->kasusBulananChart = $kasusBulananChart;
    }

    public function index(Request $request)
    {
        $years = range(date('Y'), date('Y') - 4); // Mengambil 10 tahun terakhir
        $selectedYear = $request->input('year', date('Y')); // Tahun default atau tahun yang dipilih

        $totalKasusVerbal = array_fill(0, 12, 0);
        $totalKasusFisik = array_fill(0, 12, 0);
        $totalKasusDigital = array_fill(0, 12, 0);
        $totalKasusCyberbullying = array_fill(0, 12, 0);

        for ($i = 1; $i <= 12; $i++) {
            $totalKasusVerbal[$i - 1] = Pengaduan_Detail::whereMonth('created_at', $i)
                ->whereYear('created_at', $selectedYear)
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'verbal')
                ->count();
            $totalKasusFisik[$i - 1] = Pengaduan_Detail::whereMonth('created_at', $i)
                ->whereYear('created_at', $selectedYear)
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'fisik')
                ->count();
            $totalKasusDigital[$i - 1] = Pengaduan_Detail::whereMonth('created_at', $i)
                ->whereYear('created_at', $selectedYear)
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'relasional')
                ->count();
            $totalKasusCyberbullying[$i - 1] = Pengaduan_Detail::whereMonth('created_at', $i)
                ->whereYear('created_at', $selectedYear)
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'cyberbullying')
                ->count();
        }

        // cek jumlahkasus yang sudah selesai
        $jumlah_pengaduan = Pengaduan::where('status_pengaduan', 'pengajuan')->count();
        $jumlah_proses = Pengaduan::where('status_pengaduan', 'proses')->count();
        $jumlah_selesai = Pengaduan::where('status_pengaduan', 'selesai')->count();


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
                'years' => $years,
                'selectedYear' => $selectedYear
            ]);
        }
        $data_pengaduan = Pengaduan::where('status_pengaduan', 'pengajuan')->orderBy('created_at', 'desc')->paginate(4);
        return view('index', compact(
            'chart',
            'years',
            'selectedYear',
            'jumlah_pengaduan',
            'jumlah_selesai',
            'jumlah_proses',
            'data_pengaduan'
        ));
    }

    public function myChart(Request $request)
    {
        $years = range(date('Y'), date('Y') - 4); // Mengambil 10 tahun terakhir
        $selectedYear = $request->input('year', date('Y')); // Tahun default atau tahun yang dipilih

        $totalKasusVerbal = array_fill(0, 12, 0);
        $totalKasusFisik = array_fill(0, 12, 0);
        $totalKasusDigital = array_fill(0, 12, 0);
        $totalKasusCyberbullying = array_fill(0, 12, 0);

        for ($i = 1; $i <= 12; $i++) {
            $totalKasusVerbal[$i - 1] = Pengaduan_Detail::whereMonth('created_at', $i)
                ->whereYear('created_at', $selectedYear)
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'verbal')
                ->count();
            $totalKasusFisik[$i - 1] = Pengaduan_Detail::whereMonth('created_at', $i)
                ->whereYear('created_at', $selectedYear)
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'fisik')
                ->count();
            $totalKasusDigital[$i - 1] = Pengaduan_Detail::whereMonth('created_at', $i)
                ->whereYear('created_at', $selectedYear)
                ->where('pertanyaan_id', 5)
                ->where('jawaban', 'Relasional')
                ->count();
            $totalKasusCyberbullying[$i - 1] = Pengaduan_Detail::whereMonth('created_at', $i)
                ->whereYear('created_at', $selectedYear)
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
                'years' => $years,
                'selectedYear' => $selectedYear
            ]);
        }



        return redirect('/mychart', compact('chart', 'years', 'selectedYear'));
    }

    public function dataLaporan()
    {
    }
}
