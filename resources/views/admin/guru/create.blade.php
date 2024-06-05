@extends('component.layout_app')

@section('title', 'Data Guru')

@section('active8', 'active')

@section('main-content')
    <div class="p-2" style="border-radius: 15px; background-color: white">
        <div class="container">
            <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
                <div class="title d-flex align-items-center justify-content-between gap-4">
                    <a href="{{ route('data_guru') }}" id="btn-tambah">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0">Data Guru</h3>
                </div>

                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                    <form action="{{ route('tambah_guru_action') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary-custom hover-btn text-white"> <i
                                    class="fa-solid fa-floppy-disk text-white"></i> Simpan</button>
                        </div>
                </div>
            </div>

            <div class="row mb-3" data-aos="fade-left" data-aos-duration="1500">
                <div class="box-content">
                    <div class="col bg-white">
                        <div class="p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">NIP</label>
                                        <input type="number" name="nip" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Ex. 112782329" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama pengajar</label>
                                        <input type="text" name="name" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Ex. Joghardi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                                        {{-- input type radio --}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender1"
                                                value="L">
                                            <label class="form-check-label" for="gender1">
                                                Laki - laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender2"
                                                value="P" checked>
                                            <label class="form-check-label" for="gender2">
                                                Perempuan
                                            </label>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="birthday" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Ex. Joghardi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">No Hp</label>

                                        <input type="number" class="form-control" name="phone" id="harga"
                                            placeholder="6285123456789" required>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Guru BK" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Ex. joghardi@gmail.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Ex. Joghardi123" required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                                        <input type="file" name="photo" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Alamat </label>
                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"
                                            placeholder="Alamat lengkap" required></textarea>
                                    </div>

                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
