@extends('layouts.master')

@section('judul', 'Project Details')

@section('content')
    <div class="main-content">
        <div class="header-section">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div style="display: flex;justify-content: space-between;align-items: center">
                <div class="page-title">
                    <h1>{{ $project->name }}</h1>
                    <p>Project details</p>
                </div>
                <a href="{{ route('projects.index') }}" class="btn btn-primary" style="text-decoration: none">
                    <i class="ti-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="project-header mb-4">
                    <img src="{{ asset($project->photo) }}" alt="{{ $project->name }}" class="project-photo"
                        style="max-width: 300px; border-radius: 8px;">
                    <div class="project-meta mt-3">
                        <p class="project-description">{{ $project->desc }}</p>
                        @if($project->link)
                            <p class="project-link">
                                <a href="{{ $project->link }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="ti-link"></i> Visit Project
                                </a>
                            </p>
                        @endif
                    </div>
                </div>

                <div class="project-content">
                    {!! $project->isi !!}
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

        .project-header {
            text-align: center;
        }

        .project-description {
            font-size: 1.1rem;
            color: #4a5568;
            margin-bottom: 1.5rem;
        }

        .project-content {
            line-height: 1.6;
            color: #4a5568;
        }

        .project-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1rem 0;
        }

        .project-actions {
            display: flex;
            gap: 0.5rem;
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

        .btn-danger {
            background: #f56565;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background: #e53e3e;
        }

        .btn-outline-primary {
            background: transparent;
            color: #667eea;
            border: 1px solid #667eea;
        }

        .btn-outline-primary:hover {
            background: #667eea;
            color: white;
        }
    </style>
@endsection