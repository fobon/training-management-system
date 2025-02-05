<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="flex min-h-screen">

            {{-- Sidebar --}}
            <aside class="w-64 bg-white shadow-md">
                <div class="p-4 text-center border-b">
                    <h1 class="textxl font-bold">CRUD Laravel</h1>
                </div>

                <nav class="mt-4">
                    <ul>
                        <li class="px-4 py-2 hover:bg-gray-200">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>

                        <li class="px-4 py-2 hover:bg-gray-200">
                            <a href="{{ route('users.index') }}">Users</a>
                        </li>

                        {{-- <li class="px-4 py-2 hover:bg-gray-200">
                            <a href="{{ route('companies.index') }}">Companies</a>
                        </li>

                        <li class="px-4 py-2 hover:bg-gray-200">
                            <a href="{{ route('banners.index') }}">Banners</a>
                        </li>

                        <li class="px-4 py-2 hover:bg-gray-200">
                            <a href="{{ route('manualbook.index') }}">Manual Book</a>
                        </li> --}}

                    </ul>
                </nav>
            </aside>

            {{-- Main --}}
            <main class="flex-1 p-6">
                <header class="flex justify-between items-center mb-6">
                    <h2 class="text-2x1 font-semibold"> @yield('title', 'Dashboard')</h2>
                    {{-- <form action=" {{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                            Logout
                        </button>
                    </form> --}}

                </header>
                @yield('content')

            </main>
        </div>
    </body>

</html>
