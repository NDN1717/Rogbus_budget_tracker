<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PennyWise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Custom CSS styles */
        body {
            background-color: #f5f5f5; /* Light Gray background color */
            font-family: 'Arial', sans-serif; /* Change font to Arial */
        }

        .container {
            padding: 20px;
        }

        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
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
            width: 250px;
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

        .graph-container {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    @include('include.header')
<!-- Main Content -->
<div class="container mt-4">
    <div class="row">
        <!-- Card Section -->
        <div class="col-md-12">

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

            <!-- Graph Section -->
            <div class="graph-container">
                <h2>Expense Overview</h2>
                <canvas id="expenseChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script for generating the chart -->
<script>
    // Fetch expense data from the server
    async function fetchExpenseData() {
        try {
            const response = await fetch('/expenses'); // Replace '/expenses' with your actual endpoint
            const data = await response.json();
            return data;
        } catch (error) {
            console.error('Error fetching expense data:', error);
            return [];
        }
    }

    // Function to update the chart with fetched expense data
    async function updateChart() {
        const data = await fetchExpenseData();
        const labels = data.map(entry => entry.month);
        const expenses = data.map(entry => entry.amount);

        const ctx = document.getElementById('expenseChart').getContext('2d');
        const expenseChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Expenses',
                    data: expenses,
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
    }

    // Call the function to update the chart
    updateChart();
</script>
</body>
</html>
