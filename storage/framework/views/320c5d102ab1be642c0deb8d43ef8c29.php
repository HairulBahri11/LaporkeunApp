<?php $__env->startSection('title', 'Data Jawaban'); ?>

<?php $__env->startSection('active10', 'active'); ?>

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
                    <h3 class="fw-bold mb-0">Detail Jawaban</h3>
                </div>
                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                    <a href="<?php echo e(route('tambah_jawaban', $id_pertanyaan)); ?>" class="btn btn-outline-primary-custom"
                        id="btn-tambah">
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
                                        
                                        <table class="table table-hover" id="example">
                                            <thead class="bg-gray-100 p-1">
                                                <tr style="bg-color: black" class="mt-2">
                                                    <th class="text-xs text-secondary opacity-7">Pertanyaan</th>
                                                    <th class="text-xs text-secondary opacity-7">Jawaban</th>

                                                    <th class="text-xs text-secondary opacity-7">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <?php echo e($item->pertanyaan->pertanyaan); ?>

                                                        </td>

                                                        <td class="text-xs text-secondary opacity-7 align-middle">
                                                            <?php echo e($item->jawaban); ?>

                                                        </td>

                                                        <td class="text-xs text-secondary opacity-7 align-middle">

                                                            <form action="<?php echo e(route('delete_jawaban', $item->id)); ?>"
                                                                method="POST" style="display: inline-block;">
                                                                <?php echo method_field('POST'); ?>
                                                                <?php echo csrf_field(); ?>

                                                                <button type="submit"
                                                                    class="btn btn-sm custom-btn-setactive hover-btn"
                                                                    onclick="return confirm('apakah kamu yakin ingin menghapus pertanyaan?')"
                                                                    title="Ubah Status" data-id="<?php echo e($item->id); ?>">
                                                                    <i
                                                                        class="fa-solid fa-trash text-danger fs-10"></i></button>
                                                            </form>

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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('component.layout_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_2\htdocs\Laporkeun\resources\views/admin/jawaban/index.blade.php ENDPATH**/ ?>