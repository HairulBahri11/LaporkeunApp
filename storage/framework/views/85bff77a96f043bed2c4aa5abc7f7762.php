<?php $__env->startSection('title', 'Data Guru'); ?>

<?php $__env->startSection('active10', 'active'); ?>

<?php $__env->startSection('main-content'); ?>
    <div class="p-2" style="border-radius: 15px; background-color: white">
        <div class="container">
            <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
                <div class="title d-flex align-items-center justify-content-between gap-4">
                    <a href="<?php echo e(route('data_pertanyaan')); ?>" id="btn-tambah">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0">Data Pertanyaan</h3>
                </div>

                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                    <form action="<?php echo e(route('tambah_jawaban_action')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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
                                            placeholder="Buat Pertanyaan" readonly> <?php echo e($data->pertanyaan); ?></textarea>
                                    </div>
                                    <input type="text" name="pertanyaan_id" value="<?php echo e($data->id); ?>"
                                        class="form-control" hidden>
                                    <div class="btn d-flex justify-content-end align-items-end gap-3">
                                        <span id="btn-add" class="btn btn-info btn-sm text-white">Tambah</span>
                                        <span id="btn-remove" class="btn btn-danger btn-sm text-white d-none"
                                            onclick="removeJadwal()">Hapus</span>
                                    </div>


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Opsi Jawaban</label>
                                        <input type="text" name="jawaban[]" class="form-control" id="jawaban">
                                        <div class="opsi-jawaban mt-3">

                                        </div>
                                    </div>



                                </div>
                            </div>

                            <input type="text" name="all_jawaban[]" class="form-control" id="all_jawaban" hidden>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        let btnAdd = document.getElementById('btn-add')
        let btnRemove = document.getElementById('btn-remove')
        let jawaban = document.getElementById('jawaban')

        // function addJadwal() {
        //     btnAdd.classList.toggle('d-none')
        //     btnRemove.classList.toggle('d-none')
        //     jawaban.classList.toggle('d-none')
        // }

        function removeJadwal() {
            btnAdd.classList.toggle('d-none')
            btnRemove.classList.toggle('d-none')
            jawaban.classList.toggle('d-none')
        }
        var i = 0;
        $('#btn-add').click(function() {
            ++i;
            $('.opsi-jawaban').append(`
            <div class="mb-3">
                                    <input type="text" name="jawaban[]" class="form-control"
                                        id="jawaban"required>
                                </div>
                `);
            $('#btn-remove').removeClass('d-none');
            console.log(i);

        });

        let all_jawaban = []

        $(document).on('change', 'input[name="jawaban[]"]', function() {
            all_jawaban = $('input[name="jawaban[]"]').map(function() {
                return $(this).val();
            }).get();
            $('#all_jawaban').val(all_jawaban);
        })

        function removeJadwal() {
            $('.opsi-jawaban').children().last().remove();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('component.layout_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_2\htdocs\Laporkeun\resources\views/admin/jawaban/create.blade.php ENDPATH**/ ?>