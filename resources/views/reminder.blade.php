<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Reminders</title>
    <style>
        /* Custom Styles */
        body {
            background-color: whitesmoke; /* Smokey white background */
            color: #333; /* Dark text color */
        }
        .content-container {
            padding: 20px;
            border-radius: 10px;
        }
        .reminder-card {
            background-color: #fff; /* White card background color */
            color: #333; /* Dark text color */
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .reminder-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .reminder-header {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333; /* Dark text color */
        }
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            font-size: 0.9rem;
            margin-right: 5px;
            background-color: #007bff; /* Blue button */
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .edit-btn:hover, .delete-btn:hover {
            background-color: #0056b3; /* Darken button on hover */
        }
        .edit-form {
            display: none;
        }
    </style>
</head>
<body>
@include('include.header')
<div class="container mt-5 content-container">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h4 class="alert alert-success">{{ session('message') }}</h4>
            @endif
            <div class="row">
                @foreach ($reminders as $reminder)
                    <div class="col-md-4">
                        <div class="card reminder-card">
                            <div class="card-body">
                                <h5 class="card-title reminder-header">{{ $reminder->title }}</h5>
                                <p class="card-text">{{ $reminder->description }}</p>
                                <div class="reminder-actions">
                                    <a href="javascript:void(0)" onclick="showEditForm('{{ $reminder->id }}')" class="edit-btn">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('reminders.destroy', $reminder->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn" onclick="return confirm('Are you Sure?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                                <div id="edit-form-{{ $reminder->id }}" class="edit-form">
                                    <form action="{{ route('reminders.update', $reminder->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="edit-title">Edit Title:</label>
                                        <input type="text" id="edit-title" name="title" class="form-control" value="{{ $reminder->title }}" required>
                                        <label for="edit-description">Edit Description:</label>
                                        <textarea id="edit-description" name="description" class="form-control" required>{{ $reminder->description }}</textarea>
                                        <button type="submit" class="btn btn-primary mt-2 submit-btn">Save</button>
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
