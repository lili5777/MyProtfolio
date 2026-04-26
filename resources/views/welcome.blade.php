<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Meyawo landing page.">
    <meta name="author" content="Devcrud">
    <title>Ferdiansyah</title>

    {{-- Preconnect untuk domain eksternal agar koneksi lebih cepat --}}
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="preconnect" href="https://ghchart.rshah.org">

    <!-- font icons -->
    <link rel="stylesheet" href="{{asset('assets/vendors/themify-icons/css/themify-icons.css')}}">
    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="{{asset('assets/css/meyawo.css')}}">

    {{-- AOS versi spesifik (bukan @next) agar lebih cepat di-cache browser --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

    <style>
        .blog-img-container {
            width: 100%;
            aspect-ratio: 1/1;
            overflow: hidden;
        }

        .blog-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        @media (max-width: 767.98px) {
            .blog-img-container {
                aspect-ratio: 16/12;
            }
        }

        /* Certificate Carousel */
        #certificates {
            background-color: #f8f9fa;
            padding: 60px 0;
        }

        .certificate-card {
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }

        .certificate-img {
            height: 500px;
            object-fit: contain;
            background: #f5f5f5;
        }

        .certificate-caption {
            padding: 20px;
            background: white;
        }

        .certificate-caption h5 {
            color: #333;
            margin-bottom: 5px;
        }

        .certificate-caption p {
            color: #666;
            font-size: 0.9rem;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            background-size: 50%;
        }

        .carousel-indicators li {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .carousel-indicators .active {
            background-color: #007bff;
        }

        /* GitHub Section */
        .github-stats-wrapper {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .github-stats-box {
            flex: 1;
            min-width: 300px;
        }

        .github-stats-box h4 {
            margin-bottom: 12px;
        }

        /* Gambar GitHub stats responsive */
        .github-stats-img {
            width: 100%;
            max-width: 450px;
            height: auto;
            border-radius: 8px;
            display: block;
            margin: 0 auto;
        }

        .github-chart-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 20px;
        }

        .github-chart-inner {
            min-width: 900px;
        }

        .github-chart-inner img {
            width: 100%;
            display: block;
        }

        /* Skeleton loader saat gambar GitHub belum load */
        .github-img-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 8px;
            height: 120px;
            width: 100%;
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        @media (max-width: 768px) {
            .certificate-img {
                height: 300px;
            }

            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                width: 30px;
                height: 30px;
            }

            .github-stats-box {
                min-width: 100%;
            }
        }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page Navbar -->
    <nav class="custom-navbar" data-spy="affix" data-offset-top="20" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <a class="logo" href="#">Zaily</a>
            <ul class="nav">
                <li class="item"><a class="link" href="#home">Home</a></li>
                <li class="item"><a class="link" href="#about">About</a></li>
                <li class="item"><a class="link" href="#portfolio">Project</a></li>
                <li class="item"><a class="link" href="#github">Contributions</a></li>
                <li class="item"><a class="link" href="#blog">Blog</a></li>
                <li class="item"><a class="link" href="#testmonial">Testmonial</a></li>
                <li class="item ml-md-3">
                    <a href="#contact" class="btn btn-primary">Contact</a>
                </li>
            </ul>
            <a href="javascript:void(0)" id="nav-toggle" class="hamburger hamburger--elastic">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </a>
        </div>
    </nav>

    <!-- page header -->
    <header id="home" class="header">
        <div class="overlay"></div>
        <div class="header-content container">
            <h1 class="header-title">
                <span class="up" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1000">HI!</span>
                <p class="down" data-aos="zoom-in" data-aos-delay="600" data-aos-duration="1000">
                    I am <span class="writext"></span>
                </p>
            </h1>
            <a href="#about" class="btn btn-primary" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1000">
                About Me
            </a>
        </div>
    </header>

    <!-- about section -->
    <section class="section pt-0" id="about">
        <div class="container text-center">
            <div class="about">
                <div class="about-img-holder">
                    {{-- Foto profil: tidak perlu lazy (above the fold) --}}
                    <img src="{{asset('assets/img/' . $user->photo)}}"
                         class="about-img"
                         data-aos="fade-right"
                         data-aos-duration="1000"
                         alt="Foto profil {{$user->name}}">
                </div>
                <div class="about-caption">
                    <p class="section-subtitle" data-aos="zoom-in" data-aos-duration="1000">Who Am I ?</p>
                    <h2 class="section-title mb-3" data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">
                        About Me
                    </h2>
                    <p data-aos="fade-down" data-aos-delay="500" data-aos-duration="1000">
                        {{$user->about}}
                    </p>
                    <a href="{{asset('assets/doc/' . $user->document)}}"
                       download="MY_CV.pdf"
                       class="btn-rounded btn btn-outline-primary mt-4"
                       data-aos="fade-down" data-aos-delay="500" data-aos-duration="1000">
                        Download CV
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- service section -->
    <section class="section" id="service">
        <div class="container text-center">
            <p class="section-subtitle">What I Do ?</p>
            <h6 class="section-title mb-6">Service</h6>
            <div class="row">
                @foreach ($service as $sv)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="service-card">
                            <div class="body">
                                {{-- Icon service: lazy load --}}
                                <img src="{{asset('assets/imgs/' . $sv->icon)}}"
                                     alt="{{$sv->name}}"
                                     class="icon"
                                     loading="lazy">
                                <h6 class="title">{{$sv->name}}</h6>
                                <p class="subtitle">{{$sv->desc}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- skills section -->
    <section class="section" id="skills">
        <div class="container text-center">
            <p class="section-subtitle">What Can I Do ?</p>
            <h6 class="section-title mb-6">Skills</h6>
            <div class="row">
                @foreach ($skill as $s)
                    <div class="col-md-6 col-lg-3 my-2">
                        <h6 class="title">{{$s->name}}</h6>
                        <div class="progress mt-2 mb-3">
                            <div class="progress-bar"
                                 role="progressbar"
                                 style="width: {{$s->progress}}%; background-color: {{$s->color}}"
                                 aria-valuenow="{{$s->progress}}"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- portfolio section -->
    <section class="section" id="portfolio">
        <div class="container text-center">
            <p class="section-subtitle">What I Did ?</p>
            <h6 class="section-title mb-6">Projects</h6>
            <div class="row">
                @foreach ($projek as $pro)
                    <div class="col-md-4 mb-4">
                        <a href="{{route('detailproject', $pro->id)}}" class="portfolio-card">
                            {{-- Gunakan asset() dengan benar, tambah lazy load --}}
                            <img class="portfolio-card-img img-responsive rounded"
                                 src="{{ asset($pro->photo) }}"
                                 alt="{{$pro->name}}"
                                 loading="lazy">
                            <span class="portfolio-card-overlay">
                                <span class="portfolio-card-caption">
                                    <h4>{{$pro->name}}</h4>
                                    <p class="font-weight-normal">{{$pro->desc}}</p>
                                </span>
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- GitHub Contributions Section -->
    <section class="section bg" id="github">
        <div class="container text-center">
            <p class="section-subtitle">My GitHub Journey</p>
            <h6 class="section-title mb-6">GitHub Contributions</h6>

            {{-- 
                FIX: Ganti iframe dengan <img> biasa.
                Iframe buka koneksi penuh ke server lain = lambat & bisa timeout.
                Img jauh lebih ringan karena hanya download gambar PNG.
            --}}

            <!-- Kalender Kontribusi -->
            <div class="github-chart-wrapper pb-5">
                <div class="github-chart-inner">
                    <img src="https://ghchart.rshah.org/lili5777"
                         alt="GitHub Contribution Chart lili5777"
                         loading="lazy"
                         style="width: 100%; display: block;"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <p style="display:none; color:#999; padding:20px;">
                        Chart tidak dapat dimuat saat ini.
                    </p>
                </div>
            </div>

            <!-- Stats & Streak pakai img (bukan iframe) -->
            <div class="github-stats-wrapper">
                <div class="github-stats-box">
                    <h4>GitHub Stats</h4>
                    <img class="github-stats-img"
                         src="https://github-readme-stats.vercel.app/api?username=lili5777&show_icons=true&hide_title=true&count_private=true&hide=prs&cache_seconds=86400"
                         alt="GitHub Stats lili5777"
                         loading="lazy"
                         onerror="this.outerHTML='<p style=\'color:#999\'>Stats tidak dapat dimuat.</p>'">
                </div>
                <div class="github-stats-box">
                    <h4>GitHub Streak</h4>
                    <img class="github-stats-img"
                         src="https://github-readme-streak-stats.herokuapp.com/?user=lili5777&hide_border=true&date_format=M%20j%5B%2C%20Y%5D"
                         alt="GitHub Streak lili5777"
                         loading="lazy"
                         onerror="this.outerHTML='<p style=\'color:#999\'>Streak tidak dapat dimuat.</p>'">
                </div>
            </div>
        </div>
    </section>

    <!-- Certificates Section -->
    <section class="section" id="certificates">
        <div class="container text-center">
            <p class="section-subtitle">My Achievements</p>
            <h6 class="section-title mb-6">Certificates</h6>

            @if($certificates->isEmpty())
                <p class="text-muted">Sertifikat belum diupload</p>
            @else
                <div id="certificateCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($certificates as $index => $certificate)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="certificate-card mx-auto">
                                    @php
                                        $ext = strtolower(pathinfo($certificate->foto, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <img src="{{ asset('assets/serti/' . $certificate->foto) }}"
                                             class="d-block w-100 certificate-img"
                                             alt="{{ $certificate->nama }}"
                                             loading="lazy">
                                    @elseif($ext === 'pdf')
                                        <embed src="{{ asset('assets/serti/' . $certificate->foto) }}"
                                               type="application/pdf"
                                               class="d-block w-100"
                                               style="height: 500px;">
                                    @else
                                        <p class="text-center py-5">Format file tidak didukung</p>
                                    @endif

                                    <div class="certificate-caption">
                                        <h5>{{ $certificate->nama }}</h5>
                                        <p>{{ $certificate->company }} - {{ $certificate->terbit }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#certificateCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#certificateCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                    <ol class="carousel-indicators">
                        @foreach($certificates as $index => $certificate)
                            <li data-target="#certificateCarousel"
                                data-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}">
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endif
        </div>
    </section>

    <!-- blog section -->
    <section class="section" id="blog">
        <div class="container text-center">
            <p class="section-subtitle">Recent Posts?</p>
            <h6 class="section-title mb-6">Blog</h6>

            @if($blog->isEmpty())
                <p class="text-muted">Blog belum diupload</p>
            @else
                @foreach ($blog as $b)
                    <div class="blog-card">
                        <div class="blog-card-header">
                            <div class="blog-img-container">
                                {{-- Lazy load gambar blog --}}
                                <img src="{{ $b->foto }}"
                                     alt="{{ $b->judul }}"
                                     class="blog-img"
                                     loading="lazy"
                                     onerror="this.src='{{asset('assets/imgs/default-blog.jpg')}}'">
                            </div>
                        </div>
                        <div class="blog-card-body">
                            <h5 class="blog-card-title">{{$b->judul}}</h5>
                            <p class="blog-card-caption">
                                <a href="#">By: {{$b->penulis}}</a>
                                <a href="#"><i class="ti-heart text-danger"></i> {{$b->like}}</a>
                                <a href="#"><i class="ti-comment"></i> {{$b->komentars->count()}}</a>
                                <a href="#"><i class="ti-eye"></i> {{ $b->view }}</a>
                            </p>
                            <p>{{ Str::limit(strip_tags($b->isi), 120) }}</p>
                            <a href="{{ route('blogs.showuser', $b->id) }}" class="blog-card-link">
                                Read more <i class="ti-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- footer -->
    <div class="container">
        <footer class="footer">
            <p class="mb-0">Copyright
                <script>document.write(new Date().getFullYear())</script> &copy; Ferdiansyah
            </p>
            <div class="social-links text-right m-auto ml-sm-auto">
                <a href="mailto:zailyanzali@gmail.com" class="link"><i class="ti-email"></i></a>
                <a href="https://linkedin.com/in/ferdiansyah7179" class="link"><i class="ti-linkedin"></i></a>
                <a href="https://www.instagram.com/ferdiansyah_7179" class="link"><i class="ti-instagram"></i></a>
            </div>
        </footer>
    </div>

    {{-- 
        =============================================
        URUTAN SCRIPT - SANGAT PENTING!
        =============================================
        1. jQuery HARUS load duluan (TANPA defer)
        2. Bootstrap butuh jQuery -> load setelah jQuery (TANPA defer)  
        3. Bootstrap affix butuh jQuery -> setelah Bootstrap (TANPA defer)
        4. Meyawo.js butuh jQuery -> setelah semua di atas (TANPA defer)
        5. AOS & Typed tidak butuh jQuery -> boleh pakai defer
        
        KENAPA ERROR SEBELUMNYA?
        defer membuat semua script load paralel tapi eksekusi
        ditunda sampai HTML selesai diparse. Masalahnya urutan
        eksekusi bisa tidak terjamin, sehingga Bootstrap jalan
        sebelum jQuery siap -> "jQuery is not defined"
        =============================================
    --}}

    <!-- 1. jQuery WAJIB pertama, tanpa defer -->
    <script src="{{asset('assets/vendors/jquery/jquery-3.4.1.js')}}"></script>

    <!-- 2. Bootstrap butuh jQuery, tanpa defer -->
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.bundle.js')}}"></script>

    <!-- 3. Bootstrap affix butuh jQuery, tanpa defer -->
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.affix.js')}}"></script>

    <!-- 4. Meyawo butuh jQuery, tanpa defer -->
    <script src="{{asset('assets/js/meyawo.js')}}"></script>

    <!-- 5. AOS tidak butuh jQuery, pakai versi spesifik agar browser bisa cache -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true, /* animasi hanya jalan sekali, lebih ringan */
        });
    </script>

    <!-- 6. Typed.js tidak butuh jQuery -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        var typed = new Typed(".writext", {
            strings: ["{{$user->name}}", "{{$user->job}}"],
            typeSpeed: 150,
            backSpeed: 100,
            loop: true,
            startDelay: 500,
        });
    </script>

</body>

</html>