@extends('component.layout_app')

@section('title', 'Data Siswa')

@section('active9', 'active')

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
                    <h3 class="fw-bold mb-0">Data Siswa</h3>
                </div>
                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                    <a href="{{ route('tambah_siswa') }}" class="btn btn-outline-primary-custom" id="btn-tambah">
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

                                                    <th class="text-xs text-secondary opacity-7">Siswa
                                                    </th>
                                                    <th class="text-xs text-secondary opacity-7">NISN</th>
                                                    <th class="text-xs text-secondary opacity-7">Kelas</th>
                                                    <th class="text-xs text-secondary opacity-7">Tahun Masuk</th>
                                                    <th class="text-xs text-secondary opacity-7">Alamat</th>
                                                    <th class="text-xs text-secondary opacity-7">Status</th>
                                                    <th class="text-xs text-secondary opacity-7">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <div
                                                                class="img-profile d-flex align-items-center justify-content-start">
                                                                <span>
                                                                    <img src="{{ asset('storage/img/' . $item->user->photo) }}"
                                                                        width="50px" height="25px" class="img-fluid"
                                                                        alt="gambar">

                                                                </span>
                                                                <span class="ms-2" style="font-size: 12px">
                                                                    <span class="fw-bold" style="font-size: 16px">
                                                                        {{ $item->user->name }} </span> <br>
                                                                    {{ $item->user->email }}
                                                                </span>
                                                            </div>
                                                        </td>

                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            {{ $item->nisn }}
                                                        </td>

                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            {{ $item->kelas }}
                                                        </td>

                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            {{ $item->tahun_masuk }}
                                                        </td>

                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <span>

                                                                {{ $item->user->address }}
                                                            </span>

                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <span
                                                                class="badge bg-{{ $item->user->status == 'active' ? 'warning' : 'danger' }}">{{ $item->user->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</span>
                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <a href="{{ route('edit_siswa', $item->user->id) }}"
                                                                class="btn btn-sm custom-btn-edit hover-btn"
                                                                title="Edit"><i
                                                                    class="fa-solid fa-pen-to-square "></i></a>
                                                            <form action="{{ route('active_siswa', $item->user->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @method('POST')
                                                                @csrf

                                                                <button type="submit"
                                                                    class="btn btn-sm custom-btn-setactive hover-btn"
                                                                    onclick="return confirm('apakah kamu yakin ingin mengubah status siswa?')"
                                                                    title="Ubah Status" data-id="{{ $item->user->id }}">
                                                                    <i
                                                                        class="fa-solid fa-xmark text-primary fs-10"></i></button>
                                                            </form>

                                                            <form action="{{ route('delete_siswa', $item->user->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @method('POST')
                                                                @csrf

                                                                <button type="submit" class="btn btn-sm "
                                                                    onclick="return confirm('apakah kamu yakin ingin menghapus data siswa?')"
                                                                    title="Hapus Data" data-id="{{ $item->user->id }}">
                                                                    <i
                                                                        class="fa-solid fa-trash-can text-danger fs-10"></i></button>
                                                            </form>

                                                        </td>
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
