@extends('layouts.master')

@section('judul', 'Service Management')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header-section">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div class="d-flex justify-content-between">
                <div class="page-title">
                    <h1>Service</h1>
                    <p>Atur service kamu</p>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-primary" id="add-service-btn">
                        <i class="ti-plus"></i> Add New Service
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

        <!-- Service Cards Grid -->
        <div class="service-grid">
            @foreach ($services as $sv)
                <div class="service-card" data-id="{{$sv->id}}">
                    <div class="service-icon">
                        <img src="{{asset('assets/imgs/' . $sv->icon)}}" alt="{{$sv->name}}" class="service-icon-img">
                    </div>
                    <div class="service-content">
                        <h3>{{$sv->name}}</h3>
                        <p>{{$sv->desc}}</p>
                    </div>
                    <div class="service-actions">
                        <button class="btn-action edit-service-btn" data-id="{{$sv->id}}">
                            <i class="ti-pencil"></i>
                        </button>
                        <button class="btn-action delete-service-btn" data-id="{{$sv->id}}">
                            <i class="ti-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Add Service Modal -->
        <div class="modal" id="service-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modal-title">Add New Service</h3>
                    <span class="close-modal">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data" id="service-form">
                        @csrf
                        <input type="hidden" name="id" id="service-id">
                        <div class="form-group">
                            <label for="service-name">Service Name</label>
                            <input type="text" id="service-name" name="name" placeholder="Enter service name" required>
                        </div>

                        <div class="form-group">
                            <label for="service-icon">Icon</label>
                            <div class="file-upload-wrapper">
                                <label class="file-upload-label">
                                    <input type="file" id="service-icon" name="icon" accept=".svg,.png">
                                    <span class="file-upload-custom">
                                        <i class="ti-cloud-up"></i>
                                        <span class="file-upload-text">Choose icon file...</span>
                                        <span class="file-name" id="file-name">No file chosen</span>
                                    </span>
                                </label>
                                <div class="file-requirements">
                                    <small>Recommended: SVG or PNG (100×100px)</small>
                                </div>
                            </div>
                            <div class="icon-preview" id="icon-preview">
                                <img id="preview-image" src="" alt="Icon preview" style="display: none;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="service-desc">Description</label>
                            <textarea id="service-desc" name="desc" rows="3" placeholder="Enter service description"
                                required></textarea>
                        </div>

                        <div class="form-footer">
                            <button type="button" class="btn btn-secondary close-modal-btn">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Service Modal -->
        <div class="modal" id="edit-service-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="edit-modal-title">Edit Service</h3>
                    <span class="close-modal">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="edit-service-form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="edit-service-id">

                        <div class="form-group">
                            <label for="edit-service-name">Service Name</label>
                            <input type="text" id="edit-service-name" name="name" placeholder="Enter service name" required>
                        </div>

                        <div class="form-group">
                            <label for="edit-service-icon">Icon</label>
                            <div class="file-upload-wrapper">
                                <label class="file-upload-label">
                                    <input type="file" id="edit-service-icon" name="icon" accept=".svg,.png">
                                    <span class="file-upload-custom">
                                        <i class="ti-cloud-up"></i>
                                        <span class="file-upload-text">Choose icon file...</span>
                                        <span class="file-name" id="edit-file-name">No file chosen</span>
                                    </span>
                                </label>
                                <div class="file-requirements">
                                    <small>Recommended: SVG or PNG (100×100px). Leave empty to keep current icon.</small>
                                </div>
                            </div>
                            <div class="icon-preview" id="edit-icon-preview">
                                <img id="edit-preview-image" src="" alt="Icon preview" style="display: none;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edit-service-desc">Description</label>
                            <textarea id="edit-service-desc" name="desc" rows="3" placeholder="Enter service description"
                                required></textarea>
                        </div>

                        <div class="form-footer">
                            <button type="button" class="btn btn-secondary close-modal-btn">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Service</button>
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
                    <p>Apakah Anda yakin ingin menghapus service ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <form id="delete-form" method="POST" action="#">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="delete-service-id" name="service_id" value="">
                        <div class="form-footer">
                            <button type="button" class="btn btn-secondary close-modal-btn">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus Service</button>
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
        .service-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .service-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1.5rem;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .service-icon-img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .service-card:hover .service-icon-img {
            transform: scale(1.1);
        }

        .service-content {
            padding: 1.5rem;
            flex-grow: 1;
        }

        .service-content h3 {
            margin: 0 0 0.5rem 0;
            color: #2d3748;
            font-size: 1.25rem;
        }

        .service-content p {
            color: #718096;
            margin: 0;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .service-actions {
            display: flex;
            border-top: 1px solid #edf2f7;
            padding: 0.75rem 1.5rem;
        }

        .btn-action {
            background: none;
            border: none;
            color: #a0aec0;
            font-size: 1rem;
            cursor: pointer;
            margin-right: 1rem;
            transition: color 0.2s;
        }

        .btn-action:hover {
            color: #4a5568;
        }

        .btn-action.edit-service-btn:hover {
            color: #4299e1;
        }

        .btn-action.delete-service-btn:hover {
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
            max-width: 400px;
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
            padding: 1rem;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
            font-size: 1.2rem;
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
            padding: 1rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1rem;
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
            padding: 0.6rem;
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

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* File Upload Styles */
        .file-upload-wrapper {
            margin-bottom: 1rem;
        }

        .file-upload-label {
            display: block;
        }

        .file-upload-label input[type="file"] {
            display: none;
        }

        .file-upload-custom {
            display: flex;
            align-items: center;
            padding: 0.6rem;
            background: #f8fafc;
            border: 1px dashed #cbd5e0;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .file-upload-custom:hover {
            background: #edf2f7;
            border-color: #a0aec0;
        }

        .file-upload-custom i {
            margin-right: 0.5rem;
            color: #4a5568;
            font-size: 0.9rem;
        }

        .file-upload-text {
            font-weight: 500;
            color: #4a5568;
        }

        .file-name {
            margin-left: auto;
            color: #718096;
            font-size: 0.8rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 120px;
        }

        .file-requirements {
            margin-top: 0.25rem;
            color: #718096;
            font-size: 0.7rem;
        }

        /* Icon Preview */
        .icon-preview {
            margin-top: 0.8rem;
            text-align: center;
            padding: 0.8rem;
            background: #f8fafc;
            border-radius: 6px;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #preview-image,
        #edit-preview-image {
            max-width: 80px;
            max-height: 80px;
            object-fit: contain;
        }

        /* Form Footer */
        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #edf2f7;
        }

        .btn-secondary {
            background: #edf2f7;
            color: #4a5568;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 0.9rem;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        .btn-primary {
            background: #667eea;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 0.9rem;
        }

        .btn-primary:hover {
            background: #5a67d8;
        }

        .btn-danger {
            background: #f56565;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 0.9rem;
        }

        .btn-danger:hover {
            background: #e53e3e;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .service-icon-img {
                width: 40px;
                height: 40px;
            }

            .service-icon {
                padding: 1rem;
            }

            .modal-content {
                width: 95%;
                max-width: 350px;
            }
        }

        @media (max-width: 480px) {
            .service-icon-img {
                width: 35px;
                height: 35px;
            }

            .modal-header h3 {
                font-size: 1.1rem;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                padding: 0.5rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // DOM Elements
            const addModal = document.getElementById('service-modal');
            const editModal = document.getElementById('edit-service-modal');
            const deleteModal = document.getElementById('delete-modal');
            const addBtn = document.getElementById('add-service-btn');
            const closeBtns = document.querySelectorAll('.close-modal, .close-modal-btn');
            const editBtns = document.querySelectorAll('.edit-service-btn');
            const deleteBtns = document.querySelectorAll('.delete-service-btn');

            // Add modal elements
            const fileInput = document.getElementById('service-icon');
            const fileName = document.getElementById('file-name');
            const previewImage = document.getElementById('preview-image');
            const serviceForm = document.getElementById('service-form');
            const modalTitle = document.getElementById('modal-title');

            // Edit modal elements
            const editFileInput = document.getElementById('edit-service-icon');
            const editFileName = document.getElementById('edit-file-name');
            const editPreviewImage = document.getElementById('edit-preview-image');
            const editServiceForm = document.getElementById('edit-service-form');
            const editModalTitle = document.getElementById('edit-modal-title');

            // Delete modal elements
            const deleteForm = document.getElementById('delete-form');

            // Show add modal
            addBtn.addEventListener('click', function () {
                resetServiceForm();
                modalTitle.textContent = 'Add New Service';
                addModal.classList.add('active');
            });

            // Show edit modal
            editBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const serviceId = this.getAttribute('data-id');
                    fetchServiceData(serviceId);
                });
            });

            // Show delete modal
            deleteBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const serviceId = this.getAttribute('data-id');
                    // Set the hidden input value
                    document.getElementById('delete-service-id').value = serviceId;
                    // Set the complete action URL using Laravel route helper
                    deleteForm.action = "{{ route('service.hapus', ':id') }}".replace(':id', serviceId);
                    deleteModal.classList.add('active');
                });
            });

            // Close modals
            closeBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    addModal.classList.remove('active');
                    editModal.classList.remove('active');
                    deleteModal.classList.remove('active');
                });
            });

            // Close modals when clicking outside
            window.addEventListener('click', function (e) {
                if (e.target === addModal) {
                    addModal.classList.remove('active');
                }
                if (e.target === editModal) {
                    editModal.classList.remove('active');
                }
                if (e.target === deleteModal) {
                    deleteModal.classList.remove('active');
                }
            });

            // File upload preview for add modal
            fileInput.addEventListener('change', function (e) {
                handleFilePreview(e, fileName, previewImage);
            });

            // File upload preview for edit modal
            editFileInput.addEventListener('change', function (e) {
                handleFilePreview(e, editFileName, editPreviewImage);
            });

            // Helper function for file preview
            function handleFilePreview(event, fileNameElement, previewElement) {
                const file = event.target.files[0];
                if (file) {
                    fileNameElement.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewElement.src = e.target.result;
                        previewElement.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    fileNameElement.textContent = 'No file chosen';
                    previewElement.style.display = 'none';
                }
            }

            // Fetch service data for editing
            function fetchServiceData(serviceId) {
                fetch(`/services/${serviceId}/edit`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            // Populate edit form
                            document.getElementById('edit-service-id').value = data.id;
                            document.getElementById('edit-service-name').value = data.name;
                            document.getElementById('edit-service-desc').value = data.desc;

                            // Set form action for update
                            editServiceForm.action = "{{ route('services.update', ':id') }}".replace(':id', serviceId);

                            // Set preview image if exists
                            if (data.icon) {
                                editPreviewImage.src = `{{ asset('assets/imgs/') }}/${data.icon}`;
                                editPreviewImage.style.display = 'block';
                                editFileName.textContent = 'Current: ' + data.icon;
                            } else {
                                editPreviewImage.style.display = 'none';
                                editFileName.textContent = 'No file chosen';
                            }

                            // Show edit modal
                            editModal.classList.add('active');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to fetch service data');
                    });
            }

            // Reset add service form
            function resetServiceForm() {
                serviceForm.reset();
                document.getElementById('service-id').value = '';
                fileName.textContent = 'No file chosen';
                previewImage.style.display = 'none';
                previewImage.src = '';
            }

            // Reset edit service form
            function resetEditServiceForm() {
                editServiceForm.reset();
                document.getElementById('edit-service-id').value = '';
                editFileName.textContent = 'No file chosen';
                editPreviewImage.style.display = 'none';
                editPreviewImage.src = '';
            }
        });
    </script>
@endsection