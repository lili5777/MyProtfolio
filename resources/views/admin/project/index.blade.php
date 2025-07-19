@extends('layouts.master')

@section('judul', 'Project Management')

@section('content')
        <div class="main-content">
            <div class="header-section">
                <div class="menu-toggle ti-menu" id="menu-toggle"></div>
                <div class="d-flex justify-content-between">
                    <div class="page-title">
                        <h1>Project</h1>
                        <p>kelola projekmu</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">
                            <i class="ti-plus"></i> Add New Project
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
                        <h4>Terjadi Kesalahan!</h4>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="project-grid">
                @foreach ($projects as $project)
                    <div class="project-card">
                        <a href="{{ route('projects.show', $project->id) }}" class="project-card-link">
                            <div class="project-image-container">
                                <img src="{{ asset($project->photo) }}" alt="{{$project->name}}" class="project-image">
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">{{$project->name}}</h3>
                                <p class="project-description">{{$project->desc}}</p>
                            </div>
                        </a>
                        <div class="project-actions">
                            <a href="{{ route('projects.edit', $project->id) }}" class="action-btn edit-btn" title="Edit">
                                <i class="ti-pencil"></i>
                            </a>
                            <button type="button" class="action-btn delete-btn" title="Delete" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-id="{{ $project->id }}" data-name="{{ $project->name }}">
                                <i class="ti-trash"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Project</h5>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus project "<span id="projectName"></span>"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
        <style>
            /* Previous styles remain the same */
            /* Add modal-specific styles */
               /* Base Styles */
            .project-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 1.5rem;
                margin-top: 1.5rem;
            }

            .project-card {
                background: #fff;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
                display: flex;
                flex-direction: column;
            }

            .project-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
            }

            .project-image-container {
                height: 160px;
                overflow: hidden;
            }

            .project-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.4s ease;
            }

            .project-card:hover .project-image {
                transform: scale(1.03);
            }

            .project-content {
                padding: 1.25rem;
                flex-grow: 1;
            }

            .project-title {
                margin: 0 0 0.5rem 0;
                color: #2d3748;
                font-size: 1.2rem;
                font-weight: 600;
                line-height: 1.3;
            }

            .project-description {
                color: #718096;
                margin: 0;
                font-size: 0.9rem;
                line-height: 1.5;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .project-actions {
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

            .project-card-link {
                display: block;
                text-decoration: none;
                color: inherit;
            }

            /* Tablet View (2 cards per row) */
            @media (max-width: 768px) {
                .project-grid {
                    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                    gap: 1.25rem;
                }

                .project-image-container {
                    height: 140px;
                }
            }

            /* Mobile View (1 card per row) */
            @media (max-width: 576px) {
                .project-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }

                .project-card {
                    max-width: 100%;
                }

                .project-image-container {
                    height: 180px;
                }

                .project-content {
                    padding: 1rem;
                }
            }

            /* Small Mobile Devices */
            @media (max-width: 400px) {
                .project-image-container {
                    height: 150px;
                }
            }
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

            .btn-close {
                background: none;
                font-size: 0.75rem;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Initialize modal functionality
                const deleteModal = document.getElementById('deleteModal');
                if (deleteModal) {
                    deleteModal.addEventListener('show.bs.modal', function (event) {
                        const button = event.relatedTarget;
                        const projectId = button.getAttribute('data-id');
                        const projectName = button.getAttribute('data-name');

                        document.getElementById('projectName').textContent = projectName;
                        document.getElementById('deleteForm').action = `/projects/${projectId}`;
                    });
                }
            });
        </script>
@endsection