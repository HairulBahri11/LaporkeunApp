<?php $__env->startSection('title', 'Data Siswa'); ?>

<?php $__env->startSection('active9', 'active'); ?>

<?php $__env->startSection('main-content'); ?>
    <div class="p-2" style="border-radius: 15px; background-color: white">
        <div class="container">
            <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
                <div class="title d-flex align-items-center justify-content-between gap-4">
                    <a href="<?php echo e(route('data_siswa')); ?>" id="btn-tambah">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h3 class="fw-bold mb-0">Data Siswa</h3>
                </div>

                <div class="filter gap-3 d-flex flex-row align-items-center justify-content-between ">
                    <form action="<?php echo e(route('tambah_siswa_action')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary-custom "> <i class="fa-solid fa-floppy-disk"></i>
                                Simpan</button>
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
                                        <label for="exampleFormControlInput1" class="form-label">NIS</label>
                                        <input type="number" name="nisn" class="form-control"
                                            id="exampleFormControlInput1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Siswa</label>
                                        <input type="text" name="name" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Ex. Joghardi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                                        
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
                                            placeholder="Ex. 6285123456789" required>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                                        <input type="text" name="kelas" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Ex. 8 D" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tahun Masuk</label>
                                        <input type="text" name="tahun_masuk" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Ex. 2025" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Ex. joghardi@gmail.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleFormControlInput1">
                                        <span class=" mt-1 " style="color: rgb(163, 8, 8); font-size: 11px"> Note. Isi
                                            jika
                                            ingin mengganti password</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                                        <input type="file" name="photo" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3">
                                        <span class=" mt-1 " style="color: rgb(163, 8, 8); font-size: 11px"> Note. Isi
                                            jika
                                            ingin mengganti foto</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Alamat </label>
                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"
                                            placeholder="Alamat lengkap" required> </textarea>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('component.layout_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_2\htdocs\Laporkeun\resources\views/admin/siswa/create.blade.php ENDPATH**/ ?>