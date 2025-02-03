<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Research Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-section {
            background: linear-gradient(rgba(108, 117, 125, 0.9), rgba(108, 117, 125, 0.9));
            padding: 150px 0;
            color: white;
            animation: fadeIn 1s ease-out;
        }
        
        .nav-link {
            color: white;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: #ffc107;
        }
        
        .project-card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 30px;
            animation: fadeIn 1s ease-out;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .category-badge {
            font-size: 14px;
            padding: 8px 15px;
            margin-bottom: 15px;
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .category-badge:hover {
            transform: scale(1.05);
        }
        
        .footer {
            background-color: #1f2937;
            color: white;
            padding: 70px 0;
        }

        .collapse-content {
            transition: all 0.3s ease-out;
        }

        .btn-toggle {
            color: #0d6efd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .btn-toggle:hover {
            color: #0a58ca;
        }

        .project-details {
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            max-height: 0;
        }

        .project-details.show {
            max-height: 1000px;
        }

        .social-links a {
            transition: transform 0.3s ease;
            display: inline-block;
        }

        .social-links a:hover {
            transform: scale(1.2);
        }

        .featured-projects-carousel {
            padding: 50px 0;
        }

        .research-areas-section {
            padding: 50px 0;
            background-color: #f8f9fa;
        }

        .testimonials-section {
            padding: 50px 0;
        }

        .testimonial-card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="University Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Programmes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Campuses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Student Life</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Research</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Account</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-3 mb-4">Student Research Projects</h1>
            <p class="lead fs-4">Discover innovative research conducted by our talented students across various disciplines.</p>
        </div>
    </section>

    <!-- Featured Projects Carousel -->
    <section class="featured-projects-carousel">
        <div class="container">
            <h2 class="text-center mb-5">Featured Projects</h2>
            <div id="featuredProjectsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="project-card bg-white">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="placeholder.jpg" alt="Student Photo" class="img-fluid rounded">
                                        </div>
                                        <div class="col-md-8">
                                            <span class="category-badge bg-primary text-white">COMPUTER SCIENCE</span>
                                            <h3>AI-Powered Early Detection of Plant Diseases</h3>
                                            <p class="text-muted">Emily Chen - 4th Year</p>
                                            <p>This research project focuses on developing an artificial intelligence system that can detect plant diseases in their early stages. By analyzing images...</p>
                                            <button class="btn btn-primary" onclick="toggleContent(this, 'project1-details')">Read More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="project-card bg-white">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="placeholder.jpg" alt="Student Photo" class="img-fluid rounded">
                                        </div>
                                        <div class="col-md-8">
                                            <span class="category-badge bg-success text-white">ENVIRONMENTAL ENGINEERING</span>
                                            <h3>Sustainable Urban Water Management Using IoT</h3>
                                            <p class="text-muted">Michael Okonkwo - 3rd Year</p>
                                            <p>This project explores the use of Internet of Things (IoT) technology to create a smart water management system for urban areas...</p>
                                            <button class="btn btn-primary" onclick="toggleContent(this, 'project2-details')">Read More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#featuredProjectsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#featuredProjectsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Research Areas Section -->
    <section class="research-areas-section">
        <div class="container">
            <h2 class="text-center mb-5">Research Areas</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <h3>Computer Science</h3>
                    <p>Explore cutting-edge research in AI, machine learning, and software engineering.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h3>Environmental Engineering</h3>
                    <p>Discover sustainable solutions for urban development and environmental conservation.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h3>Psychology</h3>
                    <p>Investigate the impact of social media on mental health and other psychological studies.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="text-center mb-5">What Our Students Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p>"The research opportunities here have been transformative for my academic journey."</p>
                        <p class="text-muted">- Emily Chen</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p>"I've gained invaluable experience and skills through my research projects."</p>
                        <p class="text-muted">- Michael Okonkwo</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p>"The support from faculty and peers has been incredible."</p>
                        <p class="text-muted">- Sophia Rodriguez</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="py-5">
        <div class="container">
            <!-- Project 1 -->
            <div class="project-card bg-white">
                <div class="row">
                    <div class="col-md-3">
                        <img src="placeholder.jpg" alt="Student Photo" class="img-fluid rounded">
                    </div>
                    <div class="col-md-9">
                        <span class="category-badge bg-primary text-white">COMPUTER SCIENCE</span>
                        <h3>AI-Powered Early Detection of Plant Diseases</h3>
                        <p class="text-muted">Emily Chen - 4th Year</p>
                        <p>This research project focuses on developing an artificial intelligence system that can detect plant diseases in their early stages. By analyzing images...</p>
                        <button class="btn btn-primary" onclick="toggleContent(this, 'project1-details')">Read More</button>
                        
                        <div id="project1-details" class="project-details mt-3">
                            <h5>Full Description</h5>
                            <p>This research project focuses on developing an artificial intelligence system that can detect plant diseases in their early stages. By analyzing images of plant leaves, the AI can identify various diseases with high accuracy, potentially revolutionizing crop management and food security.</p>
                            
                            <h5>Achievements</h5>
                            <p>The system achieved a 95% accuracy rate in identifying 10 common plant diseases across 5 different crop types. The research was presented at the International Conference on Agricultural Technology and has been submitted for publication in a peer-reviewed journal.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="project-card bg-white">
                <div class="row">
                    <div class="col-md-3">
                        <img src="placeholder.jpg" alt="Student Photo" class="img-fluid rounded">
                    </div>
                    <div class="col-md-9">
                        <span class="category-badge bg-success text-white">ENVIRONMENTAL ENGINEERING</span>
                        <h3>Sustainable Urban Water Management Using IoT</h3>
                        <p class="text-muted">Michael Okonkwo - 3rd Year</p>
                        <p>This project explores the use of Internet of Things (IoT) technology to create a smart water management system for urban areas...</p>
                        <button class="btn btn-primary" onclick="toggleContent(this, 'project2-details')">Read More</button>
                        
                        <div id="project2-details" class="project-details mt-3">
                            <h5>Full Description</h5>
                            <p>This comprehensive study explores innovative IoT solutions for urban water management, incorporating smart sensors and real-time monitoring systems.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="project-card bg-white">
                <div class="row">
                    <div class="col-md-3">
                        <img src="placeholder.jpg" alt="Student Photo" class="img-fluid rounded">
                    </div>
                    <div class="col-md-9">
                        <span class="category-badge bg-danger text-white">PSYCHOLOGY</span>
                        <h3>The Impact of Social Media on Mental Health in Adolescents</h3>
                        <p class="text-muted">Sophia Rodriguez - Graduate Student</p>
                        <p>This research study investigates the relationship between social media use and mental health outcomes in adolescents...</p>
                        <button class="btn btn-primary" onclick="toggleContent(this, 'project3-details')">Read More</button>
                        
                        <div id="project3-details" class="project-details mt-3">
                            <h5>Full Description</h5>
                            <p>An in-depth analysis of social media's impact on adolescent mental health, utilizing both quantitative and qualitative research methods.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
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
                        <li><a href="#" class="text-white">Programmes</a></li>
                        <li><a href="#" class="text-white">FAQ</a></li>
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-white">Scholarships</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>© 2025 University Name. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleContent(button, contentId) {
            const content = document.getElementById(contentId);
            content.classList.toggle('show');
            
            if (content.classList.contains('show')) {
                button.textContent = 'Show Less';
            } else {
                button.textContent = 'Read More';
            }
        }

        // Add animation to project cards on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.project-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            });

            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                observer.observe(card);
            });
        });
    </script>
</body>
</html>