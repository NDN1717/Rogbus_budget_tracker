<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PennyWise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
        }

        .line-chart-container {
            margin-top: 40px;
            width: 100%;
            max-width: 600px;
        }

        .about-us-card {
            width: 250px;
            background-color: #ffffff; /* Changed background color to black */
            color: #000000; /* Changed text color to white */
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            margin-bottom: 20px;
        }

        .about-us-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .about-us-icon {
            font-size: 40px;
            margin-bottom: 15px;
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
            <!-- About Us Card -->
            <a href="{{ url('/about') }}" class="about-us-card">
                <i class="about-us-icon fas fa-info-circle"></i>
                <h3 class="card-title">About Us</h3>
                <p class="card-description">Learn more about PennyWise and our team.</p>
            </a>
        </div>
        <div class="right-section">
            <div class="chart-container">
                <canvas id="investmentChart"></canvas>
            </div>
            <div class="line-chart-container">
                <h3 class="section-title"></h3>
                <canvas id="savingInvestmentChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Chart.js data for the first chart
        var ctx = document.getElementById('investmentChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Start', 'Research', 'Monitor', 'Stay Informed', 'Diversify'],
                datasets: [{
                    label: 'Investing Steps',
                    data: [10, 20, 30, 40, 50],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart.js data for the second chart (line chart)
        var ctx2 = document.getElementById('savingInvestmentChart').getContext('2d');
        var myLineChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Start', 'Research', 'Monitor', 'Stay Informed', 'Diversify'],
                datasets: [{
                    label: 'Saving and Investment Steps',
                    data: [10, 20, 30, 40, 50],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
