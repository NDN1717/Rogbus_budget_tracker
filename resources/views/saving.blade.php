<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Savings</title>
    <style>
        /* Custom Styles */
        body {
            background-color: whitesmoke; /* Background color */
            font-family: 'Roboto', sans-serif; /* Change font to Arial */
        }
        .content-container {
            background-color: rgba(255, 255, 255, 0.8); /* Container background color with opacity */
            padding: 20px;
            border-radius: 10px;
        }
        .saving-card {
            background-color: #fff; /* White card background */
            color: #000; /* Black text color */
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 15px;
            transition: all 0.3s ease;
        }
        .saving-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
        }
        .saving-header {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .saving-date {
            font-size: 0.9rem;
            color: #6c757d; /* Dark Grey text color */
            margin-bottom: 5px;
        }
        .saving-icon {
            margin-right: 5px;
        }
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            font-size: 0.9rem;
            margin-right: 5px;
            background-color: #6c757d; /* Dark Grey button */
            color: #fff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .edit-btn:hover, .delete-btn:hover {
            background-color: #495057; /* Darken button on hover */
        }
        .edit-form {
            display: none;
        }
    </style>
</head>
<body>
@include('include.header')
<div class="container mt-5 content-container text-center"> <!-- Added text-center class here -->
    <div class="row justify-content-center"> <!-- Added justify-content-center class here -->
        <div class="col-md-12">
            @if (session('message'))
                <h4 class="alert alert-success">{{ session('message') }}</h4>
            @endif
            <div id="savingsInputContainer" class="text-center"> <!-- Added text-center class here -->
                <form action="{{ route('savings.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Enter Amount:</label>
                        <input type="number" id="amount" name="amount" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="row justify-content-center mt-4"> <!-- Added margin top and justify-content-center class here -->
                @foreach ($savings as $saving)
                <div class="col-md-4 mb-4"> <!-- Added margin bottom class here -->
                    <div class="card saving-card">
                        <div class="card-body text-center"> <!-- Added text-center class here -->
                            <h5 class="card-title saving-header">₱{{ $saving->amount }}</h5>
                            <p class="card-text saving-date">Date: {{ $saving->date }}</p>
                            
                            <div class="saving-actions">
                                <a href="javascript:void(0)" onclick="showEditForm('{{ $saving->id }}')" class="edit-btn">
                                    <i class="fas fa-edit saving-icon"></i> Edit
                                </a>
                                <form action="{{ route('savings.destroy', $saving->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you Sure?')">
                                        <i class="fas fa-trash saving-icon"></i> Delete
                                    </button>
                                </form>
                            </div>
                            <div id="edit-form-{{ $saving->id }}" class="edit-form">
                                <form action="{{ route('savings.update', $saving->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="edit-amount">Edit Amount:</label>
                                    <input type="number" id="edit-amount-{{ $saving->id }}" name="amount" class="form-control" value="{{ $saving->amount }}" required>
                                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    function showEditForm(id) {
        var editForm = document.getElementById('edit-form-' + id);
        if (editForm.style.display === 'none') {
            editForm.style.display = 'block';
        } else {
            editForm.style.display = 'none';
        }
    }
</script>
</body>
</html>
