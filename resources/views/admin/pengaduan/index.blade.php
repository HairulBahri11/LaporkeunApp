@extends('component.layout_app')

@section('title', 'Data Pengaduan')

@section('active11', 'active')

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
                    <h3 class="fw-bold mb-0">Data Pengaduan</h3>
                </div>
                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                    @php
                        $hidden = '';
                        // cek apakah pegaduannya sudah ditangani
                        if (Auth::user()->role == 'siswa') {
                            if ($data->first()->status_pengaduan == 'selesai') {
                                $hidden = '';
                            } else {
                                $hidden = 'hidden';
                            }
                        }
                    @endphp
                    <button type="button" class="btn btn-primary-custom" {{ $hidden }} data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Tambah Pengaduan
                    </button>
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
                                                    <th class="text-xs text-secondary opacity-7">Tanggal Pengaduan</th>
                                                    <th class="text-xs text-secondary opacity-7">Pelapor</th>
                                                    <th class="text-xs text-secondary opacity-7">Isi Laporan</th>
                                                    <th class="text-xs text-secondary opacity-7">Tempat Kejadian</th>
                                                    <th class="text-xs text-secondary opacity-7">Status</th>
                                                    <th class="text-xs text-secondary opacity-7">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <div
                                                                class="img-profile d-flex align-items-center justify-content-start">
                                                                <span class="ms-2" style="font-size: 12px">
                                                                    <span class="fw-bold" style="font-size: 14px">
                                                                        {{ $item->siswa->name }} </span> <br>
                                                                    {{ $item->siswa->email }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            {{ $item->isi_pengaduan }}
                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            {{ $item->lokasi }}
                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            @php
                                                                $status = $item->status_pengaduan;
                                                                $badge = '';

                                                                if ($status == 'pengajuan') {
                                                                    $badge = 'badge bg-warning';
                                                                } elseif ($status == 'proses') {
                                                                    $badge = 'badge bg-primary';
                                                                } elseif ($status == 'selesai') {
                                                                    $badge = 'badge bg-secondary';
                                                                }
                                                            @endphp

                                                            <span class="{{ $badge }}">{{ $status }}</span>
                                                        </td>

                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <a href="{{ route('detail_pengaduan', $item->id) }}"
                                                                class="btn btn-sm custom-btn-edit hover-btn"
                                                                title="Detail"><i class="fa-solid fa-eye "></i></a>
                                                            {{-- <form action="{{ route('active_pertanyaan', $item->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @method('POST')
                                                                @csrf

                                                                <button type="submit"
                                                                    class="btn btn-sm custom-btn-setactive hover-btn"
                                                                    onclick="return confirm('apakah kamu yakin ingin mengubah status pertanyaan?')"
                                                                    title="Ubah Status" data-id="{{ $item->id }}">
                                                                    <i
                                                                        class="fa-solid fa-xmark text-primary fs-10"></i></button>
                                                            </form> --}}

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

    {{-- chatroom modal --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pelapor container">
                        <div class="row">

                            <div class="col-md-12 container">
                                <div class="konten-header">
                                    <div class="pelapor-identitas">
                                        <img id="photo-identitas" alt="">
                                        <span id="nama-identitas"></span>
                                    </div>

                                    <form action="{{ route('tambah_pengaduan_action') }}" method="POST" id="myForm">
                                        @method('POST')
                                        @csrf
                                        {{-- {{ dd('data', $data_siswa_available) }} --}}
                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'guru')
                                            <div class="mb-3">
                                                <label for="pelapor" class="form-label">Pelapor</label>
                                                <br>
                                                {{-- <select id="pelapor" name="siswa_id" class="form-select select-js"
                                                    style="background-color: #e9f1eb">
                                                    <option value="">Pilih Pelapor</option>
                                                    @foreach ($data_siswa_available as $item)
                                                        @if (count($data_siswa_available) > 0)
                                                            <option value="{{ $item['siswa_id'] }} ">{{ $item['email'] }}
                                                                -
                                                                {{ $item['name'] }}</option>
                                                        @endif
                                                    @endforeach


                                                    @if (count($data_siswa_available) == 0)
                                                        <option selected>Status Siswa Tidak Tersedia</option>
                                                    @endif
                                                </select> --}}
                                                <select id="pelapor" name="siswa_id" class=" select-js"
                                                    style="width: 95%;background-color: #e9f1eb">

                                                    <option value="">Pilih Pelapor</option>
                                                    @foreach ($data_siswa_available as $item)
                                                        @if (count($data_siswa_available) > 0)
                                                            <option value="{{ $item['siswa_id'] }}">{{ $item['email'] }} -
                                                                {{ $item['name'] }}</option>
                                                        @endif
                                                    @endforeach

                                                    @if (count($data_siswa_available) == 0)
                                                        <option selected>Status Siswa Tidak Tersedia</option>
                                                    @endif
                                                </select>

                                            </div>

                                        @endif

                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'siswa')
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Guru</label>
                                                <select name="guru_id" id="guru_id" class="select-js"
                                                    style="width: 95%;background-color: #e9f1eb">

                                                    <option value="">Pilih Guru</option>
                                                    @foreach ($data_guru as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        @endif

                                </div>
                            </div>

                        </div>

                    </div>
                    <input type="text" id="hasil-faq" name="hasilfaq" hidden>
                    {{-- <input type="text" id="hasil-idfaq"> --}}
                    <div class="chatbox mt-2">
                        <!-- Chat messages -->
                        <div class="row mb-3 container" id="chat-messages">
                            <!-- Initial message -->
                            @foreach ($pertanyaan as $index => $faq)
                                <div class="col-md-12 question" id="question-{{ $index }}">
                                    <div class="row mobile-col">
                                        <div class="col-md-6">
                                            <p class="text-start mb-1">FAQ</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-end mb-1">
                                                <span></span>{{ Carbon\Carbon::parse(date('Y-m-d H:i:s'))->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                    {{-- <input type="text" name="pertanyaan_id[]" id="pertanyaan_id"
                                        value="{{ $faq->id }}"> --}}
                                    <div class="box-percakapan mb-3">
                                        <span class="form-control" id="percakapan" name="pertanyaan" required
                                            style="background-color: #f1e9e9">
                                            {{ $faq->pertanyaan }}
                                        </span>
                                    </div>
                                    <div class="text-end float-end mb-3">
                                        <span class="form-control" id="jawaban" name="jawaban" required
                                            style="background-color: #e9f1eb">
                                            @php
                                                $datanya = \App\Models\Jawaban::where('pertanyaan_id', $faq->id)->get();
                                            @endphp

                                            @foreach ($datanya as $datanya)
                                                <div class="form-check">

                                                    <input class="form-check-input" type="radio"
                                                        name="answer-{{ $index }}"
                                                        id="answer-{{ $index }}-{{ $loop->index }}"
                                                        value="{{ $datanya->jawaban }}">
                                                    <label class="form-check-label"
                                                        for="answer-{{ $index }}-{{ $loop->index }}">
                                                        {{ $datanya->jawaban }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-arenya mb-2">
                            <label for="" class="form-label">Tanggal Kejadian</label>
                            <input type="date" name="tgl_kejadian" id="lokasi" class="form-control"
                                style="background-color: #e9f1eb" required>
                        </div>
                        <div class="text-arenya mb-2">
                            <label for="" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control"
                                style="background-color: #e9f1eb" required>
                        </div>
                        <div class="text-arenya mb-2">
                            <label for="" class="form-label">Isi Laporan Singkat</label>
                            <textarea name="isi_pengaduan" id="" cols="30" rows="10" class="form-control" required
                                style="background-color: #e9f1eb"></textarea>
                        </div>
                    </div>

                    {{-- hasil inputan --}}

                    <!-- Chat input -->
                    <div class="chat-btn p-3 d-flex flex-row align-items-center justify-content-between">
                        {{-- <img src="{{ asset('storage/img/', $item->image) }}" alt=""
                            class="img-fluid rounded-circle me-4"
                            style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #f1e9e9;"> --}}
                        {{-- <textarea name="percakapan" id="" cols="2" rows="2" class="form-control me-4"></textarea> --}}

                        <button type="button" class="btn btn-secondary-custom form-control" id="submit-button"> <i
                                class="fa-solid fa-paper-plane"></i>
                            Kirim</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 ketika modal ditampilkan
            $('#exampleModal').on('shown.bs.modal', function() {
                $('#pelapor').select2({
                    dropdownParent: $('#exampleModal')
                });
                $('#guru_id').select2({
                    dropdownParent: $('#exampleModal')
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentQuestionIndex = 0;
            const questions = document.querySelectorAll('.question');
            const submitButton = document.getElementById('submit-button');
            const form = document.getElementById('faq-form');

            const showNextQuestion = () => {
                if (currentQuestionIndex < questions.length) {
                    questions[currentQuestionIndex].style.display = 'block';
                } else {
                    submitButton.style.display = 'block'; // Show submit button after the last question
                }
            };

            questions.forEach((question, index) => {
                const inputs = question.querySelectorAll('input[type="radio"]');
                inputs.forEach(input => {
                    input.addEventListener('change', () => {
                        if (index === currentQuestionIndex) {
                            question.style.display = 'block';
                            currentQuestionIndex++;
                            showNextQuestion();
                        }
                    });
                });
            });
            const getValueInput = document.querySelector('#hasil-faq');
            // const getValueInputIdFaq = [];
            // getValueInputIdFaq = document.querySelector('#pertanyaan_id');
            // const getHasilIdPertanyaan = document.querySelector('#hasil-idfaq');
            submitButton.addEventListener('click', (e) => {
                e.preventDefault();
                const answers = [];
                questions.forEach((question, index) => {
                    const selectedInput = question.querySelector('input[type="radio"]:checked');

                    if (selectedInput) {
                        // answers[`${index}`] = selectedInput.value;
                        answers.push(selectedInput.value); // Add selected value to answers array
                        //set value getValueINput with selectedInput.value
                        // Set value of getValueInput with selectedInput.value
                    }
                });

                getValueInput.value = answers;
                // getHasilIdPertanyaan.push(getValueInputIdFaq.value);
                console.log(answers);
                // Log the answers to the console for now

                if (confirm('Are you sure you want to submit the form?')) {
                    // Submit the form programmatically
                    document.querySelector('#myForm').submit();
                }
            });

            showNextQuestion(); // Show the first question initially


        });
    </script>
@endpush
