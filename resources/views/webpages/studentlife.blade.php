<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience Student Life</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('./1.png');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
        }
        .activity-card {
            padding: 30px;
            text-align: center;
            transition: transform 0.3s;
        }
        .activity-card:hover {
            transform: translateY(-10px);
        }
        .activity-icon {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 20px;
        }
        .event-card {
            transition: transform 0.3s;
        }
        .event-card:hover {
            transform: translateY(-5px);
        }
        .testimonial-section {
            background-color: #f8f9fa;
        }
        .navbar-nav .nav-link {
            color: white !important;
            margin: 0 10px;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="" alt="University Logo" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Programmes</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Campuses</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Student Life</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Research</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Account
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Login</a></li>
                        <li><a class="dropdown-item" href="#">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 mb-3">Experience Student Life</h1>
        <p class="lead">Discover a vibrant community, endless opportunities,<br>and unforgettable experiences.</p>
    </div>
</section>

<!-- Student Activities -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Student Activities</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="activity-card shadow-sm rounded">
                    <i class="fas fa-laptop activity-icon"></i>
                    <h5>Academic Clubs</h5>
                    <p class="text-muted">Join subject-specific clubs to deepen your knowledge and connect with like-minded peers.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card shadow-sm rounded">
                    <i class="fas fa-music activity-icon"></i>
                    <h5>Arts & Culture</h5>
                    <p class="text-muted">Express yourself through various arts and cultural activities, from music to theater.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card shadow-sm rounded">
                    <i class="fas fa-running activity-icon"></i>
                    <h5>Sports & Fitness</h5>
                    <p class="text-muted">Stay active and competitive with our wide range of sports teams and fitness programs.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="activity-card shadow-sm rounded">
                    <i class="fas fa-globe activity-icon"></i>
                    <h5>Community Service</h5>
                    <p class="text-muted">Make a difference in the local community through our volunteer programs and initiatives.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Upcoming Campus Events</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="event-card card h-100">
                    <img src="./1.png" class="card-img-top" alt="Freshers Welcome">
                    <div class="card-body">
                        <h5 class="card-title">Freshers Welcome</h5>
                        <p class="card-text text-muted">September 1, 2023</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="event-card card h-100">
                    <img src="./1.png" class="card-img-top" alt="Annual Cultural Festival">
                    <div class="card-body">
                        <h5 class="card-title">Annual Cultural Festival</h5>
                        <p class="card-text text-muted">October 15-17, 2023</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="event-card card h-100">
                    <img src="./1.png" class="card-img-top" alt="Tech Innovation Summit">
                    <div class="card-body">
                        <h5 class="card-title">Tech Innovation Summit</h5>
                        <p class="card-text text-muted">November 5, 2023</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="event-card card h-100">
                    <img src="./1.png" class="card-img-top" alt="Spring Sports Tournament">
                    <div class="card-body">
                        <h5 class="card-title">Spring Sports Tournament</h5>
                        <p class="card-text text-muted">March 10-15, 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">What Our Students Say</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card">
                                <div class="card-body text-center p-5">
                                    <p class="lead mb-4">"The vibrant campus life and supportive community have made my university experience unforgettable."</p>
                                    <h5>Sarah Johnson</h5>
                                    <p class="text-muted">Computer Science, 3rd Year</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Campus Life Statistics -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Campus Life by Numbers</h2>
        <div class="row text-center g-4">
            <div class="col-md-3">
                <div class="stats-counter" data-count="50">50+</div>
                <p>Student Clubs</p>
            </div>
            <div class="col-md-3">
                <div class="stats-counter" data-count="100">100+</div>
                <p>Annual Events</p>
            </div>
            <div class="col-md-3">
                <div class="stats-counter" data-count="25">25+</div>
                <p>Sports Teams</p>
            </div>
            <div class="col-md-3">
                <div class="stats-counter" data-count="90">90%</div>
                <p>Student Satisfaction</p>
            </div>
        </div>
    </div>
</section>

<!-- Virtual Campus Tour -->
<section class="virtual-tour py-5 text-center">
    <div class="container">
        <h2 class="mb-4">Take a Virtual Tour</h2>
        <p class="lead mb-4">Explore our campus facilities from anywhere in the world</p>
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#tourModal">
            <i class="fas fa-play-circle me-2"></i>Start Tour
        </button>
    </div>
</section>

<!-- Student Life Gallery -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Life at University</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" alt="Campus Life" class="img-fluid gallery-img rounded">
            </div>
            <div class="col-md-4">
                <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" alt="Student Activities" class="img-fluid gallery-img rounded">
            </div>
            <div class="col-md-4">
                <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" alt="Sports Events" class="img-fluid gallery-img rounded">
            </div>
        </div>
    </div>
</section>

<!-- Student Support Services -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Student Support Services</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-box p-4 bg-white rounded shadow-sm">
                    <h4><i class="fas fa-user-md text-primary me-2"></i>Health Services</h4>
                    <p>24/7 medical support and counseling services for all students.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box p-4 bg-white rounded shadow-sm">
                    <h4><i class="fas fa-briefcase text-primary me-2"></i>Career Center</h4>
                    <p>Career guidance, internship placements, and job search assistance.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box p-4 bg-white rounded shadow-sm">
                    <h4><i class="fas fa-book text-primary me-2"></i>Academic Support</h4>
                    <p>Tutoring, study groups, and academic skills workshops.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News & Updates -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Latest Campus News</h2>
        <div class="row g-4">
            <div class="col-md-8">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="news-card card h-100">
                            <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" class="card-img-top" alt="News">
                            <div class="card-body">
                                <h5 class="card-title">New Student Center Opening</h5>
                                <p class="card-text">State-of-the-art facility opening next month...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news-card card h-100">
                            <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" class="card-img-top" alt="News">
                            <div class="card-body">
                                <h5 class="card-title">International Food Festival</h5>
                                <p class="card-text">Experience cuisines from around the world...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Upcoming Events</h5>
                    </div>
                    <div class="card-body">
                        <div class="calendar-event">
                            <h6>Student Council Elections</h6>
                            <small class="text-muted">March 20, 2024</small>
                        </div>
                        <div class="calendar-event">
                            <h6>Career Fair</h6>
                            <small class="text-muted">April 5, 2024</small>
                        </div>
                        <div class="calendar-event">
                            <h6>Alumni Meetup</h6>
                            <small class="text-muted">April 15, 2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Student Resources -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Quick Access Resources</h2>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="p-4 bg-white rounded shadow-sm">
                    <i class="fas fa-calendar-alt text-primary fs-1 mb-3"></i>
                    <h5>Academic Calendar</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-white rounded shadow-sm">
                    <i class="fas fa-bus text-primary fs-1 mb-3"></i>
                    <h5>Campus Transport</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-white rounded shadow-sm">
                    <i class="fas fa-utensils text-primary fs-1 mb-3"></i>
                    <h5>Dining Services</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-white rounded shadow-sm">
                    <i class="fas fa-hotel text-primary fs-1 mb-3"></i>
                    <h5>Housing Portal</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Virtual Tour Modal -->
<div class="modal fade" id="tourModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Virtual Campus Tour</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" alt="Virtual Tour" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="bg-dark text-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>123 University Avenue, Lilongwe, Malawi</p>
                <p>Phone: +265 1234 5678</p>
                <p>Email: info@university.edu</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Programmes</a></li>
                    <li><a href="#" class="text-light">FAQ</a></li>
                    <li><a href="#" class="text-light">Privacy Policy</a></li>
                    <li><a href="#" class="text-light">Scholarships</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <small>&copy; 2025 University Name. All rights reserved.</small>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>