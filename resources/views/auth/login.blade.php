<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Dexomed Biologicals Group</title>
    <link rel="icon" href="{{ asset('Img/Logo.jpg') }}" type="image/jpeg">
    <link rel="shortcut icon" href="{{ asset('Img/Logo.jpg') }}" type="image/jpeg">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dexomed: {
                            50: '#7a7a7aff',
                            100: '#1b1b1bff',
                            500: '#e8a00f',
                            600: '#e8a00f',
                            700: '#e8a00f',
                            800: '#2a2a2a',
                            900: '#1a1a1a',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.7s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --brand: #e8a00f;
            --brand-dark: #3b3b3b;
            --accent: #f6911e;
        }

        html, body {
            font-family: "Instrument Sans", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            scroll-behavior: smooth;
        }

        .login-container {
            background-image: url('Img/The-Role-of-High-Quality-Medical.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            min-height: 100vh;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(59, 59, 59, 0.34) 0%, rgba(59, 59, 59, 0.7) 100%);
        }

        .login-form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            
        }

        .dark .login-form-container {
            background: rgba(42, 42, 42, 0.95);
        }

        .input-field {
            transition: all 0.3s ease;
            border: 1px solid #d1d5db;
        }

        .input-field:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 3px rgba(232, 160, 15, 0.2);
        }

        .dark .input-field {
            background-color: #374151;
            border-color: #4b5563;
            color: #f9fafb;
        }

        .dark .input-field:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 3px rgba(232, 160, 15, 0.3);
        }

        .btn-primary {
            background-color: var(--brand);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #d18f0d;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(232, 160, 15, 0.3);
        }

        .fixed-theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 8px 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .dark .fixed-theme-toggle {
            background: rgba(42, 42, 42, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .fixed-theme-toggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        }
        .fixed-theme-toggle-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #4a5568;
            transition: color 0.3s ease;
        }
        .dark .fixed-theme-toggle-label {
            color: #e2e8f0;
        }
        .fixed-theme-toggle-switch {
            position: relative;
            width: 50px;
            height: 26px;
            background: #e2e8f0;
            border-radius: 13px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #cbd5e0;
        }
        .dark .fixed-theme-toggle-switch {
            background: #4a5568;
            border-color: #2d3748;
        }
        .fixed-theme-toggle-switch::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 16px;
            height: 16px;
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dark .fixed-theme-toggle-switch::before {
            left: calc(100% - 19px);
            background: #f7fafc;
        }
        .fixed-theme-toggle-icon {
            position: absolute;
            font-size: 8px;
            transition: all 0.3s ease;
            top: 50%;
            transform: translateY(-50%);
        }
        .fixed-theme-toggle-icon.sun {
            left: 8px;
            color: #f6ad55;
        }
        .fixed-theme-toggle-icon.moon {
            right: 8px;
            color: #4a5568;
        }
        .dark .fixed-theme-toggle-icon.sun {
            opacity: 0;
        }
        .dark .fixed-theme-toggle-icon.moon {
            opacity: 1;
            color: #f7fafc;
        }

        @media (max-width: 768px) {
            .fixed-theme-toggle {
                bottom: 20px;
                right: 20px;
                padding: 6px 12px;
            }
            .fixed-theme-toggle-label {
                font-size: 0.7rem;
            }
        }
    </style>
</head>

<body class="antialiased bg-gray-100 text-gray-800 dark:bg-dexomed-900 dark:text-gray-100 transition-colors duration-300">
    <!-- Full background image container -->
    <div class="login-container flex items-center justify-center min-h-screen p-8">
        <!-- Login form centered on the background -->
        <div class="w-full max-w-md login-form-container rounded-2xl shadow-2xl p-8 slide-up relative z-10">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <div class="flex-shrink-0 relative">
                        <img src="{{ asset('Img/Logo-removebg-preview.png') }}" 
                             alt="Dexomed Biologicals Group" 
                             class="h-20 w-auto transition-all duration-300 group-hover:scale-105 rounded-md">
                    </div>
                </a>
            </div>

            <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-2">Welcome</h2>
            <p class="text-center text-gray-600 dark:text-gray-400 mb-8">Sign in to your account</p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 p-4 rounded-md bg-green-50 dark:bg-green-900/20 text-green-800 dark:text-green-300 border border-green-200 dark:border-green-800">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Email Address
                    </label>
                    <input id="email" 
                           class="input-field block w-full px-4 py-3 rounded-lg focus:outline-none" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username"
                           placeholder="Enter your email">
                    @if ($errors->has('email'))
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Password
                    </label>
                    <input id="password" 
                           class="input-field block w-full px-4 py-3 rounded-lg focus:outline-none"
                           type="password"
                           name="password"
                           required 
                           autocomplete="current-password"
                           placeholder="Enter your password">
                    @if ($errors->has('password'))
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               class="rounded border-gray-300 dark:border-gray-700 text-dexomed-500 shadow-sm focus:ring-dexomed-500 dark:focus:ring-dexomed-600 dark:bg-gray-800" 
                               name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-dexomed-500 hover:text-dexomed-600 dark:text-dexomed-400 dark:hover:text-dexomed-300 transition-colors" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn-primary w-full py-3 px-4 rounded-lg text-white font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dexomed-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log in') }}
                </button>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="font-medium text-dexomed-500 hover:text-dexomed-600 dark:text-dexomed-400 dark:hover:text-dexomed-300 transition-colors">
                            {{ __('Register') }}
                        </a>
                    </p>
                </div>
            </form>

            <!-- Back to Home -->
            <div class="mt-8 text-center">
                <a href="{{ url('/') }}" class="inline-flex items-center text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Home
                </a>
            </div>
        </div>
    </div>

    <!-- Fixed Dark/Light Mode Toggle -->
    <div id="fixedThemeToggle" class="fixed-theme-toggle">
        <span class="fixed-theme-toggle-label">Theme</span>
        <div class="fixed-theme-toggle-switch">
            <i class="fas fa-sun fixed-theme-toggle-icon sun"></i>
            <i class="fas fa-moon fixed-theme-toggle-icon moon"></i>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Dark/Light Mode Toggle
        const fixedThemeToggle = document.getElementById('fixedThemeToggle');
        const htmlElement = document.documentElement;

        // Function to toggle theme
        function toggleTheme() {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        // Initialize theme from localStorage or system preference
        function initTheme() {
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
                htmlElement.classList.add('dark');
            } else {
                htmlElement.classList.remove('dark');
            }
        }

        // Add event listener to fixed theme toggle
        if (fixedThemeToggle) {
            fixedThemeToggle.addEventListener('click', toggleTheme);
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            initTheme();
        });
    </script>
</body>
</html>