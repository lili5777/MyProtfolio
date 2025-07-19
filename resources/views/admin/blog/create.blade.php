@extends('layouts.master')

@section('title', 'Add New Blog Post')

@section('content')
    <div class="main-content">
        <div class="header-section">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div style="display: flex;justify-content: space-between;align-items: center">
                <div class="page-title">
                    <h1>Add New Post</h1>
                    <p>Create new blog content</p>
                </div>
                <a href="{{ route('blogs.index') }}" class="btn btn-primary" style="text-decoration: none">
                    <i class="ti-arrow-left"></i> Back
                </a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card mt-4">
            <div class="card-body p-4">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="blog-title" class="form-label">Post Title</label>
                        <input type="text" id="blog-title" name="judul" 
                            class="form-control @error('judul') is-invalid @enderror" 
                            placeholder="Enter post title" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="featured-image" class="form-label">Featured Image</label>
                        <div class="file-upload-wrapper">
                            <label class="file-upload-label">
                                <input type="file" id="featured-image" name="foto" 
                                    accept="image/*" class="@error('foto') is-invalid @enderror" required>
                                <span class="file-upload-custom">
                                    <i class="ti-cloud-up"></i>
                                    <span class="file-upload-text">Choose image file...</span>
                                    <span class="file-name" id="file-name">No file chosen</span>
                                </span>
                            </label>
                            @error('foto')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            <div class="file-requirements">
                                <small>Recommended: JPG, PNG (Max 2MB, min 100x100px)</small>
                            </div>
                        </div>
                        <div class="image-preview mt-2">
                            <img id="preview-image" src="" alt="Image preview" 
                                style="display: none; max-width: 200px; border-radius: 8px;">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="author-name" class="form-label">Author</label>
                        <input type="text" id="author-name" name="penulis" 
                            class="form-control @error('penulis') is-invalid @enderror" 
                            placeholder="Author name" value="{{ old('penulis') }}" required>
                        @error('penulis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="blog-content" class="form-label">Post Content</label>
                        <textarea id="blog-content" name="isi" 
                            class="form-control @error('isi') is-invalid @enderror" rows="10"
                            placeholder="Write your blog content here" required>{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-footer pt-3 mt-4 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2">Save Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Header Styles */
        .header-section {
            padding: 1rem 0;
        }

        .page-title h1 {
            font-size: 1.75rem;
            margin-bottom: 0.25rem;
        }

        .page-title p {
            color: #6c757d;
            margin-bottom: 0;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .card-body {
            padding: 2rem;
        }

        /* Form Styles */
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #495057;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        textarea.form-control {
            min-height: 120px;
        }

        /* File Upload Styles */
        .file-upload-wrapper {
            margin-bottom: 0.5rem;
        }

        .file-upload-label input[type="file"] {
            display: none;
        }

        .file-upload-custom {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            background: #f8f9fa;
            border: 1px dashed #ced4da;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-custom:hover {
            background: #e9ecef;
            border-color: #adb5bd;
        }

        .file-upload-custom i {
            margin-right: 0.75rem;
            color: #6c757d;
        }

        .file-upload-text {
            font-weight: 500;
            color: #495057;
        }

        .file-name {
            margin-left: auto;
            color: #6c757d;
            font-size: 0.85rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 150px;
        }

        .file-requirements {
            color: #6c757d;
            font-size: 0.75rem;
        }

        /* Button Styles */
        .btn {
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: #667eea;
            border-color: #667eea;
        }

        .btn-primary:hover {
            background-color: #5a67d8;
            border-color: #5a67d8;
        }

        /* Alert Styles */
        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
        }

        .alert-danger {
            background-color: #fff5f5;
            border: 1px solid #fc8181;
            color: #c53030;
        }

        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 1.5rem;
        }

        .is-invalid {
            border-color: #fc8181 !important;
        }

        .invalid-feedback {
            color: #c53030;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-body {
                padding: 1.5rem;
            }
        }
    </style>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize CKEditor
            CKEDITOR.replace('blog-content', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
                language: 'en',
                height: 300
            });

            // File upload preview
            const imageInput = document.getElementById('featured-image');
            const fileName = document.getElementById('file-name');
            const previewImage = document.getElementById('preview-image');

            imageInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    fileName.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    fileName.textContent = 'No file chosen';
                    previewImage.style.display = 'none';
                }
            });
        });
    </script>
@endsection