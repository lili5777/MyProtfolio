@extends('layouts.master')

@section('judul', 'Skill Management')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header-section">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div class="d-flex justify-content-between">
                <div class="page-title">
                    <h1>Skills</h1>
                    <p>Atur skill kamu</p>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-primary" id="add-skill-btn">
                        <i class="ti-plus"></i> Add New Skill
                    </button>
                </div>
            </div>
        </div>

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

        <!-- Skill Cards Grid -->
        <div class="service-grid">
            @foreach ($skills as $skill)
                <div class="service-cardd" data-id="{{$skill->id}}">
                    <div class="service-content">
                        <h6 class="title">{{$skill->name}}</h6>
                        <div class="progress mt-2 mb-3">
                            <div class="progress-bar" role="progressbar"
                                style="width: {{$skill->progress}}%; background-color: {{$skill->color}}"
                                aria-valuenow="{{$skill->progress}}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="service-actions">
                        <button class="btn-action edit-skill-btn" data-id="{{$skill->id}}">
                            <i class="ti-pencil"></i>
                        </button>
                        <button class="btn-action delete-skill-btn" data-id="{{$skill->id}}">
                            <i class="ti-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Add Skill Modal -->
        <div class="modal" id="skill-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modal-title">Add New Skill</h3>
                    <span class="close-modal">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="{{route('skills.store')}}" method="POST" id="skill-form">
                        @csrf
                        <input type="hidden" name="id" id="skill-id">
                        <div class="form-group">
                            <label for="skill-name">Skill Name</label>
                            <input type="text" id="skill-name" name="name" placeholder="Enter skill name" required>
                        </div>
                        <div class="form-group">
                            <label for="skill-progress">Progress (0-100)</label>
                            <input type="number" id="skill-progress" name="progress" min="0" max="100"
                                placeholder="Enter progress (0-100)" required>
                        </div>
                        <div class="form-group">
                            <label for="skill-color">Color</label>
                            <input type="color" id="skill-color" name="color" value="#3b82f6" required>
                        </div>
                        <div class="form-footer">
                            <button type="button" class="btn btn-secondary close-modal-btn">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Skill</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal" id="delete-modal">
            <div class="modal-content" style="max-width: 400px;">
                <div class="modal-header">
                    <h3>Konfirmasi Penghapusan</h3>
                    <span class="close-modal">&times;</span>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Skill ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <form id="delete-form" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="delete-skill-id" name="id" value="">
                        <div class="form-footer">
                            <button type="button" class="btn btn-secondary close-modal-btn">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus Skill</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Service Grid Styles */
        .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }

        /* Service Card Styles */
        .service-cardd {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .service-cardd:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .service-content {
            padding: 1.5rem;
            flex-grow: 1;
        }

        .service-content h6.title {
            margin: 0 0 0.5rem 0;
            color: #2d3748;
            font-size: 1.1rem;
        }

        .progress {
            height: 8px;
            border-radius: 4px;
            background-color: #e2e8f0;
        }

        .progress-bar {
            border-radius: 4px;
            transition: width 0.6s ease;
        }

        .service-actions {
            display: flex;
            border-top: 1px solid #edf2f7;
            padding: 0.75rem 1.5rem;
            justify-content: flex-end;
        }

        .btn-action {
            background: none;
            border: none;
            color: #a0aec0;
            font-size: 1rem;
            cursor: pointer;
            margin-left: 1rem;
            transition: color 0.2s;
            padding: 0.25rem;
        }

        .btn-action:hover {
            color: #4a5568;
        }

        .btn-action.edit-skill-btn:hover {
            color: #4299e1;
        }

        .btn-action.delete-skill-btn:hover {
            color: #f56565;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            overflow: hidden;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalFadeIn 0.3s;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
            font-size: 1.25rem;
        }

        .close-modal {
            font-size: 1.5rem;
            cursor: pointer;
            color: #718096;
            transition: color 0.2s;
        }

        .close-modal:hover {
            color: #4a5568;
        }

        .modal-body {
            padding: 1.5rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4a5568;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        input[type="color"] {
            height: 45px;
            padding: 0.2rem;
            cursor: pointer;
        }

        /* Form Footer */
        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1.5rem;
            padding-top: 1.25rem;
            border-top: 1px solid #edf2f7;
        }

        .btn {
            padding: 0.6rem 1.25rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 0.9rem;
            font-weight: 500;
            border: none;
        }

        .btn-secondary {
            background: #edf2f7;
            color: #4a5568;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5a67d8;
        }

        .btn-danger {
            background: #f56565;
            color: white;
        }

        .btn-danger:hover {
            background: #e53e3e;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // DOM Elements
            const skillModal = document.getElementById('skill-modal');
            const deleteModal = document.getElementById('delete-modal');
            const addBtn = document.getElementById('add-skill-btn');
            const closeBtns = document.querySelectorAll('.close-modal, .close-modal-btn');
            const editBtns = document.querySelectorAll('.edit-skill-btn');
            const deleteBtns = document.querySelectorAll('.delete-skill-btn');
            const skillForm = document.getElementById('skill-form');
            const deleteForm = document.getElementById('delete-form');
            const modalTitle = document.getElementById('modal-title');

            // Show add modal
            addBtn.addEventListener('click', function () {
                resetSkillForm();
                modalTitle.textContent = 'Add New Skill';
                skillModal.classList.add('active');
            });

            // Show edit modal
            editBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const skillId = this.getAttribute('data-id');
                    fetchSkillData(skillId);
                });
            });

            // Show delete modal
            deleteBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const skillId = this.getAttribute('data-id');
                    document.getElementById('delete-skill-id').value = skillId;
                    deleteForm.action = "{{ route('skills.destroy', ':id') }}".replace(':id', skillId);
                    deleteModal.classList.add('active');
                });
            });

            // Close modals
            closeBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    skillModal.classList.remove('active');
                    deleteModal.classList.remove('active');
                });
            });

            // Close modals when clicking outside
            window.addEventListener('click', function (e) {
                if (e.target === skillModal) {
                    skillModal.classList.remove('active');
                }
                if (e.target === deleteModal) {
                    deleteModal.classList.remove('active');
                }
            });

            // Fetch skill data for editing
            function fetchSkillData(skillId) {
                fetch(`/skills/${skillId}/edit`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            // Populate form
                            document.getElementById('skill-id').value = data.id;
                            document.getElementById('skill-name').value = data.name;
                            document.getElementById('skill-progress').value = data.progress;
                            document.getElementById('skill-color').value = data.color;

                            // Change form to update
                            skillForm.action = "{{ route('skills.update', ':id') }}".replace(':id', skillId);
                            const methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'PUT';
                            skillForm.appendChild(methodInput);

                            // Update modal title
                            modalTitle.textContent = 'Edit Skill';

                            // Show modal
                            skillModal.classList.add('active');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to fetch skill data');
                    });
            }

            // Reset skill form
            function resetSkillForm() {
                skillForm.reset();
                document.getElementById('skill-id').value = '';
                skillForm.action = "{{ route('skills.store') }}";

                // Remove any existing method input (for PUT)
                const methodInput = skillForm.querySelector('input[name="_method"]');
                if (methodInput) {
                    skillForm.removeChild(methodInput);
                }
            }

            // Handle form submission success
            skillForm.addEventListener('submit', function (e) {
                e.preventDefault();

                // Ambil token CSRF dari input hidden _token dalam form
                const csrfToken = this.querySelector('input[name="_token"]').value;

                const formData = new FormData(this);

                fetch(this.action, {
                    method: this.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => { throw err; });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        } else if (data.message) {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert(error.message || 'Terjadi kesalahan saat menyimpan skill');
                    });
            });
            
        });
    </script>
@endsection