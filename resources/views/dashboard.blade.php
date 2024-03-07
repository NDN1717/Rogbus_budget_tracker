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
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
        }

        .left-section {
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .right-section {
            width: 65%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .section {
            margin-bottom: 20px;
            width: 100%;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }

        .infographic {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 40px; /* Updated margin-top for more space */
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .step-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .step-description {
            font-size: 16px;
            color: #333;
        }

        .cards-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 40px; /* Added margin-bottom for space between cards and infographic */
        }

        .card {
            color: #212529;
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            width: 250px;
            margin-bottom: 20px; /* Added margin to create space between buttons */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .card-description {
            font-size: 16px;
            color: #6c757d;
        }
        
        .section.investing {
            margin-top: 50px; /* Adjusted margin-top to move Investing section down */
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    @include('include.header') 

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="left-section">
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
        <div class="right-section">
            <div class="section">
                <h3 class="section-title">How to Save and Invest</h3>
                <div class="infographic">
                    <div class="step">
                        <i class="step-icon fas fa-coins"></i>
                        <div class="step-description">Save a portion of your income regularly.</div>
                    </div>
                    <div class="step">
                        <i class="step-icon fas fa-chart-line"></i>
                        <div class="step-description">Create a budget and stick to it.</div>
                    </div>
                    <div class="step">
                        <i class="step-icon fas fa-cut"></i>
                        <div class="step-description">Cut unnecessary expenses.</div>
                    </div>
                </div>
            </div>
            <div class="section investing"> <!-- Added investing class -->
                <h3 class="section-title">Investing</h3>
                <div class="infographic">
                    <div class="step">
                        <i class="step-icon fas fa-chart-line"></i>
                        <div class="step-description">Start with a diversified investment portfolio.</div>
                    </div>
                    <div class="step">
                        <i class="step-icon fas fa-search-dollar"></i>
                        <div class="step-description">Research and understand investment options.</div>
                    </div>
                    <div class="step">
                        <i class="step-icon fas fa-chart-pie"></i>
                        <div class="step-description">Monitor and review your investments regularly.</div>
                    </div>
                    <div class="step">
                        <i class="step-icon fas fa-balance-scale"></i>
                        <div class="step-description">Stay informed about market trends.</div>
                    </div>
                    <div class="step">
                        <i class="step-icon fas fa-hand-holding-usd"></i>
                        <div class="step-description">Diversify your investments.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
