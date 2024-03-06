<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Expenses</title>
    <style>
        /* Custom Styles */
        body {
            background-image: url(''); /* Set the background image */
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* Do not repeat the background image */
            font-family: 'Times New Roman', Times, serif; /* Change font to Times New Roman */
        }
        .expense-card {
            background-color: #fff; /* White background */
            color: #000; /* Black text color */
            border: 1px solid #c4cacf; /* Lighter Grey border */
            border-radius: 10px;
            margin-right: 15px; /* Add margin between cards */
            margin-bottom: 15px;
            padding: 15px;
            transition: transform 0.3s;
            flex: 1; /* Make card flex to fit container */
            max-width: calc(25% - 15px); /* Adjust for 4 cards in a row */
        }
        .expense-card:last-child {
            margin-right: 0; /* Remove margin from the last card */
        }
        .expense-card:hover {
            transform: translateY(-5px);
        }
        .expense-header {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #000; /* Black text color */
        }
        .expense-icon {
            margin-right: 5px;
        }
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            font-size: 0.9rem;
            margin-right: 5px;
        }
        .edit-btn {
            background-color: #6c757d; /* Dark Grey button */
            color: #fff;
            border: none;
        }
        .edit-btn:hover {
            background-color: #495057; /* Darken button on hover */
        }
        .delete-btn {
            background-color: #6c757d; /* Dark Grey button */
            color: #fff;
            border: none;
        }
        .delete-btn:hover {
            background-color: #dc3545; /* Darken button on hover */
        }
        .add-expenses-btn {
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
        }
        .expenses-container {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px; /* Counteract the margin added to expense cards */
            flex-direction: row; /* Initial direction */
        }
        @media (max-width: 992px) {
            .expenses-container {
                flex-direction: column; /* Change direction to column on smaller screens */
            }
        }
        .badge-price {
            color: #000; /* Set the color to black */
        }
        .expense-date {
            font-size: 0.9rem;
            color: #6c757d; /* Dark Grey text color */
            margin-top: 5px;
        }
        /* Added new style for the canvas */
        #expensesChart {
            width: 100%;
            max-width: 800px; /* Adjust max width as needed */
            margin: auto; /* Center the chart */
            margin-top: 50px; /* Add margin on top of the chart */
        }
    </style>
</head>
<body>
@include('include.header')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h4 class="alert alert-success">{{ session('message') }}</h4>
            @endif
            <div class="expenses-container"> <!-- Changed id to class -->
                @foreach ($expenses as $index => $expense)
                    <div class="expense-card">
                        <div class="expense-header">
                            {{ $expense->exp }}
                            <span class="badge badge-price">₱ {{ $expense->price }}</span>
                        </div>
            
                        <div class="expense-actions">
                            <a href="{{ route('expenses.edit', $expense->id) }}" class="edit-btn">
                                <i class="fas fa-edit expense-icon"></i> Edit
                            </a>
                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you Sure?')">
                                    <i class="fas fa-trash expense-icon"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @if (($index + 1) % 5 === 0)
                        <div class="w-100"></div> <!-- Add a new row after every 5th card -->
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<a href="{{ route('expenses.create') }}" class="btn btn-light add-expenses-btn">Add Expenses</a>

<!-- Add Canvas for the graph below the expenses -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <canvas id="expensesChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    
    // Create the Chart.js instance
var expenseLabels = [];
var expensePrices = [];
@foreach ($expenses as $expense)
    expenseLabels.push("{{ $expense->exp }} ({{ $expense->created_at->format('M d, Y') }})"); // Include the date in the label
    expensePrices.push("{{ $expense->price }}");
@endforeach

// Create the Chart.js instance
var ctx = document.getElementById('expensesChart').getContext('2d');
var expensesChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: expenseLabels,
        datasets: [{
            label: '',
            data: expensePrices,
            backgroundColor: 'rgba(54, 162, 235, 0.8)', // Darker blue color with transparency
            borderColor: 'rgba(54, 162, 235, 1)', // Darker blue color
            borderWidth: 2 // Increased border width for better visibility
        }]
    },
    options: {
        scales: {
            x: {
                ticks: {
                    autoSkip: false,
                    maxRotation: 0,
                    minRotation: 0
                }
            },
            y: {
                beginAtZero: true // Start y-axis at 0
            }
        },
        plugins: {
            // Add plugin for background color
            legend: {
                labels: {
                    fontColor: 'black' // Set legend label color
                }
            },
            title: {
                display: true,
                text: 'Expenses Overview',
                fontColor: 'black' // Set title color
            },
            background: {
                color: 'rgba(255, 255, 255, 0.7)' // Smokey white background color
            }
        }
    }
});
</script>



</body>
</html>
