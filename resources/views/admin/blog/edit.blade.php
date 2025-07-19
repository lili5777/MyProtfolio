@extends('layouts.master')

@section('title', 'Edit Blog Post')

@section('content')
    <div class="main-content">
        <div class="header-section">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div style="display: flex;justify-content: space-between;align-items: center">
                <div class="page-title">
                    <h1>Edit Blog Post</h1>
                    <p>Update blog content</p>
                </div>
                <a href="{{ route('blogs.index') }}" class="btn btn-primary" style="text-decoration: none">
                    <i class="ti-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label for="blog-title">Post Title</label>
                        <input type="text" id="blog-title" name="judul" class="form-control"
                            value="{{ old('judul', $blog->judul) }}" placeholder="Enter post title" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="featured-image">Featured Image</label>
                        <div class="current-image mb-2">
                            <img src="{{ asset($blog->foto) }}" alt="Current image"
                                style="max-width: 200px; border-radius: 8px;">
                            <p class="text-muted mt-1">Current Image</p>
                        </div>
                        <div class="file-upload-wrapper">
                            <label class="file-upload-label">
                                <input type="file" id="featured-image" name="foto" accept="image/*">
                                <span class="file-upload-custom">
                                    <i class="ti-cloud-up"></i>
                                    <span class="file-upload-text">Choose new image...</span>
                                    <span class="file-name" id="file-name">No file chosen</span>
                                </span>
                            </label>
                            <div class="file-requirements">
                                <small>Leave empty to keep current image</small>
                            </div>
                        </div>
                        <div class="image-preview mt-2">
                            <img id="preview-image" src="" alt="New image preview" style="display: none; max-width: 200px;">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="author-name">Author</label>
                        <input type="text" id="author-name" name="penulis" class="form-control"
                            value="{{ old('penulis', $blog->penulis) }}" placeholder="Author name" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="blog-content">Post Content</label>
                        <textarea id="blog-content" name="isi" class="form-control" rows="10"
                            placeholder="Write your blog content here" required>{{ old('isi', $blog->isi) }}</textarea>
                    </div>

                    <div class="form-footer pt-3 mt-4 border-top">
                        <button type="submit" class="btn btn-primary px-4 py-2">Update Post</button>
                    </div>
                </form>
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
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4a5568;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .current-image img {
            max-width: 200px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
        }

        .text-muted {
            color: #718096;
            font-size: 0.85rem;
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
            padding: 0.75rem;
            background: #f8fafc;
            border: 1px dashed #cbd5e0;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-custom:hover {
            background: #edf2f7;
            border-color: #a0aec0;
        }

        .file-upload-custom i {
            margin-right: 0.5rem;
            color: #4a5568;
        }

        .file-upload-text {
            font-weight: 500;
            color: #4a5568;
        }

        .file-name {
            margin-left: auto;
            color: #718096;
            font-size: 0.85rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 150px;
        }

        .file-requirements {
            color: #718096;
            font-size: 0.75rem;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #edf2f7;
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
    </style>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize CKEditor
            CKEDITOR.replace('blog-content', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
                language: 'en'
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