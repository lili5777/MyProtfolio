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
                    <img src="{{asset('assets/img/' . $user->photo)}}" class="about-img" data-aos="fade-right" data-aos-duration="1000"
                        alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                </div>
                <div class="about-caption">
                    <p class="section-subtitle" data-aos="zoom-in" data-aos-duration="1000">Who Am I ?</p>
                    <h2 class="section-title mb-3" data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000">
                        About Me</h2>
                    <p data-aos="fade-down" data-aos-delay="500" data-aos-duration="1000">
                        {{$user->about}}
                    </p>
                    <a href="{{asset('assets/doc/' . $user->document)}}" download="MY_CV.pdf" class="btn-rounded btn btn-outline-primary mt-4"
                        data-aos="fade-down" data-aos-delay="500" data-aos-duration="1000">Download CV</a>
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
                                <img src="{{asset('assets/imgs/'.$sv->icon)}}"
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
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">Algorthms</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">PHP</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">javascript</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">MySQL</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">java</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">C++</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">Laravel</h6>
                    <div class="progress mt-2 mb-3 ">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">React Native</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">CSS</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">Boostrap</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <h6 class="title">Tailwind CSS</h6>
                    <div class="progress mt-2 mb-3">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
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

                <div class="col-md-4 mb-4">
                    <a href="#" class="portfolio-card">
                        <img class="portfolio-card-img" src="{{asset('assets/imgs/cv.png')}}" class="img-responsive rounded"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Web Templates CV</h5>
                                    <p class="font-weight-normal">Facilitating a job applicant in creating a resume.</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="portfolio-card">
                        <img class="portfolio-card-img" src="{{asset('assets/imgs/htl.png')}}" class="img-responsive rounded"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Booking Hotel</h5>
                                    <p class="font-weight-normal">To make it easy for visitors to book their dream room.
                                    </p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="portfolio-card">
                        <img src="{{asset('assets/imgs/porto3.png')}}" class="portfolio-card-img"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Online Exam Management</h5>
                                    <p class="font-weight-normal">Doing class activities and scheduling exams</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="https://arsip.iainpare.id/" class="portfolio-card">
                        <img src="{{asset('assets/imgs/porto4.png')}}" class="portfolio-card-img"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Agency Correspondence</h5>
                                    <p class="font-weight-normal">archive all letters</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="portfolio-card">
                        <img src="{{asset('assets/imgs/drink.png')}}" class="portfolio-card-img"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Web Drinks</h5>
                                    <p class="font-weight-normal">Ordering a refreshing drink quickly.</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="portfolio-card">
                        <img class="portfolio-card-img" src="{{asset('assets/imgs/tkt.png')}}" class="img-responsive rounded"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Booking Ticket</h5>
                                    <p class="font-weight-normal">Bus ticket booking that allows passengers to choose
                                        their preferred
                                        seats.</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="#" class="portfolio-card">
                        <img class="portfolio-card-img" src="{{asset('assets/imgs/rps.png')}}" class="img-responsive rounded"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Food Recipes</h5>
                                    <p class="font-weight-normal">To see food recipes and to create food recipes.</p>
                            </span>
                        </span>
                    </a>
                </div>


                <div class="col-md-4 mb-4">
                    <a href="https://zailyconvertion.netlify.app" class="portfolio-card">
                        <img src="{{asset('assets/imgs/conversionn.png')}}" class="portfolio-card-img"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Web Convert</h4>
                                <p class="font-weight-normal">Aiming to facilitate users in converting temperatures,
                                    currencies, and
                                    much more.</p>
                            </span>
                        </span>
                    </a>
                </div>

                <div class="col-md-4 mb-4">
                    <a href="#" class="portfolio-card">
                        <img src="{{asset('assets/imgs/porto9.png')}}" class="portfolio-card-img"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>badminton court booking</h4>
                                <p class="font-weight-normal">makes it easier to book a field</p>
                            </span>
                        </span>
                    </a>
                </div>





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


    <!-- pricing section -->
    <!-- <section class="section" id="pricing">
        <div class="container text-center">
            <p class="section-subtitle">How Much I Charge ?</p>
            <h6 class="section-title mb-6">My Pricing</h6>
            
            <div class="pricing-wrapper">
                <div class="pricing-card">
                    <div class="pricing-card-header">
                        <img class="pricing-card-icon" src="assets/imgs/scooter.svg"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="pricing-card-body">
                        <h6 class="pricing-card-title">Free</h6>
                        <div class="pricing-card-list">
                            <p>accusamus reprehenderit</p>
                            <p>provident dolorem </p>
                            <p>quos neque</p>
                            <p>fugiat quibusdam</p>
                            <p><i class="ti-close"></i></p>
                            <p><i class="ti-close"></i></p>
                        </div>
                    </div>
                    <div class="pricing-card-footer">
                        <span>$</span>
                        <span>0.00/Month</span>
                    </div>
                    <a href="#" class="btn btn-primary mt-3 pricing-card-btn">Subscribe</a>
                </div>
                <div class="pricing-card">
                    <div class="pricing-card-header">
                        <img class="pricing-card-icon" src="assets/imgs/shipped.svg"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="pricing-card-body">
                        <h6 class="pricing-card-title">Basic</h6>
                        <div class="pricing-card-list">
                            <p>accusamus reprehenderit</p>
                            <p>provident dolorem </p>
                            <p>quos neque</p>
                            <p>fugiat quibusdam</p>
                            <p>accusamus laboriosam</p>
                            <p><i class="ti-close"></i></p>
                        </div>
                    </div>
                    <div class="pricing-card-footer">
                        <span>$</span>
                        <span>9.99/Month</span>
                    </div>
                    <a href="#" class="btn btn-primary mt-3 pricing-card-btn">Subscribe</a>
                </div>
                <div class="pricing-card">
                    <div class="pricing-card-header">
                        <img class="pricing-card-icon" src="assets/imgs/startup.svg"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="pricing-card-body">
                        <h6 class="pricing-card-title">Premium</h6>
                        <div class="pricing-card-list">
                            <p>accusamus reprehenderit</p>
                            <p>provident dolorem </p>
                            <p>quos neque</p>
                            <p>fugiat quibusdam</p>
                            <p>accusamus laboriosam</p>
                            <p>inventore omnis</p>
                        </div>
                    </div>
                    <div class="pricing-card-footer">
                        <span>$</span>
                        <span>99.9/Month</span>
                    </div>
                    <a href="#" class="btn btn-primary mt-3 pricing-card-btn">Subscribe</a>
                </div>

            </div>
        </div> 
    </section> -->
    <!-- end of pricing section -->

    <!-- blog section -->
    <section class="section" id="blog">
        <!-- container -->
        <div class="container text-center">
            <p class="section-subtitle">Recent Posts?</p>
            <h6 class="section-title mb-6">Blog</h6>
            <!-- blog-wrapper -->
            <div class="blog-card">
                <div class="blog-card-header">
                    <img src="{{asset('assets/imgs/artikel1.jpg')}}" class="blog-card-img"
                        alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                </div>
                <div class="blog-card-body">
                    <h5 class="blog-card-title">Mengenal Artificial Intelligence (Kecerdasan Buatan)</h6>

                        <p class="blog-card-caption">
                            <a href="#">By: Ferdiansyah</a>
                            <a href="#"><i class="ti-heart text-danger"></i> 234</a>
                            <a href="#"><i class="ti-comment"></i> 123</a>
                        </p>
                        <p>Saat ini, teknologi AI semakin berkembang dan digunakan dalam berbagai bidang, seperti
                            otomotif, kesehatan, pelayanan
                            pelanggan, keuangan, dan lain-lain. Meskipun masih banyak tantangan dan risiko yang terkait
                            dengan pengembangan
                            teknologi AI, namun potensi manfaatnya sangat besar sehingga banyak perusahaan dan negara
                            yang mulai memanfaatkan
                            teknologi AI untuk berbagai keperluan.</p>

                        <a href="https://desaplembutan.gunungkidulkab.go.id/first/artikel/2059-Mengenal-Artificial-Intelligence--Kecerdasan-Buatan-"
                            class="blog-card-link">Read more <i class="ti-angle-double-right"></i></a>
                </div>
            </div><!-- end of blog wrapper -->

            <!-- blog-wrapper -->
            <div class="blog-card">
                <div class="blog-card-header">
                    <img src="{{asset('assets/imgs/artikel2.jpg')}}" class="blog-card-img"
                        alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                </div>
                <div class="blog-card-body">
                    <h5 class="blog-card-title">Pentingnya Menjamin Keamanan Data</h6>

                        <p class="blog-card-caption">
                            <a href="#">By: Ferdiansyah</a>
                            <a href="#"><i class="ti-heart text-danger"></i> 456</a>
                            <a href="#"><i class="ti-comment"></i> 264</a>
                        </p>

                        <p>Keamanan data bagi suatu bisnis harus terjamin. Untuk mengupas lebih dalam mengenai keamanan
                            data atau data security,
                            pengetahuan tentang objek yang akan dibahas yaitu data sangatlah penting. Menurut Computer
                            Hope, data merupakan beberapa
                            karakter yang dikumpulkan untuk tujuan tertentu. Sementara itu, Techtarget mengartikan data
                            sebagai informasi yang sudah
                            mengalami perubahan bentuk agar lebih efisien ketika akan dipindah atau diproses lebih
                            lanjut. Dari pengertian tersebut,
                            maka bisa disimpulkan bahwa data adalah subjek yang terdiri dari satu karakter atau lebih
                            yang memiliki nilai
                            kuantitatif maupun kualitatif sehingga dapat dipindah atau bahkan diproses lebih lanjut.</p>

                        <a href="https://verihubs.com/blog/keamanan-data/" class="blog-card-link">Read more <i
                                class="ti-angle-double-right"></i></a>
                </div>
            </div><!-- end of blog wrapper -->

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