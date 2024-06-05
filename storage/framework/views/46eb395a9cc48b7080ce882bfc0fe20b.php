<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Bootstrap CSS with cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300&family=Open+Sans:ital,wght@0,400;0,600;0,700;1,600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <?php echo $__env->yieldContent('style'); ?>
    
</head>
<style>
    /* font di dalam tabel diubah ukurannya */
    td,
    th {
        font-size: 14px;

    }
</style>

<body>
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
    <div class="container-fluid mt-3">
        <!-- navbar -->
        <section>
            <div class="navbar bg-white" style="border-radius: 15px">
                <div class="container">
                    <div class="logo">
                        <img src="<?php echo e(asset('logo-brand2.png')); ?>" width="80" height="auto" alt=""
                            style="font-weight: bold" />
                    </div>
                    <?php if(auth()->guard()->check()): ?>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="profileDropdown" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img class="profile" src="<?php echo e(asset('storage/img/' . Auth::user()->photo)); ?>" alt=""
                                    width="30px" height="30px" style="border-radius: 50%" />
                                <span style="font-size: 14px; color: black"><?php echo e(Auth::user()->name); ?></span>

                            </button>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="#"><i class="fa-solid fa-user me-2"></i>
                                    Profil</a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="btn-navbar">
                            <a href="<?php echo e(route('login')); ?>" class="btn custom-btn-login">Masuk</a>
                            <a href="<?php echo e(route('register')); ?>" class="btn custom-btn-register">Daftar</a>
                        </div>

                    <?php endif; ?>

                </div>
                <!-- buatkan image profile dropdown di navbar -->
            </div>
        </section>

    </div>

    

    <?php echo $__env->yieldContent('hero-banner'); ?>




    <div class="container-fluid">


        <div class="row g-3 mt-2">
            
            <div class="col-md-3 text-center">
                <div class="box-data-profile custom-col p-4">
                    <?php if(auth()->guard()->check()): ?>
                        <img src="<?php echo e(asset('storage/img/' . Auth::user()->photo)); ?>" alt=""
                            class="img-fluid rounded-circle"
                            style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #D9D9D9">
                        <p class="mt-2" style="font-size: 22px; font-weight: 600; line-height: 21px">
                            <?php echo e(Auth::user()->name); ?>

                        </p>
                        <p class="" style="font-size: 14px; color: #0F0F0F99">
                            <?php echo e(Auth::user()->email); ?>

                        </p>
                    <?php else: ?>
                        <img src="<?php echo e(asset('user1.png')); ?>" alt="" class="img-fluid rounded-circle"
                            style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #D9D9D9">
                        <p class="mt-2" style="font-size: 22px; font-weight: 600; line-height: 21px">
                            Hello Guest
                        </p>
                    <?php endif; ?>

                    <div class="menu ">
                        <p class="mt-4 text-start" style="font-size: 14px; color: #3C4937">Daftar Menu</p>
                        <a href="<?php echo e(route('home')); ?>" class="btn <?php echo $__env->yieldContent('active1'); ?> form-control menunya"
                            id="menu">
                            <i class="fas fa-home me-2"></i> Halaman Utama
                        </a>
                        <?php if(auth()->guard()->check()): ?>


                            <?php if(Auth::user()->role == 'admin'): ?>
                                <a href="<?php echo e(route('data_guru')); ?>"
                                    class="btn <?php echo $__env->yieldContent('active8'); ?> form-control menunya text-start" id="anak_menu">
                                    <i class="fas fa-user-tie me-2"></i> Data Guru
                                </a>
                                <a href="<?php echo e(route('data_siswa')); ?>"
                                    class="btn <?php echo $__env->yieldContent('active9'); ?> form-control menunya text-start" id="anak_menu">
                                    
                                    <i class="fas fa-user-graduate me-2"></i> Data Siswa
                                </a>
                                <a href="<?php echo e(route('data_pertanyaan')); ?>"
                                    class="btn <?php echo $__env->yieldContent('active10'); ?> form-control menunya text-start" id="anak_menu">
                                    
                                    <i class="fas fa-question me-2"></i> Data Pertanyaan
                                </a>
                            <?php endif; ?>
                            <?php if(Auth::user()->role == 'guru' || Auth::user()->role == 'admin' || Auth::user()->role == 'siswa'): ?>
                                <a href="<?php echo e(route('data_pengaduan')); ?>"
                                    class="btn <?php echo $__env->yieldContent('active11'); ?> form-control menunya text-start" id="anak_menu">
                                    
                                    <i class="fas fa-file-invoice me-2"></i> Data Pengaduan
                                </a>
                            <?php endif; ?>

                        <?php endif; ?>


                        <a href="#" class="btn <?php echo $__env->yieldContent('active3'); ?> form-control menunya text-start"
                            id="pengaturan_menu">
                            <i class="fas fa-cog me-2"></i> Pengaturan Akun
                        </a>


                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <?php echo $__env->yieldContent('main-content'); ?>
            </div>
        </div>
    </div>


    <!-- footer -->
    </div>
    <section class="mt-3">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-black" style="background-color: white;">
            <!-- Grid container -->
            <div class="p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row" style="font-size: 12px">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h5 class="text-uppercase mb-4 font-weight-bold">
                                <img src="<?php echo e(asset('logo-brand2.png')); ?>" alt="" width="130px"
                                    height="auto" />
                            </h5>
                            <p>
                                Jl. Suroyo No.39, Tisnonegaran, Kec. Kanigaran, Kota
                                Probolinggo, Jawa Timur 67219
                            </p>
                        </div>
                        <!-- Grid column -->




                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <p class="text-uppercase mb-4 fw-bold">Hubungi Kami</p>
                            <div class="wa">
                                <a class="btn btn-floating m-1"
                                    style="
                        background-color: #122d5a1a;
                        border: none;
                        border-radius: 100px;
                      "
                                    href="#!" role="button"><i class="fa-brands fa-whatsapp text-black"></i>
                                </a>
                                <span class="text-secondary" style="font-size: 12px">098987898765</span>
                            </div>
                            <div class="gmail">
                                <a class="btn btn-floating m-1"
                                    style="
                        background-color: #122d5a1a;
                        border: none;
                        border-radius: 100px;
                      "
                                    href="#!" role="button"><i class="fa-regular fa-envelope text-black"
                                        style="font-size: 12px"></i>
                                </a>
                                <span class="text-secondary" style="font-size: 12px">mitrakebaikan@gmail.com</span>
                            </div>
                            <div class="notelp">
                                <a class="btn btn-floating m-1"
                                    style="
                        background-color: #122d5a1a;
                        border: none;
                        border-radius: 100px;
                      "
                                    href="#!" role="button"><i class="fa fa-phone text-black"
                                        style="font-size: 12px"></i>
                                </a>
                                <span class="text-secondary" style="font-size: 12px">089878767876</span>
                            </div>
                        </div>
                        <!-- Grid column -->



                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <p class="text-uppercase mb-4 fw-bold">Bantuan & Informasi</p>
                            <p class="text-secondary mb-2">Tentang Kami</p>
                            <p class="text-secondary mb-2">Ketentuan dan Kebijakan</p>
                            <p class="text-secondary mb-2">Panduan Kami</p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <p class="text-uppercase mb-4 fw-bold">Follow us</p>

                            <!-- Facebook -->
                            <a class="btn btn-primary btn-floating m-1"
                                style="
                      background-color: #3b5998;
                      border: none;
                      border-radius: 100px;
                    "
                                href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-primary btn-floating m-1"
                                style="
                      background-color: #55acee;
                      border: none;
                      border-radius: 100px;
                    "
                                href="#!" role="button"><i class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <a class="btn btn-primary btn-floating m-1"
                                style="
                      background-color: #dd4b39;
                      border: none;
                      border-radius: 100px;
                    "
                                href="#!" role="button"><i class="fab fa-google"></i></a>

                            <!-- Instagram -->
                            <a class="btn btn-primary btn-floating m-1"
                                style="
                      background-color: #ac2bac;
                      border: none;
                      border-radius: 100px;
                    "
                                href="#!" role="button"><i class="fab fa-instagram"></i></a>

                            <!-- Linkedin -->
                            <a class="btn btn-primary btn-floating m-1"
                                style="
                      background-color: #0082ca;
                      border: none;
                      border-radius: 100px;
                    "
                                href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                            <!-- Github -->
                            <a class="btn btn-primary btn-floating m-1"
                                style="
                      background-color: #333333;
                      border: none;
                      border-radius: 100px;
                    "
                                href="#!" role="button"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: white">
                <span class="text-black text-start" style="text-decoration: none" href="#">©Laporkeun
                    2023.
                    All
                    rights reserved.</span>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>



</body>

</html>

<!-- Sertakan library Bootstrap JavaScript (Popper.js dan Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<?php echo $__env->yieldPushContent('js'); ?>
<script>
    let datatable = $('#example').DataTable({
        "order": [
            [0, "asc"]
        ], // Contoh pengurutan kolom pertama secara ascending
        "ordering": false // Menonaktifkan pengurutan otomatis
    });
</script>
<script>
    AOS.init();
</script>
<?php /**PATH C:\xampp_2\htdocs\Laporkeun\resources\views/component/layout_app.blade.php ENDPATH**/ ?>