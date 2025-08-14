@extends('layouts.master')

@section('judul', 'Sertifikat Management')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header-section">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div class="d-flex justify-content-between">
                <div class="page-title">
                    <h1>Sertifikat</h1>
                    <p>Kelola data sertifikat</p>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-primary" id="add-sertifikat-btn">
                        <i class="ti-plus"></i> Tambah Sertifikat
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

        <!-- Sertifikat Cards Grid -->
        <div class="sertifikat-grid">
            @foreach ($sertifikats as $sertifikat)
                <div class="sertifikat-card" data-id="{{$sertifikat->id}}">
                    <div class="sertifikat-image">
                        <img src="{{asset('assets/serti/' . $sertifikat->foto)}}" alt="{{$sertifikat->nama}}"
                            class="sertifikat-img">
                    </div>
                    <div class="sertifikat-content">
                        <h3>{{$sertifikat->nama}}</h3>
                        <p class="company">{{$sertifikat->company}}</p>
                        <p class="date">{{$sertifikat->terbit}}</p>
                    </div>
                    <div class="sertifikat-actions">
                        <button class="btn-action edit-sertifikat-btn" data-id="{{$sertifikat->id}}">
                            <i class="ti-pencil"></i>
                        </button>
                        <button class="btn-action delete-sertifikat-btn" data-id="{{$sertifikat->id}}">
                            <i class="ti-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Add Sertifikat Modal -->
        <div class="modal" id="sertifikat-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modal-title">Tambah Sertifikat</h3>
                    <span class="close-modal">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="{{route('sertifikat.store')}}" method="POST" enctype="multipart/form-data"
                        id="sertifikat-form">
                        @csrf
                        <input type="hidden" name="id" id="sertifikat-id">
                        <div class="form-group">
                            <label for="sertifikat-nama">Nama Sertifikat</label>
                            <input type="text" id="sertifikat-nama" name="nama" placeholder="Masukkan nama sertifikat"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="sertifikat-company">Perusahaan/Penyelenggara</label>
                            <input type="text" id="sertifikat-company" name="company" placeholder="Masukkan nama perusahaan"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="sertifikat-terbit">Tanggal Terbit</label>
                            <input type="date" id="sertifikat-terbit" name="terbit" required>
                        </div>

                        <div class="form-group">
                            <label for="sertifikat-foto">Foto Sertifikat</label>
                            <div class="file-upload-wrapper">
                                <label class="file-upload-label">
                                    <input type="file" id="sertifikat-foto" name="foto" accept=".jpg,.jpeg,.png">
                                    <span class="file-upload-custom">
                                        <i class="ti-cloud-up"></i>
                                        <span class="file-upload-text">Pilih file sertifikat...</span>
                                        <span class="file-name" id="file-name">Belum ada file dipilih</span>
                                    </span>
                                </label>
                                <div class="file-requirements">
                                    <small>Format: JPG, PNG (Disarankan rasio 3:4)</small>
                                </div>
                            </div>
                            <div class="image-preview" id="image-preview">
                                <img id="preview-image" src="" alt="Preview sertifikat" style="display: none;">
                            </div>
                        </div>

                        <div class="form-footer">
                            <button type="button" class="btn btn-secondary close-modal-btn">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Sertifikat Modal -->
        <div class="modal" id="edit-sertifikat-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="edit-modal-title">Edit Sertifikat</h3>
                    <span class="close-modal">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="edit-sertifikat-form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="edit-sertifikat-id">

                        <div class="form-group">
                            <label for="edit-sertifikat-nama">Nama Sertifikat</label>
                            <input type="text" id="edit-sertifikat-nama" name="nama" placeholder="Masukkan nama sertifikat"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="edit-sertifikat-company">Perusahaan/Penyelenggara</label>
                            <input type="text" id="edit-sertifikat-company" name="company"
                                placeholder="Masukkan nama perusahaan" required>
                        </div>

                        <div class="form-group">
                            <label for="edit-sertifikat-terbit">Tanggal Terbit</label>
                            <input type="date" id="edit-sertifikat-terbit" name="terbit" required>
                        </div>

                        <div class="form-group">
                            <label for="edit-sertifikat-foto">Foto Sertifikat</label>
                            <div class="file-upload-wrapper">
                                <label class="file-upload-label">
                                    <input type="file" id="edit-sertifikat-foto" name="foto" accept=".jpg,.jpeg,.png">
                                    <span class="file-upload-custom">
                                        <i class="ti-cloud-up"></i>
                                        <span class="file-upload-text">Pilih file sertifikat...</span>
                                        <span class="file-name" id="edit-file-name">Belum ada file dipilih</span>
                                    </span>
                                </label>
                                <div class="file-requirements">
                                    <small>Format: JPG, PNG (Disarankan rasio 3:4). Kosongkan jika tidak ingin
                                        mengubah.</small>
                                </div>
                            </div>
                            <div class="image-preview" id="edit-image-preview">
                                <img id="edit-preview-image" src="" alt="Preview sertifikat" style="display: none;">
                            </div>
                        </div>

                        <div class="form-footer">
                            <button type="button" class="btn btn-secondary close-modal-btn">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
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
                    <p>Apakah Anda yakin ingin menghapus sertifikat ini? Tindakan ini tidak dapat dibatalkan.</p>
                    <form id="delete-form" method="POST" action="#">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="delete-sertifikat-id" name="sertifikat_id" value="">
                        <div class="form-footer">
                            <button type="button" class="btn btn-secondary close-modal-btn">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        /* Sertifikat Grid Styles */
        .sertifikat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }

        /* Sertifikat Card Styles */
        .sertifikat-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .sertifikat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .sertifikat-image {
            height: 200px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f7fa;
        }

        .sertifikat-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .sertifikat-card:hover .sertifikat-img {
            transform: scale(1.05);
        }

        .sertifikat-content {
            padding: 1.5rem;
            flex-grow: 1;
        }

        .sertifikat-content h3 {
            margin: 0 0 0.5rem 0;
            color: #2d3748;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .sertifikat-content .company {
            color: #4a5568;
            margin: 0 0 0.25rem 0;
            font-size: 0.9rem;
        }

        .sertifikat-content .date {
            color: #718096;
            margin: 0;
            font-size: 0.8rem;
        }

        .sertifikat-actions {
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

        .btn-action.edit-sertifikat-btn:hover {
            color: #4299e1;
        }

        .btn-action.delete-sertifikat-btn:hover {
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

        /* Image Preview */
        .image-preview {
            margin-top: 0.8rem;
            text-align: center;
            padding: 0.8rem;
            background: #f8fafc;
            border-radius: 6px;
            min-height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #preview-image,
        #edit-preview-image {
            max-width: 100%;
            max-height: 200px;
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
            .sertifikat-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }

            .sertifikat-image {
                height: 180px;
            }

            .modal-content {
                width: 95%;
                max-width: 450px;
            }
        }

        @media (max-width: 480px) {
            .sertifikat-grid {
                grid-template-columns: 1fr;
            }

            .sertifikat-image {
                height: 160px;
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
            const addModal = document.getElementById('sertifikat-modal');
            const editModal = document.getElementById('edit-sertifikat-modal');
            const deleteModal = document.getElementById('delete-modal');
            const addBtn = document.getElementById('add-sertifikat-btn');
            const closeBtns = document.querySelectorAll('.close-modal, .close-modal-btn');
            const editBtns = document.querySelectorAll('.edit-sertifikat-btn');
            const deleteBtns = document.querySelectorAll('.delete-sertifikat-btn');

            // Add modal elements
            const fileInput = document.getElementById('sertifikat-foto');
            const fileName = document.getElementById('file-name');
            const previewImage = document.getElementById('preview-image');
            const sertifikatForm = document.getElementById('sertifikat-form');
            const modalTitle = document.getElementById('modal-title');

            // Edit modal elements
            const editFileInput = document.getElementById('edit-sertifikat-foto');
            const editFileName = document.getElementById('edit-file-name');
            const editPreviewImage = document.getElementById('edit-preview-image');
            const editSertifikatForm = document.getElementById('edit-sertifikat-form');
            const editModalTitle = document.getElementById('edit-modal-title');

            // Delete modal elements
            const deleteForm = document.getElementById('delete-form');

            // Show add modal
            addBtn.addEventListener('click', function () {
                resetSertifikatForm();
                modalTitle.textContent = 'Tambah Sertifikat';
                addModal.classList.add('active');
            });

            // Show edit modal
            editBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const sertifikatId = this.getAttribute('data-id');
                    fetchSertifikatData(sertifikatId);
                });
            });

            // Show delete modal
            deleteBtns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const sertifikatId = this.getAttribute('data-id');
                    // Set the hidden input value
                    document.getElementById('delete-sertifikat-id').value = sertifikatId;
                    // Set the complete action URL using Laravel route helper
                    deleteForm.action = "{{ route('sertifikat.destroy', ':id') }}".replace(':id', sertifikatId);
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
                    fileNameElement.textContent = 'Belum ada file dipilih';
                    previewElement.style.display = 'none';
                }
            }

            // Fetch sertifikat data for editing
            function fetchSertifikatData(sertifikatId) {
                fetch(`/sertifikat/${sertifikatId}/edit`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            // Populate edit form
                            document.getElementById('edit-sertifikat-id').value = data.id;
                            document.getElementById('edit-sertifikat-nama').value = data.nama;
                            document.getElementById('edit-sertifikat-company').value = data.company;
                            document.getElementById('edit-sertifikat-terbit').value = data.terbit;

                            // Set form action for update
                            editSertifikatForm.action = "{{ route('sertifikat.update', ':id') }}".replace(':id', sertifikatId);

                            // Set preview image if exists
                            if (data.foto) {
                                editPreviewImage.src = `{{ asset('assets/serti/') }}/${data.foto}`;
                                editPreviewImage.style.display = 'block';
                                editFileName.textContent = 'File saat ini: ' + data.foto;
                            } else {
                                editPreviewImage.style.display = 'none';
                                editFileName.textContent = 'Belum ada file dipilih';
                            }

                            // Show edit modal
                            editModal.classList.add('active');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Gagal mengambil data sertifikat');
                    });
            }

            // Reset add sertifikat form
            function resetSertifikatForm() {
                sertifikatForm.reset();
                document.getElementById('sertifikat-id').value = '';
                fileName.textContent = 'Belum ada file dipilih';
                previewImage.style.display = 'none';
                previewImage.src = '';

                // Set default date to today
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('sertifikat-terbit').value = today;
            }

            // Reset edit sertifikat form
            function resetEditSertifikatForm() {
                editSertifikatForm.reset();
                document.getElementById('edit-sertifikat-id').value = '';
                editFileName.textContent = 'Belum ada file dipilih';
                editPreviewImage.style.display = 'none';
                editPreviewImage.src = '';
            }
        });
    </script>
@endsection