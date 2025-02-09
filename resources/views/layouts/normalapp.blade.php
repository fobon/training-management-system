<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">

</head>
<body>
    <div class="d-flex min-vh-100">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar forced-sidebar shadow-sm">
            <div class="p-3 text-center border-bottom">
                <h1 class="h5 fw-bold text-white">User CRUD UI</h1>
            </div>
            <nav class="mt-3">
                <ul class="list-unstyled">
                    <li><a href="{{ url('/normalhome') }}" class="sidebar-link text-white">Home</a></li>
                    <li><a href="{{ url('/normaldashboard') }}" class="sidebar-link text-white" >Dashboard</a></li>
                    <li><a href="{{ route('normalmanualbook') }}" class="sidebar-link text-white">Manual Book</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="sidebar-link btn btn-link text-white">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 fw-semibold">@yield('title')</h2>
            </header>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>



