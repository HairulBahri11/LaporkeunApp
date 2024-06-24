@extends('component.layout_app')
@section('title', 'Data Sekolah')
@section('active12', 'active')
@section('main-content')
    <div class="p-2" style="border-radius: 15px; background-color: white">
        <div class="container">
            <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
                <div class="title d-flex align-items-center justify-content-between gap-4">
                    <a href="{{ route('data_sekolah') }}" id="btn-tambah">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0">Data Sekolah</h3>
                </div>

                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                    <form action="{{ route('tambah_sekolah_action') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="name" class="form-label">Nama Sekolah</label>
                                        <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">username</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="username" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">


                                    <div class="mb-3">
                                        <label for="username" class="form-label">Logo</label>
                                        <input type="file" class="form-control " id="logo" name="logo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Visi</label>
                                        <input type="text" class="form-control" name="visi" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Misi</label>
                                        <textarea id="editor2" name="misi" class="form-control" rows="3"></textarea>
                                    </div>


                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#editor2'))
                                            .then(editor => {
                                                console.log(editor);
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>


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
