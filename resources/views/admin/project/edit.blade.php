@extends('layouts.master')

@section('judul', 'Edit Project')

@section('content')
    <div class="main-content">
        <div class="header-section">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div style="display: flex;justify-content: space-between;align-items: center">
                <div class="page-title">
                    <h1>Edit Project</h1>
                    <p>Update project details</p>
                </div>
                <a href="{{ route('projects.index') }}" class="btn btn-primary" style="text-decoration: none">
                    <i class="ti-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="project-name">Project Name</label>
                        <input type="text" id="project-name" name="name" class="form-control"
                            value="{{ old('name', $project->name) }}" placeholder="Enter project name" required>
                    </div>

                    <div class="form-group">
                        <label for="project-photo">Photo</label>
                        <div class="current-photo mb-2">
                            <img src="{{ asset($project->photo) }}" alt="Current photo" style="max-width: 200px;">
                            <p class="text-muted mt-1">Current Photo</p>
                        </div>
                        <div class="file-upload-wrapper">
                            <label class="file-upload-label">
                                <input type="file" id="project-photo" name="photo" accept="image/*">
                                <span class="file-upload-custom">
                                    <i class="ti-cloud-up"></i>
                                    <span class="file-upload-text">Choose new photo...</span>
                                    <span class="file-name" id="file-name">No file chosen</span>
                                </span>
                            </label>
                            <div class="file-requirements">
                                <small>Leave empty to keep current photo</small>
                            </div>
                        </div>
                        <div class="photo-preview mt-2">
                            <img id="preview-photo" src="" alt="New photo preview" style="display: none; max-width: 200px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="project-desc">Short Description</label>
                        <textarea id="project-desc" name="desc" class="form-control" rows="3"
                            placeholder="Enter short description" required>{{ old('desc', $project->desc) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="project-isi">Content</label>
                        <textarea id="project-isi" name="isi" class="form-control" rows="10"
                            placeholder="Enter detailed content" required>{{ old('isi', $project->isi) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="project-link">Link</label>
                        <input type="text" id="project-link" name="link" class="form-control"
                            value="{{ old('link', $project->link) }}" placeholder="Enter project link (optional)">
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Same styles as create.blade.php */
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

        .current-photo img {
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

        .btn-secondary {
            background: #edf2f7;
            color: #4a5568;
            border: none;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }
    </style>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize CKEditor
            CKEDITOR.replace('project-isi', {
                filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form',
                language: 'id'
            });

            // File upload preview
            const photoInput = document.getElementById('project-photo');
            const fileName = document.getElementById('file-name');
            const previewPhoto = document.getElementById('preview-photo');

            photoInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    fileName.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewPhoto.src = e.target.result;
                        previewPhoto.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    fileName.textContent = 'No file chosen';
                    previewPhoto.style.display = 'none';
                }
            });
        });
    </script>
@endsection