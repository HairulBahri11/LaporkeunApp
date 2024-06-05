<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS with cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
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
    <link rel="stylesheet" href="{{ asset('style_auth.css') }}">

</head>

<body class="gradient-custom">
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
    <div class="container ">
        <div class="box-login p-4">
            <form class="p-5 form-login" action="{{ route('register_action') }}" method="POST">
                @csrf
                <div class="logo-box">
                    <img src="{{ asset('logo-brand2.png') }}" class="text-center" alt="" width="180px"
                        height="auto">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control rounded" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Email</label>
                    <input type="email" class="form-control rounded" id="username" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="mt-4 btn btn-primary-custom-login">Register</button>
                <div class="register mt-3">
                    <span>Anda sudah memiliki akun ? <a href="{{ 'login' }}"> Login</a> disini</span>
                </div>
            </form>
        </div>
    </div>



</body>

</html>
