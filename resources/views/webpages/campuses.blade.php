<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Campuses</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            color: white;
        }
        .campus-card {
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .campus-card:hover {
            transform: translateY(-5px);
        }
        .faculty-card {
            transition: all 0.3s ease;
        }
        .faculty-card:hover {
            transform: translateY(-5px);
        }
        .faculty-section {
            display: none;
        }
        .faculty-section.show {
            display: block;
        }
        .stats-counter {
        font-size: 2.5rem;
        font-weight: bold;
        color: #0d6efd;
    }
    
    .virtual-tour {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/api/placeholder/1920/600');
        background-size: cover;
        background-position: center;
        color: white;
    }
    
    .gallery-img {
        height: 200px;
        object-fit: cover;
        cursor: pointer;
        transition: transform 0.3s;
    }
    
    .gallery-img:hover {
        transform: scale(1.05);
    }
    
    .feature-box {
        border-left: 4px solid #0d6efd;
        padding-left: 1rem;
    }
    
    .news-card {
        transition: transform 0.3s;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
    }

    .calendar-event {
        border-left: 3px solid #0d6efd;
        margin-bottom: 1rem;
        padding-left: 1rem;
    }
    </style>
</head>
<body>

<!-- Hero Section -->
<div class="hero-section mb-5">
    <div class="container text-center">
        <h1 class="display-3 mb-4">Our Campuses</h1>
        <p class="lead">Discover the diverse academic environments and opportunities across our university campuses.</p>
    </div>
</div>

<div class="container py-5">
    <!-- Main Campus Section -->
    <div class="campus-card card mb-5 shadow-sm">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="./1.png" alt="Main Campus" class="img-fluid h-100 w-100 object-fit-cover">
            </div>
            <div class="col-md-6">
                <div class="card-body p-4">
                    <h5 class="text-primary">MAIN CAMPUS</h5>
                    <p class="text-muted">Our flagship campus located in the heart of the city, offering a wide range of programs and state-of-the-art facilities.</p>
                    <button class="btn btn-link text-primary text-decoration-none p-0" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#mainCampusFaculties" 
                            aria-expanded="false">
                        View Faculties and Programs <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Main Campus Faculties (Collapsible) -->
        <div class="collapse" id="mainCampusFaculties">
            <div class="card-body border-top">
                <h4 class="mb-4">Our Faculties</h4>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="faculty-card card h-100 shadow-sm">
                            <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" alt="Faculty of Science and Technology" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Faculty of Science and Technology</h5>
                                <p class="card-text">Offering cutting-edge programs in various scientific and technological fields.</p>
                                <ul class="list-unstyled">
                                    <li>✓ Computer Science</li>
                                    <li>✓ Engineering</li>
                                    <li>✓ Mathematics</li>
                                </ul>
                                <a href="#" class="btn btn-outline-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="faculty-card card h-100 shadow-sm">
                            <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" alt="Faculty of Humanities" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Faculty of Humanities</h5>
                                <p class="card-text">Exploring human culture, history, and creative expression.</p>
                                <ul class="list-unstyled">
                                    <li>✓ Literature</li>
                                    <li>✓ Philosophy</li>
                                    <li>✓ History</li>
                                </ul>
                                <a href="#" class="btn btn-outline-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lakeshore Campus Section -->
    <div class="campus-card card mb-5 shadow-sm">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" alt="Lakeshore Campus" class="img-fluid h-100 w-100 object-fit-cover">
            </div>
            <div class="col-md-6">
                <div class="card-body p-4">
                    <h5 class="text-primary">LAKESHORE CAMPUS</h5>
                    <p class="text-muted">A beautiful campus situated by the lake, specializing in environmental and marine studies.</p>
                    <button class="btn btn-link text-primary text-decoration-none p-0" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#lakeshoreCampusFaculties" 
                            aria-expanded="false">
                        View Faculties and Programs <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Lakeshore Campus Faculties (Collapsible) -->
        <div class="collapse" id="lakeshoreCampusFaculties">
            <div class="card-body border-top">
                <h4 class="mb-4">Our Faculties</h4>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="faculty-card card h-100 shadow-sm">
                            <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" alt="Faculty of Environmental Studies" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Faculty of Environmental Studies</h5>
                                <p class="card-text">Leading research and education in environmental conservation.</p>
                                <ul class="list-unstyled">
                                    <li>✓ Environmental Science</li>
                                    <li>✓ Conservation Biology</li>
                                    <li>✓ Climate Studies</li>
                                </ul>
                                <a href="#" class="btn btn-outline-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="faculty-card card h-100 shadow-sm">
                            <img src="./daf5f1f0-0456-4d2f-aae2-e4b86e5de2f6.jpg" alt="Faculty of Marine Sciences" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Faculty of Marine Sciences</h5>
                                <p class="card-text">Specializing in marine biology and oceanography studies.</p>
                                <ul class="list-unstyled">
                                    <li>✓ Marine Biology</li>
                                    <li>✓ Oceanography</li>
                                    <li>✓ Marine Conservation</li>
                                </ul>
                                <a href="#" class="btn btn-outline-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
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
                    <li><a href="#" class="text-light text-decoration-none">Programmes</a></li>
                    <li><a href="#" class="text-light text-decoration-none">FAQ</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Privacy Policy</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Scholarships</a></li>
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