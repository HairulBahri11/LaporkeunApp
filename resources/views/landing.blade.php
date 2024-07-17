<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Creative - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('landingpage/assets/favicon.ico') }}" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('landingpage/css/styles.css') }}" rel="stylesheet" />
</head>

<style>
    .textnya {
        height: 250px;
        overflow: hidden;
        overflow-x: hidden;
        overflow-y: hidden;

    }
</style>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('logo-brand2.png') }}" width="80"
                    height="auto" alt=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    {{-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Sekolah Aman Tanpa Bullying Bersama Mitra Kebaikan!</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Laporkan tindakan bullying sekarang dan bantu ciptakan lingkungan
                        sekolah yang lebih aman dan harmonis. Privasi Anda adalah prioritas kami.</p>
                    <a class="btn btn-primary btn-xl" href="{{ route('register') }}">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Sekolah Aman Tanpa Bullying Bersama Mitra Kebaikan!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Selamat datang di Mitra Kebaikan,

                        Bullying di sekolah adalah masalah serius yang mempengaruhi kesehatan mental dan fisik banyak
                        siswa. Di Mitra Kebaikan, kami menyediakan platform yang aman dan rahasia untuk melaporkan
                        tindakan bullying. Kami mengutamakan privasi dan kenyamanan pelapor, memastikan setiap laporan
                        ditangani dengan serius dan bijaksana. <br>

                        <span style="padding-top: 20px"> Dengan melaporkan tindakan bullying, Anda berperan aktif dalam
                            menciptakan lingkungan sekolah
                            yang aman dan mendukung. Urgensi untuk menangani bullying tidak bisa diabaikan, dan
                            bersama-sama, kita dapat membawa perubahan positif. </span>
                        <br>

                        Masuk sekarang untuk melaporkan atau cari tahu lebih lanjut tentang layanan kami. Suara Anda
                        sangat berarti.

                    </p>
                    <a class="btn btn-light btn-xl" href="#services">Panduan Penggunaan!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Tindakan Bullying</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-justify">
                    <div class="mt-5">
                        <div class="textnya" style=" overflow-x: hidden">
                            <div class="mb-2  text-center "><i class="bi bi-person fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2  text-center ">Verbal</h3>
                            <p class="text-muted mb-2"> Tindakan yang dilakukan menyebabkan rasa terhina,
                                mendapatkan
                                ejekan, atau menerima ancaman.</p>
                        </div>
                        <button class=" nmt-2 btn btn-primary  form-control" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop_verbal" type="button"> Detail</button>
                    </div>
                </div>

                {{-- modal verbal   --}}
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop_verbal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Verbal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Bullying Verbal</h3>
                                <p>Bullying verbal adalah bentuk kekerasan emosional yang melibatkan penggunaan
                                    kata-kata atau ucapan untuk merendahkan, menghina, atau menyakiti seseorang. Ini
                                    bisa terjadi di berbagai situasi, seperti di sekolah, tempat kerja, atau bahkan di
                                    lingkungan keluarga. Bullying verbal dapat memiliki dampak yang signifikan pada
                                    kesehatan mental korban, termasuk stres, kecemasan, dan penurunan harga diri.</p>

                                <h4>Contoh-contoh Bullying Verbal</h4>
                                <ul>
                                    <li><strong>Nama Panggilan Negatif</strong>: Memanggil seseorang dengan nama yang
                                        merendahkan atau menghina, seperti "bodoh," "gila," atau "jemukan."</li>
                                    <li><strong>Cemoohan dan Olokan</strong>: Mengejek atau mencemooh seseorang dengan
                                        komentar yang merendahkan, seperti "Kamu selalu gagal dalam segala hal" atau
                                        "Kamu tidak pernah bisa melakukan apapun dengan benar."</li>
                                    <li><strong>Ancaman</strong>: Mengeluarkan ancaman yang bisa menakut-nakuti korban,
                                        seperti "Jika kamu tidak melakukan apa yang aku katakan, aku akan membuat
                                        hidupmu sengsara."</li>
                                    <li><strong>Pengucilan Sosial</strong>: Mengabaikan seseorang dalam percakapan atau
                                        kegiatan sosial dengan sengaja untuk membuat mereka merasa tidak diterima atau
                                        terasing.</li>
                                    <li><strong>Menyebar Rumor atau Fitnah</strong>: Mengatakan hal-hal yang tidak benar
                                        atau merugikan tentang seseorang untuk merusak reputasinya, seperti "Dia hanya
                                        berpura-pura baik di depan orang lain" atau "Dia sebenarnya tidak tahu apa-apa
                                        tentang pekerjaan ini."</li>
                                </ul>

                                <h4>Jenis-jenis Bullying Verbal</h4>
                                <ul>
                                    <li><strong>Insult (Hinaan)</strong>: Komentar atau ucapan yang dirancang untuk
                                        merendahkan atau menghina korban secara langsung.
                                        <ul>
                                            <li><em>Contoh</em>: "Kamu sangat bodoh dan tidak berharga."</li>
                                        </ul>
                                    </li>
                                    <li><strong>Sarcasm (Sarkasme)</strong>: Ucapan yang tampaknya positif tetapi
                                        sebenarnya bersifat merendahkan atau menghina.
                                        <ul>
                                            <li><em>Contoh</em>: "Wah, bagus sekali. Sepertinya kamu benar-benar hebat
                                                dalam hal ini" (ketika sebenarnya korban gagal).</li>
                                        </ul>
                                    </li>
                                    <li><strong>Rumor dan Fitnah</strong>: Menyebarkan informasi yang salah atau
                                        merugikan tentang seseorang untuk merusak reputasinya.
                                        <ul>
                                            <li><em>Contoh</em>: "Dia sebenarnya mencuri barang-barang di kantor."</li>
                                        </ul>
                                    </li>
                                    <li><strong>Ancaman</strong>: Menggunakan kata-kata untuk mengancam atau
                                        menakut-nakuti seseorang agar mengikuti kemauan pelaku.
                                        <ul>
                                            <li><em>Contoh</em>: "Jika kamu tidak melakukan apa yang aku mau, aku akan
                                                memberitahu semua orang rahasiamu."</li>
                                        </ul>
                                    </li>
                                    <li><strong>Penyinggungan (Taunting)</strong>: Mengejek atau mengolok-olok seseorang
                                        secara berulang-ulang.
                                        <ul>
                                            <li><em>Contoh</em>: "Kamu selalu begitu canggung di depan umum. Kenapa
                                                tidak belajar untuk berhenti menjadi bahan tertawaan?"</li>
                                        </ul>
                                    </li>
                                </ul>

                                <p>Bullying verbal dapat menyebabkan kerusakan emosional dan psikologis yang mendalam
                                    bagi korban, dan penting untuk mengidentifikasi serta menangani perilaku ini dengan
                                    cara yang tepat. Intervensi dari orang dewasa, dukungan sosial, dan pendidikan
                                    tentang komunikasi yang sehat dapat membantu mengatasi dan mencegah bullying verbal.
                                </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-justify">
                    <div class="mt-5">
                        <div class="textnya" style=" overflow-x: hidden">
                            <div class="mb-2  text-center"><i class="bi-people fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2  text-center">Relasional</h3>
                            <p class="text-muted mb-0"> Kejahatan relasional terjadi ketika kita dikucilkan, diabaikan,
                                atau
                                dihindari oleh kelompok lain</p>
                        </div>
                        <button class=" mt-2 btn btn-primary  form-control" type="button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop_relasional"> Detail</button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop_relasional" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Relasional</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Bullying Relasional</h3>
                                <p>Bullying relasional, juga dikenal sebagai bullying sosial, adalah bentuk bullying
                                    yang berfokus pada merusak hubungan sosial dan reputasi seseorang di kelompok
                                    sosial. Berbeda dengan bullying fisik atau verbal, bullying relasional tidak selalu
                                    melibatkan kontak fisik atau ucapan langsung, tetapi lebih pada tindakan yang
                                    mempengaruhi status sosial dan hubungan interpersonal korban.</p>

                                <h4>Contoh-contoh Bullying Relasional</h4>
                                <ul>
                                    <li><strong>Pengucilan Sosial</strong>: Mengabaikan atau mengecualikan seseorang
                                        dari kelompok atau aktivitas sosial.
                                        <ul>
                                            <li><em>Contoh</em>: Tidak mengundang seseorang ke acara sosial atau
                                                pertemuan kelompok, dan memberi tahu orang lain untuk tidak berinteraksi
                                                dengan mereka.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Gosip dan Penyebaran Rumor</strong>: Menyebarkan informasi atau rumor
                                        yang merusak reputasi seseorang.
                                        <ul>
                                            <li><em>Contoh</em>: Mengungkapkan berita palsu atau rahasia pribadi tentang
                                                seseorang dengan tujuan mempermalukan mereka di depan orang lain.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Manipulasi Hubungan</strong>: Menggunakan strategi untuk merusak
                                        hubungan antara korban dan teman atau kelompok mereka.
                                        <ul>
                                            <li><em>Contoh</em>: Menceritakan kebohongan kepada teman dekat korban untuk
                                                membuat mereka menjauh dari korban.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Pelecehan Emosional</strong>: Menggunakan taktik yang dirancang untuk
                                        menurunkan harga diri atau kepercayaan diri korban melalui manipulasi emosional.
                                        <ul>
                                            <li><em>Contoh</em>: Menyebarkan perasaan tidak berharga pada korban dengan
                                                mengkritik atau mengabaikan mereka secara konsisten.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Pencemaran Nama Baik</strong>: Mencemarkan nama baik korban dengan
                                        tindakan yang membuatnya tampak tidak pantas atau tidak dapat diterima di
                                        kelompok sosial.
                                        <ul>
                                            <li><em>Contoh</em>: Menyebarkan gambar atau video yang memalukan tentang
                                                seseorang di media sosial untuk membuat mereka tertekan atau malu.</li>
                                        </ul>
                                    </li>
                                </ul>

                                <h4>Jenis-jenis Bullying Relasional</h4>
                                <ul>
                                    <li><strong>Exclusion (Pengucilan)</strong>: Tindakan yang dilakukan untuk secara
                                        sengaja mengecualikan seseorang dari kelompok atau interaksi sosial.
                                        <ul>
                                            <li><em>Contoh</em>: Mengabaikan seseorang dalam percakapan grup atau tidak
                                                mengundang mereka ke acara.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Gossiping (Gosip)</strong>: Menyebarkan informasi yang merugikan atau
                                        tidak benar tentang seseorang untuk merusak reputasi mereka.
                                        <ul>
                                            <li><em>Contoh</em>: Membagikan cerita bohong tentang kehidupan pribadi
                                                seseorang untuk membuat orang lain menjauh dari mereka.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Backhanded Compliments (Pujian Berlapis)</strong>: Memberikan pujian
                                        yang tampaknya positif tetapi sebenarnya merendahkan atau menyakiti.
                                        <ul>
                                            <li><em>Contoh</em>: "Kamu tampaknya sangat pandai menyembunyikan
                                                ketidakmampuanmu dari orang lain."</li>
                                        </ul>
                                    </li>
                                    <li><strong>Social Rejection (Penolakan Sosial)</strong>: Menghindari atau menolak
                                        untuk berinteraksi dengan seseorang di lingkungan sosial.
                                        <ul>
                                            <li><em>Contoh</em>: Secara terbuka menolak untuk bergaul atau
                                                berpartisipasi dengan seseorang dalam kegiatan sosial.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Triangulation (Triangulasi)</strong>: Menggunakan pihak ketiga untuk
                                        menciptakan konflik atau ketegangan antara korban dan orang lain.
                                        <ul>
                                            <li><em>Contoh</em>: Menggunakan teman bersama untuk menyebarkan rumor atau
                                                menciptakan ketegangan antara korban dan orang lain dalam kelompok.</li>
                                        </ul>
                                    </li>
                                </ul>

                                <p>Bullying relasional dapat menyebabkan dampak emosional dan sosial yang mendalam pada
                                    korban, termasuk penurunan harga diri, stres, dan isolasi sosial. Mengatasi bullying
                                    relasional memerlukan perhatian terhadap dinamika sosial, dukungan emosional bagi
                                    korban, serta upaya untuk membangun lingkungan sosial yang inklusif dan saling
                                    menghormati.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-justify">
                    <div class="mt-5">
                        <div class="textnya" style=" overflow-x: hidden">
                            <div class="mb-2  text-center"><i class="bi bi-person-badge fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2 text-center">Cyberbullying</h3>
                            <p class="text-muted mb-0">Bentuk bullying melibatkan perilaku agresif, intimidasi, atau
                                penghinaan terhadap seseorang
                                atau kelompok melalui teknologi digital.</p>
                        </div>
                        <button class=" mt-2 btn btn-primary  form-control" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop_cyberbullying" type="button"> Detail</button>
                    </div>
                </div>
                {{-- modal --}}
                <div class="modal fade" id="staticBackdrop_cyberbullying" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Cyberbullying</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Cyberbullying</h3>
                                <p>Cyberbullying adalah bentuk bullying yang terjadi melalui media digital seperti
                                    internet, telepon seluler, atau aplikasi pesan. Ini mencakup penggunaan teknologi
                                    untuk menyebarluaskan kebencian, ancaman, atau perilaku merendahkan terhadap
                                    seseorang. Cyberbullying bisa melibatkan berbagai platform, termasuk media sosial,
                                    email, pesan teks, atau forum online.</p>

                                <h4>Contoh-contoh Cyberbullying</h4>
                                <ul>
                                    <li><strong>Pesan Ancaman</strong>: Mengirimkan pesan yang mengancam keselamatan
                                        atau kesejahteraan seseorang.
                                        <ul>
                                            <li><em>Contoh</em>: Mengirim pesan teks atau email dengan ancaman fisik,
                                                seperti "Aku akan datang ke rumahmu dan membuatmu menyesal."</li>
                                        </ul>
                                    </li>
                                    <li><strong>Komentar Negatif di Media Sosial</strong>: Memposting komentar
                                        merendahkan atau menghina di platform media sosial.
                                        <ul>
                                            <li><em>Contoh</em>: Menulis komentar negatif di foto seseorang, seperti
                                                "Kamu sangat jelek di foto ini. Tidak heran tidak ada yang mau berteman
                                                denganmu."</li>
                                        </ul>
                                    </li>
                                    <li><strong>Penyebaran Rumor atau Fitnah Online</strong>: Menyebarkan informasi
                                        palsu atau merusak reputasi seseorang melalui platform online.
                                        <ul>
                                            <li><em>Contoh</em>: Mengunggah video atau gambar yang dipalsukan untuk
                                                mempermalukan seseorang.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Penggunaan Nama Panggilan Negatif</strong>: Memanggil seseorang dengan
                                        julukan yang menghina atau merendahkan secara online.
                                        <ul>
                                            <li><em>Contoh</em>: Menggunakan nama panggilan seperti "penipu" atau
                                                "goblok" dalam pesan atau komentar online.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Penghinaan Publik</strong>: Memublikasikan informasi pribadi atau
                                        memalukan tentang seseorang di situs web atau media sosial.
                                        <ul>
                                            <li><em>Contoh</em>: Membagikan foto pribadi seseorang tanpa izin atau
                                                mengungkapkan informasi pribadi yang sensitif.</li>
                                        </ul>
                                    </li>
                                </ul>

                                <h4>Jenis-jenis Cyberbullying</h4>
                                <ul>
                                    <li><strong>Hate Speech (Ujaran Kebencian)</strong>: Menggunakan kata-kata atau
                                        pernyataan yang merendahkan, menghina, atau menyebarkan kebencian terhadap
                                        individu atau kelompok tertentu.
                                        <ul>
                                            <li><em>Contoh</em>: Menggunakan bahasa diskriminatif terhadap ras, gender,
                                                atau agama dalam komentar atau posting online.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Trolling</strong>: Melibatkan tindakan sengaja untuk memprovokasi atau
                                        mengganggu seseorang dengan komentar yang merugikan.
                                        <ul>
                                            <li><em>Contoh</em>: Menulis komentar provokatif yang dirancang untuk memicu
                                                pertengkaran atau reaksi emosional dari korban.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Outing (Pengungkapan Pribadi)</strong>: Mengungkapkan informasi pribadi
                                        atau sensitif tentang seseorang tanpa izin mereka.
                                        <ul>
                                            <li><em>Contoh</em>: Memublikasikan alamat rumah, nomor telepon, atau detail
                                                pribadi lainnya secara online.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Harassment (Pelecehan)</strong>: Melakukan tindakan berulang kali yang
                                        bersifat mengganggu atau menyakiti seseorang secara digital.
                                        <ul>
                                            <li><em>Contoh</em>: Mengirimkan pesan ancaman atau pelecehan terus-menerus
                                                melalui email atau pesan teks.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Exclusion (Pengucilan)</strong>: Mengabaikan atau mengecualikan
                                        seseorang dari kelompok online atau percakapan sebagai bentuk peminggiran
                                        sosial.
                                        <ul>
                                            <li><em>Contoh</em>: Tidak mengundang seseorang ke dalam grup chat atau
                                                forum yang mereka biasa ikuti, dan memberi tahu orang lain bahwa mereka
                                                tidak diinginkan.</li>
                                        </ul>
                                    </li>
                                </ul>

                                <p>Cyberbullying dapat memiliki dampak yang serius pada kesehatan mental dan emosional
                                    korban, termasuk kecemasan, depresi, dan isolasi sosial. Pencegahan dan penanganan
                                    cyberbullying melibatkan edukasi tentang penggunaan teknologi yang aman, pemantauan
                                    aktivitas online, serta dukungan dari orang tua, guru, dan komunitas untuk
                                    menciptakan lingkungan digital yang positif.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-justify">
                    <div class="mt-5">
                        <div class="textnya" style=" overflow-x: hidden">
                            <div class="mb-2  text-center"><i class="bi bi-people fs-1 text-primary"></i>
                            </div>
                            <h3 class="h4 mb-2  text-center">Fisik</h3>
                            <p class="text-muted mb-0">Fisik bullying sering kali melibatkan tindakan kekerasan seperti
                                tendangan, pukulan, atau tamparan,
                                yang dapat meninggalkan bekas luka baik secara fisik maupun emosional</p>
                        </div>
                        <button class=" mt-2 btn btn-primary  form-control" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop_fisik" type="button"> Detail</button>
                    </div>
                </div>
                {{-- modal --}}
                <div class="modal fade" id="staticBackdrop_fisik" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Fisik</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Bullying Fisik</h3>
                                <p>Bullying fisik adalah bentuk kekerasan yang melibatkan serangan fisik terhadap
                                    seseorang dengan tujuan merendahkan, menyakiti, atau mengendalikan mereka. Ini
                                    sering kali terjadi di lingkungan sekolah, tempat kerja, atau bahkan di rumah.
                                    Berikut adalah penjelasan tentang beberapa bentuk bullying fisik dan jenis-jenisnya:
                                </p>

                                <ul>
                                    <li><strong>Pukulan</strong>:
                                        <ul>
                                            <li><em>Definisi</em>: Menggunakan tangan atau benda keras untuk memukul
                                                tubuh korban.</li>
                                            <li><em>Jenis-jenisnya</em>: Pukulan bisa berupa tinju, sabetan tangan
                                                terbuka, atau menggunakan benda seperti buku atau tongkat untuk memukul.
                                            </li>
                                        </ul>
                                    </li>
                                    <li><strong>Tendangan</strong>:
                                        <ul>
                                            <li><em>Definisi</em>: Menggunakan kaki untuk menyerang korban, biasanya
                                                dengan tujuan menyebabkan rasa sakit atau cedera.</li>
                                            <li><em>Jenis-jenisnya</em>: Tendangan bisa berupa tendangan langsung ke
                                                tubuh, tendangan ke bagian perut atau kepala, atau tendangan dari jarak
                                                jauh.</li>
                                        </ul>
                                    </li>
                                    <li><strong>Tamparan</strong>:
                                        <ul>
                                            <li><em>Definisi</em>: Menampar wajah atau bagian tubuh lain dengan tangan
                                                terbuka.</li>
                                            <li><em>Jenis-jenisnya</em>: Tamparan bisa berupa tamparan ringan yang hanya
                                                menyebabkan ketidaknyamanan atau tamparan keras yang meninggalkan bekas
                                                atau menyebabkan luka.</li>
                                        </ul>
                                    </li>
                                </ul>

                                <h4>Jenis-jenis Bullying Fisik</h4>
                                <ul>
                                    <li><strong>Serangan Langsung</strong>: Ini melibatkan serangan fisik langsung
                                        seperti pukulan, tendangan, atau tamparan.</li>
                                    <li><strong>Serangan Menggunakan Benda</strong>: Melibatkan penggunaan benda untuk
                                        menyerang korban, seperti melemparkan benda atau menggunakan benda keras untuk
                                        memukul.</li>
                                    <li><strong>Pencemaran Fisik</strong>: Tindakan yang mencemarkan atau merusak
                                        barang-barang pribadi korban, seperti merusak pakaian atau barang milik korban.
                                    </li>
                                </ul>

                                <p>Bullying fisik dapat mengakibatkan trauma fisik dan emosional yang serius bagi
                                    korban, termasuk cedera, rasa takut, dan gangguan mental seperti kecemasan dan
                                    depresi. Pencegahan dan penanganan bullying fisik memerlukan kesadaran, intervensi
                                    yang tepat, dan dukungan dari lingkungan sekitar.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Portfolio-->

    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">Pengembang Aplikasi</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('pengembang1.jpg') }}" width="100%" height="350px" alt="">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('pengembang2.jpg') }}" width="100%" height="350px" alt="">
                </div>
            </div>
        </div>
    </section>

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
                                <img src="{{ asset('logo-brand2.png') }}" alt="" width="130px"
                                    height="auto" />
                            </h5>
                            <p>
                                Jl Tanjung Pura Rt9 Rw5, Pegadungan, Kalideres, Jakarta Barat, DKI Jakarta 11830

                            </p>
                        </div>
                        <!-- Grid column -->




                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mt-3">
                            <p class="text-uppercase mb-4 fw-bold">Hubungi Kami</p>

                            <div class="gmail">
                                <a class="btn btn-floating m-1"
                                    style="
                        background-color: #122d5a1a;
                        border: none;
                        border-radius: 100px;
                      "
                                    href="#" role="button"><i class="fa fa-envelope text-black"
                                        style="font-size: 12px"></i>
                                </a>
                                <span class="text-secondary" style="font-size: 8px">app.mitrakebaikan@gmail.com</span>
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
                <span class="text-black text-start" style="text-decoration: none" href="#">©Mitra Kebaikan
                    2023.
                    All
                    rights reserved.</span>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('landingpage/js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
