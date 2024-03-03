<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PennyWise - About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Additional CSS styles */
        .header {
            background-color: #333; /* Dark gray background color */
            color: #fff; /* White text color */
            padding: 20px; /* Add padding */
            text-align: center; /* Center align text */
        }

        /* Main Content */
        .main-content {
            padding: 20px; /* Add padding */
        }

        .section-title {
            font-size: 24px; /* Increase font size */
            margin-bottom: 20px; /* Add margin */
            text-align: center; /* Center align text */
        }

        .project-item {
            margin-bottom: 40px; /* Add margin bottom */
        }

        .project-info {
            text-align: center; /* Center align text */
        }

        .project-info h1 {
            font-size: 24px; /* Increase font size */
            margin-bottom: 10px; /* Add margin bottom */
        }

        .project-info h2 {
            font-size: 18px; /* Increase font size */
            margin-bottom: 10px; /* Add margin bottom */
        }

        .project-info p {
            font-size: 16px; /* Increase font size */
            line-height: 1.6; /* Adjust line height */
        }

        /* Developer Cards */
        .developer-card {
            background-color: #f8f9fa; /* Light gray background */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .developer-info {
            text-align: center;
        }

        .developer-info h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .developer-info p {
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<!-- Header Section -->
@include('include.header')
<!-- End Header Section -->

<!-- Main Content -->
<div class="main-content">
    <!-- About Section -->
    <section id="about">
        <div class="about container">
            <div class="col-left">
            </div>
            <div class="col-right">
                <h1 class="section-title">About <span>Us</span></h1>
                <h2>Full-stack Developer</h2>
                <p>Greetings! I'm Noel Dominic Neyra, an experienced full-stack developer dedicated to creating innovative digital solutions. My expertise covers both front-end and back-end development, specializing in dynamic and user-centric web applications. Proficient in HTML, CSS, JavaScript, and various frameworks, I bring a blend of creativity and technical skills to each project. Let's connect and explore the limitless potential of technology together!</p>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Developer Cards Section -->
    <section id="developers">
        <div class="container">
            <h1 class="section-title">Our Developers</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="developer-card">
                        <div class="developer-info">
                            <img src="developer1.jpg" alt="Developer 1">
                            <h2>John Doe</h2>
                            <p>Front-end Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="developer-card">
                        <div class="developer-info">
                            <img src="developer2.jpg" alt="Developer 2">
                            <h2>Jane Smith</h2>
                            <p>Back-end Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="developer-card">
                        <div class="developer-info">
                            <img src="developer3.jpg" alt="Developer 3">
                            <h2>David Johnson</h2>
                            <p>UI/UX Designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="developer-card">
                        <div class="developer-info">
                            <img src="developer4.jpg" alt="Developer 4">
                            <h2>Emily Brown</h2>
                            <p>Full-stack Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Developer Cards Section -->
</div>
<!-- End Main Content -->

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
