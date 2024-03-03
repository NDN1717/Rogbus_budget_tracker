<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PennyWise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom CSS styles */
        body {
            background-color: #f8f9fa; /* Light Gray background color */
            font-family: 'Arial', sans-serif; /* Change font to Arial */
        }

        .container {
            padding: 20px;
            position: relative; /* Make container relative */
        }

        .card-container {
            display: flex;
            flex-direction: column;
            gap: 30px;
            align-items: flex-start; /* Align items to the left */
        }

        .card {
            color: #212529; /* Text color */
            border: 1px solid #ced4da; /* Add border */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer; /* Add cursor pointer */
            text-decoration: none; /* Remove underline */
            text-align: center; /* Center align text */
            width: 100%; /* Make cards take up full width */
        }

        /* Define different background colors for each card */
        .savings-card { background-color: #a8d0e6; } /* Light blue */
        .expenses-card { background-color: #ffd966; } /* Light yellow */
        .reminders-card { background-color: #c9c9ff; } /* Light purple */
        .about-us-card { background-color: #c2f0c2; } /* Light green */

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 20px; /* Increase font size */
        }

        .finance-image {
            width: 80px; /* Adjust image size */
            margin-bottom: 10px; /* Add spacing below image */
        }

        /* Overview Section */
        .overview-section {
            background-color: #e9ecef; /* Light Gray background color */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            position: absolute;
            top: 50%; /* Align to the middle */
            right: 20px; /* Adjust right position */
            transform: translateY(-50%); /* Move up by half of its height */
            width: 300px; /* Adjust width */
        }

        /* Developer Section */
        .developer-section {
            margin-top: 20px;
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .developer-card {
            flex: 1;
            max-width: calc(25% - 20px); /* Adjust for 4 cards with gap */
            background-color: #e9ecef; /* Light Gray background color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .developer-card-content {
            text-align: center;
        }
    </style>
</head>
<body>
@include('include.header')
<!-- Main Content -->
<div class="container mt-4">
    <div class="row justify-content-start"> <!-- Align content to the left -->
        <!-- Card Section -->
        <div class="col-md-4">
            <div class="card-container">
                <!-- Savings Card -->
                <a href="{{ url('savings') }}" class="card savings-card">
                    <h5 class="card-title">Savings</h5>
                </a>
                <!-- Expenses Card -->
                <a href="{{ url('expenses') }}" class="card expenses-card">
                    <h5 class="card-title">Expenses</h5>
                </a>
                <!-- Reminders Card -->
                <a href="{{ url('reminders') }}" class="card reminders-card">
                    <h5 class="card-title">Reminders</h5>
                </a>
                <!-- About Us Card -->
                <a href="{{ route('about') }}" class="card about-us-card">
    <h5 class="card-title">About Us</h5>
</a>
            </div>
        </div>

        <!-- Overview Section -->
        <div class="col-md-4">
            <div class="overview-section">
                <h3>Overview</h3>
                <p>Welcome to PennyWise, your ultimate budget tracking solution. Track your expenses, manage your savings, and never miss a payment with our reminders feature.</p>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
