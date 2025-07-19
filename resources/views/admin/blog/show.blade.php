@extends('layouts.master')

@section('title', 'Blog Post Details')
@section('content')
    <div class="main-content">
        <div class="header-section">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div style="display: flex;justify-content: space-between;align-items: center">
                <div class="page-title">
                    <h1>{{ $blog->judul }}</h1>
                    <p>Blog post details</p>
                </div>
                <a href="{{ route('blogs.index') }}" class="btn btn-primary" style="text-decoration: none">
                    <i class="ti-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="blog-header mb-4">
                    <img src="{{ asset($blog->foto) }}" alt="{{ $blog->judul }}" class="blog-image"
                        style="max-width: 100%; border-radius: 8px;">
                    <div class="blog-meta mt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="author">
                                <i class="ti-user"></i> By: {{ $blog->penulis }}
                            </div>
                            <div class="stats">
                                <span class="views mr-3"><i class="ti-eye"></i> {{ $blog->view }} views</span>
                                <span class="likes"><i class="ti-heart"></i> {{ $blog->like }} likes</span>
                            </div>
                        </div>
                        <div class="date mt-2">
                            <i class="ti-calendar"></i> Posted: {{ $blog->created_at->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>

                <div class="blog-content">
                    {!! $blog->isi !!}
                </div>

                <div class="comments-section mt-5 pt-4 border-top">
                    <h4><i class="ti-comment"></i> Comments ({{ $blog->komentars->count() }})</h4>

                    @if($blog->komentars->count() > 0)
                        <div class="comments-list mt-3">
                            @foreach($blog->komentars as $komentar)
                                <div class="comment mb-3 p-3 bg-light rounded">
                                    <div class="d-flex justify-content-between">
                                        <strong>Anonymous</strong>
                                        <small class="text-muted">{{ $komentar->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-0 mt-1">{{ $komentar->komentar }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info mt-3">
                            No comments yet for this post.
                        </div>
                    @endif

                    <div class="comment-form mt-4">
                        <h5>Leave a Comment</h5>
                        <form action="{{ route('blogs.komentar', $blog->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="komentar" class="form-control" rows="3"
                                    placeholder="Write your comment here..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-top: 1.5rem;
        }

        .card-body {
            padding: 2rem;
        }

        .blog-header {
            text-align: center;
        }

        .blog-meta {
            font-size: 0.9rem;
            color: #4a5568;
        }

        .blog-content {
            line-height: 1.8;
            color: #4a5568;
            margin-top: 2rem;
        }

        .blog-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1rem 0;
        }

        .comments-section {
            margin-top: 3rem;
        }

        .comments-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary {
            background: #667eea;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: #5a67d8;
        }

        .alert-info {
            background-color: #ebf8ff;
            color: #2b6cb0;
            border: 1px solid #bee3f8;
        }

        .text-muted {
            color: #718096;
        }
    </style>
@endsection