<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Meyawo landing page.">
    <meta name="author" content="Devcrud">
    <title>Ferdiansyah</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{asset('assets/vendors/themify-icons/css/themify-icons.css')}}">
    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="{{asset('assets/css/meyawo.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .blog-img-container {
            width: 100%;
            aspect-ratio: 1/1;
            /* Rasio persegi */
            overflow: hidden;
        }

        .blog-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Pastikan gambar ter-crop dengan rapi */
            object-position: center;
        }

        /* ukuran mobile */
        @media (max-width: 767.98px) {
            .blog-img-container {
                aspect-ratio: 16/12;
                /* Rasio wide (16:9) di mobile */
            }
        }

        /* Certificate Carousel Styles */
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

        @media (max-width: 768px) {
            .certificate-img {
                height: 300px;
            }

            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                background-color: rgba(0, 0, 0, 0.5);
                border-radius: 50%;
                width: 40px;
                height: 20px;
                background-size: 50%;
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
                <li class="item">
                    <a class="link" href="#home">Home</a>
                </li>
                <li class="item">
                    <a class="link" href="#about">About</a>
                </li>
                <li class="item">
                    <a class="link" href="#portfolio">Project</a>
                </li>
                <li class="item">
                    <a class="link" href="#github">Contributions</a>
                </li>
                <li class="item">
                    <a class="link" href="#blog">Blog</a>
                </li>
                <li class="item">
                    <a class="link" href="#testmonial">Testmonial</a>
                </li>
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
    </nav><!-- End of Page Navbar -->

    <!-- page header -->
    <header id="home" class="header">
        <div class="overlay"></div>
        <div class="header-content container">
            <h1 class="header-title">
                <span class="up" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1000">HI!</span>
                <p class="down" data-aos="zoom-in" data-aos-delay="600" data-aos-duration="1000">I am <span
                        class="writext"></span></p>
            </h1>

            <a href="#about" class="btn btn-primary" data-aos="zoom-in" data-aos-delay="300"
                data-aos-duration="1000">About Me</a>
        </div>
    </header><!-- end of page header -->

    <!-- about section -->
    <section class="section pt-0" id="about">
        <!-- container -->
        <div class="container text-center">
            <!-- about wrapper -->
            <div class="about">
                <div class="about-img-holder">
                    <img src="{{asset('assets/img/' . $user->photo)}}" class="about-img" data-aos="fade-right"
                        data-aos-duration="1000"
                        alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                </div>
                <div class="about-caption">
                    <p class="section-subtitle" data-aos="zoom-in" data-aos-duration="1000">Who Am I ?</p>
                    <h2 class="section-title mb-3" data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">
                        About Me</h2>
                    <p data-aos="fade-down" data-aos-delay="500" data-aos-duration="1000">
                        {{$user->about}}
                    </p>
                    <a href="{{asset('assets/doc/' . $user->document)}}" download="MY_CV.pdf"
                        class="btn-rounded btn btn-outline-primary mt-4" data-aos="fade-down" data-aos-delay="500"
                        data-aos-duration="1000">Download CV</a>
                </div>
            </div><!-- end of about wrapper -->
        </div><!-- end of container -->
    </section> <!-- end of about section -->

    <!-- service section -->
    <section class="section" id="service">
        <div class="container text-center">
            <p class="section-subtitle">What I Do ?</p>
            <h6 class="section-title mb-6">Service</h6>
            <!-- row -->
            <div class="row">

                @foreach ($service as $sv)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="service-card">
                            <div class="body">
                                <img src="{{asset('assets/imgs/' . $sv->icon)}}"
                                    alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page"
                                    class="icon">
                                <h6 class="title">{{$sv->name}}</h6>
                                <p class="subtitle">{{$sv->desc}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div><!-- end of row -->
        </div>
    </section><!-- end of service section -->

    <!-- service sskills -->
    <section class="section" id="service">
        <div class="container text-center">
            <p class="section-subtitle">What Can I Do ?</p>
            <h6 class="section-title mb-6">Skills</h6>
            <!-- row -->
            <div class="row">
                @foreach ($skill as $s)
                    <div class="col-md-6 col-lg-3 my-2">
                        <h6 class="title">{{$s->name}}</h6>
                        <div class="progress mt-2 mb-3">
                            <div class="progress-bar" role="progressbar"
                                style="width: {{$s->progress}}%;background-color: {{$s->color}}" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                @endforeach

            </div><!-- end of row -->
        </div>
    </section><!-- end of skills -->

    <!-- portfolio section -->
    <section class="section" id="portfolio">
        <div class="container text-center">
            <p class="section-subtitle">What I Did ?</p>
            <h6 class="section-title mb-6">Projects</h6>
            <!-- row -->
            <div class="row">

                @foreach ($projek as $pro)
                    <div class="col-md-4 mb-4">
                        <a href="{{route('detailproject', $pro->id)}}" class="portfolio-card">
                            <img class="portfolio-card-img" src="{{ asset($pro->photo) }}" class="img-responsive rounded"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                            <span class="portfolio-card-overlay">
                                <span class="portfolio-card-caption">
                                    <h4>{{$pro->name}}</h5>
                                        <p class="font-weight-normal">{{$pro->desc}}</p>
                                </span>
                            </span>
                        </a>
                    </div>
                @endforeach

            </div><!-- end of row -->
        </div><!-- end of container -->
    </section> <!-- end of portfolio section -->

    <!-- GitHub Contributions Section -->
    <section class="section bg" id="github">
        <div class="container text-center">
            <p class="section-subtitle">My GitHub Journey</p>
            <h6 class="section-title mb-6">GitHub Contributions</h6>
            <!-- Baris kedua: Kalender Kontribusi -->
            <div class="github-calendar pb-5" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                <div style="min-width: 900px; height: 190px;">
                    <img src="https://ghchart.rshah.org/lili5777" alt="lili5777's Github chart"
                        style="width: 100%;  display: block;" />
                </div>
            </div>

            <!-- Baris pertama: Stats dan Streak -->
            <div class="github-contributions"
                style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; margin-bottom: 30px;">
                <div class="github-stats" style="flex: 1; min-width: 300px;">
                    <h4>GitHub Stats</h4>
                    <iframe
                        src="https://github-readme-stats.vercel.app/api?username=lili5777&show_icons=true&hide_title=true&count_private=true&hide=prs"
                        style="border: none; width: 100%; height: 200px;"></iframe>
                </div>
                <div class="github-stats" style="flex: 1; min-width: 300px;">
                    <h4>GitHub Streak</h4>
                    <iframe
                        src="https://github-readme-streak-stats.herokuapp.com/?user=lili5777&hide_border=true&date_format=M%20j%5B%2C%20Y%5D"
                        style="border: none; width: 100%; height: 200px;"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- End of GitHub Contributions Section -->


    <!-- Certificates Section -->
    <section class="section" id="certificates">
        <div class="container text-center">
            <p class="section-subtitle">My Achievements</p>
            <h6 class="section-title mb-6">Certificates</h6>

            @if($certificates->isEmpty())
                <p class="text-muted">Sertifikat belum diupload</p>
            @else
                <!-- Carousel -->
                <div id="certificateCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($certificates as $index => $certificate)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="certificate-card mx-auto">
                                    @php
        $ext = strtolower(pathinfo($certificate->foto, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                        <img src="{{ asset('assets/serti/' . $certificate->foto) }}" class="d-block w-100 certificate-img"
                                            alt="{{ $certificate->nama }}">
                                    @elseif($ext === 'pdf')
                                        <embed src="{{ asset('assets/serti/' . $certificate->foto) }}" type="application/pdf"
                                            class="d-block w-100" style="height: 500px;">
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

                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#certificateCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#certificateCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach($certificates as $index => $certificate)
                            <li data-target="#certificateCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}">
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endif


        </div>
    </section>

    <!-- blog section -->
    <section class="section" id="blog">
        <!-- container -->
        <div class="container text-center">
            <p class="section-subtitle">Recent Posts?</p>
            <h6 class="section-title mb-6">Blog</h6>

            @if($blog->isEmpty())
                <p class="text-muted">Blog belum diupload</p>
            @else
                @foreach ($blog as $b)
                    <!-- blog-wrapper -->
                    <div class="blog-card">
                        <div class="blog-card-header">
                            <div class="blog-img-container">
                                <img src="{{ $b->foto }}" alt="{{ $b->judul }}" class="blog-img">
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

                            <a href="https://desaplembutan.gunungkidulkab.go.id/first/artikel/2059-Mengenal-Artificial-Intelligence--Kecerdasan-Buatan-"
                                class="blog-card-link">Read more <i class="ti-angle-double-right"></i></a>
                        </div>
                    </div><!-- end of blog wrapper -->

                @endforeach
            @endif

           


        </div><!-- end of container -->
    </section><!-- end of blog section -->

    <!-- section -->
    <section class="section-sm bg-primary">
        <!-- container -->
        <div class="container text-center text-sm-left">
            <!-- row -->
            <div class="row align-items-center">
                <div class="col-sm offset-md-1 mb-4 mb-md-0">
                    <h6 class="title text-light">Sosial Media?</h6>
                    <p class="m-0 text-light">Please Contact Me Here.</p>
                </div>
                <div class="col-sm offset-sm-2 offset-md-3">
                    <a href="#contact" class="btn btn-lg my-font btn-light rounded">Here</a>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of section -->

    <!-- testimonial section -->
    <section class="section" id="testmonial">
        <div class="container text-center">
            <p class="section-subtitle">What Think Client About Me ?</p>
            <h6 class="section-title mb-6">Testmonial</h6>

            <!-- row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-card-img-holder">
                            <img src="{{asset('assets/imgs/teen.png')}}" class="testimonial-card-img"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        </div>
                        <div class="testimonial-card-body">
                            <p class="testimonial-card-subtitle">I am very satisfied with the work of this freelancer.
                                The website created is very professional and suits my business
                                needs. The service was quick, and communication was excellent!</p>
                            <h6 class="testimonial-card-title">Romi</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-card-img-holder">
                            <img src="{{asset('assets/imgs/girl.png')}}" class="testimonial-card-img"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        </div>
                        <div class="testimonial-card-body">
                            <p class="testimonial-card-subtitle">The website development service from this freelancer is
                                outstanding. They understood my vision and translated it into an
                                amazing design. The process was efficient, and the final result exceeded my
                                expectations.</p>
                            <h6 class="testimonial-card-title">Amel</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of testimonial section -->

    <!-- contact section -->
    <section class="section" id="contact">
        <div class="container text-center">
            <p class="section-subtitle">How can you communicate?</p>
            <h6 class="section-title mb-5">Contact Me</h6>
            <!-- contact form -->
            <form action="" class="contact-form col-md-10 col-lg-8 m-auto">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="text" size="50" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="email" class="form-control" placeholder="Enter Email" requried>
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea name="comment" id="comment" rows="6" class="form-control"
                            placeholder="Write Something"></textarea>
                    </div>
                    <div class="form-group col-sm-12 mt-3">
                        <input type="submit" value="Send Message" class="btn btn-outline-primary rounded">
                    </div>
                </div>
            </form><!-- end of contact form -->
        </div><!-- end of container -->
    </section><!-- end of contact section -->

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
                <a href="javascript:void(0)" class="link"><i class="ti-facebook"></i></a>
            </div>
        </footer>
    </div> <!-- end of page footer -->

    <!-- core  -->
    <script src="{{asset('assets/vendors/jquery/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.bundle.js')}}"></script>

    <!-- bootstrap 3 affix -->
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.affix.js')}}"></script>

    <!-- Meyawo js -->
    <script src="{{asset('assets/js/meyawo.js')}}"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        });
    </script>

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