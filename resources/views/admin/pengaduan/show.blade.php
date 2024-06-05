@extends('component.layout_app')

@section('title', 'Data Pengaduan')

@section('active11', 'active')

<style>
    .faq-section {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;

    }

    .faq-title {
        font-size: 18px;
        font-weight: bold;

        color: #212529;
        margin-bottom: 10px;
    }

    .faq-item {
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #dee2e6;
    }

    .faq-item:last-child {
        border-bottom: none;
    }

    .faq-question {
        font-size: 13px;

        color: #343a40;
        margin-bottom: 5px;
    }

    .faq-answer {
        font-size: 13px color: #6c757d;
    }

    .faq-answer::before {
        content: "";
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #ccc;
        border-radius: 50%;
        margin-right: 10px;
    }
</style>

@section('main-content')

    @if (session('success'))
        <script>
            swal({
                title: "Good job!",
                text: "{{ session('success') }}!",
                icon: "success",
                button: "OK",
            });
        </script>
    @elseif (session('error'))
        <script>
            swal({
                title: "Oops!",
                text: "{{ session('error') }}!",
                icon: "error",
                button: "OK",
            });
        </script>
    @endif

    <section>
        <div class="section  mb-3" style="border-radius: 15px; background-color: white ">
            <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
                <div class="title d-flex align-items-center justify-content-between gap-4">
                    <a href="{{ route('data_pengaduan') }}" id="btn-tambah">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0"> Detail Pengaduan</h3>
                </div>
                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">

                    <form action="{{ route('proses_laporan', $data->id) }}" method="POST"
                        id="form-proses-laporan"style="display: inline-block;">
                        @method('POST')
                        @csrf

                        {{-- <a href="{{ route('edit_pengaduan', $data->id) }}" class="btn btn-outline-primary-custom"
                            id="btn-tambah">
                            Edit</a> --}}
                        @if ($data->status_pengaduan != 'selesai')
                            <button type="submit" class="btn btn-green-custom"
                                id="btn-proses"onclick="return confirm('apakah kamu yakin ingin mengubah status laporan pengaduan menjadi selesai?')"
                                title="Ubah Status">Selesai</button>
                        @endif

                    </form>
                </div>
            </div>

            <section>
                <div class="container">
                    <div class="row p-3">
                        <div class="col-md-3 text-center ">
                            <span class="img-profile text-center">
                                <img src="{{ asset('storage/img/' . $data->siswa->photo) }}" width="150px" height="130px"
                                    style="object-fit: cover; border:1px solid #ccc; border-radius: 15px">
                            </span>
                        </div>

                        <div class="col-md-3">
                            <table class="table mb-1">
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Nama</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        {{ $data->siswa->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Email</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <span>
                                            {{ $data->siswa->email }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table mb-1">

                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">NISN</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        {{ $detail_data_pelapor->nisn }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Kelas</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        {{ $detail_data_pelapor->kelas }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table mb-1">
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Tahun Masuk</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        {{ $detail_data_pelapor->tahun_masuk }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Status Siswa</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        {{ $data->siswa->status }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="container ">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <div class="faq-section p-4">
                                <div class="faq-title">FAQ</div>
                                <table class="table table-borderless">
                                    <tbody>
                                        @foreach ($data_detail as $item)
                                            <tr class="faq-item">
                                                <td>
                                                    <div class="faq-question">{{ $item->faq->pertanyaan }}?</div>
                                                    <div class="faq-answer">{{ $item->jawaban }}</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 p-4">
                            <div class="faq-title">Laporan Pengaduan</div>
                            <table class="table mb-1">
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Tanggal Pengaduan</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        {{ $data->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Tanggal Kejadian</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        {{ $data->tgl_pengaduan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Tempat Kejadian</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        {{ $data->lokasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Isi Laporan Singkat</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        {{ $data->isi_pengaduan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Status Laporan</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        @php
                                            $status = $data->status_pengaduan;
                                            $badge = '';

                                            if ($status == 'pengajuan') {
                                                $badge = 'badge bg-warning';
                                            } elseif ($status == 'proses') {
                                                $badge = 'badge bg-primary';
                                            } elseif ($status == 'selesai') {
                                                $badge = 'badge bg-secondary';
                                            }
                                        @endphp

                                        <span class="p-2 {{ $badge }}">{{ $status }} </span>

                                    </td>
                                </tr>
                                <tr>

                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Ditangani
                                        </label>
                                    </td>


                                    <td class="text-xs text-secondary opacity-7">
                                        <span class="fw-bold" style="font-size: 16px">{{ $data->guru->name }} -
                                            {{ $data->guru->email }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>





@endsection

@push('js')
    <script></script>
@endpush
