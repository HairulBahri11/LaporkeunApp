<?php

namespace App\Charts;

use App\Models\Pengaduan_Detail;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class kasusBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($data): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $year = date('Y');

        $chart = $this->chart->lineChart()
            ->setTitle('Data Grafik Kasus')
            ->setSubtitle('Sebaran data kasus di sekolah berdasarkan bulan tertentu di ' . $year)
            ->addData('Kasus Verbal', $data['verbal'])
            ->addData('Kasus Fisik', $data['fisik'])
            ->addData('Kasus Relasional', $data['relasional'])
            ->addData('Kasus Cyberbullying', $data['cyberbullying'])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
            ->setHeight(380);


        return $chart;
    }
}
