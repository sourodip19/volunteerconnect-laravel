<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VolunteerConnect</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">

        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <div>
                <a href="/"
                   class="text-2xl font-bold text-indigo-600">
                    VolunteerConnect
                </a>
            </div>

            <div class="flex items-center gap-6">

                @auth

                 @if(auth()->user()->role === 'volunteer')

    <a href="{{ route('volunteer.dashboard') }}"
       class="text-gray-700 hover:text-indigo-600">

        Dashboard

    </a>

    <a href="{{ route('applications.index') }}"
       class="text-gray-700 hover:text-indigo-600">

        My Applications

    </a>

    <a href="{{ route('applications.certificates') }}"
       class="text-gray-700 hover:text-indigo-600">

        Certificates

    </a>

@endif

                    <form method="POST"
                          action="{{ route('logout') }}">

                        @csrf

                        <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Logout
                        </button>

                    </form>

                @else

                    <a href="{{ route('login') }}"
                       class="text-gray-700 hover:text-indigo-600">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Register
                    </a>

                @endauth

            </div>

        </div>

    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-6">

        {{ $slot }}

    </main>

</body>
</html>