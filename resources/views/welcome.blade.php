<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
      <style>
        /* Animations and Transitions */
        .nav-item {
            position: relative;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #0d6efd;
            left: 0;
            bottom: 0;
            transition: width 0.3s ease;
        }

        .nav-item:hover::after {
            width: 100%;
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        .dropdown-menu {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/api/placeholder/1920/600');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            animation: slideUp 1s ease;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .feature-card {
            border: 1px solid #eee;
            padding: 20px;
            height: 100%;
            transition: all 0.3s ease;
            background: white;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .blue-section {
            background-color: #0d6efd;
            color: white;
            padding: 20px 0;
            position: relative;
            overflow: hidden;
        }

        .blue-section i {
            transition: transform 0.3s ease;
        }

        .blue-section i:hover {
            transform: scale(1.2);
        }

        /* Account dropdown specific styles */
        .account-dropdown .dropdown-menu {
            min-width: 200px;
            padding: 1rem;
        }

        .account-dropdown .dropdown-item {
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .account-dropdown .dropdown-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('admission_logo.png') }}" alt="University Logo" class="me-2" style="width: 50px; height: 50px;">
            <!-- <span>University Name</span> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('programpage') }}">Programmes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('campusespage') }}">Campus Life</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('researchpage') }}">Research</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contactpage') }}">Contact</a></li>
                <li class="nav-item dropdown account-dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle fs-5"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        @if (Route::has('login'))
                            @auth
                                <div class="px-3 py-2 text-center border-bottom mb-2">
                                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                        <h6 class="mb-0">Dashboard</h6>
                                    </a>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="dropdown-item font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="dropdown-item font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

      <!-- Hero Section -->
    <section class="hero-section text-center" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('2.jpg') }}'); padding: 175px 0; background-size: cover;">
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1 class="display-4 mb-4">Welcome to Our University</h1>
                <p class="lead mb-4">Discover Your Potential</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="btn btn-primary">Apply Now</a>
                    <a href="#" class="btn btn-outline-light">Explore Programmes</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="blue-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <i class="fas fa-graduation-cap mb-2"></i>
                    <h5>5000+ Graduates</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-briefcase mb-2"></i>
                    <h5>95% Employment Rate</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-book mb-2"></i>
                    <h5>50+ Programmes</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-award mb-2"></i>
                    <h5>Accredited by NCRE</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Programmes -->
    <section class="py-5 px-5">
        <div class="container"></div>
            <h2 class="text-center mb-4">Featured Programmes</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="{{ asset('2.jpg') }}" class="card-img-top" alt="Law">
                        <div class="card-body">
                            <h5 class="card-title">Law</h5>
                            <p class="card-text">Bachelor's degree in Law with focus on modern legal practices.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="{{ asset('2.jpg') }}" class="card-img-top" alt="Computer Science">
                        <div class="card-body">
                            <h5 class="card-title">Computer Science</h5>
                            <p class="card-text">Advanced programming and software development courses.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="{{ asset('2.jpg') }}"/api/placeholder/400/300" class="card-img-top" alt="Public Health">
                        <div class="card-body">
                            <h5 class="card-title">Public Health</h5>
                            <p class="card-text">Comprehensive health management and policy studies.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="{{ asset('2.jpg') }}" class="card-img-top" alt="Business">
                        <div class="card-body">
                            <h5 class="card-title">Business Administration</h5>
                            <p class="card-text">Modern business management and leadership principles.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Why Choose Us?</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="feature-card text-center">
                        <i class="fas fa-book-reader fs-1 text-primary mb-3"></i>
                        <h5>Industry-Ready Curriculum</h5>
                        <p>Programs designed to meet current industry demands.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card text-center">
                        <i class="fas fa-chalkboard-teacher fs-1 text-primary mb-3"></i>
                        <h5>Experienced Faculty</h5>
                        <p>Learn from experienced professors and industry experts.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card text-center">
                        <i class="fas fa-building fs-1 text-primary mb-3"></i>
                        <h5>Modern Facilities</h5>
                        <p>State-of-the-art labs and learning spaces.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card text-center">
                        <i class="fas fa-graduation-cap fs-1 text-primary mb-3"></i>
                        <h5>Scholarships</h5>
                        <p>Various scholarships available for eligible students.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Process -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Application Process</h2>
            <div class="row g-4">
                <div class="col-md-3 text-center">
                    <div class="p-3">
                        <i class="fas fa-search fs-1 text-primary mb-3"></i>
                        <h5>Discover Programmes</h5>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="p-3">
                        <i class="fas fa-file-alt fs-1 text-primary mb-3"></i>
                        <h5>Submit Application</h5>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="p-3">
                        <i class="fas fa-tasks fs-1 text-primary mb-3"></i>
                        <h5>Track Status</h5>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="p-3">
                        <i class="fas fa-check-circle fs-1 text-primary mb-3"></i>
                        <h5>Register Online</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Testimonials -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">What Our Students Say</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card text-center p-4">
                                    <div class="card-body">
                                        <p class="lead mb-3">"The supportive faculty helped me secure internships at top firms."</p>
                                        <h5 class="card-title mb-0">John Doe</h5>
                                        <p class="card-text text-muted">Law Graduate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card text-center p-4">
                                    <div class="card-body">
                                        <p class="lead mb-3">"Amazing research opportunities and world-class facilities."</p>
                                        <h5 class="card-title mb-0">Jane Smith</h5>
                                        <p class="card-text text-muted">Computer Science Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-primary rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-primary rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Upcoming Events</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-calendar-alt text-primary fs-4 me-2"></i>
                                <div>
                                    <h6 class="mb-0">Open Day</h6>
                                    <small class="text-muted">March 15, 2025</small>
                                </div>
                            </div>
                            <p class="card-text">Visit our campus and learn about our programs and facilities.</p>
                            <small class="text-muted">Location: Main Campus</small>
                            <div class="mt-3">
                                <a href="#" class="btn btn-primary">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-laptop text-primary fs-4 me-2"></i>
                                <div>
                                    <h6 class="mb-0">Admissions Webinar</h6>
                                    <small class="text-muted">March 22, 2025</small>
                                </div>
                            </div>
                            <p class="card-text">Learn about our admission process and requirements.</p>
                            <small class="text-muted">Location: Online</small>
                            <div class="mt-3">
                                <a href="#" class="btn btn-primary">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-users text-primary fs-4 me-2"></i>
                                <div>
                                    <h6 class="mb-0">Career Fair</h6>
                                    <small class="text-muted">April 5, 2025</small>
                                </div>
                            </div>
                            <p class="card-text">Meet potential employers and explore career opportunities.</p>
                            <small class="text-muted">Location: University Hall</small>
                            <div class="mt-3">
                                <a href="#" class="btn btn-primary">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent News & Blogs -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Recent News & Blogs</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('2.jpg') }}" class="card-img-top" alt="Engineering Lab">
                        <div class="card-body">
                            <h5 class="card-title">New Engineering Lab Launch</h5>
                            <p class="card-text">State-of-the-art facility opening for engineering students.</p>
                            <a href="#" class="btn btn-link p-0">Read More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('2.jpg') }}" class="card-img-top" alt="Alumni Success">
                        <div class="card-body">
                            <h5 class="card-title">Alumni Success Stories</h5>
                            <p class="card-text">Recent graduates making waves in their respective industries.</p>
                            <a href="#" class="btn btn-link p-0">Read More →</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('2.jpg') }}" class="card-img-top" alt="Research Breakthrough">
                        <div class="card-body">
                            <h5 class="card-title">Research Breakthrough in Climate Science</h5>
                            <p class="card-text">University team's findings published in prestigious journal.</p>
                            <a href="#" class="btn btn-link p-0">Read More →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Frequently Asked Questions</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What are the admission requirements?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Admission requirements vary by program. Generally, we look for strong academic performance, relevant test scores, and extracurricular activities.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    How do I apply for financial aid?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Complete the financial aid application form available on our website and submit required documents before the deadline.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What housing options are available for students?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer on-campus dormitories, shared apartments, and assistance in finding off-campus housing options.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Can international students apply?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we welcome international students. Additional requirements include English proficiency tests and visa documentation.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    What career services do you offer?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We provide career counseling, resume workshops, job fairs, internship placements, and networking events.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll to Top Button -->
    <div class="scroll-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>123 University Avenue, London</p>
                    <p>Email: info@university.edu</p>
                    <p>Phone: +44 123 456 789</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Programmes</a></li>
                        <li><a href="#" class="text-light">Admissions</a></li>
                        <li><a href="#" class="text-light">Campus Life</a></li>
                        <li><a href="#" class="text-light">Research</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-light"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>&copy; 2025 University Name. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Add before closing body tag -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Optional: Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>