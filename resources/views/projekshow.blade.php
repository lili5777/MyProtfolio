<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Project Detail Page">
    <meta name="author" content="Devcrud">
    <title>{{ $project->name }} | Project Detail</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{asset('assets/vendors/themify-icons/css/themify-icons.css')}}">
    <!-- Bootstrap + Steller  -->
    <link rel="stylesheet" href="{{asset('assets/css/meyawo.css')}}">
    <style>
        /* Modern Header with Project Image Background */
        .project-header-mini {
            background:;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 5rem 0 3rem;
            position: relative;
            margin-bottom: 3rem;
        }
        
        .project-header-mini .header-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .breadcrumb {
            background: transparent;
            justify-content: center;
        }
        
        .breadcrumb-item a {
            color: rgba(255,255,255,0.8);
        }
        
        .breadcrumb-item.active {
            color: white;
        }
        
        .breadcrumb-item+.breadcrumb-item::before {
            color: rgba(255,255,255,0.5);
        }

        /* Modern Project Detail Section */
        .project-detail {
            padding: 0 0 4rem;
        }
        
        .project-content {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-top: -4rem;
            position: relative;
            z-index: 2;
        }
        
        .project-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .project-date {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .project-link-btn {
            transition: all 0.3s ease;
        }
        
        .project-link-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .project-description {
            line-height: 1.8;
            color: #495057;
        }
        
        .project-description img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1.5rem 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .project-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #f0f0f0;
        }
        
        .back-btn {
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .back-btn:hover {
            transform: translateX(-5px);
        }

        /* Interactive Elements */
        .hover-shadow {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12) !important;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .project-header-mini {
                padding: 4rem 0 2rem;
            }
            
            .project-header-mini .header-title {
                font-size: 2rem;
            }
            
            .project-content {
                padding: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .project-header-mini {
                padding: 3rem 0 1.5rem;
            }
            
            .project-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .project-content {
                margin-top: -2rem;
            }
        }
        
        @media (max-width: 576px) {
            .project-header-mini .header-title {
                font-size: 1.75rem;
            }
            
            .project-content {
                padding: 1.5rem;
            }
            
            .project-actions {
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <!-- Modern Header with Project Image Background -->
    <header class="header header-mini">
        <div class="container text-center">
            <h1 class="header-title">{{ $project->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project->name }}</li>
                </ol>
            </nav>
        </div>
    </header>

    <!-- Modern Project Detail Content -->
    <div class="container project-detail">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="project-content hover-shadow">
                    <div class="project-meta">
                        <div class="project-date">
                            <i class="ti-calendar mr-2"></i>Created: {{ $project->created_at->format('d M Y') }}
                        </div>
                        @if($project->link)
                            <a href="{{ $project->link }}" target="_blank" class="btn btn-outline-primary project-link-btn">
                                <i class="ti-link mr-2"></i> Visit Project
                            </a>
                        @endif
                    </div>

                    <div class="project-description">
                        {!! $project->isi !!}
                    </div>

                    <div class="project-actions">
                        <a href="/" class="btn btn-outline-secondary back-btn">
                            <i class="ti-arrow-left"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
    </div>

    <!-- core  -->
    <script src="{{asset('assets/vendors/jquery/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.bundle.js')}}"></script>
    
    <!-- Modern Interactive Effects -->
    <script>
        $(document).ready(function() {
            // Add smooth hover effects
            $('.hover-shadow').hover(
                function() {
                    $(this).css('transform', 'translateY(-5px)');
                },
                function() {
                    $(this).css('transform', 'translateY(0)');
                }
            );
            
            // Add animation to back button
            $('.back-btn').hover(
                function() {
                    $(this).css('transform', 'translateX(-5px)');
                },
                function() {
                    $(this).css('transform', 'translateX(0)');
                }
            );
        });
    </script>
</body>

</html>