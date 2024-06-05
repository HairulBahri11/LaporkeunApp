@extends('component.layout_app')

@section('title', 'Data Guru')

@section('active10', 'active')

@section('main-content')
    <div class="p-2" style="border-radius: 15px; background-color: white">
        <div class="container">
            <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
                <div class="title d-flex align-items-center justify-content-between gap-4">
                    <a href="{{ route('data_pertanyaan') }}" id="btn-tambah">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0">Data Pertanyaan</h3>
                </div>

                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                    <form action="{{ route('edit_pertanyaan_action', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
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
                                        <label for="exampleFormControlTextarea1" class="form-label">Pertanyaan </label>
                                        <textarea class="form-control" name="pertanyaan" id="exampleFormControlTextarea1" rows="5"
                                            placeholder="Buat Pertanyaan" required>{{ $data->pertanyaan }}</textarea>
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
