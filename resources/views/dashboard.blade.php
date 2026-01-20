<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
        }

        .sidebar {
            background-color: #002d71;
            color: white;
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .sidebar h3 {
            margin-bottom: 2rem;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar a {
            color: white;
            display: block;
            margin-bottom: 1rem;
            text-decoration: none;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <h3>Dashboard</h3>
                <p>Hello, {{ auth()->user()->name }}</p>
                <button type="home" class="btn btn-primary w-100 rounded mb-2">home</button>
                <button type="home" class="btn btn-primary w-100 rounded mb-2">home</button>
                <button type="home" class="btn btn-primary w-100 rounded mb-2">home</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light w-100 btn-sm mt-3">Logout</button>
                </form>
            </div>

            <!-- Main content -->
            <div class="col-md-9 p-4">
                <h2>Welcome to Your Dashboard</h2>
                <p>This is your main content</p>
