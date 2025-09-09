<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $blog->judul }}">
    <meta name="author" content="{{ $blog->penulis }}">
    <title>{{ $blog->judul }} | Blog Detail</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}">
    <!-- Bootstrap + custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/meyawo.css') }}">
    <style>
        .blog-header-mini {
            background: url('{{ asset("storage/" . $blog->foto) }}') center/cover no-repeat;
            color: white;
            padding: 6rem 0 4rem;
            position: relative;
            margin-bottom: 3rem;
        }

        .blog-header-mini .header-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        .breadcrumb {
            background: transparent;
            justify-content: center;
        }

        .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.85);
        }

        .breadcrumb-item.active {
            color: #fff;
        }

        .blog-detail {
            padding-bottom: 4rem;
        }

        .blog-content {
            background: #fff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-top: -4rem;
            position: relative;
            z-index: 2;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            color: #6c757d;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 1rem;
        }

        .blog-description {
            line-height: 1.8;
            color: #495057;
        }

        .blog-description img {
            max-width: 100%;
            border-radius: 8px;
            margin: 1.5rem 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .comment-section {
            margin-top: 3rem;
        }

        .comment-box {
            background: #f8f9fa;
            padding: 1.2rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>

    <!-- Blog Header -->
    <header class="blog-header-mini">
        <div class="container text-center">
            <h1 class="header-title">{{ $blog->judul }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog->judul }}</li>
                </ol>
            </nav>
        </div>
    </header>

    <!-- Blog Content -->
    <div class="container blog-detail">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="blog-content hover-shadow">
                    <div class="blog-meta">
                        <span><i class="ti-user"></i> {{ $blog->penulis }}</span>
                        <span><i class="ti-calendar"></i> {{ $blog->created_at->format('d M Y') }}</span>
                        <span><i class="ti-eye"></i> {{ $blog->view }} views</span>
                        <span><i class="ti-heart"></i> {{ $blog->like }} likes</span>
                    </div>

                    <div class="blog-description">
                        {!! $blog->isi !!}
                    </div>

                    <!-- Komentar -->
                    <div class="comment-section">
                        <h5>Komentar</h5>
                        @foreach($blog->komentar as $komentar)
                            <div class="comment-box">
                                <p>{{ $komentar->komentar }}</p>
                            </div>
                        @endforeach

                        <!-- Form komentar -->
                        <form action="{{ route('blogs.komentar.store', $blog->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="komentar" class="form-control" rows="3"
                                    placeholder="Tulis komentar..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                        </form>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-4">
                        <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary">
                            <i class="ti-arrow-left"></i> Kembali ke Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container">
        <footer class="footer">
            <p class="mb-0">&copy;
                <script>document.write(new Date().getFullYear())</script> Ferdiansyah
            </p>
        </footer>
    </div>

    <script src="{{ asset('assets/vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
</body>

</html>