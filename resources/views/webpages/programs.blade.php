<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Programs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('./1.png');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            color: white;
            text-align: center;
        }

        .faculty-card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 20px;
            cursor: pointer;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .faculty-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .faculty-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.8));
            color: white;
            padding: 20px;
        }

        .program-card {
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .program-card:hover {
            transform: translateY(-5px);
        }

        .faculty-content {
            background: white;
            padding: 20px;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        .collapse:not(.show) {
            display: block;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: all 0.35s ease;
            padding: 0;
        }

        .collapse.show {
            max-height: 2000px;
            opacity: 1;
            transition: all 0.35s ease;
        }

        .faculty-card .fa-chevron-down {
            transition: transform 0.35s ease;
        }

        .faculty-card [aria-expanded="true"] .fa-chevron-down {
            transform: rotate(180deg);
        }

        .footer {
            background-color: #1a2332;
            color: white;
            padding: 50px 0;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-nav .nav-link {
            color: #333;
            font-weight: 500;
            padding: 1rem 1.5rem;
        }

        .btn-outline-primary {
            border-width: 2px;
            font-weight: 500;
            padding: 8px 20px;
        }

        .btn-outline-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0,123,255,0.2);
        }

        .faculty-header {
            position: relative;
            cursor: pointer;
        }

        .card-title {
            color: #2c3e50;
            font-weight: 600;
        }

        .card-text {
            color: #666;
        }
        .faculty-card {
            max-width: 1200px;
            margin: 0 auto;
    transition: all 0.3s ease;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.faculty-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.2);
}

.faculty-header {
    position: relative;
    border-radius: 12px 12px 0 0;
    overflow: hidden;
    position: relative;
    height: 300px;
    overflow: hidden;
}

.faculty-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.faculty-overlay {
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.8));
    padding: 2rem;
}

.program-card {
    height: 100%;
    min-height: 450px;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.program-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
.programs .row {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    gap: 1rem;
    padding: 1rem;
}

.programs .col-md-4 {
    min-width: 350px;
    flex: 0 0 auto;
}



    </style>
</head>
<body>
    
    

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-3 mb-4">Our Programmes</h1>
            <p class="lead mb-4">Discover a world of opportunities with our diverse range of academic programmes. Choose your path to excellence and innovation.</p>
        </div>
    </section>

    <!-- Programs Section -->
    <div class="container my-5">
        <!-- Faculty of Science and Technology -->
        <div class="faculty-card mb-5">
            <div class="faculty-header" data-bs-toggle="collapse" data-bs-target="#business" aria-expanded="false">
                <img src="{{ asset('1.png') }}" alt="Business" class="faculty-image">
                <div class="faculty-overlay text-white">
                    <h2 class="d-flex align-items-center justify-content-between mb-3">
                        <span>
                            <i class="fas fa-briefcase me-2"></i>
                            Faculty of Business and Economics
                        </span>
                        <i class="fas fa-chevron-down"></i>
                    </h2>
                    <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Main Campus, Block B</p>
                </div>
            </div>
            
            <div class="collapse" id="business">
                <div class="faculty-content p-4">
                    <!-- Faculty Overview -->
                    <div class="overview mb-4">
                        <h3 class="h4 mb-3">Faculty Overview</h3>
                        <p>Our Business and Economics programs prepare future leaders with strong analytical and practical skills needed in today's global business environment.</p>
                    </div>
        
                    <!-- Programs -->
                    <div class="programs">
                        <h3 class="h4 mb-3">Available Programs</h3>
                        <div class="row g-4">
                            <!-- Business Administration -->
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <!-- <span class="program-status status-open">Applications Open</span> -->
                                    <div class="card-body">
                                        <h5 class="card-title">Business Administration</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 100 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,000/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>English Proficiency</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <!-- <span class="program-status status-open">Applications Open</span> -->
                                    <div class="card-body">
                                        <h5 class="card-title">Business Administration</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 100 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,000/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>English Proficiency</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <!-- <span class="program-status status-open">Applications Open</span> -->
                                    <div class="card-body">
                                        <h5 class="card-title">Business Administration</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 100 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,000/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>English Proficiency</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more program cards similarly -->
                        </div>
                    </div>
                    
        
                    <!-- Contact Information -->
                    <div class="faculty-contact mt-4 p-3 bg-light rounded">
                        <h4 class="h5 mb-3">Contact Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p><i class="fas fa-envelope me-2"></i>business.faculty@university.edu</p>
                                <p><i class="fas fa-phone me-2"></i>+1 (234) 567-8900</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="fas fa-clock me-2"></i>Office Hours: 8:00 AM - 4:30 PM</p>
                                <p><i class="fas fa-calendar-alt me-2"></i>Student Consultation: By Appointment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- Faculty of Science and Technology -->
        <div class="faculty-card mb-5">
            <div class="faculty-header" data-bs-toggle="collapse" data-bs-target="#business" aria-expanded="false">
                <img src="{{ asset('2.jpg') }}" alt="Business" class="faculty-image">
                <div class="faculty-overlay text-white">
                    <h2 class="d-flex align-items-center justify-content-between mb-3">
                        <span>
                            <i class="fas fa-briefcase me-2"></i>
                            Faculty of Engineering and  Sciences
                        </span>
                        <i class="fas fa-chevron-down"></i>
                    </h2>
                    <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Main Campus, Block B</p>
                </div>
            </div>
            
            <div class="collapse" id="business">
                <div class="faculty-content p-4">
                    <!-- Faculty Overview -->
                    <div class="overview mb-4">
                        <h3 class="h4 mb-3">Faculty Overview</h3>
                        <p>Our Business and Economics programs prepare future leaders with strong analytical and practical skills needed in today's global business environment.</p>
                    </div>
        
                    <!-- Programs -->
                    <div class="programs">
                        <h3 class="h4 mb-3">Available Programs</h3>
                        <div class="row g-4">
                            <!-- Business Administration -->
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Computer Engineering</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 80 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $9,500/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.2</li>
                                                <li>Strong Math Background</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Civil Engineering</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 70 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $9,000/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>Physics & Math Credits</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Computer Science</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 120 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,500/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>Programming Knowledge</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Biology</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 90 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,200/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>Biology & Chemistry Credits</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <!-- <span class="program-status status-open">Applications Open</span> -->
                                    <div class="card-body">
                                        <h5 class="card-title">Business Administration</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 100 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,000/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>English Proficiency</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <!-- <span class="program-status status-open">Applications Open</span> -->
                                    <div class="card-body">
                                        <h5 class="card-title">Business Administration</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 100 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,000/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>English Proficiency</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more program cards similarly -->
                        </div>
                    </div>
                    
        
                    <!-- Contact Information -->
                    <div class="faculty-contact mt-4 p-3 bg-light rounded">
                        <h4 class="h5 mb-3">Contact Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p><i class="fas fa-envelope me-2"></i>business.faculty@university.edu</p>
                                <p><i class="fas fa-phone me-2"></i>+1 (234) 567-8900</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="fas fa-clock me-2"></i>Office Hours: 8:00 AM - 4:30 PM</p>
                                <p><i class="fas fa-calendar-alt me-2"></i>Student Consultation: By Appointment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <!-- Faculty of Science and Technology -->
        <div class="faculty-card mb-5">
            <div class="faculty-header" data-bs-toggle="collapse" data-bs-target="#business" aria-expanded="false">
                <img src="{{ asset('1.png') }}" alt="Business" class="faculty-image">
                <div class="faculty-overlay text-white">
                    <h2 class="d-flex align-items-center justify-content-between mb-3">
                        <span>
                            <i class="fas fa-briefcase me-2"></i>
                            Faculty of Business and Economics
                        </span>
                        <i class="fas fa-chevron-down"></i>
                    </h2>
                    <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Main Campus, Block B</p>
                </div>
            </div>
            
            <div class="collapse" id="business">
                <div class="faculty-content p-4">
                    <!-- Faculty Overview -->
                    <div class="overview mb-4">
                        <h3 class="h4 mb-3">Faculty Overview</h3>
                        <p>Our Business and Economics programs prepare future leaders with strong analytical and practical skills needed in today's global business environment.</p>
                    </div>
        
                    <!-- Programs -->
                    <div class="programs">
                        <h3 class="h4 mb-3">Available Programs</h3>
                        <div class="row g-4">
                            <!-- Business Administration -->
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <!-- <span class="program-status status-open">Applications Open</span> -->
                                    <div class="card-body">
                                        <h5 class="card-title">Business Administration</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 100 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,000/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>English Proficiency</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <!-- <span class="program-status status-open">Applications Open</span> -->
                                    <div class="card-body">
                                        <h5 class="card-title">Business Administration</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 100 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,000/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>English Proficiency</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 program-card">
                                    <!-- <span class="program-status status-open">Applications Open</span> -->
                                    <div class="card-body">
                                        <h5 class="card-title">Business Administration</h5>
                                        <div class="program-details mb-3">
                                            <p class="card-text mb-2">
                                                <i class="far fa-clock me-2"></i>4 years
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-users me-2"></i>Intake: 100 students
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-dollar-sign me-2"></i>Tuition: $8,000/year
                                            </p>
                                            <p class="card-text mb-2">
                                                <i class="fas fa-calendar me-2"></i>Next Intake: Sept 2024
                                            </p>
                                        </div>
                                        <div class="program-requirements mb-3">
                                            <h6 class="fw-bold">Requirements</h6>
                                            <ul class="small">
                                                <li>High School Diploma</li>
                                                <li>Minimum GPA: 3.0</li>
                                                <li>English Proficiency</li>
                                            </ul>
                                        </div>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary">Apply Now</a>
                                            <a href="#" class="btn btn-outline-primary mt-2">Program Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more program cards similarly -->
                        </div>
                    </div>
                    
        
                    <!-- Contact Information -->
                    <div class="faculty-contact mt-4 p-3 bg-light rounded">
                        <h4 class="h5 mb-3">Contact Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p><i class="fas fa-envelope me-2"></i>business.faculty@university.edu</p>
                                <p><i class="fas fa-phone me-2"></i>+1 (234) 567-8900</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="fas fa-clock me-2"></i>Office Hours: 8:00 AM - 4:30 PM</p>
                                <p><i class="fas fa-calendar-alt me-2"></i>Student Consultation: By Appointment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    


    <!-- Footer -->
    <footer class="footer mt-5">
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
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>&copy; 2025 University Name. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>