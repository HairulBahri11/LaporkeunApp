<?php $__env->startSection('title', 'Data Pengaduan'); ?>

<?php $__env->startSection('active11', 'active'); ?>

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
                <div class="title d-flex align-items-center justify-content-between gap-4">
                    <a href="<?php echo e(route('data_pengaduan')); ?>" id="btn-tambah">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0"> Detail Pengaduan</h3>
                </div>
                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">

                    <form action="<?php echo e(route('proses_laporan', $data->id)); ?>" method="POST"
                        id="form-proses-laporan"style="display: inline-block;">
                        <?php echo method_field('POST'); ?>
                        <?php echo csrf_field(); ?>

                        
                        <?php if($data->status_pengaduan != 'selesai'): ?>
                            <button type="submit" class="btn btn-green-custom"
                                id="btn-proses"onclick="return confirm('apakah kamu yakin ingin mengubah status laporan pengaduan menjadi selesai?')"
                                title="Ubah Status">Selesai</button>
                        <?php endif; ?>

                    </form>
                </div>
            </div>

            <section>
                <div class="container">
                    <div class="row p-3">
                        <div class="col-md-3 text-center ">
                            <span class="img-profile text-center">
                                <img src="<?php echo e(asset('storage/img/' . $data->siswa->photo)); ?>" width="150px" height="130px"
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
                                        <?php echo e($data->siswa->name); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Email</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <span>
                                            <?php echo e($data->siswa->email); ?>

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
                                        <?php echo e($detail_data_pelapor->nisn); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Kelas</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <?php echo e($detail_data_pelapor->kelas); ?>

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
                                        <?php echo e($detail_data_pelapor->tahun_masuk); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Status Siswa</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <?php echo e($data->siswa->status); ?>

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
                                        <?php $__currentLoopData = $data_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="faq-item">
                                                <td>
                                                    <div class="faq-question"><?php echo e($item->faq->pertanyaan); ?>?</div>
                                                    <div class="faq-answer"><?php echo e($item->jawaban); ?></div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <?php echo e($data->created_at); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Tanggal Kejadian</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <?php echo e($data->tgl_pengaduan); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Tempat Kejadian</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <?php echo e($data->lokasi); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Isi Laporan Singkat</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <?php echo e($data->isi_pengaduan); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Status Laporan</label>
                                    </td>
                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <?php
                                            $status = $data->status_pengaduan;
                                            $badge = '';

                                            if ($status == 'pengajuan') {
                                                $badge = 'badge bg-warning';
                                            } elseif ($status == 'proses') {
                                                $badge = 'badge bg-primary';
                                            } elseif ($status == 'selesai') {
                                                $badge = 'badge bg-success';
                                            }
                                        ?>

                                        <span class="p-2 <?php echo e($badge); ?>"><?php echo e($status); ?> </span>

                                    </td>
                                </tr>
                                <tr>

                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                        <label for="nama" class="fw-bold mb-0">Ditangani
                                        </label>
                                    </td>


                                    <td class="text-xs text-secondary opacity-7">
                                        <span class="fw-bold" style="font-size: 16px"><?php echo e($data->guru->name); ?> -
                                            <?php echo e($data->guru->email); ?></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>





<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('component.layout_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_2\htdocs\Laporkeun\resources\views/admin/pengaduan/show.blade.php ENDPATH**/ ?>