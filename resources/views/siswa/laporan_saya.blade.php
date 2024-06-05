@extends('component.layout_app')
@section('title', 'Laporan Saya')
@section('active2', 'active')

@section('main-content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="section p-1 mb-4 " style="border-radius: 15px; background-color: white ">
        <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
            <div class="title d-flex align-items-center justify-content-between">

                <h5 class="fw-bold mb-0">Laporan Pengaduan</h5>
            </div>
            <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                {{-- filter combobox --}}
                <div class="add-form">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary-custom" id='btn-tambah'> <i
                                class="fa-solid fa-pen-to-square"></i> Tambah</button>
                    </div>
                </div>
                <div class="chat-form">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-green-custom" id="btn-chat-admin"> <i
                                class="fa-solid fa-message"></i>
                            Chat Admin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="mb-3">
        <!-- form-tambah -->
        <div class="section-form-tambah p-1 mb-4" style="border-radius: 15px; background-color: white ">
            <div class="header-boxnya p-4 text-center d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Form Tambah Laporan Pengaduan</h5>
                <button type="button" class="btn-close btn-close-danger" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="content-box ps-4 pe-4 pb-4">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="nis" name="nis" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="laporan" class="form-label">Laporan</label>
                        <textarea class="form-control" id="laporan" name="laporan" rows="4" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="jenis_laporan" class="form-label">Pilih Jenis Laporan</label>
                        <select class="form-select" id="jenis_laporan" name="jenis_laporan" required>
                            <option value="" disabled selected>Pilih Jenis Laporan</option>
                            <option value="fisik">Fisik</option>
                            <option value="verbal">Verbal</option>
                            <option value="relasional">Relasional</option>
                            <option value="cyberbullying">Cyberbullying</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary-custom ms-auto">Submit</button>
                </form>
            </div>
        </div>
    </section>
    <section class="mb-3">
        <div class="section-chat-room p-2 mb-4" style="border-radius: 15px;  background-color: white;">
            <div class="header-boxnya p-4 d-flex justify-content-between align-items-center w-100">
                <h5 class="fw-bold mb-0">Chat Room</h5>
                <button type="button" class="btn-close btn-close-danger" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="ps-4 pe-4 pb-4">

                <div class="chatbox">
                    {{-- usericon --}}
                    <div class="row p-2">
                        <div class="col-md-1">
                            <img src="{{ asset('user2.png') }}" alt="" class="img-fluid rounded-circle"
                                style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #f1e9e9">
                        </div>
                        <div class="col-md-7">
                            <div class="row mobile-col">
                                <div class="col-md-6">
                                    <p class="text-start mb-1">Admin Laporkeun</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-end mb-1"><span>11.00</span>, 3 Maret 2022</p>
                                </div>
                            </div>
                            <form action="#" method="POST">
                                @csrf
                                <div class="box-percakapan">
                                    <span class="form-control" id="percakapan" name="percakapan" required
                                        style="background-color: #f1e9e9">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit.
                                        Cum,
                                        autem.</span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-1">
                            <img src="{{ asset('user2.png') }}" alt="" class="img-fluid rounded-circle"
                                style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #f1e9e9">
                        </div>
                        <div class="col-md-7">
                            <div class="row mobile-col">
                                <div class="col-md-6">
                                    <p class="text-start mb-1">Admin Laporkeun</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-end mb-1"><span>11.50</span>, 3 Maret 2022</p>
                                </div>
                            </div>
                            <form action="#" method="POST">
                                @csrf
                                <div class="box-percakapan">
                                    <span class="form-control" id="percakapan" name="percakapan" required
                                        style="background-color: #f1e9e9">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit.
                                        Cum,
                                        autem.</span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-1">
                            <img src="{{ asset('user2.png') }}" alt="" class="img-fluid rounded-circle"
                                style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #f1e9e9">
                        </div>
                        <div class="col-md-7">
                            <div class="row mobile-col">
                                <div class="col-md-6">
                                    <p class="text-start mb-1">Admin Laporkeun</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-end mb-1"><span>11.50</span>, 3 Maret 2022</p>
                                </div>
                            </div>
                            <form action="#" method="POST">
                                @csrf
                                <div class="box-percakapan">
                                    <span class="form-control" id="percakapan" name="percakapan" required
                                        style="background-color: #f1e9e9">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit.
                                        Cum,
                                        autem.</span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-1">
                            <img src="{{ asset('user2.png') }}" alt="" class="img-fluid rounded-circle"
                                style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #f1e9e9">
                        </div>
                        <div class="col-md-7">
                            <div class="row mobile-col">
                                <div class="col-md-6">
                                    <p class="text-start mb-1">Admin Laporkeun</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-end mb-1"><span>11.50</span>, 3 Maret 2022</p>
                                </div>
                            </div>
                            <form action="#" method="POST">
                                @csrf
                                <div class="box-percakapan">
                                    <span class="form-control" id="percakapan" name="percakapan" required
                                        style="background-color: #f1e9e9">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit.
                                        Cum,
                                        autem.</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="chat-btn p-3 d-flex flex-row align-items-center justify-content-between">
                    <img src="{{ asset('user3.png') }}" alt="" class="img-fluid rounded-circle me-4"
                        style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #f1e9e9;">
                    <textarea name="percakapan" id="" cols="2" rows="2" class="form-control me-4">

                        </textarea>
                    <button type="button" class="btn btn-secondary-custom"> <i
                            class="fa-solid fa-paper-plane"></i></button>

                </div>
            </div>

        </div>


    </section>


@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Sembunyikan elemen .section-form-tambah saat halaman dimuat pertama kali
            $('.section-form-tambah').hide();
            $('.section-chat-room').hide();
            // Tampilkan elemen .section-form-tambah ketika tombol #btn-tambah diklik
            $('#btn-tambah').click(function() {
                $('.section-form-tambah').show();
                $('.section-chat-room').hide();
            });
            $('#btn-chat-admin').click(function() {
                $('.section-chat-room').show();
                $('.section-form-tambah').hide();
            })
            // menutup close form tambah
            $('.btn-close').click(function() {
                $('.section-form-tambah').hide();
                $('.section-chat-room').hide();
            });

        });
    </script>
@endpush
