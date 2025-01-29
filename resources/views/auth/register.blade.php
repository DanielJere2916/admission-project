<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Favicons -->
    <link href="{{ asset('admission_logo.png') }}" rel="icon">
    <link href="{{ asset('admission_logo.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('website_assert/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website_assert/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #1e2a78 40%, #474646 100%);
            min-height: 100vh;
            padding-top: 80px;
        }

        /* Header/Navbar Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            z-index: 999;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .branding {
            padding: 12px 0;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .logo {
            text-decoration: none;
            display: flex;
            align-items: center;
            color: #fff;
            gap: 12px;
        }

        .nav-logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.2);
            padding: 2px;
        }

        .sitename {
            font-size: 20px;
            margin: 0;
            color: #fff;
            font-weight: 500;
            letter-spacing: 0.5px;
            font-family: 'Poppins', sans-serif;
        }

        .navmenu {
            display: flex;
            justify-content: flex-end;
        }

        .navmenu ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navmenu a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 10px 15px;
            transition: 0.3s;
        }

        .navmenu a:hover {
            color: #fff;
        }

        /* Form Styles */
        .form {
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: rgba(255, 255, 255, 0.15);
            padding: 25px;
            width: 450px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            font-family: 'Poppins', sans-serif;
            opacity: 0;
            transform: translateY(20px);
            animation: formAppear 1.5s ease forwards;
            margin: 80px auto;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 15px;
        }

        .form-logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.2);
            padding: 2px;
            margin-bottom: 5px;
        }

        .form-title {
            text-align: center;
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .flex-column {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-bottom: 5px;
        }

        label {
            color: #ffffff;
            font-weight: 500;
            font-size: 12px;
            margin-bottom: 0;
            opacity: 0.9;
        }

        .inputForm {
            border: 1.5px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            height: 40px;
            display: flex;
            align-items: center;
            padding-left: 12px;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.08);
            margin-bottom: 5px;
        }

        .inputForm:hover {
            border-color: rgba(255, 255, 255, 0.4);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .input {
            margin-left: 12px;
            border-radius: 8px;
            border: none;
            width: 100%;
            height: 100%;
            background: transparent;
            color: #ffffff;
            font-size: 13px;
        }

        .input::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-size: 12px;
        }

        .button-submit {
            margin: 10px 0 8px 0;
            background: linear-gradient(135deg, #4a90e2 0%, #3657b3 100%);
            border: none;
            color: white;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            height: 40px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .span {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .span:hover {
            color: #fff;
            text-decoration: underline;
        }

        .p {
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            margin: 3px 0;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 11px;
            margin: 0;
        }

        svg {
            fill: rgb(255, 255, 255);
        }

        @keyframes formAppear {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Multi-step form styles */
        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-navigation button {
            background: linear-gradient(135deg, #4a90e2 0%, #3657b3 100%);
            border: none;
            color: white;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            height: 40px;
            padding: 0 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-navigation button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .form-navigation button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        /* Progress Line Styles */
        .progress-line {
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
            margin-bottom: 20px;
            position: relative;
        }

        .progress-line::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: var(--progress-width, 0%);
            background: linear-gradient(135deg, #4a90e2 0%, #3657b3 100%);
            border-radius: 2px;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <header id="header" class="header">
        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="/" class="logo d-flex align-items-center">
                    <img src="{{ asset('admission_logo.png') }}" alt="Logo" class="nav-logo">
                    <h1 class="sitename">Student-Admission</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/#about">About</a></li>
                        <li><a href="/#services">Services</a></li>
                        <li><a href="/#portfolio">Portfolio</a></li>
                        <li><a href="/#team">Team</a></li>
                        <li><a href="/#contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="logo-container">
            <img src="{{ asset('admission_logo.png') }}" alt="Logo" class="form-logo">
        </div>
        <h2 class="form-title">Create Account</h2>

        <!-- Progress Line -->
        <div class="progress-line"></div>

        <!-- Step 1: Username, Email, Gender, Country, Phone Number -->
        <div class="form-step active">
            <div class="form-row">
                <div class="flex-column">
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    <label>Username</label>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                        </svg>
                        <input type="text" name="name" class="input" placeholder="Enter your Name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                    </div>
                </div>

                <div class="flex-column">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    <label>Email</label>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                            <g id="Layer_3" data-name="Layer 3">
                                <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path>
                            </g>
                        </svg>
                        <input type="email" name="email" class="input" placeholder="Enter your Email" value="{{ old('email') }}" required autocomplete="username" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="flex-column">
                    @error('gender')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    <label>Gender</label>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                        </svg>
                        <select name="gender" class="input" required>
                            <option style="color: #000;" value="">Select Gender</option>
                            <option style="color: #000;" value="Male">Male</option>
                            <option style="color: #000;" value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="flex-column">
                    @error('country')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    <label>Country</label>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                        </svg>
                        <input type="text" name="country" class="input" placeholder="Enter your Country" value="{{ old('country') }}" required />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="flex-column">
                    @error('phonenumber')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    <label>Phone Number</label>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                        </svg>
                        <input type="text" name="phonenumber" class="input" placeholder="Enter your Phone Number" value="{{ old('phonenumber') }}" required />
                    </div>
                </div>
            </div>

            <div class="form-navigation">
                <button type="button" class="next-btn">Next</button>
            </div>
        </div>

        <!-- Step 2: Password and Confirm Password -->
        <div class="form-step">
            <div class="form-row">
                <div class="flex-column">
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                    <label>Password</label>
                    <div class="inputForm">
                        <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path>
                            <path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path>
                        </svg>
                        <input type="password" name="password" class="input" placeholder="Enter your Password" required autocomplete="new-password" />
                    </div>
                </div>

                <div class="flex-column">
                    <label>Confirm Password</label>
                    <div class="inputForm">
                        <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path>
                            <path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path>
                        </svg>
                        <input type="password" name="password_confirmation" class="input" placeholder="Confirm your Password" required autocomplete="new-password" />
                    </div>
                </div>
            </div>

            <div class="form-navigation">
                <button type="button" class="prev-btn">Previous</button>
                <button type="submit" class="button-submit">{{ __('Register') }}</button>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formSteps = document.querySelectorAll('.form-step');
            const nextButtons = document.querySelectorAll('.next-btn');
            const prevButtons = document.querySelectorAll('.prev-btn');
            const progressLine = document.querySelector('.progress-line');
            let currentStep = 0;

            function showStep(stepIndex) {
                formSteps.forEach((step, index) => {
                    step.classList.toggle('active', index === stepIndex);
                });

                // Update progress line
                const progressWidth = ((stepIndex + 1) / formSteps.length) * 100;
                progressLine.style.setProperty('--progress-width', `${progressWidth}%`);
            }

            function validateStep(stepIndex) {
                const inputs = formSteps[stepIndex].querySelectorAll('input, select');
                let isValid = true;

                inputs.forEach(input => {
                    if (!input.checkValidity()) {
                        isValid = false;
                        input.reportValidity(); // Show validation message
                    }
                });

                return isValid;
            }

            nextButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (validateStep(currentStep)) {
                        if (currentStep < formSteps.length - 1) {
                            currentStep++;
                            showStep(currentStep);
                        }
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            showStep(currentStep);
        });
    </script>
</body>
</html>