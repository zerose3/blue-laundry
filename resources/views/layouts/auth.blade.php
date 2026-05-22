<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication') - Blue Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary: { 50: '#eff6ff', 100: '#dbeafe', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8' }
                    }
                }
            }
        }
    </script>
    <style>
        .glass { background: rgba(255,255,255,0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.3); }
        .dark .glass { background: rgba(30,41,59,0.7); border: 1px solid rgba(255,255,255,0.1); }
        .gradient-bg { background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 50%, #bfdbfe 100%); }
        .dark .gradient-bg { background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); }
    </style>
</head>
<body class="font-sans antialiased text-slate-800 dark:text-slate-200 gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary-400/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-400/20 rounded-full blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-md">
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center shadow-xl mb-4">
                <i class="fas fa-water text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Blue Laundry</h1>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Laundry Modern & Profesional</p>
        </div>

        <div class="glass rounded-3xl shadow-2xl p-8">
            @if(session('status'))
                <div class="mb-4 p-4 rounded-xl bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-4 rounded-xl bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>

        <p class="text-center text-sm text-slate-500 dark:text-slate-400 mt-6">
            &copy; {{ date('Y') }} Blue Laundry. All rights reserved.
        </p>
    </div>

    <button onclick="toggleDarkMode()" class="fixed top-4 right-4 p-3 rounded-full glass shadow-lg hover:scale-110 transition-transform">
        <i class="fas fa-moon dark:hidden text-slate-700"></i>
        <i class="fas fa-sun hidden dark:block text-yellow-400"></i>
    </button>

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
        }
    </script>
</body>
</html>
