@extends('component.layout_app')

@section('title', 'Data Profil')

@section('active3', 'active')

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

                    <h3 class="fw-bold mb-0"> Detail Profile</h3>
                </div>

            </div>

            <section>
                <div class="container p-3">
                    <div class="row p-3">
                        <div class="col-md-7 p-3" style="background-color: #f3f3f3; border-radius: 15px">

                            <div class="box-flex d-flex flex-row align-items-center justify-content-start gap-4 ">
                                <img src="{{ asset('storage/img/' . $data_akun->sekolah->logo) }}" alt="sekolah"
                                    width="150px" height="130px"
                                    style="object-fit: cover; border-radius: 15px; border:1px solid #ccc">
                                <div class="data-sekolah">
                                    <h3 class="fw-bold mb-0">{{ $data_akun->sekolah->nama_sekolah }}</h3>
                                </div>

                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h5>Visi</h5>
                                    <p>{!! $data_akun->sekolah->visi !!}</p>
                                    <h5>Misi</h5>
                                    <p>{!! $data_akun->sekolah->misi !!}</p>

                                </div>

                            </div>


                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-5 text-center ">
                                    <span class="">
                                        <img src="{{ asset('storage/img/' . $data_akun->photo) }}" width="150px"
                                            height="130px"
                                            style="object-fit: cover; border-radius: 15px; border:1px solid #ccc">
                                    </span>
                                    <a href="#" class=" mt-3 btn btn-secondary-custom"> Edit Profil</a>
                                    @if (Auth::user()->role == 'admin')
                                        <a href="" class=" mt-3 btn btn-green-custom"> Edit Data Sekolah</a>
                                    @endif

                                </div>
                                <div class="col-md-7">
                                    <div class="box-flex d-flex flex-row align-items-center justify-content-between ">
                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                            <label for="nama" class="fw-bold mb-0">Nama</label>
                                        </td>

                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                            {{ $data_akun->name }}
                                        </td>
                                    </div>
                                    <hr>

                                    <div class="box-flex d-flex flex-row align-items-center justify-content-between ">
                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                            <label for="nama" class="fw-bold mb-0">Email</label>
                                        </td>

                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                            <span>
                                                {{ $data_akun->email }}
                                            </span>
                                        </td>
                                    </div>
                                    <hr>

                                    @if (Auth::user()->role == 'siswa')
                                        <div class="box-flex d-flex flex-row align-items-center justify-content-between ">
                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                <label for="nama" class="fw-bold mb-0">NISN</label>
                                            </td>

                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                {{ $data_siswa->nisn }}
                                            </td>
                                        </div>
                                        <hr>
                                        <div class="box-flex d-flex flex-row align-items-center justify-content-between ">
                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                <label for="nama" class="fw-bold mb-0">Jurusan</label>
                                            </td>

                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                {{ $data_siswa->jurusan }}
                                            </td>
                                        </div>
                                        <hr>
                                        <div class="box-flex d-flex flex-row align-items-center justify-content-between ">
                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                <label for="nama" class="fw-bold mb-0">Kelas</label>
                                            </td>

                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                {{ $data_siswa->kelas }}
                                            </td>
                                        </div>
                                        <hr>
                                        <div class="box-flex d-flex flex-row align-items-center justify-content-between ">
                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                <label for="nama" class="fw-bold mb-0">Tahun Masuk</label>
                                            </td>

                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                {{ $data_siswa->tahun_masuk }}
                                            </td>
                                        </div>
                                        <hr>
                                        <div class="box-flex d-flex flex-row align-items-center justify-content-between ">
                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                <label for="nama" class="fw-bold mb-0">Status</label>
                                            </td>

                                            <td class="text-xs text-secondary opacity-7 align-middle">
                                                <span
                                                    class="badge bg-{{ $data_akun->status == 'active' ? 'warning' : 'danger' }}">{{ $data_akun->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</span>
                                            </td>
                                        </div>
                                    @endif

                                </div>


                            </div>
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
