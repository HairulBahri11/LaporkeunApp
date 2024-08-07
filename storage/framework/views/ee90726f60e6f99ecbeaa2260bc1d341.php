<?php $__env->startSection('title', 'Halaman Utama'); ?>
<?php $__env->startSection('active1', 'active'); ?>
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
<?php $__env->startSection('hero-banner'); ?>
    <section class="mt-3" id="home-hero-banner">
        <div class="hero">
            <div class="container-fluid">
                <img src="<?php echo e(asset('Group 25.png')); ?>" alt=""
                    style=" width: 100%;
                height: 370px;
                object-fit: cover;
                border-radius: 15px;
                position: relative;" />
            </div>
            <div class="hero-text">
                <p class="hero-title">
                    Cegah Kejahatan di Lingkungan Anda, Ayo Laporkan Sekarang!
                </p>
                <p class="hero-subtitle">
                    Anda bisa mencegah kejahatan dengan mengambil langkah-langkah melaporkan
                    melalului aplikasi ini.
                </p>
            </div>


        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>

    <div class="section  mb-3" style="border-radius: 15px; background-color: white ">
        <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
            <div class="title">
                <h5 class="fw-bold mb-0">Halaman Utama</h5>
            </div>
            
        </div>
    </div>

    
    
    
    <div class="row">
        <div class="col-md-6">
            <div class="section-box-card p-5 mb-3" style="border-radius: 15px; background-color: #046118 ; padding: 10px">
                <div class="icon-box">
                    <img src="<?php echo e(asset('storage/img/icons8-aggression-50.png')); ?>" alt="" class="img-fluid"
                        style="background-color: #6E9865; padding: 10px; border-radius: 50%">
                </div>
                <div class="box-content text-white">
                    <h2 class="mt-2 mb-2">Verbal</h2>
                    <p class="mt-2" style="text-align: justify;">
                        Tindakan yang dilakukan menyebabkan rasa terhina, mendapatkan ejekan, atau menerima ancaman.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="section-box-card p-5 mb-3" style="border-radius: 15px; background-color: white ; padding: 10px">
                <div class="icon-box">
                    <img src="<?php echo e(asset('storage/img/icons8-aggression-50.png')); ?>" alt="" class="img-fluid"
                        style="background-color: #2017; padding: 10px; border-radius: 50%">
                </div>
                <div class="box-content">
                    <h2 class="mt-2 mb-2">Relasional</h2>
                    <p class="mt-2" style="text-align: justify;">
                        Kejahatan relasional terjadi ketika kita dikucilkan, diabaikan, atau dihindari oleh kelompok lain
                    </p>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="section-box-card p-5 mb-3" style="border-radius: 15px; background-color: white ; padding: 10px">
                <div class="icon-box">
                    <img src="<?php echo e(asset('storage/img/icons8-aggression-50.png')); ?>" alt="" class="img-fluid"
                        style="background-color: #6E9865; padding: 10px; border-radius: 50%">
                </div>
                <div class="box-content">
                    <h2 class="mt-2 mb-2">Fisik</h2>
                    <p class="mt-2" style="text-align: justify;">
                        Fisik bullying sering kali melibatkan tindakan kekerasan seperti tendangan, pukulan, atau tamparan,
                        yang dapat meninggalkan bekas luka baik secara fisik maupun emosional
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="section-box-card p-5 mb-3" style="border-radius: 15px; background-color: #059c26 ; padding: 10px">
                <div class="icon-box">
                    <img src="<?php echo e(asset('storage/img/icons8-aggression-50.png')); ?>" alt="" class="img-fluid"
                        style="background-color: #6E9865; padding: 10px; border-radius: 50%">
                </div>
                <div class="box-content text-white">
                    <h2 class="mt-2 mb-2">Cyberbullying</h2>
                    <p class="mt-2" style="text-align: justify;">
                        Bentuk bullying melibatkan perilaku agresif, intimidasi, atau penghinaan terhadap seseorang
                        atau kelompok melalui teknologi digital.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="row mb-3">
        <div class="col-xl-8 col-xxl-8 mb-3">
            <div id="chartContainer" class="p-2 bg-white" style="border-radius: 15px ">
                <?php echo $chart->container(); ?>

            </div>
        </div>
        <div class="col-xl-4 col-xxl-4">
            <div id="jumlahKasusPengajuan" class="p-4 bg-white mb-4"
                style="border-radius: 15px; height: 122px;position: relative; overflow: hidden; z-index: 1">
                <i class="fa-regular fa-circle-question"
                    style="font-size:100px; color: #F6C90E; position: absolute; top: 80%; left: 80%; transform: translate(-50%, -50%); z-index: -1; opacity: 0.2"></i>

                <div class="d-flex align-items-center justify-content-start flex-column ">
                    <h1 class="d-block fw-bold" style="color: #F6C90E"><?php echo e($jumlah_pengaduan); ?></h1>
                    <h3 class="">Pengajuan</h3>
                </div>
            </div>
            <div id="jumlahKasusPengajuan" class="p-4 bg-white mb-4"
                style="border-radius: 15px; height: 122px;position: relative; overflow: hidden; z-index: 1">
                <i class="fa-solid fa-handshake"
                    style="font-size:100px; color: #0eccf6; position: absolute; top: 80%; left: 80%; transform: translate(-50%, -50%); z-index: -1; opacity: 0.2"></i>


                <div class="d-flex align-items-center justify-content-start flex-column ">
                    <h1 class="d-block fw-bold" style="color: #0eccf6"><?php echo e($jumlah_proses); ?></h1>
                    <h3 class="">Proses</h3>
                </div>
            </div>
            <div id="jumlahKasusPengajuan" class="p-4 bg-white mb-4"
                style="border-radius: 15px; height: 122px;position: relative; overflow: hidden; z-index: 1">
                <i class="fa-regular fa-check-circle"
                    style="font-size:100px; color: #0ef682; position: absolute; top: 80%; left: 80%; transform: translate(-50%, -50%); z-index: -1; opacity: 0.2"></i>

                <div class="d-flex align-items-center justify-content-start flex-column ">
                    <h1 class="d-block fw-bold" style="color: #0ef682"><?php echo e($jumlah_selesai); ?></h1>
                    <h3 class="">Selesai</h3>
                </div>
            </div>
        </div>



    </div>




    <?php if(Auth::user()->role == 'admin' || Auth::user()->role == 'guru'): ?>
        <div class="section  mb-3" style="border-radius: 15px; background-color: white ">
            <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
                <div class="title">
                    <h5 class="fw-bold mb-0">Data Laporan</h5>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if(count($data_pengaduan) != 0): ?>



                <?php $__currentLoopData = $data_pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6">
                        <div class="section-box p-4 mb-3" style="border-radius: 15px; background-color: white ">
                            <div
                                class="header-box p-4 text-center d-flex flex-row justify-content-between align-items-center">
                                <div class="profile d-flex align-items-center justify-content-between">
                                    <img src="<?php echo e(asset('storage/img/' . $item->siswa->photo)); ?>" alt=""
                                        class="img-fluid rounded-circle"
                                        style="width: 50px; height: 50px; border-radius: 50%; border: 1px solid #f1e9e9; object-fit: cover">
                                    <div class="identitas ms-3 text-start  ">
                                        <h6 class="fw-bold mb-0"><?php echo e($item->siswa->name); ?></h6>
                                        <p class="mb-0"><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d M Y')); ?>

                                        </p>

                                    </div>

                                </div>
                                <span id="id_pengaduannya"></span>
                                
                                <?php if(Auth::check()): ?>
                                    <button class="btn btn-outline-secondary ms-2 p-3" style="border-radius: 15px;"
                                        type="button"
                                        onclick="detail('<?php echo e($item->id); ?>', '<?php echo e($item->siswa->id); ?>')">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-outline-secondary ms-2 p-3" style="border-radius: 15px;"
                                        type="button" onclick="redirectToLogin()">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </button>
                                <?php endif; ?>

                            </div>
                            <div class="content-box ps-4 pe-4 pb-4 ">
                                <div class="laporan">
                                    <p style="text-align: justify"><?php echo e($item->isi_pengaduan); ?></p>

                                </div>
                                <div class="reaction">
                                    
                                    <div class="komentarnya">
                                        <i class="fa-solid fa-location-dot text-primary" style="font-size: 20px"></i>
                                        <span class="ms-1 me-4"><?php echo e($item->lokasi); ?></span>
                                    </div>

                                    
                                    <div class="status">
                                        <i class="fa-solid fa-check text-success" style="font-size: 20px"></i>
                                        <span class="ms-1 "><?php echo e($item->status_pengaduan); ?></span>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-md-12">
                    <div class="section-box p-4 mb-3" style="border-radius: 15px; background-color: white ">
                        <div class="header-box p-4 text-center d-flex justify-content-center align-items-center">
                            <div class="profile d-flex align-items-center justify-content-center">
                                <div class="identitas ms-3 text-start  ">

                                    <img src="<?php echo e(asset('nodata.png')); ?>" alt="" width="400px" height="300px"
                                        class="text-center">

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            <?php endif; ?>
    <?php endif; ?>
    </div>
    <div class="row mt-2">
        <span class="d-flex justify-content-center align-items-center">
            <?php echo e($data_pengaduan->links()); ?>

        </span>

    </div>


    
    <section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Laporan Pengaduan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="section  mb-3" style="border-radius: 15px; background-color: white ">
                            <div class="header-box p-4 text-center d-flex justify-content-between align-items-center">
                                <div class="title d-flex align-items-center justify-content-between gap-4">
                                    <h3 class="fw-bold mb-0"> Detail Pengaduan</h3>
                                </div>
                            </div>

                            <section>
                                <div class="container">
                                    <div class="row p-3">
                                        <div class="col-md-3 text-center ">
                                            <span class="img-profile text-center">
                                                <img id="img-profile-detail" width="150px" height="130px"
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
                                                        
                                                        <span id="nama_siswa"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                                        <label for="nama" class="fw-bold mb-0">Email</label>
                                                    </td>
                                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                                        <span id="email_siswa">

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
                                                        <span id="nisn_siswa"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                                        <label for="nama" class="fw-bold mb-0">Kelas</label>
                                                    </td>
                                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                                        <span id="kelas"></span>
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
                                                        <span id="thn_masuk"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                                        <label for="nama" class="fw-bold mb-0">Status Siswa</label>
                                                    </td>
                                                    <td class="text-xs text-secondary opacity-7 align-middle">
                                                        <span id="status_siswa"></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="faq-section p-4">
                                            <h4 class="faq-title">FAQ</h4>
                                            <table class="table table-borderless">
                                                <tbody id="faq-list">
                                                    <span id="pertanyaan"></span>
                                                    <span id="jawaban"></span>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-4">
                                        <h4 class="faq-title">Laporan Pengaduan</h4>
                                        <table class="table mb-1">
                                            <tr>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <label for="nama" class="fw-bold mb-0">Tanggal Pengaduan</label>
                                                </td>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <span id="tgl_pengaduan"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <label for="nama" class="fw-bold mb-0">Tanggal Kejadian</label>
                                                </td>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <span
                                                        id
                                                       ="tgl_kejadian"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <label for="nama" class="fw-bold mb-0">Tempat Kejadian</label>
                                                </td>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <span id="lokasi"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <label for="nama" class="fw-bold mb-0">Isi Laporan Singkat</label>
                                                </td>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <span id="isi_pengaduan"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <label for="nama" class="fw-bold mb-0">Status Laporan</label>
                                                </td>
                                                <td class="text-xs text-secondary opacity-7 align-middle">
                                                    <span id="status_pengaduan"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer modal-footer-fluid">
                            <form action="#" method="POST" id="form-proses-laporan">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <button type="button" class="btn btn-success" id="btn-proses">Proses Laporan</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo e($chart->cdn()); ?>"></script>

    <?php echo e($chart->script()); ?>


    <script>
        $(document).ready(function() {
            $('#year').change(function() {
                var selectedYear = $(this).val();
                $.ajax({
                    url: '<?php echo e(route('chart')); ?>',
                    type: 'GET',
                    data: {
                        year: selectedYear
                    },
                    success: function(response) {
                        alert('AJAX request successful!'); // Alert message
                        $('#chart').html(response.chart);
                        eval(response.chartScript);
                        console.log(response, selectedYear);

                        // Update chart data
                        var chart = response.chart;
                        var chartScript = response.chartScript;

                        // Update chart container
                        $('#chart').html(chart);
                        // Update selected year display
                        $('#selectedYear').text(response.selectedYear);
                        // Update chart container
                        $('#chart').html(chart);

                        // Evaluate chart script
                        eval(chartScript);

                        // Re-render the chart
                        if (window.LarapexCharts) {
                            window.LarapexCharts.forEach((chart) => {
                                chart.render();
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('AJAX request failed!'); // Alert message for error
                        console.error(xhr.responseText); // Log error response
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
        function redirectToLogin() {
            alert('Silakan login terlebih dahulu untuk melihat detail kasus.');
            window.location.href = '/login'; // Ganti dengan URL halaman login Anda
        }

        function detail(id_pengaduan, id_siswa) {
            $('#exampleModal').modal('show');

            var link = "<?php echo e(route('detail_pengaduan_ajax', ':id')); ?>";
            link = link.replace(':id', id_pengaduan);
            console.log(id_pengaduan);

            $.ajax({
                type: "GET",
                url: link,
                dataType: "json",
                success: function(response) {
                    // data pengaduan
                    console.log(response);
                    $('#id').text(response.tb_pengaduan.id);
                    $('#tgl_pengaduan').text(moment(response.tb_pengaduan.created_at).format('D MMMM YYYY'));
                    $('#tgl_kejadian').text(moment(response.tb_pengaduan.tgl_pengaduan).format('D MMMM YYYY'));
                    $('#lokasi').text(response.tb_pengaduan.lokasi);
                    $('#isi_pengaduan').text(response.tb_pengaduan.isi_pengaduan);
                    $('#status_pengaduan').text(response.tb_pengaduan.status_pengaduan);

                    // data siswa pelapor
                    $('#id_siswa').text(id_siswa);
                    $('#nama_siswa').text(response.data_pelapor.name);
                    $('#nisn_siswa').text(response.detail_data_pelapor.nisn);
                    $('#email_siswa').text(response.data_pelapor.email);
                    $('#kelas').text(response.detail_data_pelapor.kelas);
                    $('#thn_masuk').text(response.detail_data_pelapor.tahun_masuk);
                    $('#status_siswa').text(response.data_pelapor.status);

                    // img profile
                    $('#img-profile-detail').attr('src', '/storage/img/' + response.data_pelapor.photo);

                    // Clear existing rows and populate FAQ list
                    var faqList = $('#faq-list');
                    faqList.empty(); // Clear any existing rows

                    $.each(response.tb_pengaduan_detail, function(index, item) {

                        var faqItem = `

                    <tr class="faq-item">
                        <td>
                            <div class="faq-question">${item.faq.pertanyaan}?</div>
                            <div class="faq-answer">${item.jawaban}</div>
                        </td>
                    </tr>
                `;
                        faqList.append(faqItem);
                    });

                    // change atribute action
                    $('#form-proses-laporan').attr('action', "<?php echo e(route('proses_laporan', ':id')); ?>".replace(
                        ':id', id_pengaduan));
                    $('#btn-proses').click(function() {
                        $('#form-proses-laporan').submit();
                    })
                },
                // error: function(xhr, status, error) {
                //     console.error('Error fetching data:', error);
                //     alert('Error fetching data. Please try again.');
                // }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('component.layout_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp_2\htdocs\Laporkeun\resources\views/index.blade.php ENDPATH**/ ?>