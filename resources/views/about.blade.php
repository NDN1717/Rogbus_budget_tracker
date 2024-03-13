<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
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
            background-color: #fff; /* White background color */
            padding: 20px;
            border-radius: 20px; /* Rounder border */
            margin-top: 40px; /* Move the developer cards down */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100%; /* Set the height to occupy full height */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
            transition: all 0.3s ease; /* Add transition effect */
        }

        .developer-card:hover {
            transform: translateY(-5px); /* Move the card up on hover */
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Add a stronger shadow on hover */
        }

        .developer-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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

        .developer-info img {
            max-width: 100%; /* Make the image fit the container */
            height: auto; /* Ensure aspect ratio */
            margin-bottom: 10px; /* Add margin */
            border-radius: 50%; /* Make the image round */
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
        <div class="about container text-center"> <!-- Center the About Us section -->
            <div class="col-right">
                <h1 class="section-title">About <span>Us</span></h1>
                <h2></h2>
                <p>Welcome to Pennywise, your go-to budget tracking application! Our journey began as 
                    ambitious college students with a single goal: to successfully complete this project. 
                    Fast forward to today, and here we are, proud creators of Pennywise.</p>
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
                            <img src="ab2.jpg" alt="Developer 1">
                            <h2>Noel Neyra</h2>
                            <p>Back-end Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="developer-card">
                        <div class="developer-info">
                            <img src="ab3.jpg" alt="Developer 2">
                            <h2>Rolito Visoeras Jr.</h2>
                            <p>Full-stack Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="developer-card">
                        <div class="developer-info">
                            <img src="ab4.jpg" alt="Developer 3">
                            <h2>Arvin Lim</h2>
                            <p>Front-end Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="developer-card">
                        <div class="developer-info">
                            <img src="ab1.jpg" alt="Developer 4">
                            <h2>Jerome Ibarra</h2>
                            <p>UI/UX Designer</p>
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
