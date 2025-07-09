<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Zaily</title>
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/meyawo.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        :root {
            --primary-color: #6c63ff;
            --primary-light: #8b85ff;
            --dark-color: #2f2e41;
            --light-color: #f9f9f9;
        }

        .login-section {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--light-color) 0%, #e6e6ff 100%);
            display: flex;
            align-items: center;
            padding: 2rem;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(108, 99, 255, 0.2);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
            display: flex;
            min-height: 500px;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            top: -100px;
            right: -100px;
        }

        .login-left::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            bottom: -50px;
            left: -50px;
        }

        .login-right {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-title {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
            color: white;
        }

        .login-subtitle {
            margin-bottom: 2rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
            color: white;
        }

        .login-form .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .login-form .form-control {
            border: none;
            border-bottom: 2px solid #ddd;
            border-radius: 0;
            padding: 0.75rem 0;
            background: transparent;
            transition: all 0.3s;
            padding-right: 30px;
        }

        .login-form .form-control:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }

        .login-form label {
            position: absolute;
            top: 0.75rem;
            left: 0;
            transition: all 0.3s;
            color: #777;
            pointer-events: none;
        }

        .login-form .form-control:focus+label,
        .login-form .form-control:not(:placeholder-shown)+label {
            top: -0.75rem;
            font-size: 0.8rem;
            color: var(--primary-color);
        }

        .btn-login {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-login:hover {
            background: var(--dark-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(108, 99, 255, 0.3);
        }

        .login-illustration {
            max-width: 40%;
            height: auto;
            margin-bottom: 2rem;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.1));
        }

        .login-footer {
            margin-top: 2rem;
            text-align: center;
            color: #777;
        }

        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .password-toggle {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
            padding: 0.5rem;
        }

        .password-toggle:hover {
            color: var(--primary-color);
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-left {
                padding: 1.5rem;
            }

            .login-right {
                padding: 2rem 1.5rem;
            }

            .login-subtitle {
                margin-bottom: 0;
            }

            .login-title {
                font-size: 25px;
                margin-bottom: 1rem;
            }

            .section-title {
                font-size: 20px;
            }

            .login-illustration {
                max-width: 25%;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <section class="login-section">
        <div class="login-container" data-aos="zoom-in" data-aos-duration="1000">
            <div class="login-left">
                <img src="assets/imgs/tesji.png" alt="Login Illustration" class="login-illustration floating-animation">
                <h1 class="login-title">Welcome Back!</h1>
                <p class="login-subtitle">Enter your credentials to access your admin dashboard and manage your
                    portfolio.</p>
            </div>
            <div class="login-right">
                <h2 class="section-title mb-4">Login to Your Account</h2>

                <!-- Tampilkan pesan error jika ada -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                

                <form class="login-form" action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder=" " required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-group" style="position: relative;">
                        <input type="password" class="form-control" id="password" name="password" placeholder=" "
                            required>
                        <label for="password">Password</label>
                        <span class="password-toggle" id="togglePassword">
                            <i class="ti-eye"></i>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-login">Login</button>
                </form>
            </div>
        </div>
    </section>

    <!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        });

        // Add focus effects
        $(document).ready(function () {
            $('.form-control').focus(function () {
                $(this).siblings('label').addClass('active');
            }).blur(function () {
                if ($(this).val() === '') {
                    $(this).siblings('label').removeClass('active');
                }
            });

            // Check for filled inputs on load
            $('.form-control').each(function () {
                if ($(this).val() !== '') {
                    $(this).siblings('label').addClass('active');
                }
            });

            // Toggle password visibility
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function () {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle the eye icon
                this.querySelector('i').classList.toggle('ti-eye');
                this.querySelector('i').classList.toggle('ti-eye-off');
            });
        });
    </script>
</body>

</html>