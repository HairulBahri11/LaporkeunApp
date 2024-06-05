@extends('component.layout_app')

@section('title', 'Data Guru')

@section('active10', 'active')

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
                <div class="title">
                    <h3 class="fw-bold mb-0">Data Pertanyaan</h3>
                </div>
                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                    <a href="{{ route('tambah_pertanyaan') }}" class="btn btn-outline-primary-custom" id="btn-tambah">
                        Tambah</a>
                </div>
            </div>
            <section>
                <div class="container" data-aos="fade-left" data-aos-duration="1000">
                    <div class="row">
                        <div class="box-content">
                            <div class="col">
                                <div class="p-3">
                                    <div class="table-responsive">
                                        {{-- <h5>Daftar pengajar</h5> --}}
                                        <table class="table table-hover" id="example">
                                            <thead class="bg-gray-100 p-1">
                                                <tr style="bg-color: black" class="mt-2">

                                                    <th class="text-xs text-secondary opacity-7">Kode</th>
                                                    <th class="text-xs text-secondary opacity-7">Pertanyaan</th>

                                                    <th class="text-xs text-secondary opacity-7">Status</th>
                                                    <th class="text-xs text-secondary opacity-7">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            {{ $item->id }}
                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            {{ $item->pertanyaan }}
                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <span
                                                                class="badge bg-{{ $item->status == 'active' ? 'warning' : 'danger' }}">{{ $item->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</span>
                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <a href="{{ route('data_jawaban', $item->id) }}"
                                                                class="btn btn-sm custom-btn-edit hover-btn"
                                                                title="Detail"><i class="fa-solid fa-eye "></i></a>
                                                            <form action="{{ route('active_pertanyaan', $item->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @method('POST')
                                                                @csrf

                                                                <button type="submit"
                                                                    class="btn btn-sm custom-btn-setactive hover-btn"
                                                                    onclick="return confirm('apakah kamu yakin ingin mengubah status pertanyaan?')"
                                                                    title="Ubah Status" data-id="{{ $item->id }}">
                                                                    <i
                                                                        class="fa-solid fa-xmark text-primary fs-10"></i></button>
                                                            </form>


                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

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
