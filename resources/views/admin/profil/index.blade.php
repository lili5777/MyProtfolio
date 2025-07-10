@extends('layouts.master')
@section('judul', 'Profile')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div class="page-title">
                <h1>Profile</h1>
                <p>Atur profilmu!</p>

            </div>
        </div>

        <!-- User Profile -->
        <div class="profile-container">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-cover d-flex justify-content-end align-items-start">
                    <button class="edit-btn" id="edit-about-btn">
                        <i class="ti-pencil"></i> Edit
                    </button>
                </div>
                <div class="avatar-container">
                    <img src="{{$user->photo ? asset('assets/img/' . $user->photo) : asset('assets/imgs/teen.png')}}"
                        alt="Profile" class="profile-avatar" id="profile-avatar">
                    {{-- <button class="avatar-edit-btn" id="avatar-edit-btn">
                        <i class="ti-camera"></i>
                    </button> --}}
                </div>
                <div class="profile-info">
                    <h1 class="profile-name">{{$user->name}}</h1>
                    {{-- <p class="profile-title">Web Developer & UI Designer</p> --}}
                    <span class="profile-badge">
                        <i class="ti-star"></i> {{$user->job ? $user->job : "Belum ada Job"}}
                    </span>
                </div>

            </div>

            <!-- Profile Content -->
            <div class="profile-content">
                <!-- About Section -->
                <div class="profile-section">
                    <div class="section-header">
                        <h3 class="section-title">About Me</h3>
                        <button class="edit-btn" id="edit-about-btn">
                            <i class="ti-pencil"></i> Edit
                        </button>
                    </div>
                    <div class="about-text">
                        <p>{{ $user->about ?: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.' }}
                        </p>
                    </div>
                </div>

                <!-- Skills Section -->
                {{-- <div class="profile-section">
                    <div class="section-header">
                        <h3 class="section-title">Skills</h3>
                        <button class="edit-btn">
                            <i class="ti-pencil"></i> Edit
                        </button>
                    </div>
                    <div class="skills-container">
                        <span class="skill-tag">HTML/CSS</span>
                        <span class="skill-tag">JavaScript</span>
                        <span class="skill-tag">React.js</span>
                        <span class="skill-tag">Vue.js</span>
                        <span class="skill-tag">Node.js</span>
                        <span class="skill-tag">Laravel</span>
                        <span class="skill-tag">UI/UX Design</span>
                        <span class="skill-tag">Responsive Design</span>
                    </div>
                </div> --}}

                <!-- Documents Section -->
                <div class="profile-section">
                    <div class="section-header">
                        <h3 class="section-title">Documents</h3>
                    </div>
                    @if ($user->document)
                        <div class="file-card">
                            <div class="file-icon">
                                <i class="ti-file"></i>
                            </div>
                            <div class="file-info">
                                <div class="file-name">{{$user->document}}</div>
                                {{-- <div class="file-size">2.4 MB</div> --}}
                            </div>
                            <div class="file-actions">
                                @if($user->document)
                                    <!-- Tombol Download -->
                                    <a href="{{ asset('assets/doc/' . $user->document) }}" download class="file-action-btn"
                                        title="Download">
                                        <i class="ti-download"></i>
                                    </a>

                                    <!-- Tombol Lihat (membuka dokumen di tab baru) -->
                                    <a href="{{ asset('assets/doc/' . $user->document) }}" target="_blank" class="file-action-btn"
                                        title="Lihat">
                                        <i class="ti-eye"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @else
                        Belum di upload
                    @endif

                </div>

                <!-- Experience Section -->
                {{-- <div class="profile-section">
                    <div class="section-header">
                        <h3 class="section-title">Experience</h3>
                        <button class="edit-btn">
                            <i class="ti-plus"></i> Add
                        </button>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="ti-briefcase"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Senior Web Developer at TechCorp</div>
                                <div class="activity-time">Jan 2020 - Present</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="ti-briefcase"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Web Developer at Digital Agency</div>
                                <div class="activity-time">Mar 2018 - Dec 2019</div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal-overlay" id="profile-modal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title">Edit Profile</h3>
                <button class="modal-close" id="modal-close">&times;</button>
            </div>
            <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data"
                class="modal-body">
                @csrf
                {{-- @method('PUT') --}}
                <div class="form-group">
                    <label class="form-label">Profile Photo</label>
                    <div class="avatar-preview">
                        <img src="{{$user->photo ? asset('assets/imgs/' . $user->photo) : asset('assets/imgs/teen.png')}}"
                            alt="Preview" id="avatar-preview">
                    </div>
                    <div class="file-upload">
                        <input type="file" id="avatar-upload" class="file-upload-input" accept="image/*" name="photo">
                        <label for="avatar-upload" class="file-upload-label">
                            <i class="ti-cloud-up file-upload-icon"></i>
                            <div class="file-upload-text">Click to upload or drag and drop</div>
                            <div class="file-upload-text"><strong>Max file size: 5MB</strong></div>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" value="{{$user->name}}" name="name">
                </div>

                <div class="form-group">
                    <label class="form-label">Job Title</label>
                    <input type="text" class="form-control" value="{{$user->job}}" name="job"
                        placeholder="Masukan job kamu">
                </div>

                <div class="form-group">
                    <label class="form-label">About Me</label>
                    <textarea class="form-control"
                        name="about">{{$user->about ? $user->about : 'Silahkan ceritakan dirimu'}}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">CV/Resume</label>
                    <div class="file-upload">
                        <input type="file" id="resume-upload" class="file-upload-input" accept=".pdf,.doc,.docx"
                            name="document" value="{{$user->document}}">
                        <label for="resume-upload" class="file-upload-label">
                            <i class="ti-file file-upload-icon"></i>
                            <div class="file-upload-text">Upload your CV or Resume</div>
                            <div class="file-upload-text"><strong>PDF(Max 10MB)</strong></div>
                        </label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancel-btn">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>


@endsection