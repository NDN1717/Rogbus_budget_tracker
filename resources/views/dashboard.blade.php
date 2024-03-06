<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PennyWise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Custom CSS styles */
        body {
            background-color: #f5f5f5; /* Light Gray background color */
            font-family: 'Arial', sans-serif; /* Change font to Arial */
        }

        .container {
            padding: 20px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center; /* Center align items vertically */
        }

        .card-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 250px;
        }

        .card {
            color: #212529; /* Text color */
            background-color: #ffffff; /* White background color */
            border: 1px solid #ced4da; /* Add border */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer; /* Add cursor pointer */
            text-decoration: none; /* Remove underline */
            text-align: center; /* Center align text */
            width: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 20px; /* Increase font size */
            margin-bottom: 15px;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .card-description {
            font-size: 16px;
            color: #6c757d; /* Text color */
        }

        .logo-container {
            flex: 1; /* Take remaining space */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%; /* Adjust height to match adjacent content */
        }

        .logo {
            width: 200px; /* Set width of the logo */
            height: auto; /* Maintain aspect ratio */
            max-height: 100px; /* Limit max height for responsiveness */
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    @include('include.header') 

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <!-- Card Section -->
            <div class="card-container">
                <!-- Expenses Card -->
                <a href="{{ url('expenses') }}" class="card">
                    <i class="icon fas fa-money-bill-wave"></i>
                    <h3 class="card-title">Expenses</h3>
                    <p class="card-description">Track your expenses and manage your spending.</p>
                </a>
                <!-- Savings Card -->
                <a href="{{ url('savings') }}" class="card">
                    <i class="icon fas fa-piggy-bank"></i>
                    <h3 class="card-title">Savings</h3>
                    <p class="card-description">Monitor your savings and set financial goals.</p>
                </a>
            </div>


    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
