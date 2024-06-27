<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h5 {
            color: #007BFF;
        }

        p {
            margin: 10px 0;
        }

        .faq-item {
            margin: 20px 0;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 5px;
        }

        .faq-question {
            font-weight: bold;
        }

        .faq-answer {
            margin-top: 5px;
            color: #555;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- Pelapor --}}
        @php
            $user = App\Models\User::where('id', $data->siswa_id)->first();
            $siswa = App\Models\Siswa::where('user_id', $user->id)->first();
            $data_detail = App\Models\Pengaduan_Detail::where('pengaduan_id', $data->id)->get();
        @endphp

        <h1>Data Pengaduan</h1>

        <table>
            <tr>
                <th colspan="2">Informasi Pelapor</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Sekolah</td>
                <td>{{ $user->sekolah->nama_sekolah }}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>{{ $siswa->nisn }}</td>
            </tr>
        </table>
        <table style="border-top:0px ">
            <tr>
                <th colspan ="2">Detail Pengaduan</th>
            </tr>
            <tr>
                <td>Waktu Pelaporan</td>
                <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td>Waktu Kejadian</td>
                <td>{{ Carbon\Carbon::parse($data->tgl_pengaduan)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td>Lokasi Kejadian</td>
                <td>{{ $data->lokasi }}</td>
            </tr>

            <tr>
                <td>Laporan Pengaduan</td>
                <td>{{ $data->isi_pengaduan }}</td>
            </tr>
        </table>

        <h5>FAQ</h5>
        @foreach ($data_detail as $item)
            <div class="faq-item">
                <div class="faq-question">{{ $item->faq->pertanyaan }}?</div>
                <div class="faq-answer">{{ $item->jawaban }}</div>
            </div>
        @endforeach
        <div class="footer">
            &copy; {{ date('Y') }} App Mitra Kebaikan. All rights reserved.
        </div>
    </div>
</body>

</html>
