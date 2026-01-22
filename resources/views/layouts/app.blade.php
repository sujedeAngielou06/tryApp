<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap & Poppins -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; min-height: 100vh; background-color: #f5f6fa; }

        /* Header */
        .header { background: #ffffff; border-bottom: 1px solid #e5e7eb; padding: 1rem 2rem; }

        /* Sidebar */
        .sidebar-left { background-color: #002d71; color: #fff; min-height: calc(100vh - 70px); padding: 2rem 1rem; width: 250px; }
        .sidebar-left h5 { margin-bottom: 1.5rem; font-weight: 600; }
        .nav-btn { width: 100%; margin-bottom: 0.75rem; border-radius: 999px; }

        /* Main content */
        .content { padding: 2rem; }

        /* Footer */
        .footer { background: #ffffff; border-top: 1px solid #e5e7eb; text-align: center; position: fixed; bottom: 0; width: 100%; }
    </style>
</head>
<body>

    <!-- HEADER -->
    @if (View::hasSection('header'))
        
    <div class="header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">@yield('header', 'Dashboard')</h4>
        <div>
            @auth
                <span class="me-3">Hello, {{ auth()->user()->firstname }}</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm rounded-pill">Logout</button>
                </form>
                @else
                    <span class="me-3">Hello, Guest</span>
            @endauth
        </div>
    </div>
@endif

    @auth
        
    
    <!-- BODY -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar-left">
                <a href="{{ url('/dashboard') }}" class="btn btn-light nav-btn">Dashboard</a>
                <a href="{{ url('/profile') }}" class="btn btn-light nav-btn">Profile</a>
                <a href="{{ url('/settings')}}" class="btn btn-light nav-btn">Settings</a>
                <a href="{{ url('/management')}}" class="btn btn-light nav-btn">Management</a>
                <a href="#" class="btn btn-outline-light nav-btn mt-3">Help</a>
            </div>
            @endauth
            <div class="col-md-9 content">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="footer">All Rights Reserved.</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
