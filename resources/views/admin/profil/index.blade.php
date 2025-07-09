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
                    <img src="{{asset('assets/imgs/teen.png')}}" alt="Profile" class="profile-avatar" id="profile-avatar">
                    {{-- <button class="avatar-edit-btn" id="avatar-edit-btn">
                        <i class="ti-camera"></i>
                    </button> --}}
                </div>
                <div class="profile-info">
                    <h1 class="profile-name">John Doe</h1>
                    {{-- <p class="profile-title">Web Developer & UI Designer</p> --}}
                    <span class="profile-badge">
                        <i class="ti-star"></i> Web Developer
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
                        <p>Saya seorang web developer dengan pengalaman lebih dari 5 tahun dalam membangun aplikasi web modern. Spesialisasi saya meliputi pengembangan frontend menggunakan React.js dan Vue.js, serta pengembangan backend dengan Node.js dan Laravel.</p>
                        <p>Saya sangat passionate tentang menciptakan pengalaman pengguna yang menarik dan solusi teknologi yang inovatif. Di waktu luang, saya suka berkontribusi ke proyek open source dan belajar teknologi baru.</p>
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
                    <div class="file-card">
                        <div class="file-icon">
                            <i class="ti-file"></i>
                        </div>
                        <div class="file-info">
                            <div class="file-name">My_Resume.pdf</div>
                            <div class="file-size">2.4 MB</div>
                        </div>
                        <div class="file-actions">
                            <button class="file-action-btn" title="Download">
                                <i class="ti-download"></i>
                            </button>
                            <button class="file-action-btn" title="Delete">
                                <i class="ti-trash"></i>
                            </button>
                        </div>
                    </div>
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
            <form class="modal-body">
                <div class="form-group">
                    <label class="form-label">Profile Photo</label>
                    <div class="avatar-preview">
                        <img src="{{asset('assets/imgs/teen.png')}}" alt="Preview" id="avatar-preview">
                    </div>
                    <div class="file-upload">
                        <input type="file" id="avatar-upload" class="file-upload-input" accept="image/*">
                        <label for="avatar-upload" class="file-upload-label">
                            <i class="ti-cloud-up file-upload-icon"></i>
                            <div class="file-upload-text">Click to upload or drag and drop</div>
                            <div class="file-upload-text"><strong>Max file size: 5MB</strong></div>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" value="John Doe">
                </div>

                <div class="form-group">
                    <label class="form-label">Job Title</label>
                    <input type="text" class="form-control" value="Web Developer & UI Designer">
                </div>

                <div class="form-group">
                    <label class="form-label">About Me</label>
                    <textarea class="form-control">Saya seorang web developer dengan pengalaman lebih dari 5 tahun dalam membangun aplikasi web modern. Spesialisasi saya meliputi pengembangan frontend menggunakan React.js dan Vue.js, serta pengembangan backend dengan Node.js dan Laravel.</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">CV/Resume</label>
                    <div class="file-upload">
                        <input type="file" id="resume-upload" class="file-upload-input" accept=".pdf,.doc,.docx">
                        <label for="resume-upload" class="file-upload-label">
                            <i class="ti-file file-upload-icon"></i>
                            <div class="file-upload-text">Upload your CV or Resume</div>
                            <div class="file-upload-text"><strong>PDF, DOC, DOCX (Max 10MB)</strong></div>
                        </label>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancel-btn">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>


@endsection