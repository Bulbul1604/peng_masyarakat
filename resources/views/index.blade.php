<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name'); }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="py-3 navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#!">
                <img src="{{ asset('logo.png') }}" alt="" width="140">
            </a>
            @auth
            <a href="{{ route('dashboard') }}" class="fw-bold text-dark">{{ ucwords(auth()->user()->name) }}</a>
            @else
            <div class="gap-3 d-inline-flex">
                <a class="px-3 btn btn-sm btn-dark rounded-3" href="{{ route('login') }}">Login</a>
                <a class="px-3 btn btn-sm btn-outline-dark rounded-3" href="{{ route('register') }}">Registrasi</a>
            </div>
            @endauth
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-3 fw-light" style="font-size: 2.6rem; letter-spacing: 0.1rem">Sistem Pengaduan
                            Masyarakat
                        </h1>
                        <h1 class="mb-4">Kelurahan Loktuan</h1>
                        <h5 class="mb-5 fw-light">
                            Selamat datang di website pengaduan masyarakat loktuan. Sampaikan laporan dan keluhan Anda
                            langsung kepada Instansi, dan kami akan segera memprosesnya.
                        </h5>
                        <a href="{{ route('login') }}" class="px-5 py-3 text-sm btn btn-sm btn-outline-light">Buat
                            Laporan
                            Anda</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Icons Grid-->
    <section class="text-center features-icons bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mx-auto mb-5 features-icons-item mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="m-auto bi bi-card-list text-dark"></i>
                        </div>
                        <h3>{{count($complaint)}}</h3>
                        <p class="mb-0 lead">Total Pengaduan Sistem Pengaduan Masyarakat</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto mb-5 features-icons-item mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="m-auto bi bi-card-checklist text-dark"></i>
                        </div>
                        <h3>{{count($response)}}</h3>
                        <p class="mb-0 lead">Total Tanggapan Sistem Pengaduan Masyarakat</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto mb-0 features-icons-item mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="m-auto bi bi-person-lines-fill text-dark"></i>
                        </div>
                        <h3>{{count($user)}}</h3>
                        <p class="mb-0 lead">Total Akun Masyarakat Sistem Pengaduan Masyarakat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Showcases-->
    <section class="showcase">
        <div class="p-0 container-fluid">
            <div class="row g-0">
                <div class="text-white col-lg-6 order-lg-2 showcase-img"
                    style="background-image: url('assets/img/bg-showcase-1.jpg')"></div>
                <div class="my-auto col-lg-6 order-lg-1 showcase-text">
                    <h2>Buat Laporan</h2>
                    <p class="mb-0 lead">Sampaikan keluhan anda dengan jelas di website Sistem Pengaduan
                        Masyarakat (SiPeka) Kelurahan Loktuan dan jangan menyebarkan berita hoax!</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="text-white col-lg-6 showcase-img"
                    style="background-image: url('assets/img/bg-showcase-2.jpg')"></div>
                <div class="my-auto col-lg-6 showcase-text">
                    <h2>Foto yang Jelas</h2>
                    <p class="mb-0 lead">Jangan lupa mengirimkan foto keluhan anda saat menyampaikan laporan. Silahkan
                        upload foto yang jelas agar memudahkan memberikan tanggapan.</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="text-white col-lg-6 order-lg-2 showcase-img"
                    style="background-image: url('assets/img/bg-showcase-3.jpg')"></div>
                <div class="my-auto col-lg-6 order-lg-1 showcase-text">
                    <h2>Laporan Selesai</h2>
                    <p class="mb-0 lead">Setelah menyampaikan laporan atau keluhan silahkan tunggu sampai laporan yang
                        anda berikan di tanggapi oleh petugas kelurahan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action-->
    <section class="text-center text-white call-to-action" id="signup">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h4 class="mb-4 fw-light">Ada pertanyaan seputar SiPeka? Silahkan chat admin SiPeka</h4>
                    <a href="https://api.whatsapp.com/send/?phone=6288888888888&amp;text&amp;type=phone_number&amp;app_absent=0"
                        target="_blank" class="px-3 py-2 mr-1 border-0 rounded btn btn-sm btn-light">
                        <div class="d-flex align-items-center text-success">
                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" style="fill: #1CC88A;">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                                </path>
                            </svg>
                            Chat via&nbsp;<span class="fw-semibold">Whatsapp</span>&nbsp;untuk info lebih lanjut
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="my-auto text-center col-lg-6 h-100 text-lg-start">
                    <p class="mb-4 text-muted small mb-lg-0">&copy; SiPeka Kelurahan Loktuan 2022. All Rights Reserved.
                    </p>
                </div>
                <div class="my-auto text-center col-lg-6 h-100 text-lg-end">
                    <img src="{{ asset('logo.png') }}" alt="" width="150">
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
