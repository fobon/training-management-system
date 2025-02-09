<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex min-vh-100">
        <!-- Sidebar -->
        <aside class="w-25 bg-white shadow-sm">
            <div class="p-3 text-center border-bottom">
                <h1 class="h5 fw-bold">User CRUD Laravel</h1>
            </div>
            <nav class="mt-3">
                <ul class="list-unstyled">
                    <li class="px-3 py-2 hover-bg-gray">
                        <a href="/dashboard/training-management-system/public/normalhome" class="text-decoration-none text-dark">Home</a>
                    </li>
                    <li class="px-3 py-2 hover-bg-gray">
                        <a href="/dashboard/training-management-system/public/normaldashboard" class="text-decoration-none text-dark">Dashboard</a>
                    </li>
                    <li class="px-3 py-2 hover-bg-gray">
                        {{-- <a href="{{ route('normalmanualbooks.index') }}" class="text-decoration-none text-dark">Manual Book</a> --}}
                        <a href="/dashboard/training-management-system/public/normalmanualbook" class="text-decoration-none text-dark">Manualbook</a>
                    </li>

                    <li class="px-3 py-2 hover-bg-gray">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link text-dark text-decoration-none p-0">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main -->
        <main class="flex-grow-1 p-4">
            <header class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 fw-semibold">@yield('title', 'Dashboard')</h2>

            </header>
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 JS (Optional, if you need Bootstrap JS features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
