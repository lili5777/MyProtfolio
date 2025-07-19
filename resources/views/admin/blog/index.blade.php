@extends('layouts.master')

@section('title', 'Blog Management')

@section('content')
    <div class="main-content">
        <div class="header-section">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div class="d-flex justify-content-between">
                <div class="page-title">
                    <h1>Blog Posts</h1>
                    <p>Manage your blog content</p>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                        <i class="ti-plus"></i> Add New Post
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <div class="alert-content">
                    <h4>Success!</h4>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <div class="alert-content">
                    <h4>Error!</h4>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="blog-grid">
            @foreach ($blogs as $blog)
                <div class="blog-card">
                    <a href="{{ route('blogs.show', $blog->id) }}" class="blog-card-link">
                        <div class="blog-image-container">
                            <img src="{{ asset($blog->foto) }}" alt="{{ $blog->judul }}" class="blog-image">
                            <div class="blog-overlay"></div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="blog-date"><i class="ti-calendar"></i>
                                    {{ $blog->created_at->format('d M Y') }}</span>
                                <span class="blog-comments"><i class="ti-comment"></i> {{ $blog->komentars->count() }}</span>
                                <span class="blog-views"><i class="ti-eye"></i> {{ $blog->view }}</span>
                            </div>
                            <h3 class="blog-title">{{ $blog->judul }}</h3>
                            <p class="blog-excerpt">{{ Str::limit(strip_tags($blog->isi), 120) }}</p>
                            <div class="blog-stats">
                                <span class="blog-likes"><i class="ti-heart"></i> {{ $blog->like }}</span>
                            </div>
                            <div class="blog-author">
                                <span class="author-name">{{ $blog->penulis }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="blog-actions">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="action-btn edit-btn" title="Edit">
                            <i class="ti-pencil"></i>
                        </a>
                        <button type="button" class="action-btn delete-btn" title="Delete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-id="{{ $blog->id }}" data-title="{{ $blog->judul }}">
                            <i class="ti-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        @if($blogs->hasPages())
            <div class="blog-pagination mt-4">
                {{ $blogs->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete "<span id="blogTitle"></span>"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Base Styles */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .blog-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .blog-image-container {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .blog-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .blog-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);
            z-index: 1;
        }

        .blog-card:hover .blog-image {
            transform: scale(1.03);
        }

        .blog-content {
            padding: 1.25rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .blog-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 0.75rem;
            font-size: 0.8rem;
            color: #718096;
        }

        .blog-meta i {
            margin-right: 5px;
        }

        .blog-title {
            margin: 0 0 0.5rem 0;
            color: #2d3748;
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 1.3;
        }

        .blog-excerpt {
            color: #718096;
            margin: 0 0 1rem 0;
            font-size: 0.9rem;
            line-height: 1.5;
            flex-grow: 1;
        }

        .blog-stats {
            margin-bottom: 1rem;
        }

        .blog-likes {
            font-size: 0.85rem;
            color: #e53e3e;
        }

        .blog-likes i {
            margin-right: 5px;
        }

        .blog-views {
            font-size: 0.85rem;
            color: #4a5568;
        }

        .blog-author {
            display: flex;
            align-items: center;
            margin-top: auto;
        }

        .author-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: #4a5568;
        }

        .blog-actions {
            display: flex;
            padding: 0.75rem 1.25rem;
            background: #f8fafc;
            border-top: 1px solid #edf2f7;
        }

        .action-btn {
            background: none;
            border: none;
            color: #a0aec0;
            font-size: 1rem;
            cursor: pointer;
            margin-right: 0.75rem;
            transition: all 0.2s;
            padding: 0.4rem;
            border-radius: 6px;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn:hover {
            background: #edf2f7;
        }

        .edit-btn:hover {
            color: #4299e1;
        }

        .delete-btn:hover {
            color: #f56565;
        }

        .blog-card-link {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        /* Pagination Styles */
        .blog-pagination {
            margin-top: 2rem;
        }

        .blog-pagination .pagination {
            justify-content: center;
        }

        .blog-pagination .page-item .page-link {
            color: #4299e1;
            border-radius: 6px;
            margin: 0 3px;
            border: 1px solid #dee2e6;
        }

        .blog-pagination .page-item.active .page-link {
            background-color: #4299e1;
            border-color: #4299e1;
            color: white;
        }

        .blog-pagination .page-item.disabled .page-link {
            color: #6c757d;
        }

        /* Tablet View (2 cards per row) */
        @media (max-width: 768px) {
            .blog-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 1.25rem;
            }

            .blog-image-container {
                height: 180px;
            }
        }

        /* Mobile View (1 card per row) */
        @media (max-width: 576px) {
            .blog-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .blog-card {
                max-width: 100%;
            }

            .blog-image-container {
                height: 220px;
            }

            .blog-content {
                padding: 1rem;
            }
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            border-bottom: 1px solid #edf2f7;
            padding: 1.25rem;
        }

        .modal-title {
            font-weight: 600;
            color: #2d3748;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid #edf2f7;
            padding: 1rem 1.25rem;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize modal functionality
            const deleteModal = document.getElementById('deleteModal');
            if (deleteModal) {
                deleteModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const blogId = button.getAttribute('data-id');
                    const blogTitle = button.getAttribute('data-title');

                    document.getElementById('blogTitle').textContent = blogTitle;
                    document.getElementById('deleteForm').action = `/blogs/${blogId}`;
                });
            }
        });
    </script>
@endsection