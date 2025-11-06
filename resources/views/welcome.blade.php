<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dexomed Biologicals Group - Medical Equipment Services & Solutions</title>

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
                        'pulse-slow': 'pulse 3s infinite',
                        'slide-in-up': 'slideInUp 0.3s ease-out',
                        'glow': 'glow 1.5s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideInUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 5px rgba(232, 160, 15, 0.5)' },
                            '100%': { boxShadow: '0 0 15px rgba(232, 160, 15, 0.8)' },
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

        html,
        body {
            font-family: "Instrument Sans", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            scroll-behavior: smooth;
            background-color: #f8f8f8;
        }

        .page-container {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Navigation */
        .nav-link {
            position: relative;
            padding: 6px 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            height: 2px;
            width: 0%;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -3px;
            background: var(--brand);
            transition: width .3s ease;
            border-radius: 2px;
        }

        .nav-link:hover::after {
            width: 80%;
            left: 10%;
            transform: none;
        }

        .nav-link.active {
            color: var(--brand);
        }

        .nav-link.active::after {
            width: 80%;
            left: 10%;
            transform: none;
        }

        /* Hero Carousel */
        .carousel-container {
            position: relative;
            height: 800px;
            overflow: hidden;
            border-radius: 0px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        .carousel-slide.active {
            opacity: 1;
        }

        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(59, 59, 59, 0.28) 0%, rgba(59, 59, 59, 0.15) 50%, rgba(59, 59, 59, 0.5) 100%);
            display: flex;
            align-items: center;
            padding: 0 5%;
        }

        .carousel-content {
            max-width: 600px;
            color: white;
            animation: slideUp 1s ease-out;
        }

        .carousel-indicators {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
        }

        .carousel-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .carousel-indicator.active {
            background: white;
            transform: scale(1.2);
        }

        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .carousel-nav:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .carousel-prev {
            left: 20px;
        }

        .carousel-next {
            right: 20px;
        }

        .service-card {
            background-color: rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-top: 4px solid transparent;
        }

        .service-card:hover {
            transform: translateY(-10px);
            border-top-color: var(--brand);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .value-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--brand);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .value-card:hover::before {
            transform: scaleX(1);
        }

        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .team-card {
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .team-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .team-card:hover .team-avatar {
            border-color: var(--brand);
        }

        .partner-logo {
            max-height: 80px;

            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
        }

        /* Stats Counter */
        .stat-item {
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        .slide-up {
            animation: slideUp 0.8s ease-out;
        }

        /* Fixed Dark/Light Mode Toggle */
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
            background: rgba(0, 0, 0, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
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

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            max-width: 800px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            transform: translateY(20px);
            transition: transform 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .dark .modal-content {
            background: #1a1a1a;
            color: white;
        }

        .modal-overlay.active .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            padding: 20px 30px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .dark .modal-header {
            border-bottom: 1px solid #374151;
        }

        .modal-body {
            padding: 30px;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.3s ease;
        }

        .modal-close:hover {
            color: #ef4444;
        }

        /* Enhanced About Section Styles */
        .about-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.02) 0%, rgba(255, 255, 255, 0) 100%);
        }

        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .about-card-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            background: rgba(232, 160, 15, 0.04);
            color: var(--brand);
            font-size: 28px;
        }

        .about-card-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .about-card-button {
            margin-top: auto;
            padding-top: 20px;
        }

        /* Section Backgrounds */
        .section-with-bg {
            position: relative;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .section-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .section-content {
            position: relative;
            z-index: 2;
        }

        /* Enhanced Cards */
        .enhanced-card {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .enhanced-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: 1;
        }

        .enhanced-card-content {
            position: relative;
            z-index: 2;
            padding: 2rem;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .enhanced-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .enhanced-card-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            background: rgba(0, 0, 0, 0.93);
            color: var(--brand);
            font-size: 32px;
            transition: all 0.3s ease;
        }

        .enhanced-card:hover .enhanced-card-icon {
            transform: scale(1.1);
            background: rgba(232, 160, 15, 0.2);
        }

        /* Enhanced Contact Form */
        .contact-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            padding: 1rem;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .contact-info-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .contact-info-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            background: var(--brand);
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

        .contact-form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: white;
            transition: all 0.3s ease;
        }

        .dark .contact-form-input {
            background: #2a2a2a;
            border-color: #4a5568;
            color: white;
        }

        .contact-form-input:focus {
            outline: none;
            border-color: var(--brand);
            box-shadow: 0 0 0 3px rgba(232, 160, 15, 0.1);
        }

        .contact-form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .carousel-container {
                height: 500px;
            }

            .carousel-overlay {
                background: linear-gradient(to bottom, rgba(59, 59, 59, 0.32) 0%, rgba(59, 59, 59, 0.3) 50%, rgba(59, 59, 59, 0.3) 100%);
                align-items: flex-end;
                padding-bottom: 60px;
            }

            .carousel-content {
                text-align: center;
            }

            .carousel-nav {
                width: 40px;
                height: 40px;
            }

            .fixed-theme-toggle {
                bottom: 20px;
                left: 20px;
                padding: 6px 12px;
            }

            .fixed-theme-toggle-label {
                font-size: 0.7rem;
            }

            .modal-content {
                width: 95%;
            }

            .section-with-bg {
                background-attachment: scroll;
            }
        }

        /* Loading Animation */
        .loading-bar {
            height: 4px;
            width: 100%;
            background: rgba(255, 255, 255, 0.3);
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .loading-progress {
            height: 100%;
            width: 0%;
            background: white;
            transition: width 5s linear;
        }

        .carousel-slide.active .loading-progress {
            width: 100%;
        }

        /* Section Backgrounds */
        .section-with-bg {
            position: relative;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .section-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .section-content {
            position: relative;
            z-index: 2;
        }

        /* Enhanced About Section Styles */
        .about-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.02) 0%, rgba(255, 255, 255, 0) 100%);
        }

        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .about-card-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            background: rgba(232, 160, 15, 0.04);
            color: var(--brand);
            font-size: 28px;
        }

        .about-card-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .about-card-button {
            margin-top: auto;
            padding-top: 20px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .section-with-bg {
                background-attachment: scroll;
            }
        }

        /* New styles for hover arrow */
        .about-card-arrow {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--brand);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            cursor: pointer;
            z-index: 10;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

        .about-card:hover .about-card-arrow {
            opacity: 1;
            transform: translateY(0);
        }

        .about-card-arrow:hover {
            animation: glow 1.5s ease-in-out infinite alternate;
            transform: scale(1.1);
        }

        /* About Us Page Styles */
        .about-us-hero {
            background: linear-gradient(135deg, rgba(59, 59, 59, 0.8) 0%, rgba(59, 59, 59, 0.6) 100%), url('Img/wmremove-transformed.jpeg');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .about-us-content {
            padding: 80px 0;
        }

        .team-member {
            text-align: center;
            transition: all 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-10px);
        }

        .team-member-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 4px solid var(--brand);
        }

        .history-timeline {
            position: relative;
            padding-left: 30px;
        }

        .history-timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--brand);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -38px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--brand);
        }

        /* Page sections */
        .page-section {
            display: none;
        }

        .page-section.active {
            display: block;
        }
    </style>
</head>

<body
    class="antialiased bg-gray-100 text-gray-800 dark:bg-dexomed-900 dark:text-gray-100 transition-colors duration-300">
    <div class="min-h-screen flex flex-col">
        <div class="bg-dexomed-700 text-white py-4 text-sm">
            <div class="page-container px-6 flex flex-col md:flex-row justify-between items-center">

                <div class="flex flex-wrap justify-center md:justify-start gap-4 mb-2 md:mb-0">
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-2 text-dexomed-300"></i>
                        <span>info@dexomed.co.ke</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone-alt mr-2 text-dexomed-300"></i>
                        <span>+254 705953914</span>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-dexomed-300 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white hover:text-dexomed-300 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white hover:text-dexomed-300 transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-white hover:text-dexomed-300 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Header with Navigation -->
        <header class="bg-white dark:bg-dexomed-800 shadow-sm sticky top-0 z-50 transition-all duration-300">
            <div class="page-container px-4 py--4 flex items-center justify-between">
                <a href="#" class="flex items-center gap-3 group ml-4" onclick="showPage('home')">
                    <div class="flex-shrink-0 relative">
                        <img src="{{ asset('Img/Logo-removebg-preview.png') }}" alt="Dexomed Biologicals Group"
                            class="h-32 w-auto transition-all duration-300 group-hover:scale-105 rounded-md">
                    </div>
                </a>

                <div class="flex items-center gap-4">
                    <nav class="hidden md:flex items-center gap-4 text-sm">
                        <a class="nav-link active" href="#" onclick="showPage('home')">Home</a>
                        <a class="nav-link" href="#" onclick="showPage('about-us')">About Us</a>
                        <a class="nav-link" href="#"
                            onclick="showPage('home'); scrollToSection('services')">Products & Services</a>
                            <a class="nav-link" href="#" onclick="showPage('health-systems')">Health Managment Systems</a>
                        <a class="nav-link" href="#" onclick="showPage('home'); scrollToSection('contact')">Contact
                            Us</a>

                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="ml-4 px-4 py-2 rounded-md bg-dexomed-500 text-white text-sm hover:bg-dexomed-600 transition-colors">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="ml-4 px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 text-sm hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">Sign
                                    In</a>
                            @endauth
                        @endif
                    </nav>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center gap-4">
                    <button id="mobileNavBtn"
                        class="p-2 rounded-md border dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <div id="mobileNav" class="hidden bg-white dark:bg-dexomed-800 border-t dark:border-gray-800 md:hidden">
                <div class="px-6 py-4 flex flex-col gap-3">
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#" onclick="showPage('home')">Home</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#" onclick="showPage('about-us')">About
                        Us</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#"
                        onclick="showPage('home'); scrollToSection('services')">Products & Services</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#" onclick="showPage('health-systems')">Health Managment Systems</a>
                    
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#"
                        onclick="showPage('home'); scrollToSection('calibration')">Calibration & Standardization</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#"
                        onclick="showPage('home'); scrollToSection('supplies')">Medical Supplies</a>
                    <a class="text-sm py-2 border-b dark:border-gray-800" href="#"
                        onclick="showPage('home'); scrollToSection('contact')">Contact</a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm py-2 mt-2 text-center rounded-md bg-dexomed-500 text-white">Dashboard</a>
                        @else
                            <div class="flex gap-2 mt-2">
                                <a href="{{ route('login') }}"
                                    class="flex-1 text-sm py-2 text-center rounded-md border border-gray-300 dark:border-gray-700">Login</a>
                                <a href="{{ route('register') }}"
                                    class="flex-1 text-sm py-2 text-center rounded-md bg-dexomed-500 text-white">Register</a>
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <main class="flex-1">
            <!-- Home Page -->
            <div id="home-page" class="page-section active">
                <!-- Hero section -->
                <section id="home" class="relative">
                    <div class="carousel-container">
                        <!-- Slide 1: Equipment Calibration and Standardization -->
                        <div class="carousel-slide active"
                            style="background-image: url('Img/66c239e5a8b687fd51bc8523_AdobeStock 338447101.jpg')">
                            <div class="carousel-overlay">
                                <div class="carousel-content">
                                    <h2 class="text-4xl md:text-5xl font-bold leading-tight">Equipment Calibration and
                                        Standardization</h2>
                                    <p class="mt-4 text-lg opacity-90">
                                        Ensure precision and compliance with our comprehensive calibration services. We
                                        follow international standards to guarantee your equipment performs accurately
                                        and consistently.
                                    </p>
                                    <div class="mt-6 flex flex-wrap gap-3">
                                        <a href="#calibration"
                                            class="inline-block px-6 py-3 rounded-md bg-white text-dexomed-700 font-medium shadow hover:bg-gray-100 transition-colors">Calibration
                                            Services</a>
                                        <a href="#contact"
                                            class="inline-block px-6 py-3 rounded-md border border-white text-white font-medium hover:bg-white hover:text-dexomed-700 transition-colors">Request
                                            Service</a>
                                    </div>
                                </div>
                            </div>
                            <div class="loading-bar">
                                <div class="loading-progress"></div>
                            </div>
                        </div>

                        <!-- Slide 2: Equipment Servicing and Preventive Maintenance -->
                        <div class="carousel-slide" style="background-image: url('Img/medical_equipment.jpg')">
                            <div class="carousel-overlay">
                                <div class="carousel-content">
                                    <h2 class="text-4xl md:text-5xl font-bold leading-tight">Equipment Servicing and
                                        Preventive Maintenance</h2>
                                    <p class="mt-4 text-lg opacity-90">
                                        Maximize equipment lifespan and minimize downtime with our comprehensive
                                        servicing and preventive maintenance programs tailored to your specific needs.
                                    </p>
                                    <div class="mt-6 flex flex-wrap gap-3">
                                        <a href="#maintenance"
                                            class="inline-block px-6 py-3 rounded-md bg-white text-dexomed-700 font-medium shadow hover:bg-gray-100 transition-colors">Maintenance
                                            Plans</a>
                                        <a href="#contact"
                                            class="inline-block px-6 py-3 rounded-md border border-white text-white font-medium hover:bg-white hover:text-dexomed-700 transition-colors">Schedule
                                            Service</a>
                                    </div>
                                </div>
                            </div>
                            <div class="loading-bar">
                                <div class="loading-progress"></div>
                            </div>
                        </div>

                        <!-- Slide 3: Health Management Systems -->
                        <div class="carousel-slide"
                            style="background-image: url('Img/medical-technology-blog-banner-7.jpg')">
                            <div class="carousel-overlay">
                                <div class="carousel-content">
                                    <h2 class="text-4xl md:text-5xl font-bold leading-tight">Health Management Systems
                                    </h2>
                                    <p class="mt-4 text-lg opacity-90">
                                        Implement comprehensive health management solutions that streamline operations,
                                        improve patient care, and ensure regulatory compliance across your facility.
                                    </p>
                                    <div class="mt-6 flex flex-wrap gap-3">
                                        <a href="#" onclick="showPage('health-systems')"
                                            class="inline-block px-6 py-3 rounded-md bg-white text-dexomed-700 font-medium shadow hover:bg-gray-100 transition-colors">Our
                                            Systems</a>
                                        <a href="#contact"
                                            class="inline-block px-6 py-3 rounded-md border border-white text-white font-medium hover:bg-white hover:text-dexomed-700 transition-colors">Get
                                            Consultation</a>
                                    </div>
                                </div>
                            </div>
                            <div class="loading-bar">
                                <div class="loading-progress"></div>
                            </div>
                        </div>

                        <!-- Slide 4: Supply and Installation of Equipment -->
                        <div class="carousel-slide"
                            style="background-image: url('Img/The-Role-of-High-Quality-Medical.jpg')">
                            <div class="carousel-overlay">
                                <div class="carousel-content">
                                    <h2 class="text-4xl md:text-5xl font-bold leading-tight">Supply of Medical Equipments and Consumables</h2>
                                    <p class="mt-4 text-lg opacity-90">
                                        Source high-quality medical equipment from reputable manufacturers with
                                        professional installation services to ensure optimal performance from day one.
                                    </p>
                                    <div class="mt-6 flex flex-wrap gap-3">
                                        <a href="#supplies"
                                            class="inline-block px-6 py-3 rounded-md bg-white text-dexomed-700 font-medium shadow hover:bg-gray-100 transition-colors">Our
                                            Products</a>
                                        <a href="#contact"
                                            class="inline-block px-6 py-3 rounded-md border border-white text-white font-medium hover:bg-white hover:text-dexomed-700 transition-colors">Request
                                            Quote</a>
                                    </div>
                                </div>
                            </div>
                            <div class="loading-bar">
                                <div class="loading-progress"></div>
                            </div>
                        </div>

                        <!-- Carousel Navigation -->
                        <div class="carousel-nav carousel-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </div>
                        <div class="carousel-nav carousel-next">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                        <!-- Carousel Indicators -->
                        <div class="carousel-indicators">
                            <div class="carousel-indicator active" data-slide="0"></div>
                            <div class="carousel-indicator" data-slide="1"></div>
                            <div class="carousel-indicator" data-slide="2"></div>
                            <div class="carousel-indicator" data-slide="3"></div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="page-container px-6 -mt-10 relative z-10">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div
                                class="stat-item bg-white dark:bg-dexomed-800 px-6 py-5 rounded-lg shadow text-center slide-up">
                                <div class="text-3xl font-bold text-dexomed-500 counter" data-target="100">0</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Equipment Types Serviced
                                </div>
                            </div>
                            <div class="stat-item bg-white dark:bg-dexomed-800 px-6 py-5 rounded-lg shadow text-center slide-up"
                                style="animation-delay: 0.1s">
                                <div class="text-3xl font-bold text-dexomed-500 counter" data-target="500">0</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Clients Served</div>
                            </div>
                            <div class="stat-item bg-white dark:bg-dexomed-800 px-6 py-5 rounded-lg shadow text-center slide-up"
                                style="animation-delay: 0.2s">
                                <div class="text-3xl font-bold text-dexomed-500 counter" data-target="24">0</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">/7 Emergency Support</div>
                            </div>
                            <div class="stat-item bg-white dark:bg-dexomed-800 px-6 py-5 rounded-lg shadow text-center slide-up"
                                style="animation-delay: 0.3s">
                                <div class="text-3xl font-bold text-dexomed-500 counter" data-target="50">0</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Medical Equipment Brands
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- ENHANCED ABOUT SECTION -->
                <section id="about" class="py-20 section-with-bg"
                    style="background-image: url('Img/wmremove-transformed.jpeg')">
                    <div class="section-overlay"></div>
                    <div class="section-content">
                        <div class="page-container px-6">
                            <div class="text-center mb-16">
                                <h3 class="text-3xl md:text-4xl font-bold text-white">About Dexomed Biologicals Group
                                </h3>
                                <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto">
                                    <strong>Dexomed Biologicals Group Ltd.</strong> is a leading provider of biomedical engineering, calibration, and diagnostic technology solutions in Kenya. We specialize in the servicing, repair, and calibration of medical and laboratory equipment to ensure accuracy, compliance, and optimal performance in healthcare and industrial environments. Our expertise extends across clinical, pharmaceutical, and research institutions, where we provide reliable systems that guarantee accurate results for improved service delivery. With a team of certified professionals and a deep understanding of both local and international standards, Dexomed ensures that every piece of equipment entrusted to us meets the highest benchmarks of precision and reliability.

                                </p>
                            </div>

                            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">


                            <!-- Our Vision Card -->
                                <div
                                    class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/The-Role-of-High-Quality-Medical.jpg')"></div>
                                    <div class="relative z-10">
                                        <div class="about-card-icon">
                                            <i class="fas fa-award"></i>
                                        </div>
                                        <div class="about-card-content">
                                            <h4 class="text-xl font-bold mb-4">Our Vision</h4>
                                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                                To be Africa’s leading partner in biomedical technology, quality systems, and health innovation, driving excellence, reliability, and sustainability in healthcare delivery.

                                            </p>
                                        </div>
                                        <div class="about-card-button">
                                        </div>
                                    </div>
                                    <!-- Hover Arrow -->
                                    <a href="#" class="about-card-arrow" onclick="showPage('about-us')">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>

                                <!-- Our Mission Card -->
                                <div
                                    class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/comprehensive-medical-equipment-arrangement-precision-hygiene-clinical-setting-enhanced-healthcare-essential-medical-355575535.webp')">
                                    </div>
                                    <div class="relative z-10">
                                        <div class="about-card-icon">
                                            <i class="fas fa-crosshairs"></i>
                                        </div>
                                        <div class="about-card-content">
                                            <h4 class="text-xl font-bold mb-4">Our Mission</h4>
                                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                                To empower healthcare and research institutions through high-quality biomedical engineering services, reliable equipment supply, and innovative health management systems that enhance accuracy, efficiency, and patient safety.
                                            </p>
                                            
                                        </div>
                                        <div class="about-card-button">
                                        </div>
                                    </div>
                                    <!-- Hover Arrow -->
                                    <a href="#" class="about-card-arrow" onclick="showPage('about-us')">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>

                                

                                <!-- Our Values Card -->
                                <div
                                    class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/comprehensive-medical-equipment-arrangement-precision-hygiene-clinical-setting-enhanced-healthcare-essential-medical-355575535.webp')">
                                    </div>
                                    <div class="relative z-10">
                                        <div class="about-card-icon">
                                            <i class="fas fa-award"></i>
                                        </div>
                                        <div class="about-card-content">
                                            <h4 class="text-xl font-bold mb-4">Our Values</h4>
                                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                                We are guided by a set of core values that define our approach to
                                                business and customer service:
                                            </p>
                                            <ul class="text-gray-600 dark:text-gray-300 text-sm space-y-2">
                                                <li class="flex items-start">
                                                    <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                                    <span>Integrity and transparency</span>
                                                </li>
                                                <li class="flex items-start">
                                                    <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                                    <span>Professionalism and expertise</span>
                                                </li>
                                                <li class="flex items-start">
                                                    <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                                    <span>Innovation and continuous improvement</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="about-card-button">
                                        </div>
                                    </div>
                                    <!-- Hover Arrow -->
                                    <a href="#" class="about-card-arrow" onclick="showPage('about-us')">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>


                <!-- ENHANCED SERVICES SECTION -->
                <section id="services" class="py-20 section-with-bg"
                    style="background-image: url('Img/Healthcare-Data-Management-KMS-2.webp')">
                    <div class="section-overlay"></div>
                    <div class="section-content">
                        <div class="page-container px-6">
                            <h3 class="text-3xl md:text-4xl font-bold text-center text-white">Our Core Services</h3>
                            <p class="mt-4 text-lg text-gray-200 text-center max-w-2xl mx-auto">
                                We offer comprehensive service and maintenance solutions tailored to meet the specific
                                needs of various medical and biological equipment.
                            </p>

                            <div class="mt-12">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <!-- Card 1: Equipment Calibration and Standardization -->
                                    <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden h-full flex flex-col group cursor-pointer"
                                        onclick="window.location.href='{{ route('login') }}'">
                                        <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                            style="background-image: url('Img/services.png')"></div>
                                        <div class="enhanced-card-content flex-1">
                                            <div
                                                class="enhanced-card-icon group-hover:bg-dexomed-500 group-hover:text-white transition-all duration-300">
                                                <i class="fas fa-ruler-combined"></i>
                                            </div>
                                            <h4 class="text-lg font-bold mb-4 text-center">Equipment Calibration and
                                                Standardization</h4>
                                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                                Ensure precision and compliance with our comprehensive calibration
                                                services. We follow international standards to guarantee your equipment
                                                performs accurately and consistently for reliable diagnostic results.
                                            </p>
                                        </div>
                                        <!-- Hover Explore More Label -->
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-dexomed-500 bg-opacity-90 text-white py-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out flex items-center justify-center space-x-2">
                                            <span class="font-semibold">Make a Request</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>

                                    <!-- Card 2: Equipment Servicing and Preventive Maintenance -->
                                    <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden h-full flex flex-col group cursor-pointer"
                                        onclick="window.location.href='{{ route('login') }}'">
                                        <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                            style="background-image: url('Img/services.png')"></div>
                                        <div class="enhanced-card-content flex-1">
                                            <div
                                                class="enhanced-card-icon group-hover:bg-dexomed-500 group-hover:text-white transition-all duration-300">
                                                <i class="fas fa-tools"></i>
                                            </div>
                                            <h4 class="text-lg font-bold mb-4 text-center">Equipment Servicing and
                                                Preventive Maintenance</h4>
                                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                                Maximize equipment lifespan and minimize downtime with our comprehensive
                                                servicing and preventive maintenance programs tailored to your specific
                                                needs and usage patterns.
                                            </p>
                                        </div>
                                        <!-- Hover Explore More Label -->
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-dexomed-500 bg-opacity-90 text-white py-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out flex items-center justify-center space-x-2">
                                            <span class="font-semibold">Make a Request</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>

                                    <!-- Card 3: Supply and Installation of Equipment -->
                                    <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden h-full flex flex-col group cursor-pointer"
                                        onclick="window.location.href='{{ route('login') }}'">
                                        <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                            style="background-image: url('Img/services.png')"></div>
                                        <div class="enhanced-card-content flex-1">
                                            <div
                                                class="enhanced-card-icon group-hover:bg-dexomed-500 group-hover:text-white transition-all duration-300">
                                                <i class="fas fa-cube"></i>
                                            </div>
                                            <h4 class="text-lg font-bold mb-4 text-center">Supply of Medical Equipments and Consumables</h4>
                                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                                Source high-quality medical equipment from reputable manufacturers with
                                                professional installation services to ensure optimal performance from
                                                day one.
                                            </p>
                                        </div>
                                        <!-- Hover Explore More Label -->
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-dexomed-500 bg-opacity-90 text-white py-3 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out flex items-center justify-center space-x-2">
                                            <span class="font-semibold">Make a Request</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Equipment Categories Section -->
<div class="mt-16">
    <h4 class="text-2xl md:text-3xl font-bold text-center text-white mb-8">Equipments We Service</h4>
    <div class="grid md:grid-cols-3 gap-8">
        <!-- Medical Equipment Card -->
        <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center opacity-30"
                style="background-image: url('Img/The-Role-of-High-Quality-Medical.jpg')">
            </div>
            <div class="enhanced-card-content">
                <div class="enhanced-card-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <h4 class="text-xl font-bold mb-6">Medical Equipment</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-heartbeat text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Patient Monitors</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-lungs text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Ventilators</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-bolt text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Defibrillators</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-tint text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Infusion Pumps</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-procedures text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Anesthesia Machines</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-heart text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">ECG Machines</span>
                    </div>
                </div>
                <!-- "And Many More" Button inside card -->
                <div class="flex justify-center mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('login') }}" 
                       class="inline-block px-4 py-2 rounded-md bg-dexomed-500 text-white text-sm font-medium shadow hover:bg-dexomed-600 transition-colors">
                        And Many More
                    </a>
                </div>
            </div>
        </div>

        <!-- Laboratory & Research Card -->
        <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center opacity-30"
                style="background-image: url('Img/66c239e5a8b687fd51bc8523_AdobeStock 338447101.jpg')">
            </div>
            <div class="enhanced-card-content">
                <div class="enhanced-card-icon">
                    <i class="fas fa-microscope"></i>
                </div>
                <h4 class="text-xl font-bold mb-6">Laboratory & Research</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-vial text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Laboratory Analyzers</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-sync-alt text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Centrifuges</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-temperature-high text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Incubators</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-sterilization text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Autoclaves</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-balance-scale text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Analytical Balances</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-flask text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">DNA sequencers</span>
                    </div>
                </div>
                <!-- "And Many More" Button inside card -->
                <div class="flex justify-center mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('login') }}" 
                       class="inline-block px-4 py-2 rounded-md bg-dexomed-500 text-white text-sm font-medium shadow hover:bg-dexomed-600 transition-colors">
                        And Many More
                    </a>
                </div>
            </div>
        </div>

        <!-- Radiology and Imaging Card -->
        <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center opacity-30"
                style="background-image: url('Img/medical_equipment.jpg')">
            </div>
            <div class="enhanced-card-content">
                <div class="enhanced-card-icon">
                    <i class="fas fa-x-ray"></i>
                </div>
                <h4 class="text-xl font-bold mb-6">Radiology and Imaging</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-wave-square text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Ultrasound Machines</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-x-ray text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">X-ray Machines</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-magnet text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">MRI Systems</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-camera text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">CT Scanners</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-radiation text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Nuclear Medicine</span>
                    </div>
                    <div class="flex items-center bg-dexomed-50 dark:bg-dexomed-700 rounded-lg p-3">
                        <i class="fas fa-image text-dexomed-500 mr-3"></i>
                        <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">Mammography Systems</span>
                    </div>
                </div>
                <!-- "And Many More" Button inside card -->
                <div class="flex justify-center mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('login') }}" 
                       class="inline-block px-4 py-2 rounded-md bg-dexomed-500 text-white text-sm font-medium shadow hover:bg-dexomed-600 transition-colors">
                        And Many More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
                        </div>
                    </div>
                </section>

                <!-- NEW SECTION: Supply of Medical Equipments and Consumables -->
                <section id="medical-supplies" class="py-20 section-with-bg" style="background-image: url('Img/services.png')">
                    <div class="section-overlay"></div>
                    <div class="section-content">
                        <div class="page-container px-6">
                            <h3 class="text-3xl md:text-4xl font-bold text-center text-white">Supply of Medical Equipment and Consumables</h3>
                            <p class="mt-4 text-lg text-gray-200 text-center max-w-2xl mx-auto">
                                We provide a comprehensive range of high-quality medical equipment, laboratory equipments, and consumables from reputable manufacturers worldwide.
                            </p>

                            <div class="mt-12 grid md:grid-cols-3 gap-8">
                                <!-- Medical Equipment Card -->
                                <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/The-Role-of-High-Quality-Medical.jpg')"></div>
                                    <div class="enhanced-card-content">
                                        <div class="enhanced-card-icon">
                                            <i class="fas fa-stethoscope"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-4">Medical Equipment</h4>
                                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                                            We supply a wide range of medical equipment including patient monitors, ventilators, defibrillators, infusion pumps, anesthesia machines, and diagnostic imaging equipment.
                                        </p>
                                        <div class="grid grid-cols-2 gap-2 mt-4">
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Patient Monitors</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Ventilators</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Defibrillators</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Infusion Pumps</span>
                                            </div>
                                        </div>
                                        <a href="#contact"
                                            class="inline-block mt-6 text-dexomed-500 font-medium hover:text-dexomed-600 transition-colors">Request
                                            Quote →</a>
                                    </div>
                                </div>

                                <!-- Laboratory Instruments Card -->
                                <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/66c239e5a8b687fd51bc8523_AdobeStock 338447101.jpg')">
                                    </div>
                                    <div class="enhanced-card-content">
                                        <div class="enhanced-card-icon">
                                            <i class="fas fa-microscope"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-4">Laboratory Equipments</h4>
                                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                                            Our laboratory equipment portfolio includes centrifuges, incubators, autoclaves, microscopes, spectrophotometers, and various analyzers for clinical and research applications.
                                        </p>
                                        <div class="grid grid-cols-2 gap-2 mt-4">
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Centrifuges</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Incubators</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Autoclaves</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Analyzers</span>
                                            </div>
                                        </div>
                                        <a href="#contact"
                                            class="inline-block mt-6 text-dexomed-500 font-medium hover:text-dexomed-600 transition-colors">Request
                                            Quote →</a>
                                    </div>
                                </div>

                                <!-- Consumables & Supplies Card -->
                                <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/comprehensive-medical-equipment-arrangement-precision-hygiene-clinical-setting-enhanced-healthcare-essential-medical-355575535.webp')">
                                    </div>
                                    <div class="enhanced-card-content">
                                        <div class="enhanced-card-icon">
                                            <i class="fas fa-boxes"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-4">Consumables & Supplies</h4>
                                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                                            We provide a comprehensive range of medical consumables, laboratory reagents, disposables, and other supplies essential for healthcare operations and research activities.
                                        </p>
                                        <div class="grid grid-cols-2 gap-2 mt-4">
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Laboratory Reagents</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Disposables</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Diagnostic Kits</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check text-dexomed-500 mr-2 text-sm"></i>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm">Protective Gear</span>
                                            </div>
                                        </div>
                                        <a href="#contact"
                                            class="inline-block mt-6 text-dexomed-500 font-medium hover:text-dexomed-600 transition-colors">Request
                                            Quote →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ENHANCED CALIBRATION SECTION -->
                <section id="calibration" class="py-20 section-with-bg"
                    style="background-image: url('Img/wmremove-transformed (1).jpeg')">
                    <div class="section-overlay"></div>
                    <div class="section-content">
                        <div class="page-container px-6">
                            <h3 class="text-3xl md:text-4xl font-bold text-center text-white">Calibration and Standardization Services</h3>
                            <p class="mt-4 text-lg text-gray-200 text-center max-w-2xl mx-auto">
                                Our calibration services ensure that medical equipment performs accurately and
                                consistently, meeting all regulatory standards.
                            </p>

                            <div class="mt-12 grid md:grid-cols-2 gap-8">
                                <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/66c239e5a8b687fd51bc8523_AdobeStock 338447101.jpg')">
                                    </div>
                                    <div class="enhanced-card-content">
                                        <div class="enhanced-card-icon">
                                            <i class="fas fa-ruler-combined"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-6">Our Calibration Process</h4>
                                        <div class="space-y-4">
                                            <div class="flex items-start">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                                    <span class="text-dexomed-500 font-bold">1</span>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-dexomed-500">Initial Verification</h5>
                                                    <p class="text-gray-600 dark:text-gray-300 mt-1">We begin with a
                                                        comprehensive verification of the equipment's current
                                                        performance against manufacturer specifications.</p>
                                                </div>
                                            </div>
                                            <div class="flex items-start">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                                    <span class="text-dexomed-500 font-bold">2</span>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-dexomed-500">Precision Adjustment</h5>
                                                    <p class="text-gray-600 dark:text-gray-300 mt-1">Our technicians
                                                        make precise adjustments to align the equipment with established
                                                        standards using certified reference instruments.</p>
                                                </div>
                                            </div>
                                            <div class="flex items-start">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                                    <span class="text-dexomed-500 font-bold">3</span>
                                                </div>
                                                <div>
                                                    <h5 class="font-bold text-dexomed-500">Documentation & Certification
                                                    </h5>
                                                    <p class="text-gray-600 dark:text-gray-300 mt-1">We provide detailed
                                                        calibration certificates documenting the process, results, and
                                                        compliance with relevant standards.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/medical_equipment.jpg')"></div>
                                    <div class="enhanced-card-content">
                                        <div class="enhanced-card-icon">
                                            <i class="fas fa-certificate"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-6">Calibration Standards</h4>
                                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                                            Our calibration services adhere to international standards and manufacturer
                                            specifications, ensuring:
                                        </p>
                                        <ul class="space-y-3 text-gray-600 dark:text-gray-300">
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Accuracy and reliability of diagnostic results</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Compliance with regulatory requirements</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Optimal equipment performance and longevity</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-dexomed-500 mr-2 mt-0.5 flex-shrink-0"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Patient safety through precise measurements</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ENHANCED MEDICAL SUPPLIES SECTION -->
                <section id="supplies" class="py-20 section-with-bg" style="background-image: url('Img/services.png')">
                    <div class="section-overlay"></div>
                    <div class="section-content">
                        <div class="page-container px-6">
                            <h3 class="text-3xl md:text-4xl font-bold text-center text-white">Medical Equipment &
                                Supplies</h3>
                            <p class="mt-4 text-lg text-gray-200 text-center max-w-2xl mx-auto">
                                We offer a comprehensive range of medical equipment, laboratory Equipments, and
                                consumables from reputable manufacturers.
                            </p>

                            <div class="mt-12 grid md:grid-cols-3 gap-8">
                                <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/The-Role-of-High-Quality-Medical.jpg')"></div>
                                    <div class="enhanced-card-content">
                                        <div class="enhanced-card-icon">
                                            <i class="fas fa-stethoscope"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-4">Medical Equipment</h4>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            We supply a wide range of medical equipment including patient monitors,
                                            ventilators, defibrillators, infusion pumps, anesthesia machines, and
                                            diagnostic imaging equipment.
                                        </p>
                                        <a href="#contact"
                                            class="inline-block mt-4 text-dexomed-500 font-medium hover:text-dexomed-600 transition-colors">Request
                                            Quote →</a>
                                    </div>
                                </div>
                                <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/66c239e5a8b687fd51bc8523_AdobeStock 338447101.jpg')">
                                    </div>
                                    <div class="enhanced-card-content">
                                        <div class="enhanced-card-icon">
                                            <i class="fas fa-microscope"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-4">Laboratory Equipments</h4>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            Our laboratory equipment portfolio includes centrifuges, incubators,
                                            autoclaves, microscopes, spectrophotometers, and various analyzers for
                                            clinical and research applications.
                                        </p>
                                        <a href="#contact"
                                            class="inline-block mt-4 text-dexomed-500 font-medium hover:text-dexomed-600 transition-colors">Request
                                            Quote →</a>
                                    </div>
                                </div>
                                <div class="enhanced-card bg-white dark:bg-dexomed-800 relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/comprehensive-medical-equipment-arrangement-precision-hygiene-clinical-setting-enhanced-healthcare-essential-medical-355575535.webp')">
                                    </div>
                                    <div class="enhanced-card-content">
                                        <div class="enhanced-card-icon">
                                            <i class="fas fa-boxes"></i>
                                        </div>
                                        <h4 class="text-xl font-bold mb-4">Consumables & Supplies</h4>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            We provide a comprehensive range of medical consumables, laboratory
                                            reagents, disposables, and other supplies essential for healthcare
                                            operations and research activities.
                                        </p>
                                        <a href="#contact"
                                            class="inline-block mt-4 text-dexomed-500 font-medium hover:text-dexomed-600 transition-colors">Request
                                            Quote →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- ENHANCED CONTACT SECTION -->
                <section id="contact" class="py-20 section-with-bg"
                    style="background-image: url('Img/wmremove-transformed.jpeg')">
                    <div class="section-overlay"></div>
                    <div class="section-content">
                        <div class="page-container px-6 max-w-4xl mx-auto">
                            <h3 class="text-3xl md:text-4xl font-bold text-center text-white">Get in Touch</h3>
                            <p class="mt-4 text-lg text-gray-200 text-center">
                                Have questions or want to discuss your equipment service needs? Contact our team for
                                service inquiries, equipment quotes, or technical support.
                            </p>

                            <div class="mt-12 grid md:grid-cols-2 gap-8">
                                <div class="bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                                    <h4 class="text-xl font-bold mb-6">Contact Information</h4>

                                    <div class="space-y-4">
                                        <div class="contact-info-item">
                                            <div class="contact-info-icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">Address</p>
                                                <p class="text-gray-600 dark:text-gray-300 mt-1">Nairobi, Kenya</p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Suite 12,
                                                    LabPark Towers</p>
                                            </div>
                                        </div>

                                        <div class="contact-info-item">
                                            <div class="contact-info-icon">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">Phone</p>
                                                <p class="text-gray-600 dark:text-gray-300 mt-1">+254 705953914</p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Available 24/7
                                                    for emergencies</p>
                                            </div>
                                        </div>

                                        <div class="contact-info-item">
                                            <div class="contact-info-icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium">Email</p>
                                                <p class="text-gray-600 dark:text-gray-300 mt-1">
                                                    info@dexomed.co.ke</p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">We'll respond
                                                    within 24 hours</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-8 pt-6 border-t dark:border-gray-700">
                                        <h5 class="font-medium mb-4">Follow Us</h5>
                                        <div class="flex space-x-4">
                                            <a href="#"
                                                class="w-10 h-10 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center text-gray-400 hover:text-dexomed-500 hover:bg-dexomed-200 dark:hover:bg-dexomed-600 transition-colors">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="#"
                                                class="w-10 h-10 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center text-gray-400 hover:text-dexomed-500 hover:bg-dexomed-200 dark:hover:bg-dexomed-600 transition-colors">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="#"
                                                class="w-10 h-10 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center text-gray-400 hover:text-dexomed-500 hover:bg-dexomed-200 dark:hover:bg-dexomed-600 transition-colors">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a href="#"
                                                class="w-10 h-10 rounded-full bg-dexomed-100 dark:bg-dexomed-700 flex items-center justify-center text-gray-400 hover:text-dexomed-500 hover:bg-dexomed-200 dark:hover:bg-dexomed-600 transition-colors">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md">
                                    <h4 class="text-xl font-bold mb-6">Send us a Message</h4>
                                    <form class="space-y-4">
                                        <div>
                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Your
                                                Name</label>
                                            <input type="text" id="name" class="contact-form-input"
                                                placeholder="Enter your full name">
                                        </div>
                                        <div>
                                            <label for="email"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email
                                                Address</label>
                                            <input type="email" id="email" class="contact-form-input"
                                                placeholder="Enter your email address">
                                        </div>
                                        <div>
                                            <label for="subject"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                                            <input type="text" id="subject" class="contact-form-input"
                                                placeholder="What is this regarding?">
                                        </div>
                                        <div>
                                            <label for="message"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                                            <textarea id="message" rows="4"
                                                class="contact-form-input contact-form-textarea"
                                                placeholder="Tell us about your requirements..."></textarea>
                                        </div>
                                        <button type="submit"
                                            class="w-full px-4 py-3 bg-dexomed-500 text-white rounded-md hover:bg-dexomed-600 transition-colors font-medium flex items-center justify-center">
                                            <i class="fas fa-paper-plane mr-2"></i> Send Message
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- End Home Page -->

            <!-- About Us Page -->
            <div id="about-us-page" class="page-section">
                <!-- About Us Hero Section -->
                <section class="about-us-hero">
                    <div class="page-container px-6 text-center">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6">About Dexomed Biologicals Group</h1>
                        <p class="text-xl md:text-2xl max-w-3xl mx-auto">
                            Leading East Africa in specialized biomedical equipment services with dedication to
                            excellence, reliability, and customer satisfaction.
                        </p>
                    </div>
                </section>

                <!-- Company Overview -->
                <section class="about-us-content bg-white dark:bg-dexomed-900">
                    <div class="page-container px-6">
                        <div class="grid md:grid-cols-2 gap-12 items-center">
                            <div>
    <h2 class="text-3xl md:text-4xl font-bold mb-6">Company Overview</h2>
    <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
        <strong>Dexomed Biologicals Group Ltd</strong>is a leading provider of biomedical engineering, calibration, and diagnostic technology solutions in Kenya. We specialize in the servicing, repair, and calibration of medical and laboratory equipment to ensure accuracy, compliance, and optimal performance in healthcare and industrial environments. Our expertise extends across clinical, pharmaceutical, and research institutions, where we provide reliable systems that guarantee accurate results for improved service delivery. With a team of certified professionals and a deep understanding of both local and international standards, Dexomed ensures that every piece of equipment entrusted to us meets the highest benchmarks of precision and reliability.

    </p>
    <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
        At Dexomed, we are driven by a commitment to technical excellence, integrity, and innovation. We combine modern engineering techniques with industry best practices to deliver sustainable solutions that strengthen diagnostic quality and patient safety. Beyond equipment calibration, we support institutions through consultancy, capacity building, and system audits that promote quality assurance and regulatory compliance. Our guiding philosophy Reliable Systems • Accurate Results • Better Care reflects our belief that dependable technology is the foundation of better healthcare outcomes.
    </p>
</div>
                            <div class="bg-dexomed-100 dark:bg-dexomed-800 rounded-xl p-8">
                                <h3 class="text-2xl font-bold mb-4 text-dexomed-700 dark:text-dexomed-300">Our Core
                                    Focus Areas</h3>
                                <ul class="space-y-3">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Medical equipment service and
                                            maintenance</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Precision calibration
                                            services</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Supply of medical equipment and
                                            consumables</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Laboratory construction and
                                            systems development</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Technical training and
                                            consultancy</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Mission, Vision & Values -->
                <section class="py-20 section-with-bg" style="background-image: url('Img/services.png')">
                    <div class="section-overlay"></div>
                    <div class="section-content">
                        <div class="page-container px-6">
                            <div class="text-center mb-16">
                                <h2 class="text-3xl md:text-4xl font-bold text-white">Our Guiding Principles</h2>
                                <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto">
                                    The foundation of our success lies in our commitment to excellence, integrity, and
                                    customer satisfaction.
                                </p>
                            </div>

                            <div class="grid md:grid-cols-3 gap-8">

                            <!-- Vision -->
                                <div
                                    class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/The-Role-of-High-Quality-Medical.jpg')"></div>
                                    <div class="relative z-10">
                                        <div class="about-card-icon">
                                            <i class="fas fa-award"></i>
                                        </div>
                                        <div class="about-card-content">
                                            <h4 class="text-xl font-bold mb-4">Our Vision</h4>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                To be Africa’s leading partner in biomedical technology, quality systems, and health innovation, driving excellence, reliability, and sustainability in healthcare delivery.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mission -->
                                <div
                                    class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/66c239e5a8b687fd51bc8523_AdobeStock 338447101.jpg')">
                                    </div>
                                    <div class="relative z-10">
                                        <div class="about-card-icon">
                                            <i class="fas fa-crosshairs"></i>
                                        </div>
                                        <div class="about-card-content">
                                            <h4 class="text-xl font-bold mb-4">Our Mission</h4>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                To empower healthcare and research institutions through high-quality biomedical engineering services, reliable equipment supply, and innovative health management systems that enhance accuracy, efficiency, and patient safety.
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <!-- Values -->
                                <div
                                    class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/medical_equipment.jpg')"></div>
                                    <div class="relative z-10">
                                        <div class="about-card-icon">
                                            <i class="fas fa-handshake"></i>
                                        </div>
                                        <div class="about-card-content">
                                            <h4 class="text-xl font-bold mb-4">Our Values</h4>
                                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                                We are guided by a set of core values that define our approach to
                                                business and customer service:
                                            </p>
                                            <ul class="text-gray-600 dark:text-gray-300 text-sm space-y-2">
                                                <li class="flex items-start">
                                                    <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                                    <span>Integrity and transparency</span>
                                                </li>
                                                <li class="flex items-start">
                                                    <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                                    <span>Professionalism and expertise</span>
                                                </li>
                                                <li class="flex items-start">
                                                    <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                                    <span>Innovation and continuous improvement</span>
                                                </li>
                                                <li class="flex items-start">
                                                    <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                                    <span>Customer focus and satisfaction</span>
                                                </li>
                                                <li class="flex items-start">
                                                    <i class="fas fa-check text-dexomed-500 mr-2 mt-0.5"></i>
                                                    <span>Teamwork and collaboration</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Company History -->
                <section class="py-20 section-with-bg"
                    style="background-image: url('Img/Healthcare-Data-Management-KMS-2.webp')">
                    <div class="section-overlay"></div>
                    <div class="section-content">
                        <div class="page-container px-6">
                            <div class="text-center mb-16">
                                <h2 class="text-3xl md:text-4xl font-bold text-white">Our Journey</h2>
                                <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto">
                                    From our humble beginnings to becoming a trusted partner for healthcare institutions
                                    across East Africa.
                                </p>
                            </div>

                            <div class="max-w-4xl mx-auto">
                                <div class="history-timeline">
                                    <!-- Timeline Item 1 -->
                                    <div class="timeline-item">
                                        <h3 class="text-xl font-bold mb-2 text-white">Company Establishment</h3>
                                        <p class="text-dexomed-300 mb-2">2015</p>
                                        <p class="text-gray-200">
                                            Dexomed Biologicals Group Ltd. was founded with a vision to provide
                                            specialized biomedical equipment services in Kenya.
                                        </p>
                                    </div>

                                    <!-- Timeline Item 2 -->
                                    <div class="timeline-item">
                                        <h3 class="text-xl font-bold mb-2 text-white">Expansion of Services</h3>
                                        <p class="text-dexomed-300 mb-2">2017</p>
                                        <p class="text-gray-200">
                                            Expanded our service portfolio to include comprehensive calibration services
                                            and medical equipment supply.
                                        </p>
                                    </div>

                                    <!-- Timeline Item 3 -->
                                    <div class="timeline-item">
                                        <h3 class="text-xl font-bold mb-2 text-white">Regional Presence</h3>
                                        <p class="text-dexomed-300 mb-2">2019</p>
                                        <p class="text-gray-200">
                                            Established partnerships and service networks across East Africa, extending
                                            our reach to multiple countries.
                                        </p>
                                    </div>

                                    <!-- Timeline Item 4 -->
                                    <div class="timeline-item">
                                        <h3 class="text-xl font-bold mb-2 text-white">Technology Advancement</h3>
                                        <p class="text-dexomed-300 mb-2">2021</p>
                                        <p class="text-gray-200">
                                            Implemented advanced diagnostic tools and training programs to enhance
                                            service quality and technical capabilities.
                                        </p>
                                    </div>

                                    <!-- Timeline Item 5 -->
                                    <div class="timeline-item">
                                        <h3 class="text-xl font-bold mb-2 text-white">Current Operations</h3>
                                        <p class="text-dexomed-300 mb-2">Present</p>
                                        <p class="text-gray-200">
                                            Serving over 500 clients with 24/7 emergency support and maintaining
                                            partnerships with leading medical equipment manufacturers.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Call to Action -->
                <section class="py-20 bg-dexomed-700 text-white">
                    <div class="page-container px-6 text-center">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Partner With Us</h2>
                        <p class="text-xl mb-8 max-w-2xl mx-auto">
                            Join the growing number of healthcare institutions that trust Dexomed Biologicals Group for
                            their medical equipment service needs.
                        </p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="#" onclick="showPage('home'); scrollToSection('contact')"
                                class="inline-block px-6 py-3 rounded-md bg-white text-dexomed-700 font-medium shadow hover:bg-gray-100 transition-colors">
                                Contact Us Today
                            </a>
                            <a href="#" onclick="showPage('home'); scrollToSection('services')"
                                class="inline-block px-6 py-3 rounded-md border border-white text-white font-medium hover:bg-white hover:text-dexomed-700 transition-colors">
                                Explore Our Services
                            </a>
                        </div>
                    </div>
                </section>
            </div>
            <!-- End About Us Page -->

            <!-- Health Management Systems Page -->
            <div id="health-systems-page" class="page-section">
                <!-- Health Systems Hero Section -->
                <section class="about-us-hero" style="background-image: url('Img/medical-technology-blog-banner-7.jpg')">
                    <div class="page-container px-6 text-center">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6">Health Management Systems Development</h1>
                        <p class="text-xl md:text-2xl max-w-3xl mx-auto">
                            Comprehensive digital solutions to streamline healthcare operations, enhance patient care, and ensure regulatory compliance.
                        </p>
                    </div>
                </section>

                <!-- Health Systems Overview -->
                <section class="about-us-content bg-white dark:bg-dexomed-900">
                    <div class="page-container px-6">
                        <div class="grid md:grid-cols-2 gap-12 items-center">
                            <div>
                                <h2 class="text-3xl md:text-4xl font-bold mb-6">Comprehensive Health Systems Solutions</h2>
                                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
                                    At Dexomed Biologicals Group, we develop and implement cutting-edge health management systems that transform healthcare delivery. Our solutions are designed to optimize operations, improve patient outcomes, and ensure compliance with healthcare regulations.
                                </p>
                                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
                                    We understand that modern healthcare facilities require integrated systems that can handle complex data, streamline workflows, and provide actionable insights. Our team of healthcare IT specialists works closely with medical professionals to create solutions that address real-world challenges.
                                </p>
                                <p class="text-lg text-gray-600 dark:text-gray-300">
                                    From electronic health records to laboratory information management systems, our solutions are scalable, secure, and designed to grow with your organization. We prioritize user experience, data security, and interoperability to ensure seamless integration with existing infrastructure.
                                </p>
                            </div>
                            <div class="bg-dexomed-100 dark:bg-dexomed-800 rounded-xl p-8">
                                <h3 class="text-2xl font-bold mb-4 text-dexomed-700 dark:text-dexomed-300">Key System Features</h3>
                                <ul class="space-y-3">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Electronic Health Records (EHR)</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Laboratory Information Management (LIMS)</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Hospital Management Systems</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Pharmacy Management</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Equipment Maintenance Tracking</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-dexomed-500 mr-3 mt-1"></i>
                                        <span class="text-gray-700 dark:text-gray-300">Data Analytics & Reporting</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-gray-700 dark:text-gray-300">& Many More</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Health Systems Services -->
                <section class="py-20 section-with-bg" style="background-image: url('Img/Healthcare-Data-Management-KMS-2.webp')">
                    <div class="section-overlay"></div>
                    <div class="section-content">
                        <div class="page-container px-6">
                            <div class="text-center mb-16">
                                <h2 class="text-3xl md:text-4xl font-bold text-white">Our Health Systems Services</h2>
                                <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto">
                                    Comprehensive digital solutions tailored to meet the unique needs of healthcare providers.
                                </p>
                            </div>

                            <div class="grid md:grid-cols-3 gap-8">
                                <!-- EHR System -->
                                <div class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/services.png')"></div>
                                    <div class="relative z-10">
                                        <div class="about-card-icon">
                                            <i class="fas fa-file-medical"></i>
                                        </div>
                                        <div class="about-card-content">
                                            <h4 class="text-xl font-bold mb-4">Electronic Health Records</h4>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                Comprehensive EHR systems that centralize patient information, streamline clinical workflows, and improve care coordination across departments.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- LIMS -->
                                <div class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/services.png')">
                                    </div>
                                    <div class="relative z-10">
                                        <div class="about-card-icon">
                                            <i class="fas fa-flask"></i>
                                        </div>
                                        <div class="about-card-content">
                                            <h4 class="text-xl font-bold mb-4">Laboratory Information Management</h4>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                Advanced LIMS solutions that optimize laboratory workflows, manage samples, track results, and ensure regulatory compliance.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Hospital Management -->
                                <div class="about-card bg-white dark:bg-dexomed-800 rounded-xl p-8 shadow-md relative overflow-hidden">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0 bg-cover bg-center opacity-30"
                                        style="background-image: url('Img/services.png')"></div>
                                    <div class="relative z-10">
                                        <div class="about-card-icon">
                                            <i class="fas fa-hospital"></i>
                                        </div>
                                        <div class="about-card-content">
                                            <h4 class="text-xl font-bold mb-4">Hospital Management Systems</h4>
                                            <p class="text-gray-600 dark:text-gray-300">
                                                Integrated systems that manage patient admissions, billing, inventory, and staff scheduling for efficient hospital operations.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Implementation Process -->
                <section class="py-20 bg-white dark:bg-dexomed-900 " >
                    <div class="page-container px-6">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-bold mb-6">Our Implementation Process</h2>
                            <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                                We follow a structured approach to ensure successful system implementation and adoption.
                            </p>
                        </div>

                        <div class="max-w-4xl mx-auto">
                            <div class="history-timeline">
                                <!-- Step 1 -->
                                <div class="timeline-item">
                                    <h3 class="text-xl font-bold mb-2">Needs Assessment & Planning</h3>
                                    <p class="text-dexomed-500 mb-2">Phase 1</p>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        We begin with a comprehensive assessment of your current workflows, challenges, and objectives to design a solution that meets your specific needs.
                                    </p>
                                </div>

                                <!-- Step 2 -->
                                <div class="timeline-item">
                                    <h3 class="text-xl font-bold mb-2">System Design & Customization</h3>
                                    <p class="text-dexomed-500 mb-2">Phase 2</p>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        Our team designs and customizes the system based on your requirements, ensuring it integrates seamlessly with your existing infrastructure.
                                    </p>
                                </div>

                                <!-- Step 3 -->
                                <div class="timeline-item">
                                    <h3 class="text-xl font-bold mb-2">Implementation & Integration</h3>
                                    <p class="text-dexomed-500 mb-2">Phase 3</p>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        We implement the system with minimal disruption to your operations, ensuring data migration and integration with existing systems.
                                    </p>
                                </div>

                                <!-- Step 4 -->
                                <div class="timeline-item">
                                    <h3 class="text-xl font-bold mb-2">Training & Support</h3>
                                    <p class="text-dexomed-500 mb-2">Phase 4</p>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        Comprehensive training for your staff and ongoing technical support to ensure smooth adoption and optimal system utilization.
                                    </p>
                                </div>

                                <!-- Step 5 -->
                                <div class="timeline-item">
                                    <h3 class="text-xl font-bold mb-2">Continuous Improvement</h3>
                                    <p class="text-dexomed-500 mb-2">Phase 5</p>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        Regular system updates, performance monitoring, and feature enhancements to ensure your system evolves with your needs.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Call to Action -->
                <section class="py-20 bg-dexomed-700 text-white">
                    <div class="page-container px-6 text-center">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Transform Your Healthcare Operations</h2>
                        <p class="text-xl mb-8 max-w-2xl mx-auto">
                            Ready to implement a comprehensive health management system that will streamline your operations and improve patient care?
                        </p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="#" onclick="showPage('home'); scrollToSection('contact')"
                                class="inline-block px-6 py-3 rounded-md bg-white text-dexomed-700 font-medium shadow hover:bg-gray-100 transition-colors">
                                Request Consultation
                            </a>
                            <a href="#" onclick="showPage('home')"
                                class="inline-block px-6 py-3 rounded-md border border-white text-white font-medium hover:bg-white hover:text-dexomed-700 transition-colors">
                                Back to Home
                            </a>
                        </div>
                    </div>
                </section>
            </div>
            <!-- End Health Management Systems Page -->
        </main>

        <!-- FOOTER -->
        <footer class="bg-dexomed-800 text-white">
            <div class="page-container px-6 py-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <h5 class="text-lg font-bold mb-4">Dexomed Biologicals Group</h5>
                        <p class="text-gray-300 text-sm">
                            Specializing in service, maintenance, and calibration of medical and biological equipment to
                            enhance healthcare delivery in East Africa.
                        </p>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-4">Quick Links</h5>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li><a href="#" class="hover:text-white transition-colors"
                                    onclick="showPage('home')">Home</a></li>
                            <li><a href="#" class="hover:text-white transition-colors"
                                    onclick="showPage('about-us')">About Us</a></li>
                            <li><a href="#" class="hover:text-white transition-colors"
                                    onclick="showPage('health-systems')">Health Systems</a></li>
                            <li><a href="#" class="hover:text-white transition-colors"
                                    onclick="showPage('home'); scrollToSection('services')">Services</a></li>
                            <li><a href="#" class="hover:text-white transition-colors"
                                    onclick="showPage('home'); scrollToSection('contact')">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-4">Services</h5>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li><a href="#" class="hover:text-white transition-colors"
                                    onclick="showPage('home'); scrollToSection('services')">Equipment Service &
                                    Maintenance</a></li>
                            <li><a href="#" class="hover:text-white transition-colors"
                                    onclick="showPage('home'); scrollToSection('calibration')">Calibration Services</a>
                            </li>
                            <li><a href="#" class="hover:text-white transition-colors"
                                    onclick="showPage('home'); scrollToSection('supplies')">Medical Equipment &
                                    Supplies</a></li>
                            <li><a href="#" class="hover:text-white transition-colors"
                                    onclick="showPage('health-systems')">Health Management Systems</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-4">Contact Info</h5>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li>Nairobi, Kenya</li>
                            <li>+254 705953914</li>
                            <li>info@dexomed.co.ke</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-8 pt-6 border-t border-dexomed-700 text-center text-sm text-gray-300">
                    <p>&copy; {{ date('Y') }} Dexomed Biologicals Group Ltd. — All rights reserved.</p>
                    <p class="mt-2">Registered Limited Company in Kenya</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Fixed Dark/Light Mode Toggle -->
    <div id="fixedThemeToggle" class="fixed-theme-toggle">
        <div class="fixed-theme-toggle-switch">
            <i class="fas fa-sun fixed-theme-toggle-icon sun"></i>
            <i class="fas fa-moon fixed-theme-toggle-icon moon"></i>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Page Navigation
        function showPage(pageId) {
            // Hide all pages
            document.querySelectorAll('.page-section').forEach(page => {
                page.classList.remove('active');
            });

            // Show the selected page
            document.getElementById(`${pageId}-page`).classList.add('active');

            // Update navigation active state
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });

            // Set the active navigation link
            if (pageId === 'home') {
                document.querySelector('.nav-link[onclick="showPage(\'home\')"]').classList.add('active');
            } else if (pageId === 'about-us') {
                document.querySelector('.nav-link[onclick="showPage(\'about-us\')"]').classList.add('active');
            } else if (pageId === 'health-systems') {
                document.querySelector('.nav-link[onclick="showPage(\'health-systems\')"]').classList.add('active');
            }

            // Close mobile menu if open
            document.getElementById('mobileNav').classList.add('hidden');

            // Scroll to top
            window.scrollTo(0, 0);
        }

        function scrollToSection(sectionId) {
            showPage('home');
            setTimeout(() => {
                const element = document.getElementById(sectionId);
                if (element) {
                    const offsetTop = element.offsetTop - 100;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }, 100);
        }

        // Mobile Navigation Toggle
        const mobileNavBtn = document.getElementById('mobileNavBtn');
        const mobileNav = document.getElementById('mobileNav');
        if (mobileNavBtn) {
            mobileNavBtn.addEventListener('click', () => {
                mobileNav.classList.toggle('hidden');
            });
        }

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

        // Carousel Functionality
        const carouselSlides = document.querySelectorAll('.carousel-slide');
        const carouselIndicators = document.querySelectorAll('.carousel-indicator');
        const carouselPrev = document.querySelector('.carousel-prev');
        const carouselNext = document.querySelector('.carousel-next');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            // Reset all slides and indicators
            carouselSlides.forEach(slide => slide.classList.remove('active'));
            carouselIndicators.forEach(indicator => indicator.classList.remove('active'));

            // Show the selected slide and indicator
            carouselSlides[index].classList.add('active');
            carouselIndicators[index].classList.add('active');
            currentSlide = index;

            // Reset the loading animation
            const loadingBars = document.querySelectorAll('.loading-progress');
            loadingBars.forEach(bar => {
                bar.style.width = '0%';
                void bar.offsetWidth; // Trigger reflow
                if (bar.parentElement.parentElement.classList.contains('active')) {
                    bar.style.width = '100%';
                }
            });
        }

        function nextSlide() {
            let next = currentSlide + 1;
            if (next >= carouselSlides.length) next = 0;
            showSlide(next);
        }

        function prevSlide() {
            let prev = currentSlide - 1;
            if (prev < 0) prev = carouselSlides.length - 1;
            showSlide(prev);
        }

        // Initialize carousel
        function initCarousel() {
            // Set up automatic sliding
            slideInterval = setInterval(nextSlide, 5000);

            // Add event listeners to navigation buttons
            if (carouselPrev) carouselPrev.addEventListener('click', prevSlide);
            if (carouselNext) carouselNext.addEventListener('click', nextSlide);

            // Add event listeners to indicators
            carouselIndicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    clearInterval(slideInterval);
                    showSlide(index);
                    slideInterval = setInterval(nextSlide, 5000);
                });
            });

            // Pause carousel on hover
            const carouselContainer = document.querySelector('.carousel-container');
            if (carouselContainer) {
                carouselContainer.addEventListener('mouseenter', () => {
                    clearInterval(slideInterval);
                });
                carouselContainer.addEventListener('mouseleave', () => {
                    slideInterval = setInterval(nextSlide, 5000);
                });
            }
        }

        // Animated Counter for Stats
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start);
                }
            }, 16);
        }

        // Initialize counters when they come into view
        function initCounters() {
            const counters = document.querySelectorAll('.counter');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = parseInt(entry.target.getAttribute('data-target'));
                        animateCounter(entry.target, target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => {
                observer.observe(counter);
            });
        }

        // Active Navigation Link on Scroll
        function setActiveNavLink() {
            // Only set active nav links on home page
            if (!document.getElementById('home-page').classList.contains('active')) return;

            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');

            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;
                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('onclick') && link.getAttribute('onclick').includes(`scrollToSection('${currentSection}')`)) {
                    link.classList.add('active');
                }
            });

            // Always keep Home link active if we're at the top
            if (scrollY < 100) {
                document.querySelector('.nav-link[onclick="showPage(\'home\')"]').classList.add('active');
            }
        }

        // Responsive JavaScript enhancements
        function enhanceResponsiveness() {
            // Adjust carousel height based on viewport
            function adjustCarouselHeight() {
                const carousel = document.querySelector('.carousel-container');
                if (carousel && window.innerWidth < 768) {
                    carousel.style.height = '400px';
                } else if (carousel) {
                    carousel.style.height = '600px';
                }
            }

            // Adjust grid layouts for mobile
            function adjustGridLayouts() {
                const aboutCards = document.querySelectorAll('.about-card');
                if (aboutCards.length > 0 && window.innerWidth < 768) {
                    aboutCards.forEach(card => {
                        card.style.marginBottom = '20px';
                    });
                }
            }

            // Initialize responsive adjustments
            adjustCarouselHeight();
            adjustGridLayouts();

            // Add resize listener
            window.addEventListener('resize', () => {
                adjustCarouselHeight();
                adjustGridLayouts();
            });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            initTheme();
            initCarousel();
            initCounters();
            enhanceResponsiveness();
            window.addEventListener('scroll', setActiveNavLink);
        });
    </script>
</body>

</html>