<?php $__env->startSection('title', 'Data Pengaduan'); ?>

<?php $__env->startSection('active11', 'active'); ?>

<?php $__env->startSection('main-content'); ?>



    <?php if(session('success')): ?>
        <script>
            swal({
                title: "Good job!",
                text: "<?php echo e(session('success')); ?>!",
                icon: "success",
                button: "OK",
            });
        </script>
    <?php elseif(session('error')): ?>
        <script>
            swal({
                title: "Oops!",
                text: "<?php echo e(session('error')); ?>!",
                icon: "error",
                button: "OK",
            });
        </script>
    <?php endif; ?>

    <section>
        <div class="section  mb-3" style="border-radius: 15px; background-color: white ">
            <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
                <div class="title">
                    <h3 class="fw-bold mb-0">Data Pengaduan</h3>
                </div>
                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">

                    <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <?php echo e($item->created_at); ?>

                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <div
                                                                class="img-profile d-flex align-items-center justify-content-start">
                                                                <span class="ms-2" style="font-size: 12px">
                                                                    <span class="fw-bold" style="font-size: 14px">
                                                                        <?php echo e($item->siswa->name); ?> </span> <br>
                                                                    <?php echo e($item->siswa->email); ?>

                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <?php echo e($item->isi_pengaduan); ?>

                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <?php echo e($item->lokasi); ?>

                                                        </td>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <?php
                                                                $status = $item->status_pengaduan;
                                                                $badge = '';

                                                                if ($status == 'pengajuan') {
                                                                    $badge = 'badge bg-warning';
                                                                } elseif ($status == 'proses') {
                                                                    $badge = 'badge bg-primary';
                                                                } elseif ($status == 'selesai') {
                                                                    $badge = 'badge bg-secondary';
                                                                }
                                                            ?>

                                                            <span class="<?php echo e($badge); ?>"><?php echo e($status); ?></span>
                                                        </td>

                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <a href="<?php echo e(route('detail_pengaduan', $item->id)); ?>"
                                                                class="btn btn-sm custom-btn-edit hover-btn"
                                                                title="Detail"><i class="fa-solid fa-eye "></i></a>
                                                            

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                                    <form action="<?php echo e(route('tambah_pengaduan_action')); ?>" method="POST" id="myForm">
                                        <?php echo method_field('POST'); ?>
                                        <?php echo csrf_field(); ?>
                                        
                                        <div class="mb-3">
                                            <label for="pelapor" class="form-label">Pelapor</label>
                                            <select id="pelapor" name="siswa_id" class="form-select"
                                                style="background-color: #e9f1eb">
                                                <option value="">Pilih Pelapor</option>


                                                <?php $__currentLoopData = $data_siswa_available; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(count($data_siswa_available) > 0): ?>
                                                        <option value="<?php echo e($item['siswa_id']); ?> "><?php echo e($item['email']); ?> -
                                                            <?php echo e($item['name']); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php if(count($data_siswa_available) == 0): ?>
                                                    <option selected>Status Siswa Tidak Tersedia</option>
                                                <?php endif; ?>

                                            </select>
                                        </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <input type="text" id="hasil-faq" name="hasilfaq" hidden>
                    
                    <div class="chatbox mt-5">
                        <!-- Chat messages -->
                        <div class="row mb-3 container" id="chat-messages">
                            <!-- Initial message -->
                            <?php $__currentLoopData = $pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12 question" id="question-<?php echo e($index); ?>">
                                    <div class="row mobile-col">
                                        <div class="col-md-6">
                                            <p class="text-start mb-1">Admin Laporkeun</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-end mb-1">
                                                <span></span><?php echo e(Carbon\Carbon::parse(date('Y-m-d H:i:s'))->diffForHumans()); ?>

                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="box-percakapan mb-3">
                                        <span class="form-control" id="percakapan" name="pertanyaan" required
                                            style="background-color: #f1e9e9">
                                            <?php echo e($faq->pertanyaan); ?>

                                        </span>
                                    </div>
                                    <div class="text-end float-end mb-3">
                                        <span class="form-control" id="jawaban" name="jawaban" required
                                            style="background-color: #e9f1eb">
                                            <?php
                                                $datanya = \App\Models\Jawaban::where('pertanyaan_id', $faq->id)->get();
                                            ?>

                                            <?php $__currentLoopData = $datanya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datanya): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-check">

                                                    <input class="form-check-input" type="radio"
                                                        name="answer-<?php echo e($index); ?>"
                                                        id="answer-<?php echo e($index); ?>-<?php echo e($loop->index); ?>"
                                                        value="<?php echo e($datanya->jawaban); ?>">
                                                    <label class="form-check-label"
                                                        for="answer-<?php echo e($index); ?>-<?php echo e($loop->index); ?>">
                                                        <?php echo e($datanya->jawaban); ?>

                                                    </label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                    

                    <!-- Chat input -->
                    <div class="chat-btn p-3 d-flex flex-row align-items-center justify-content-between">
                        
                        

                        <button type="button" class="btn btn-secondary-custom form-control" id="submit-button"> <i
                                class="fa-solid fa-paper-plane"></i>
                            Kirim</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    

    

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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('component.layout_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_2\htdocs\Laporkeun\resources\views/admin/pengaduan/index.blade.php ENDPATH**/ ?>