<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dexomed Biologicals Group - Client Dashboard</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link rel="icon" href="{{ asset('Img/Logo.jpg') }}" type="image/jpeg">
    <link rel="shortcut icon" href="{{ asset('Img/Logo.jpg') }}" type="image/jpeg">
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
                            50: '#181818ff',
                            100: '#1b1b1bff',
                            500: '#e8a00f',
                            600: '#e8a00f',
                            700: '#e8a00f',
                            800: '#1a1919ff',
                            900: '#1a1a1a',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.7s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
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
            --brand-dark: #101010ff;
            --accent: #f6911e;
        }

        html, body {
            font-family: "Instrument Sans", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            scroll-behavior: smooth;
            background-color: #151515ff;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
            background-image: linear-gradient(rgba(9, 9, 9, 0.08), rgba(9, 9, 9, 0.15)), 
                              url('Img/medical_equipment.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 150px;
            background:  rgba(204, 204, 204, 0.22);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            z-index: 100;
            display: flex;
            flex-direction: column;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar.collapsed .sidebar-header {
            justify-content: center;
            padding: 20px 10px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sidebar.collapsed .logo-text {
            display: none;
        }

        .sidebar.collapsed .toggle-btn i {
            transform: rotate(180deg);
        }

        .user-profile {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar.collapsed .user-profile {
            padding: 15px 5px;
        }

        .user-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e8a00f;
            margin: 0 auto 8px;
        }

        .sidebar.collapsed .user-avatar {
            width: 40px;
            height: 40px;
        }

        .sidebar.collapsed .user-info {
            display: none;
        }

        .status-indicator {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            text-color: #000;
            background: #10b981;
            margin-right: 5px;
        }

        .sidebar-menu {
            flex: 1;
            padding: 15px 0;
            overflow-y: auto;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            color: #000000ff;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-size: 14px;
            cursor: pointer;
        }

        .menu-item:hover, .menu-item.active {
            background: #f9fafb;
            color: #e8a00f;
            border-left-color: #e8a00f;
        }

        .menu-item i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar.collapsed .menu-item span {
            display: none;
        }

        .sidebar.collapsed .menu-item {
            justify-content: center;
            padding: 12px 0;
        }

        .sidebar.collapsed .menu-item i {
            margin-right: 0;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .header {
            background:  rgba(204, 204, 204, 0.22);
            backdrop-filter: blur(10px);
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 50;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: #f9fafb;
            border-radius: 8px;
            padding: 8px 15px;
            width: 400px;
        }

        .search-bar input {
            background: transparent;
            border: none;
            outline: none;
            width: 100%;
            padding: 0 10px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .action-btn {
            position: relative;
            background: #f9fafb;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: #e8a00f;
            color: white;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .user-menu:hover {
            background: #f9fafb;
        }

        .user-avatar-small {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }


        .user-menu {
            display: flex;
            align-items: center;
            position: relative;
            cursor: pointer;
            gap: 6px;
        }

        .user-avatar-small {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e8a00f; 
        }

        /* Dropdown Container */
        #dropdownMenu {
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 8px;
            width: 190px;
            background-color: #9a9a9a95;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            overflow: hidden;
            z-index: 50;
        }

        /* Dropdown Links */
        #dropdownMenu a {
            display: block;
            padding: 10px 14px;
            font-size: 14px;
            color: #333;
            text-decoration: none;
            transition: background 0.2s ease;
        }

        /* Hover effect */
        #dropdownMenu a:hover {
            background-color: #f5f5f5;
            color: #e8a00f; /* theme orange */
        }

        /* Logout Button (inside form) */
        #dropdownMenu form {
            margin: 0;
        }

        #dropdownMenu form a {
            color: #c0392b; /* red tone for logout */
        }

        #dropdownMenu form a:hover {
            background-color: #ffecec;
            color: #a93226;
        }

        /* Content Area */
        .content {
            flex: 1;
            padding: 25px;
            overflow-y: auto;
            background: transparent;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1f2937;
        }

        /* Dashboard Cards */
        .card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
        }

        .card-action {
            color: #e8a00f;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 20px;
        }

        .stat-info {
            flex: 1;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
        }

        .stat-label {
            font-size: 14px;
            color: #6b7280;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
            gap: 20px;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Activity Feed */
        .activity-item {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            background: #f3f4f6;
            color: #e8a00f;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 500;
            margin-bottom: 4px;
        }

        .activity-time {
            font-size: 12px;
            color: #9ca3af;
        }

        /* Equipment Health */
        .health-indicator {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .health-bar {
            flex: 1;
            height: 8px;
            background: #f3f4f6;
            border-radius: 4px;
            overflow: hidden;
            margin: 0 10px;
        }

        .health-progress {
            height: 100%;
            border-radius: 4px;
        }

        .health-label {
            font-size: 14px;
            font-weight: 500;
            width: 120px;
        }

        /* Tables */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
            color: #6b7280;
            font-size: 14px;
        }

        .table td {
            padding: 12px 15px;
            border-bottom: 1px solid #f3f4f6;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-operational {
            background: #d1fae5;
            color: #065f46;
        }

        .status-maintenance {
            background: #fef3c7;
            color: #92400e;
        }

        .status-attention {
            background: #fee2e2;
            color: #991b1b;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            outline: none;
        }

        .btn-primary {
            background: #e8a00f;
            color: white;
        }

        .btn-primary:hover {
            background: #d1910e;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #d1d5db;
            color: #4b5563;
        }

        .btn-outline:hover {
            background: #f9fafb;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 14px;
        }

        /* Enhanced Calendar Styles */
        .calendar-container {
            width: 100%;
        }

        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 0 10px;
        }

        .calendar-nav {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .calendar-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            background: transparent;
            border: none;
        }

        .calendar-day {
            background: white;
            padding: 12px 8px;
            min-height: 100px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .calendar-day:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .calendar-day.header {
            background: #f8fafc;
            font-weight: 600;
            text-align: center;
            min-height: auto;
            padding: 12px 8px;
            box-shadow: none;
            font-size: 14px;
            color: #6b7280;
        }

        .calendar-day.header:hover {
            transform: none;
            box-shadow: none;
        }

        .calendar-day.other-month {
            color: #9ca3af;
            background: #f9fafb;
        }

        .calendar-day.today {
            background: #fff8e1;
            border: 2px solid #e8a00f;
        }

        .day-number {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .calendar-event {
            background: #e8a00f;
            color: white;
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 11px;
            margin-top: 4px;
            cursor: pointer;
            line-height: 1.2;
        }

        .calendar-event.maintenance {
            background: #3b82f6;
        }

        .calendar-event.calibration {
            background: #10b981;
        }

        .calendar-event.urgent {
            background: #ef4444;
        }

        .event-count {
            position: absolute;
            top: 8px;
            right: 8px;
            background: #e8a00f;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Content Sections */
        .content-section {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
        }

        .content-section.active {
            display: block;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.3s ease-out;
        }

        .dark .modal-content {
            background: #1f2937;
            color: #f9fafb;
        }

        .modal-header {
            padding: 20px 24px 0;
            display: flex;
            justify-content: between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 16px;
        }

        .dark .modal-header {
            border-bottom-color: #374151;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
        }

        .dark .modal-title {
            color: #f9fafb;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: #374151;
        }

        .dark .modal-close {
            color: #9ca3af;
        }

        .dark .modal-close:hover {
            color: #d1d5db;
        }

        .modal-body {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #374151;
        }

        .dark .form-label {
            color: #d1d5db;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        .dark .form-input, .dark .form-select, .dark .form-textarea {
            background-color: #374151;
            border-color: #4b5563;
            color: #f9fafb;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #e8a00f;
            box-shadow: 0 0 0 3px rgba(232, 160, 15, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .modal-footer {
            padding: 0 24px 24px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                height: 100%;
                transform: translateX(-100%);
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 99;
                display: none;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
            
            .mobile-menu-btn {
                display: flex;
            }
            
            .search-bar {
                width: 200px;
            }

            .grid-2 {
                grid-template-columns: 1fr;
            }

            .calendar-day {
                min-height: 80px;
                padding: 8px 4px;
            }

            .calendar-event {
                font-size: 10px;
                padding: 2px 4px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .stats-grid, .grid-2, .grid-3 {
                grid-template-columns: 1fr;
            }
            
            .header {
                padding: 15px;
            }
            
            .search-bar {
                display: none;
            }
            
            .content {
                padding: 15px;
            }

            .calendar-grid {
                gap: 4px;
            }

            .calendar-day {
                min-height: 70px;
                padding: 6px 2px;
                font-size: 12px;
            }

            .calendar-event {
                font-size: 9px;
                padding: 1px 3px;
            }

            .day-number {
                font-size: 12px;
            }

            .modal-content {
                width: 95%;
                margin: 20px;
            }
        }

        @media (max-width: 480px) {
            .calendar-day {
                min-height: 60px;
            }

            .event-count {
                width: 16px;
                height: 16px;
                font-size: 9px;
                top: 4px;
                right: 4px;
            }

            .modal-footer {
                flex-direction: column;
            }
        }

        /* Dark Mode Styles */
        .dark .sidebar {
            background: rgba(0, 0, 0, 0.95);
            color: #e5e7eb;
        }

        .dark .sidebar-header {
            border-bottom-color: #000000ff;
        }

        .dark .user-profile {
            border-bottom-color: #000000ff;
        }

        .dark .menu-item {
            color: #d1d5db;
        }

        .dark .menu-item:hover, .dark .menu-item.active {
            background: #000000ff;
        }

        .dark .header {
            background: rgba(26, 26, 26, 0.9);
            color: #e5e7eb;
        }

        .dark .search-bar {
            background: #000000ff;
        }

        .dark .search-bar input {
            color: #e5e7eb;
        }

        .dark .action-btn {
            background: rgba(0, 0, 0, 1)ff;
            color: #e5e7eb;
        }

        .dark .user-menu:hover {
            background: #000000ff;
        }

        .dark .content {
            background: transparent;
        }

        .dark .card, .dark .stat-card {
            background: rgba(26, 26, 26, 0.9);
            color: #e5e7eb;
        }

        .dark .card-title, .dark .stat-value {
            color: #e5e7eb;
        }

        .dark .stat-label {
            color: #000000ff;
        }

        .dark .activity-icon {
            background: #000000ff;
        }

        .dark .activity-item {
            border-bottom-color: #374151;
        }

        .dark .health-bar {
            background: #374151;
        }

        .dark .table th {
            color: #9ca3af;
            border-bottom-color: #374151;
        }

        .dark .table td {
            border-bottom-color: #374151;
            color: #e5e7eb;
        }

        .dark .calendar-day {
            background: #1a1a1a;
            color: #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .dark .calendar-day.header {
            background: #000000ff;
            color: #9ca3af;
        }

        .dark .calendar-day.other-month {
            color: #6b7280;
            background: #3a3a3aff;
        }

        .dark .calendar-day.today {
            background: #374151;
            border-color: #e8a00f;
        }

        .dark .btn-outline {
            border-color: #4b5563;
            color: #e5e7eb;
        }

        .dark .btn-outline:hover {
            background: #2a2a2a;
        }
.dark .action-btn {
    background: rgba(0, 0, 0, 0.8); /* Fixed syntax error */
    color: #e5e7eb;
}

.dark .user-menu:hover {
    background: rgba(0, 0, 0, 0.8); /* Fixed syntax error */
}

.dark .calendar-day.other-month {
    color: #6b7280;
    background: #3a3a3a; /* Fixed syntax error */
}

        /* Enhanced modal styling */
.modal-content {
    animation: slideUp 0.3s ease-out;
}

.status-badge, .priority-badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}

.status-operational, .priority-low {
    background: #d1fae5;
    color: #065f46;
}

.status-maintenance, .priority-medium {
    background: #fef3c7;
    color: #92400e;
}

.status-attention, .priority-high, .priority-urgent {
    background: #fee2e2;
    color: #991b1b;
}
    </style>
</head>

<body class="antialiased bg-gray-100 text-gray-800 dark:bg-dexomed-900 dark:text-gray-100">
    <div class="dashboard-container">
        <!-- Sidebar Overlay for Mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>
        
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <div class="flex-shrink-0 relative">
                        <img src="{{ asset('Img/Logo-removebg-preview.png') }}" 
                             alt="Dexomed Biologicals Group" 
                             class="h-12 w-auto rounded-md"
                             onerror="this.style.display='none';">
                    </div>
                </div>
                <button class="toggle-btn text-gray-500" id="toggleSidebar">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>
            
            <div class="sidebar-menu">
                <a href="#" class="menu-item active" data-section="dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="menu-item" data-section="equipment">
                    <i class="fas fa-microscope"></i>
                    <span>My Equipment</span>
                </a>
                <a href="#" class="menu-item" data-section="service-requests">
                    <i class="fas fa-tools"></i>
                    <span>Service Requests</span>
                </a>
                <a href="#" class="menu-item" data-section="calibration">
                    <i class="fas fa-ruler-combined"></i>
                    <span>Calibration</span>
                </a>
                <a href="#" class="menu-item" data-section="schedule">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Schedule</span>
                </a>
                <a href="#" class="menu-item" data-section="invoices">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Invoices</span>
                </a>
                <a href="#" class="menu-item" data-section="support">
                    <i class="fas fa-headset"></i>
                    <span>Support</span>
                </a>
                <a href="#" class="menu-item" data-section="settings">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
                <div class="mt-2">
                        <span class="status-indicator"></span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">Account Active</span>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="flex items-center">
                    <button class="mobile-menu-btn mr-4 md:hidden" id="mobileMenuBtn">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="search-bar">
                        <i class="fas fa-search text-gray-400"></i>
                        <input type="text" placeholder="Search equipment, services...">
                    </div>
                </div>
                
                <div class="header-actions">
                    <button class="action-btn" id="darkModeToggle">
                        <i class="fas fa-moon"></i>
                    </button>
                    
                    <div class="action-btn notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    
                    <button class="btn btn-primary btn-sm" id="newRequestBtn">
                        <i class="fas fa-plus mr-2"></i>
                        New Request
                    </button>
                    
                    <div class="user-menu relative">
                        <img 
        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=e8a00f&color=fff" 
        alt="{{ Auth::user()->name }} Avatar" 
        class="user-avatar-small cursor-pointer"
    >
                        <div class="card-header">
    <h2 class="card-title"> {{ Auth::user()->name }}!</h2>
</div>

                        <i class="fas fa-chevron-down text-gray-400 ml-2 cursor-pointer" 
                           onclick="document.getElementById('dropdownMenu').classList.toggle('hidden')"></i>

                        <!-- Dropdown Content -->
                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <div class="border-t border-gray-100"></div>
                            <form id="logoutForm" method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="#" 
       class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50" 
       onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
       Log Out
    </a>
</form>

                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content Sections -->
            <div class="content">
                <!-- Dashboard Section -->
                <div id="dashboard" class="content-section active">
                    <h1 class="page-title">Dashboard Overview</h1>
                    
                    <!-- Welcome Card -->
                    <div class="card slide-up">
    <div class="card-header">
        <h2 class="card-title">Welcome, {{ Auth::user()->name }}!</h2>
    </div>
    
    <p class="text-gray-600 dark:text-gray-300 mb-4" id="welcomeMessage">
        <i class="fas fa-spinner fa-spin mr-2"></i>
        Loading dashboard overview...
    </p>
    
    <div class="flex gap-3">
        <button class="btn btn-primary" onclick="navigateToServiceRequests()">
            <i class="fas fa-tools mr-2"></i>
            View Service Requests
        </button>
        <button class="btn btn-outline" id="addEquipmentBtn">
            <i class="fas fa-plus mr-2"></i>
            Add New Equipment
        </button>
    </div>
</div>
                    
                    <!-- Quick Stats -->
<div class="stats-grid">
    <div class="stat-card slide-up">
        <div class="stat-icon bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300">
            <i class="fas fa-microscope"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value" id="totalEquipmentStat">0</div>
            <div class="stat-label">Total Equipment</div>
        </div>
    </div>
    
    <div class="stat-card slide-up" style="animation-delay: 0.1s">
        <div class="stat-icon bg-yellow-100 text-yellow-600 dark:bg-yellow-900 dark:text-yellow-300">
            <i class="fas fa-tools"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value" id="activeServiceRequestsStat">0</div>
            <div class="stat-label">Active Service Requests</div>
        </div>
    </div>
    
    <div class="stat-card slide-up" style="animation-delay: 0.2s">
        <div class="stat-icon bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-300">
            <i class="fas fa-ruler-combined"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value" id="upcomingCalibrationsStat">0</div>
            <div class="stat-label">Upcoming Calibrations</div>
        </div>
    </div>
    
    <div class="stat-card slide-up" style="animation-delay: 0.3s">
        <div class="stat-icon bg-orange-100 text-orange-600 dark:bg-orange-900 dark:text-orange-300">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="stat-info">
            <div class="stat-value" id="underMaintenanceStat">0</div>
            <div class="stat-label">Under Maintenance</div>
        </div>
    </div>
</div>
                    
                    <div class="grid-2">
                        <!-- Recent Activity -->
<div class="card slide-up">
    <div class="card-header">
        <h2 class="card-title">Recent Activity</h2>
        <a href="#" class="card-action" onclick="navigateToActivityLog()">View All</a>
    </div>
    <div class="activity-feed" id="recentActivityFeed">
        <div class="activity-item">
            <div class="activity-icon">
                <i class="fas fa-spinner fa-spin"></i>
            </div>
            <div class="activity-content">
                <div class="activity-title">Loading recent activities...</div>
                <div class="activity-time">Please wait</div>
            </div>
        </div>
    </div>
</div>
                        
                        <!-- Equipment Health -->
<div class="card slide-up" style="animation-delay: 0.2s">
    <div class="card-header">
        <h2 class="card-title">Equipment Health Overview</h2>
        <a href="#" class="card-action" onclick="navigateToEquipment()">Details</a>
    </div>
    <div class="health-indicators">
        <div class="health-indicator">
            <span class="health-label">Operational</span>
            <div class="health-bar">
                <div class="health-progress bg-green-500" id="operationalHealthBar" style="width: 0%"></div>
            </div>
            <span class="text-sm font-medium" id="operationalCount">0</span>
        </div>
        <div class="health-indicator">
            <span class="health-label">Needs Attention</span>
            <div class="health-bar">
                <div class="health-progress bg-yellow-500" id="attentionHealthBar" style="width: 0%"></div>
            </div>
            <span class="text-sm font-medium" id="attentionCount">0</span>
        </div>
        <div class="health-indicator">
            <span class="health-label">Under Maintenance</span>
            <div class="health-bar">
                <div class="health-progress bg-red-500" id="maintenanceHealthBar" style="width: 0%"></div>
            </div>
            <span class="text-sm font-medium" id="maintenanceCount">0</span>
        </div>
    </div>
    
    <div class="mt-6">
        <h3 class="font-medium mb-3">Critical Alerts</h3>
        <div id="criticalAlertsContainer">
            <!-- Critical alerts will be populated dynamically -->
            <div class="text-center py-4 text-gray-500">
                <i class="fas fa-spinner fa-spin mr-2"></i>
                Loading alerts...
            </div>
        </div>
    </div>
</div>
                    </div>
                    
                    <!-- Equipment List -->
<div class="card slide-up mt-6">
    <div class="card-header">
        <h2 class="card-title">My Equipment</h2>
        <div class="flex gap-2">
            <button class="btn btn-outline btn-sm">
                <i class="fas fa-filter mr-1"></i>
                Filter
            </button>
            <button class="btn btn-primary btn-sm" id="addEquipmentBtn2">
                <i class="fas fa-plus mr-1"></i>
                Add Equipment
            </button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>Equipment Name</th>
                    <th>Model</th>
                    <th>Serial No.</th>
                    <th>Status</th>
                    <th>Last Service</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="dashboardEquipmentTableBody">
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <i class="fas fa-spinner fa-spin mr-2"></i>
                        Loading equipment...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
                </div>
                
                <!-- Equipment Section -->
<div id="equipment" class="content-section">
    <h1 class="page-title">My Equipment</h1>
    
    <div class="card slide-up">
        <div class="card-header">
            <h2 class="card-title">All Equipment</h2>
            <div class="flex gap-2">
                <button class="btn btn-outline btn-sm">
                    <i class="fas fa-filter mr-1"></i>
                    Filter
                </button>
                <button class="btn btn-primary btn-sm" id="addEquipmentBtn3">
                    <i class="fas fa-plus mr-1"></i>
                    Add Equipment
                </button>
            </div>
        </div>
        
        <!-- Equipment Stats -->
        <div class="stats-grid mb-6">
            <div class="stat-card">
                <div class="stat-icon bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300">
                    <i class="fas fa-microscope"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="totalEquipmentCount">0</div>
                    <div class="stat-label">Total Equipment</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-300">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="operationalEquipmentCount">0</div>
                    <div class="stat-label">Operational</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-yellow-100 text-yellow-600 dark:bg-yellow-900 dark:text-yellow-300">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="maintenanceEquipmentCount">0</div>
                    <div class="stat-label">Under Maintenance</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-red-100 text-red-600 dark:bg-red-900 dark:text-red-300">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="attentionEquipmentCount">0</div>
                    <div class="stat-label">Needs Attention</div>
                </div>
            </div>
        </div>
        
        <!-- Equipment Grid -->
        <div class="grid-3" id="equipmentGrid">
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-spinner fa-spin fa-2x mb-2"></i>
                <p>Loading equipment...</p>
            </div>
        </div>
    </div>
</div>
                
               <!-- Service Requests Section -->
<div id="service-requests" class="content-section">
    <h1 class="page-title">Service Requests</h1>
    
    <div class="card slide-up">
        <div class="card-header">
            <h2 class="card-title">Service Requests</h2>
            <div class="flex gap-2">
                <button class="btn btn-outline btn-sm">
                    <i class="fas fa-filter mr-1"></i>
                    Filter
                </button>
                <button class="btn btn-primary btn-sm" id="newRequestBtn2">
                    <i class="fas fa-plus mr-1"></i>
                    New Request
                </button>
            </div>
        </div>
        
        <!-- Service Request Stats -->
        <div class="stats-grid mb-6">
            <div class="stat-card">
                <div class="stat-icon bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300">
                    <i class="fas fa-list"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="totalRequestsCount">0</div>
                    <div class="stat-label">Total Requests</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-yellow-100 text-yellow-600 dark:bg-yellow-900 dark:text-yellow-300">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="pendingRequestsCount">0</div>
                    <div class="stat-label">Pending</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="inProgressRequestsCount">0</div>
                    <div class="stat-label">In Progress</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-300">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="completedRequestsCount">0</div>
                    <div class="stat-label">Completed</div>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Equipment</th>
                        <th>Issue Type</th>
                        <th>Problem Description</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Last Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="serviceRequestsTableBody">
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <i class="fas fa-spinner fa-spin mr-2"></i>
                            Loading service requests...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
                
               <!-- Calibration Section -->
<div id="calibration" class="content-section">
    <h1 class="page-title">Calibration</h1>
    
    <div class="card slide-up">
        <div class="card-header">
            <h2 class="card-title">Calibration Schedule</h2>
            <div class="flex gap-2">
                <button class="btn btn-outline btn-sm">
                    <i class="fas fa-filter mr-1"></i>
                    Filter
                </button>
                <button class="btn btn-primary btn-sm" id="scheduleCalibrationBtn">
                    <i class="fas fa-plus mr-1"></i>
                    Schedule Calibration
                </button>
            </div>
        </div>
        
        <!-- Calibration Stats -->
        <div class="stats-grid mb-6">
            <div class="stat-card">
                <div class="stat-icon bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="totalCalibrationsCount">0</div>
                    <div class="stat-label">Total Calibrations</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-yellow-100 text-yellow-600 dark:bg-yellow-900 dark:text-yellow-300">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="dueSoonCalibrationsCount">0</div>
                    <div class="stat-label">Due Soon</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-red-100 text-red-600 dark:bg-red-900 dark:text-red-300">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="overdueCalibrationsCount">0</div>
                    <div class="stat-label">Overdue</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-300">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <div class="stat-value" id="completedCalibrationsCount">0</div>
                    <div class="stat-label">Completed</div>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>Equipment</th>
                        <th>Calibration Type</th>
                        <th>Last Calibration</th>
                        <th>Next Due</th>
                        <th>Status</th>
                        <th>Technician</th>
                        <th>Certificate No.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="calibrationsTableBody">
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <i class="fas fa-spinner fa-spin mr-2"></i>
                            Loading calibrations...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
                
                <!-- Schedule Section -->
                <div id="schedule" class="content-section">
                    <h1 class="page-title">Schedule</h1>
                    
                    <div class="card slide-up">
                        <div class="card-header">
                            <h2 class="card-title">Maintenance Calendar</h2>
                            <div class="flex gap-2">
                                <button class="btn btn-outline btn-sm">
                                    <i class="fas fa-print mr-1"></i>
                                    Print
                                </button>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus mr-1"></i>
                                    Add Event
                                </button>
                            </div>
                        </div>
                        
                        <div class="calendar-container">
                            <div class="calendar-header">
                                <div class="calendar-nav">
                                    <button class="action-btn" id="prevMonth">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <h2 class="calendar-title" id="calendarTitle">October 2023</h2>
                                    <button class="action-btn" id="nextMonth">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                <button class="btn btn-primary btn-sm">
                                    Today
                                </button>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <!-- Calendar will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Invoices Section -->
                <div id="invoices" class="content-section">
                    <h1 class="page-title">Invoices</h1>
                    
                    <div class="card slide-up">
                        <div class="card-header">
                            <h2 class="card-title">Recent Invoices</h2>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-download mr-1"></i>
                                Export
                            </button>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium">INV-2023-128</td>
                                        <td>Oct 12, 2023</td>
                                        <td>$1,250.00</td>
                                        <td><span class="status-badge status-operational">Paid</span></td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">INV-2023-127</td>
                                        <td>Sep 28, 2023</td>
                                        <td>$850.00</td>
                                        <td><span class="status-badge status-operational">Paid</span></td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">INV-2023-126</td>
                                        <td>Sep 15, 2023</td>
                                        <td>$2,100.00</td>
                                        <td><span class="status-badge status-operational">Paid</span></td>
                                        <td>
                                            <button class="btn btn-outline btn-sm">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Support Section -->
                <div id="support" class="content-section">
                    <h1 class="page-title">Support</h1>
                    
                    <div class="grid-2">
                        <div class="card slide-up">
                            <div class="card-header">
                                <h2 class="card-title">Contact Support</h2>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Our support team is available 24/7 to assist you with any equipment issues or questions.
                            </p>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-dexomed-500 mr-3"></i>
                                    <div>
                                        <div class="font-medium">Phone Support</div>
                                        <div class="text-sm text-gray-500">+254 705953914</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-dexomed-500 mr-3"></i>
                                    <div>
                                        <div class="font-medium">Email Support</div>
                                        <div class="text-sm text-gray-500">support@dexomed.co.ke</div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-comment-dots text-dexomed-500 mr-3"></i>
                                    <div>
                                        <div class="font-medium">Live Chat</div>
                                        <div class="text-sm text-gray-500">Available 24/7</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button class="btn btn-primary w-full">
                                    <i class="fas fa-headset mr-2"></i>
                                    Start Live Chat
                                </button>
                            </div>
                        </div>
                        
                        <div class="card slide-up" style="animation-delay: 0.2s">
                            <div class="card-header">
                                <h2 class="card-title">Knowledge Base</h2>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Find answers to common questions and troubleshooting guides.
                            </p>
                            <div class="space-y-3">
                                <a href="#" class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <i class="fas fa-book text-dexomed-500 mr-3"></i>
                                    <div>
                                        <div class="font-medium">Equipment Manuals</div>
                                        <div class="text-sm text-gray-500">Download user manuals and guides</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <i class="fas fa-video text-dexomed-500 mr-3"></i>
                                    <div>
                                        <div class="font-medium">Training Videos</div>
                                        <div class="text-sm text-gray-500">Watch equipment tutorials</div>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                                    <i class="fas fa-question-circle text-dexomed-500 mr-3"></i>
                                    <div>
                                        <div class="font-medium">FAQs</div>
                                        <div class="text-sm text-gray-500">Frequently asked questions</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Settings Section -->
                <div id="settings" class="content-section">
                    <h1 class="page-title">Settings</h1>
                    
                    <div class="grid-2">
                        <div class="card slide-up" id="settingsSection">
    <div class="card-header">
        <h2 class="card-title">Account Settings</h2>
    </div>

    <div class="space-y-4">
        {{-- Full Name --}}
        <div class="relative">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
            <input 
                type="text" 
                name="name" 
                class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700" 
                value="{{ Auth::user()->name ?? '' }}"
            >
            @if(empty(Auth::user()->name))
                <div class="absolute inset-0 bg-gray-100 bg-opacity-50 flex items-center justify-center text-sm text-gray-600">
                    Empty field
                </div>
            @endif
        </div>

        {{-- Email --}}
        <div class="relative">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
            <input 
                type="email" 
                name="email" 
                class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700" 
                value="{{ Auth::user()->email ?? '' }}"
            >
            @if(empty(Auth::user()->email))
                <div class="absolute inset-0 bg-gray-100 bg-opacity-50 flex items-center justify-center text-sm text-gray-600">
                    Empty field
                </div>
            @endif
        </div>

        {{-- Phone --}}
        <div class="relative">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone</label>
            <input 
                type="tel" 
                name="phone" 
                class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700" 
                value="{{ Auth::user()->phone ?? '' }}"
            >
            @if(empty(Auth::user()->phone))
                <div class="absolute inset-0 bg-gray-100 bg-opacity-50 flex items-center justify-center text-sm text-gray-600">
                    Empty field
                </div>
            @endif
        </div>

        {{-- Role --}}
        <div class="relative">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Role</label>
            <input 
                type="text" 
                name="role" 
                class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-700" 
                value="{{ Auth::user()->role ?? '' }}" 
                disabled
            >
            @if(empty(Auth::user()->role))
                <div class="absolute inset-0 bg-gray-100 bg-opacity-50 flex items-center justify-center text-sm text-gray-600">
                    Empty field
                </div>
            @endif
        </div>

        <button class="btn btn-primary">
            Save Changes
        </button>
    </div>
</div>

                        
                        <div class="card slide-up" style="animation-delay: 0.2s">
                            <div class="card-header">
                                <h2 class="card-title">Notification Preferences</h2>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">Email Notifications</div>
                                        <div class="text-sm text-gray-500">Receive updates via email</div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-dexomed-500"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">SMS Alerts</div>
                                        <div class="text-sm text-gray-500">Critical alerts via SMS</div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-dexomed-500"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">Maintenance Reminders</div>
                                        <div class="text-sm text-gray-500">Upcoming maintenance alerts</div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-dexomed-500"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">Calibration Notices</div>
                                        <div class="text-sm text-gray-500">Upcoming calibration alerts</div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-dexomed-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Equipment Modal -->
<div id="addEquipmentModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Add New Equipment</h2>
            <button class="modal-close" id="closeEquipmentModal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="equipmentForm" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Equipment Name</label>
                    <input type="text" class="form-input" name="name" placeholder="Enter equipment name" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Model</label>
                        <input type="text" class="form-input" name="model" placeholder="Enter model" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Serial Number</label>
                        <input type="text" class="form-input" name="serial_number" placeholder="Enter serial number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Manufacturer</label>
                    <input type="text" class="form-input" name="manufacturer" placeholder="Enter manufacturer" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Purchase Date</label>
                        <input type="date" class="form-input" name="purchase_date" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Warranty Expiry</label>
                        <input type="date" class="form-input" name="warranty_expiry">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Location/Department</label>
                    <input type="text" class="form-input" name="location_department" placeholder="Enter location/department" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" required>
                        <option value="">Select status</option>
                        <option value="operational">Operational</option>
                        <option value="maintenance">Under Maintenance</option>
                        <option value="attention">Needs Attention</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Notes (Optional)</label>
                    <textarea class="form-textarea" name="notes" placeholder="Any additional notes about the equipment"></textarea>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" id="cancelEquipment">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submitEquipment">Add Equipment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Equipment Modal -->
<div id="editEquipmentModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Edit Equipment</h2>
            <button class="modal-close" id="closeEditEquipmentModal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="editEquipmentForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="equipment_id" id="edit_equipment_id">
                
                <div class="form-group">
                    <label class="form-label">Equipment Name</label>
                    <input type="text" class="form-input" name="name" id="edit_equipment_name" placeholder="Enter equipment name" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Model</label>
                        <input type="text" class="form-input" name="model" id="edit_equipment_model" placeholder="Enter model" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Serial Number</label>
                        <input type="text" class="form-input" name="serial_number" id="edit_equipment_serial" placeholder="Enter serial number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Manufacturer</label>
                    <input type="text" class="form-input" name="manufacturer" id="edit_equipment_manufacturer" placeholder="Enter manufacturer" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Purchase Date</label>
                        <input type="date" class="form-input" name="purchase_date" id="edit_equipment_purchase_date" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Warranty Expiry</label>
                        <input type="date" class="form-input" name="warranty_expiry" id="edit_equipment_warranty">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Location/Department</label>
                    <input type="text" class="form-input" name="location_department" id="edit_equipment_location" placeholder="Enter location/department" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" id="edit_equipment_status" required>
                        <option value="">Select status</option>
                        <option value="operational">Operational</option>
                        <option value="maintenance">Under Maintenance</option>
                        <option value="attention">Needs Attention</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Notes</label>
                    <textarea class="form-textarea" name="notes" id="edit_equipment_notes" placeholder="Any additional notes about the equipment"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="cancelEditEquipment">Cancel</button>
            <button type="button" class="btn btn-primary" id="updateEquipmentBtn">
                <i class="fas fa-save mr-2"></i>
                Update Equipment
            </button>
        </div>
    </div>
</div>




<!-- New Service Request Modal -->
<div id="newRequestModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">New Service Request</h2>
            <button class="modal-close" id="closeRequestModal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="requestForm">
                @csrf
                <div class="form-group">
                    <label class="form-label">Select Equipment</label>
                    <select class="form-select" name="equipment_id" required>
                        <option value="">Choose equipment...</option>
                        <!-- Options will be populated by JavaScript -->
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Issue Type</label>
                        <select class="form-select" name="issue_type" required>
                            <option value="">Select issue type...</option>
                            <option value="mechanical">Mechanical Failure</option>
                            <option value="electrical">Electrical Issue</option>
                            <option value="software">Software Problem</option>
                            <option value="calibration">Calibration Required</option>
                            <option value="performance">Performance Issue</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Priority</label>
                        <select class="form-select" name="priority" required>
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Problem Description</label>
                    <textarea class="form-textarea" name="problem_description" rows="4" placeholder="Please describe the issue in detail..." required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Preferred Service Date?</label>
                    <input type="datetime-local" class="form-input" name="issue_start_time" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Contact Person</label>
                    <input type="text" class="form-input" name="contact_person" placeholder="Enter contact person name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Contact Phone</label>
                    <input type="tel" class="form-input" name="contact_phone" placeholder="Enter contact phone number" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
    <button type="button" class="btn btn-outline" id="cancelRequest">Cancel</button>
    <!-- Remove the old submit button and replace with this -->
    <button type="button" class="btn btn-primary" id="newSubmitRequestBtn">
        <i class="fas fa-paper-plane mr-2"></i>
        Submit Service Request
    </button>
</div>
    </div>
</div>

<!-- Edit Service Request Modal -->
<div id="editRequestModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Edit Service Request</h2>
            <button class="modal-close" id="closeEditRequestModal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="editRequestForm">
                @csrf
                @method('PUT')
                <input type="hidden" name="request_id" id="edit_request_id">
                
                <div class="form-group">
                    <label class="form-label">Select Equipment</label>
                    <select class="form-select" name="equipment_id" id="edit_request_equipment" required>
                        <option value="">Choose equipment...</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Issue Type</label>
                        <select class="form-select" name="issue_type" id="edit_request_issue_type" required>
                            <option value="">Select issue type...</option>
                            <option value="mechanical">Mechanical Failure</option>
                            <option value="electrical">Electrical Issue</option>
                            <option value="software">Software Problem</option>
                            <option value="calibration">Calibration Required</option>
                            <option value="performance">Performance Issue</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Priority</label>
                        <select class="form-select" name="priority" id="edit_request_priority" required>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Problem Description</label>
                    <textarea class="form-textarea" name="problem_description" id="edit_request_description" rows="4" placeholder="Please describe the issue in detail..." required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Prefered service Date?</label>
                    <input type="datetime-local" class="form-input" name="issue_start_time" id="edit_request_start_time" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Contact Person</label>
                    <input type="text" class="form-input" name="contact_person" id="edit_request_contact_person" placeholder="Enter contact person name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Contact Phone</label>
                    <input type="tel" class="form-input" name="contact_phone" id="edit_request_contact_phone" placeholder="Enter contact phone number" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" id="edit_request_status" required>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="cancelEditRequest">Cancel</button>
            <button type="button" class="btn btn-primary" id="updateRequestBtn">
                <i class="fas fa-save mr-2"></i>
                Update Request
            </button>
        </div>
    </div>
</div>

    <!-- Schedule Calibration Modal -->
<div id="scheduleCalibrationModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Schedule Calibration</h2>
            <button class="modal-close" id="closeCalibrationModal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="calibrationForm" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Select Equipment</label>
                    <select class="form-select" name="equipment_id" required>
                        <option value="">Choose equipment...</option>
                        <!-- Options will be populated by JavaScript -->
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Calibration Type</label>
                        <select class="form-select" name="calibration_type" required>
                            <option value="">Select calibration type...</option>
                            <option value="routine">Routine Calibration</option>
                            <option value="preventive">Preventive Maintenance</option>
                            <option value="corrective">Corrective Calibration</option>
                            <option value="certification">Certification Calibration</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Priority</label>
                        <select class="form-select" name="priority" required>
                            <option value="routine">Routine</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Preferred Date</label>
                        <input type="date" class="form-input" name="preferred_date" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Preferred Time</label>
                        <select class="form-select" name="preferred_time" required>
                            <option value="morning">Morning (8 AM - 12 PM)</option>
                            <option value="afternoon">Afternoon (12 PM - 4 PM)</option>
                            <option value="evening">Evening (4 PM - 7 PM)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Special Requirements</label>
                    <textarea class="form-textarea" name="special_requirements" rows="3" placeholder="Any special requirements or notes..."></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Calibration Technician</label>
                    <input type="text" class="form-input" name="preferred_technician" placeholder="Preferred technician (if any)">
                </div>
                <div class="form-group">
                    <div class="flex items-center">
                        <input type="checkbox" id="urgentCalibration" name="is_urgent" value="1" class="mr-2">
                        <label for="urgentCalibration" class="form-label">Mark as urgent calibration</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="cancelCalibration">Cancel</button>
            <button type="button" class="btn btn-primary" id="newSubmitCalibrationBtn">
                <i class="fas fa-calendar-plus mr-2"></i>
                Schedule Calibration
            </button>
        </div>
    </div>
</div>

<!-- Edit Calibration Modal -->
<div id="editCalibrationModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Edit Calibration</h2>
            <button class="modal-close" id="closeEditCalibrationModal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="editCalibrationForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="calibration_id" id="edit_calibration_id">
                
                <div class="form-group">
                    <label class="form-label">Select Equipment</label>
                    <select class="form-select" name="equipment_id" id="edit_calibration_equipment" required>
                        <option value="">Choose equipment...</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Calibration Type</label>
                        <select class="form-select" name="calibration_type" id="edit_calibration_type" required>
                            <option value="">Select calibration type...</option>
                            <option value="routine">Routine Calibration</option>
                            <option value="preventive">Preventive Maintenance</option>
                            <option value="corrective">Corrective Calibration</option>
                            <option value="certification">Certification Calibration</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Priority</label>
                        <select class="form-select" name="priority" id="edit_calibration_priority" required>
                            <option value="routine">Routine</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Preferred Date</label>
                        <input type="date" class="form-input" name="preferred_date" id="edit_calibration_date" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Preferred Time</label>
                        <select class="form-select" name="preferred_time" id="edit_calibration_time" required>
                            <option value="morning">Morning (8 AM - 12 PM)</option>
                            <option value="afternoon">Afternoon (12 PM - 4 PM)</option>
                            <option value="evening">Evening (4 PM - 7 PM)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Special Requirements</label>
                    <textarea class="form-textarea" name="special_requirements" id="edit_calibration_requirements" rows="3" placeholder="Any special requirements or notes..."></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Calibration Technician</label>
                    <input type="text" class="form-input" name="preferred_technician" id="edit_calibration_technician" placeholder="Preferred technician (if any)">
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" id="edit_calibration_status" required>
                        <option value="scheduled">Scheduled</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                        <option value="due_soon">Due Soon</option>
                        <option value="overdue">Overdue</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="flex items-center">
                        <input type="checkbox" id="edit_urgent_calibration" name="is_urgent" value="1" class="mr-2">
                        <label for="edit_urgent_calibration" class="form-label">Mark as urgent calibration</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="cancelEditCalibration">Cancel</button>
            <button type="button" class="btn btn-primary" id="updateCalibrationBtn">
                <i class="fas fa-save mr-2"></i>
                Update Calibration
            </button>
        </div>
    </div>
</div>

<!-- View Service Request Details Modal -->
<div id="viewRequestModal" class="modal">
    <div class="modal-content" style="max-width: 700px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-tools mr-2"></i>
                Service Request Details
            </h2>
            <button class="modal-close" id="closeViewRequestModal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="space-y-6">
                <!-- Header Section -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold" id="view_request_id">Request #</h3>
                            <p class="text-gray-600 dark:text-gray-300" id="view_request_created">Created: </p>
                        </div>
                        <div class="text-right">
                            <span class="status-badge text-sm" id="view_request_status">Status</span>
                            <span class="priority-badge text-sm ml-2" id="view_request_priority">Priority</span>
                        </div>
                    </div>
                </div>

                <!-- Two Column Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Equipment</label>
                            <p class="text-gray-900 dark:text-white font-medium" id="view_equipment_name">-</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400" id="view_equipment_details">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Issue Type</label>
                            <p class="text-gray-900 dark:text-white" id="view_issue_type">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Preferred Service Date</label>
                            <p class="text-gray-900 dark:text-white" id="view_issue_start">-</p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Contact Person</label>
                            <p class="text-gray-900 dark:text-white" id="view_contact_person">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Contact Phone</label>
                            <p class="text-gray-900 dark:text-white" id="view_contact_phone">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Last Updated</label>
                            <p class="text-gray-900 dark:text-white" id="view_updated_at">-</p>
                        </div>
                    </div>
                </div>

                <!-- Problem Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Problem Description</label>
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                        <p class="text-gray-900 dark:text-white whitespace-pre-wrap" id="view_problem_description">-</p>
                    </div>
                </div>

                <!-- Timeline -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Request Timeline</label>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <div>
                                <p class="text-sm font-medium">Request Created</p>
                                <p class="text-xs text-gray-500" id="view_created_at">-</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                            <div>
                                <p class="text-sm font-medium">Last Updated</p>
                                <p class="text-xs text-gray-500" id="view_last_updated">-</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="closeViewRequestBtn">Close</button>
            <button type="button" class="btn btn-primary" id="editFromViewBtn">
                <i class="fas fa-edit mr-2"></i>
                Edit Request
            </button>
        </div>
    </div>
</div>


<!-- View Equipment Details Modal -->
<div id="viewEquipmentModal" class="modal">
    <div class="modal-content" style="max-width: 700px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-microscope mr-2"></i>
                Equipment Details
            </h2>
            <button class="modal-close" id="closeViewEquipmentModal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="space-y-6">
                <!-- Header Section -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold" id="view_equipment_name">Equipment Name</h3>
                            <p class="text-gray-600 dark:text-gray-300" id="view_equipment_model">Model: </p>
                        </div>
                        <div class="text-right">
                            <span class="status-badge text-sm" id="view_equipment_status">Status</span>
                            <div class="mt-2">
                                <span class="text-xs text-gray-500" id="view_equipment_serial">Serial: </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Two Column Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Manufacturer</label>
                            <p class="text-gray-900 dark:text-white font-medium" id="view_equipment_manufacturer">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Location/Department</label>
                            <p class="text-gray-900 dark:text-white" id="view_equipment_location">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Purchase Date</label>
                            <p class="text-gray-900 dark:text-white" id="view_equipment_purchase_date">-</p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Warranty Expiry</label>
                            <p class="text-gray-900 dark:text-white" id="view_equipment_warranty">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Equipment Type</label>
                            <p class="text-gray-900 dark:text-white" id="view_equipment_type">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Last Service</label>
                            <p class="text-gray-900 dark:text-white" id="view_equipment_last_service">-</p>
                        </div>
                    </div>
                </div>

                <!-- Equipment Health & Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Health Indicator -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Equipment Health</label>
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium">Operational Status</span>
                                <span class="text-sm" id="view_health_status">-</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                                <div class="h-2 rounded-full" id="view_health_bar"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Quick Stats</label>
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm">Service Requests:</span>
                                <span class="text-sm font-medium" id="view_service_requests">0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm">Calibrations:</span>
                                <span class="text-sm font-medium" id="view_calibrations">0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm">Uptime:</span>
                                <span class="text-sm font-medium" id="view_uptime">-</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Notes & Additional Information</label>
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                        <p class="text-gray-900 dark:text-white whitespace-pre-wrap" id="view_equipment_notes">No additional notes provided.</p>
                    </div>
                </div>

                <!-- Timeline -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Equipment Timeline</label>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <div>
                                <p class="text-sm font-medium">Equipment Registered</p>
                                <p class="text-xs text-gray-500" id="view_created_at">-</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                            <div>
                                <p class="text-sm font-medium">Last Updated</p>
                                <p class="text-xs text-gray-500" id="view_updated_at">-</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="closeViewEquipmentBtn">Close</button>
            <button type="button" class="btn btn-primary" id="editEquipmentFromViewBtn">
                <i class="fas fa-edit mr-2"></i>
                Edit Equipment
            </button>
        </div>
    </div>
</div>
<!-- View Calibration Details Modal -->
<div id="viewCalibrationModal" class="modal">
    <div class="modal-content" style="max-width: 700px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-ruler-combined mr-2"></i>
                Calibration Details
            </h2>
            <button class="modal-close" id="closeViewCalibrationModal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="space-y-6">
                <!-- Header Section -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold" id="view_calibration_equipment">Equipment Name</h3>
                            <p class="text-gray-600 dark:text-gray-300" id="view_calibration_type">Calibration Type: </p>
                        </div>
                        <div class="text-right">
                            <span class="status-badge text-sm" id="view_calibration_status">Status</span>
                            <div class="mt-2">
                                <span class="priority-badge text-sm" id="view_calibration_priority">Priority</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Two Column Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Preferred Date</label>
                            <p class="text-gray-900 dark:text-white font-medium" id="view_calibration_date">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Preferred Time</label>
                            <p class="text-gray-900 dark:text-white" id="view_calibration_time">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Last Calibration</label>
                            <p class="text-gray-900 dark:text-white" id="view_last_calibration">-</p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Next Due Date</label>
                            <p class="text-gray-900 dark:text-white" id="view_next_due">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Assigned Technician</label>
                            <p class="text-gray-900 dark:text-white" id="view_calibration_technician">-</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Certificate Number</label>
                            <p class="text-gray-900 dark:text-white" id="view_certificate_number">-</p>
                        </div>
                    </div>
                </div>

                <!-- Urgent Flag & Special Requirements -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Urgent Flag -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Calibration Priority</label>
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                            <div class="flex items-center">
                                <i class="fas fa-flag mr-3" id="view_urgent_icon"></i>
                                <div>
                                    <p class="font-medium" id="view_urgent_text">Standard Priority</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400" id="view_urgent_description">Routine calibration</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Calibration Timeline</label>
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm">Created:</span>
                                <span class="text-sm font-medium" id="view_created_at">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm">Last Updated:</span>
                                <span class="text-sm font-medium" id="view_updated_at">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm">Completed:</span>
                                <span class="text-sm font-medium" id="view_completed_at">-</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Special Requirements -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Special Requirements & Notes</label>
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                        <p class="text-gray-900 dark:text-white whitespace-pre-wrap" id="view_special_requirements">No special requirements specified.</p>
                    </div>
                </div>

                <!-- Status Timeline -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Calibration Status Timeline</label>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                            <div>
                                <p class="text-sm font-medium">Calibration Scheduled</p>
                                <p class="text-xs text-gray-500" id="view_scheduled_date">-</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                            <div>
                                <p class="text-sm font-medium">Last Status Update</p>
                                <p class="text-xs text-gray-500" id="view_status_updated">-</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" id="closeViewCalibrationBtn">Close</button>
            <button type="button" class="btn btn-primary" id="editCalibrationFromViewBtn">
                <i class="fas fa-edit mr-2"></i>
                Edit Calibration
            </button>
        </div>
    </div>
</div>

    <!-- JavaScript -->
   <script>
    // ========== DASHBOARD INITIALIZATION ==========
    
    document.addEventListener('DOMContentLoaded', function() {
        console.log('🚀 Dashboard initialized');
        
        // Initialize all functionality
        initializeSidebar();
        initializeNavigation();
        initializeModals();
        initializeCalendar();
        initializeAnimations();
        
        // Load initial data
        loadInitialData();
        
        // Set up responsive handling
        setupResponsiveHandling();
    });

    // ========== SIDEBAR FUNCTIONALITY ==========
    
    function initializeSidebar() {
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        // Toggle sidebar collapse/expand
        if (toggleSidebar && sidebar) {
            toggleSidebar.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
                console.log('Sidebar toggled:', sidebar.classList.contains('collapsed') ? 'collapsed' : 'expanded');
            });
        }
        
        // Mobile menu toggle
        if (mobileMenuBtn && sidebar && sidebarOverlay) {
            mobileMenuBtn.addEventListener('click', () => {
                sidebar.classList.add('mobile-open');
                sidebarOverlay.classList.add('active');
                console.log('Mobile menu opened');
            });
        }
        
        // Close mobile sidebar when clicking overlay
        if (sidebarOverlay && sidebar) {
            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.remove('mobile-open');
                sidebarOverlay.classList.remove('active');
                console.log('Mobile menu closed');
            });
        }
    }

    // ========== NAVIGATION FUNCTIONALITY ==========
    
    function initializeNavigation() {
        const menuItems = document.querySelectorAll('.menu-item');
        const contentSections = document.querySelectorAll('.content-section');
        
        console.log(`Found ${menuItems.length} menu items and ${contentSections.length} content sections`);
        
        // Initialize all sections as hidden except dashboard
        contentSections.forEach(section => {
            section.classList.remove('active');
        });
        
        // Show dashboard by default
        const dashboardSection = document.getElementById('dashboard');
        if (dashboardSection) {
            dashboardSection.classList.add('active');
            console.log('Dashboard section activated');
        }
        
        // Add click handlers to all menu items
        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetSectionId = this.getAttribute('data-section');
                console.log(`Menu clicked: ${targetSectionId}`);
                
                if (!targetSectionId) {
                    console.error('No data-section attribute found on menu item');
                    return;
                }
                
                // Update active menu item
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                
                // Hide all content sections
                contentSections.forEach(section => {
                    section.classList.remove('active');
                });
                
                // Show target section
                const targetSection = document.getElementById(targetSectionId);
                if (targetSection) {
                    targetSection.classList.add('active');
                    console.log(`Section activated: ${targetSectionId}`);
                    
                    // Update page title
                    updatePageTitle(targetSectionId);
                    
                    // Load data for this section
                    loadSectionData(targetSectionId);
                } else {
                    console.error(`Content section not found: ${targetSectionId}`);
                }
                
                // Close mobile sidebar if open
                closeMobileSidebar();
            });
        });
    }
    
    function navigateToServiceRequests() {
    // Find the service requests menu item and click it
    const serviceRequestsMenuItem = document.querySelector('.menu-item[data-section="service-requests"]');
    if (serviceRequestsMenuItem) {
        serviceRequestsMenuItem.click();
    }
}
    function updatePageTitle(section) {
        const titles = {
            'dashboard': 'Dashboard Overview',
            'equipment': 'My Equipment',
            'service-requests': 'Service Requests',
            'calibration': 'Calibration',
            'schedule': 'Schedule',
            'invoices': 'Invoices',
            'support': 'Support',
            'settings': 'Settings'
        };
        
        const pageTitle = document.querySelector('.page-title');
        if (pageTitle && titles[section]) {
            pageTitle.textContent = titles[section];
        }
    }
    
    function loadSectionData(section) {
        console.log(`Loading data for section: ${section}`);
        
        switch(section) {
            case 'dashboard':
                fetchDashboardStats();
                break;
            case 'equipment':
                fetchEquipmentData();
                break;
            case 'service-requests':
                fetchServiceRequests();
                break;
            case 'calibration':
                fetchCalibrations();
                break;
            default:
                console.log(`No data loading required for section: ${section}`);
        }
    }
    
    function loadInitialData() {
        console.log('Loading initial dashboard data...');
        fetchDashboardStats();
    }
    
    function closeMobileSidebar() {
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        
        if (window.innerWidth < 1024 && sidebar && sidebarOverlay) {
            sidebar.classList.remove('mobile-open');
            sidebarOverlay.classList.remove('active');
        }
    }

    // ========== DARK MODE FUNCTIONALITY ==========
    
    // Add this to your existing DOMContentLoaded event listener
document.addEventListener('DOMContentLoaded', () => {
    // Your existing initialization code...
    initTheme();
    initCarousel();
    initCounters();
    enhanceResponsiveness();
    window.addEventListener('scroll', setActiveNavLink);
    
    // Add dark mode initialization
    initializeDarkMode();
});

   // ========== DARK MODE FUNCTIONALITY ==========

function initializeDarkMode() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;
    
    console.log('🌙 Initializing dark mode...');
    
    // Check for saved theme preference or respect OS setting
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        html.classList.add('dark');
        console.log('🌙 Dark mode enabled (saved preference or OS setting)');
    } else {
        html.classList.remove('dark');
        console.log('☀️ Light mode enabled');
    }
    
    if (darkModeToggle) {
        console.log('✅ Dark mode toggle button found');
        
        // Remove any existing event listeners to avoid duplicates
        darkModeToggle.replaceWith(darkModeToggle.cloneNode(true));
        const freshToggle = document.getElementById('darkModeToggle');
        
        freshToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            
            if (html.classList.contains('dark')) {
                localStorage.theme = 'dark';
                console.log('🌙 Dark mode enabled manually');
            } else {
                localStorage.theme = 'light';
                console.log('☀️ Light mode enabled manually');
            }
            
            // Update the icon
            updateDarkModeIcon();
        });
        
        // Initial icon update
        updateDarkModeIcon();
        
    } else {
        console.error('❌ Dark mode toggle element not found');
    }
}

function updateDarkModeIcon() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;
    
    if (darkModeToggle) {
        const icon = darkModeToggle.querySelector('i');
        if (icon) {
            if (html.classList.contains('dark')) {
                icon.className = 'fas fa-sun';
                icon.title = 'Switch to light mode';
            } else {
                icon.className = 'fas fa-moon';
                icon.title = 'Switch to dark mode';
            }
        }
    }
}

// Enhanced dark mode initialization with better error handling
function initDarkModeWithFallback() {
    try {
        initializeDarkMode();
    } catch (error) {
        console.error('Error initializing dark mode:', error);
        
        // Fallback: simple dark mode toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        const html = document.documentElement;
        
        if (darkModeToggle) {
            darkModeToggle.addEventListener('click', () => {
                html.classList.toggle('dark');
                localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
            });
        }
    }
} 
   
    
   // ========== CALENDAR FUNCTIONALITY ==========

let currentDate = new Date();

function initializeCalendar() {
    const calendarGrid = document.getElementById('calendarGrid');
    const calendarTitle = document.getElementById('calendarTitle');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    
    if (!calendarGrid) return;
    
    // Navigation between months - PROPERLY FIXED VERSION
if (prevMonthBtn) {
    prevMonthBtn.addEventListener('click', () => {
        // CORRECT: Create new date with explicit month/day
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1);
        renderCalendar();
    });
}

if (nextMonthBtn) {
    nextMonthBtn.addEventListener('click', () => {
        // CORRECT: Create new date with explicit month/day  
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 1);
        renderCalendar();
    });
}
    
    // Add "Today" button functionality
    const todayBtn = document.querySelector('.calendar-header .btn-primary');
    if (todayBtn) {
        todayBtn.addEventListener('click', () => {
            currentDate = new Date();
            renderCalendar();
        });
    }
    
    // Initial render
    renderCalendar();
}

async function renderCalendar() {
    const calendarGrid = document.getElementById('calendarGrid');
    const calendarTitle = document.getElementById('calendarTitle');
    
    if (!calendarGrid || !calendarTitle) return;
    
    // Show loading state
    calendarGrid.innerHTML = `
        <div class="col-span-7 text-center py-8 text-gray-500">
            <i class="fas fa-spinner fa-spin fa-2x mb-2"></i>
            <p>Loading calendar events...</p>
        </div>
    `;
    
    try {
        // Fetch both service requests and calibrations
        const [serviceRequestsResponse, calibrationsResponse] = await Promise.all([
            fetch('{{ route("service-requests.index") }}'),
            fetch('{{ route("calibrations.index") }}')
        ]);
        
        const serviceRequestsData = await serviceRequestsResponse.json();
        const calibrationsData = await calibrationsResponse.json();
        
        // Clear previous calendar
        calendarGrid.innerHTML = '';
        
        // Set calendar title
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        calendarTitle.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
        
        // Create day headers
        const dayHeaders = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        dayHeaders.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day header';
            dayElement.textContent = day;
            calendarGrid.appendChild(dayElement);
        });
        
        // Get first day of month and total days - FIXED CALCULATION
        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
        const totalDays = lastDay.getDate();
        const startingDay = firstDay.getDay();
        
        // Add empty days for previous month - FIXED CALCULATION
        const prevMonthLastDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();
        for (let i = startingDay - 1; i >= 0; i--) {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day other-month';
            dayElement.innerHTML = `<div class="day-number">${prevMonthLastDay - i}</div>`;
            calendarGrid.appendChild(dayElement);
        }
        
        // Add current month days
        const today = new Date();
        for (let day = 1; day <= totalDays; day++) {
            const dayDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
            const dayElement = document.createElement('div');
            
            // Check if this is today
            const isToday = dayDate.toDateString() === today.toDateString() && 
                           currentDate.getMonth() === today.getMonth() && 
                           currentDate.getFullYear() === today.getFullYear();
            
            dayElement.className = `calendar-day ${isToday ? 'today' : ''}`;
            dayElement.innerHTML = `<div class="day-number">${day}</div>`;
            
            // Get events for this date
            const events = await getEventsForDate(dayDate, serviceRequestsData, calibrationsData);
            
            // Add events to calendar day
            events.forEach(event => {
                const eventElement = document.createElement('div');
                eventElement.className = `calendar-event ${event.type}`;
                eventElement.textContent = event.title;
                eventElement.title = `${event.type.toUpperCase()}: ${event.title}\n${event.description || ''}`;
                eventElement.style.cursor = 'pointer';
                
                // Add click handler to view details
                eventElement.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (event.eventType === 'service_request') {
                        viewServiceRequest(event.id);
                    } else if (event.eventType === 'calibration') {
                        viewCalibration(event.id);
                    }
                });
                
                dayElement.appendChild(eventElement);
            });
            
            // Add event count badge if there are events
            if (events.length > 0) {
                const eventCount = document.createElement('div');
                eventCount.className = 'event-count';
                eventCount.textContent = events.length;
                eventCount.title = `${events.length} events scheduled`;
                dayElement.appendChild(eventCount);
            }
            
            // Add click handler to the day itself
            dayElement.style.cursor = 'pointer';
            dayElement.addEventListener('click', () => {
                showDayEvents(dayDate, events);
            });
            
            calendarGrid.appendChild(dayElement);
        }
        
        // Calculate how many empty days we need to add to complete the grid
        const totalCells = 42; // 6 rows x 7 days
        const existingCells = startingDay + totalDays;
        const remainingCells = totalCells - existingCells;
        
        // Add empty days for next month - FIXED CALCULATION
        for (let i = 1; i <= remainingCells; i++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day other-month';
            dayElement.innerHTML = `<div class="day-number">${i}</div>`;
            calendarGrid.appendChild(dayElement);
        }
        
    } catch (error) {
        console.error('Error loading calendar events:', error);
        calendarGrid.innerHTML = `
            <div class="col-span-7 text-center py-8 text-red-500">
                <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
                <p>Failed to load calendar events</p>
                <button class="btn btn-primary btn-sm mt-2" onclick="renderCalendar()">
                    <i class="fas fa-redo mr-1"></i>
                    Retry
                </button>
            </div>
        `;
    }
}

async function getEventsForDate(date, serviceRequestsData, calibrationsData) {
    const events = [];
    
    // Create date strings for comparison (using local date, ignoring timezone)
    const targetYear = date.getFullYear();
    const targetMonth = date.getMonth();
    const targetDay = date.getDate();
    
    // Process service requests
    if (serviceRequestsData.success && serviceRequestsData.requests) {
        serviceRequestsData.requests.forEach(request => {
            // Check if the issue_start_time matches the current date
            if (request.issue_start_time) {
                const issueStartDate = new Date(request.issue_start_time);
                const issueStartYear = issueStartDate.getFullYear();
                const issueStartMonth = issueStartDate.getMonth();
                const issueStartDay = issueStartDate.getDate();
                
                if (issueStartYear === targetYear && 
                    issueStartMonth === targetMonth && 
                    issueStartDay === targetDay) {
                    events.push({
                        id: request.id,
                        type: 'service-request',
                        eventType: 'service_request',
                        title: `Service: ${request.equipment?.name || 'Unknown Equipment'}`,
                        description: `Issue: ${request.issue_type}\nPriority: ${request.priority}\nStatus: ${request.status}`,
                        date: issueStartDate,
                        priority: request.priority,
                        status: request.status,
                        originalDate: issueStartDate
                    });
                }
            }
            
            // Also show creation date as secondary event
            const requestDate = new Date(request.created_at);
            const requestYear = requestDate.getFullYear();
            const requestMonth = requestDate.getMonth();
            const requestDay = requestDate.getDate();
            
            if (requestYear === targetYear && 
                requestMonth === targetMonth && 
                requestDay === targetDay && 
                (!request.issue_start_time || 
                 requestYear !== new Date(request.issue_start_time).getFullYear() ||
                 requestMonth !== new Date(request.issue_start_time).getMonth() ||
                 requestDay !== new Date(request.issue_start_time).getDate())) {
                events.push({
                    id: request.id,
                    type: 'service-created',
                    eventType: 'service_request',
                    title: `Request Created`,
                    description: `Request Created\nPriority: ${request.priority}`,
                    date: requestDate,
                    priority: request.priority,
                    status: request.status,
                    originalDate: requestDate
                });
            }
        });
    }
    
    // Process calibrations
    if (calibrationsData.success && calibrationsData.calibrations) {
        calibrationsData.calibrations.forEach(calibration => {
            // Check preferred date (scheduled calibration date)
            if (calibration.preferred_date) {
                const calibrationDate = new Date(calibration.preferred_date);
                const calibrationYear = calibrationDate.getFullYear();
                const calibrationMonth = calibrationDate.getMonth();
                const calibrationDay = calibrationDate.getDate();
                
                if (calibrationYear === targetYear && 
                    calibrationMonth === targetMonth && 
                    calibrationDay === targetDay) {
                    const eventType = calibration.status === 'scheduled' ? 'calibration-scheduled' : 'calibration';
                    
                    events.push({
                        id: calibration.id,
                        type: eventType,
                        eventType: 'calibration',
                        title: `Calibration: ${calibration.equipment?.name || 'Unknown Equipment'}`,
                        description: `Type: ${calibration.calibration_type}\nPriority: ${calibration.priority}\nStatus: ${calibration.status}`,
                        date: calibrationDate,
                        priority: calibration.priority,
                        status: calibration.status,
                        originalDate: calibrationDate
                    });
                }
            }
            
            // Check next due date (important deadlines)
            if (calibration.next_calibration_date) {
                const dueDate = new Date(calibration.next_calibration_date);
                const dueYear = dueDate.getFullYear();
                const dueMonth = dueDate.getMonth();
                const dueDay = dueDate.getDate();
                
                if (dueYear === targetYear && 
                    dueMonth === targetMonth && 
                    dueDay === targetDay) {
                    // Only show due date if it's different from preferred date
                    const preferredDate = calibration.preferred_date ? new Date(calibration.preferred_date) : null;
                    const isSameDate = preferredDate && 
                        preferredDate.getFullYear() === dueYear &&
                        preferredDate.getMonth() === dueMonth &&
                        preferredDate.getDate() === dueDay;
                    
                    if (!isSameDate) {
                        let dueEventType = 'calibration-due';
                        let dueTitle = `Due: ${calibration.equipment?.name || 'Unknown Equipment'}`;
                        
                        // Check if it's overdue
                        const today = new Date();
                        today.setHours(0, 0, 0, 0);
                        const dueDateOnly = new Date(dueYear, dueMonth, dueDay);
                        if (dueDateOnly < today) {
                            dueEventType = 'calibration-overdue';
                            dueTitle = `OVERDUE: ${calibration.equipment?.name || 'Unknown Equipment'}`;
                        }
                        
                        events.push({
                            id: calibration.id,
                            type: dueEventType,
                            eventType: 'calibration',
                            title: dueTitle,
                            description: `Calibration Due\nType: ${calibration.calibration_type}\nStatus: ${calibration.status}`,
                            date: dueDate,
                            priority: 'urgent',
                            status: calibration.status,
                            originalDate: dueDate
                        });
                    }
                }
            }
            
            // Show creation date only if no other dates match
            const createdDate = new Date(calibration.created_at);
            const createdYear = createdDate.getFullYear();
            const createdMonth = createdDate.getMonth();
            const createdDay = createdDate.getDate();
            
            const hasOtherDates = calibration.preferred_date || calibration.next_calibration_date;
            const hasMatchingOtherDate = 
                (calibration.preferred_date && 
                 new Date(calibration.preferred_date).getFullYear() === createdYear &&
                 new Date(calibration.preferred_date).getMonth() === createdMonth &&
                 new Date(calibration.preferred_date).getDate() === createdDay) ||
                (calibration.next_calibration_date &&
                 new Date(calibration.next_calibration_date).getFullYear() === createdYear &&
                 new Date(calibration.next_calibration_date).getMonth() === createdMonth &&
                 new Date(calibration.next_calibration_date).getDate() === createdDay);
            
            if (createdYear === targetYear && 
                createdMonth === targetMonth && 
                createdDay === targetDay && 
                !hasMatchingOtherDate) {
                events.push({
                    id: calibration.id,
                    type: 'calibration-created',
                    eventType: 'calibration',
                    title: `New Calibration`,
                    description: `Calibration Created\nType: ${calibration.calibration_type}`,
                    date: createdDate,
                    priority: calibration.priority,
                    status: calibration.status,
                    originalDate: createdDate
                });
            }
        });
    }
    
    // Sort events by date and priority
    events.sort((a, b) => {
        // First sort by the original date (chronological order)
        if (a.originalDate.getTime() !== b.originalDate.getTime()) {
            return a.originalDate - b.originalDate;
        }
        
        // Then sort by priority
        const priorityOrder = { 
            'urgent': 0, 
            'high': 1, 
            'medium': 2, 
            'low': 3, 
            'routine': 4 
        };
        const aPriority = priorityOrder[a.priority] || 5;
        const bPriority = priorityOrder[b.priority] || 5;
        
        return aPriority - bPriority;
    });
    
    return events;
}
// Update the loadSectionData function to refresh calendar when schedule section is activated
function loadSectionData(section) {
    console.log(`Loading data for section: ${section}`);
    
    switch(section) {
        case 'dashboard':
            fetchDashboardStats();
            break;
        case 'equipment':
            fetchEquipmentData();
            break;
        case 'service-requests':
            fetchServiceRequests();
            break;
        case 'calibration':
            fetchCalibrations();
            break;
        case 'schedule':
            renderCalendar(); // Refresh calendar when schedule section is opened
            break;
        default:
            console.log(`No data loading required for section: ${section}`);
    }
}

// Add calendar refresh when service requests or calibrations are updated
function refreshCalendar() {
    console.log('🔄 Refreshing calendar...');
    
    // Check if schedule section is active
    const scheduleSection = document.getElementById('schedule');
    if (scheduleSection && scheduleSection.classList.contains('active')) {
        // If schedule section is currently visible, reload the calendar
        console.log('📅 Schedule section is active, reloading calendar...');
        renderCalendar();
    } else {
        // If schedule section is not visible, we still want to ensure
        // the calendar data is fresh when user navigates to it
        console.log('📅 Schedule section not active, calendar will refresh when opened');
        // We can force a reload of the calendar data by resetting current date
        currentDate = new Date(); // Reset to current month
    }
    
    // Also refresh the dashboard if it's active (for stats)
    const dashboardSection = document.getElementById('dashboard');
    if (dashboardSection && dashboardSection.classList.contains('active')) {
        fetchDashboardStats();
    }
}

// Update your existing functions to refresh the calendar when changes are made
async function handleServiceRequestManual() {
    // ... existing code ...
    
    if (data.success) {
        alert(`Service request submitted successfully! Request ID: ${data.request_id}`);
        closeModal('newRequestModal');
        form.reset();
        fetchServiceRequests();
        refreshCalendar(); // Refresh calendar
    }
    // ... rest of the code ...
}

async function handleCalibrationManual() {
    // ... existing code ...
    
    if (data.success) {
        alert('Calibration scheduled successfully!');
        closeModal('scheduleCalibrationModal');
        form.reset();
        fetchCalibrations();
        refreshCalendar(); // Refresh calendar
    }
    // ... rest of the code ...
}

// Update the delete functions to refresh calendar
async function deleteServiceRequest(requestId, requestTitle) {
    // ... existing code ...
    
    if (data.success) {
        alert('Service request deleted successfully!');
        fetchServiceRequests();
        refreshCalendar(); // Refresh calendar
    }
    // ... rest of the code ...
}

async function deleteCalibration(calibrationId, calibrationName) {
    // ... existing code ...
    
    if (data.success) {
        alert('Calibration deleted successfully!');
        fetchCalibrations();
        refreshCalendar(); // Refresh calendar
    }
    // ... rest of the code ...
}

// Calendar helper functions
function goToToday() {
    currentDate = new Date();
    renderCalendar();
}

function exportCalendar() {
    // Simple export functionality - you can enhance this later
    const calendarTitle = document.getElementById('calendarTitle').textContent;
    alert(`Exporting calendar for ${calendarTitle}\nThis feature can be enhanced to generate PDF/Excel reports.`);
}

function showQuickAddEvent() {
    // Simple quick add - you can create a modal for this later
    const choice = confirm('What would you like to schedule?\nClick OK for Service Request, Cancel for Calibration');
    if (choice) {
        openModal('newRequestModal');
    } else {
        openModal('scheduleCalibrationModal');
    }
}


    // ========== MODAL FUNCTIONALITY ==========
    
    function initializeModals() {
        setupModalListeners();
        setupModalCloseHandlers();
        setupFormSubmissions();
    }
    
    function setupModalListeners() {
        // Equipment modal buttons
        const addEquipmentBtns = [
            document.getElementById('addEquipmentBtn'),
            document.getElementById('addEquipmentBtn2'),
            document.getElementById('addEquipmentBtn3')
        ];
        
        // Service request modal buttons
        const newRequestBtns = [
            document.getElementById('newRequestBtn'),
            document.getElementById('newRequestBtn2')
        ];
        
        // Calibration modal button
        const scheduleCalibrationBtn = document.getElementById('scheduleCalibrationBtn');
        
        // Equipment modal listeners
        addEquipmentBtns.forEach((btn, index) => {
            if (btn) {
                btn.addEventListener('click', () => {
                    openModal('addEquipmentModal');
                    console.log('Equipment modal opened');
                });
            }
        });
        
         // Service request modal listeners
    newRequestBtns.forEach((btn, index) => {
        if (btn) {
            btn.addEventListener('click', () => {
                openModal('newRequestModal');
                loadEquipmentOptions();
                console.log('Service request modal opened');
                
                // Set up the new submit button
                setupServiceRequestSubmit();
            });
        }
    });
        
        // Calibration modal listener
if (scheduleCalibrationBtn) {
    scheduleCalibrationBtn.addEventListener('click', () => {
        openModal('scheduleCalibrationModal');
        loadEquipmentOptions();
        console.log('Calibration modal opened');
        
        // Set up the new submit button
        setupCalibrationSubmit();
    });
}
}

document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Dashboard initialized');
    
    // Initialize all functionality
    initializeSidebar();
    initializeNavigation();
    initializeModals();
    initializeCalendar();
    initializeAnimations();
    
    // Initialize dark mode - ADD THIS LINE
    initDarkModeWithFallback();
    
    // Load initial data
    loadInitialData();
    
    // Set up responsive handling
    setupResponsiveHandling();
});

    function setupServiceRequestSubmit() {
    const newSubmitBtn = document.getElementById('newSubmitRequestBtn');
    const requestForm = document.getElementById('requestForm');
    
    if (newSubmitBtn && requestForm) {
        // Remove any existing event listeners
        newSubmitBtn.replaceWith(newSubmitBtn.cloneNode(true));
        
        // Get the fresh button reference
        const freshSubmitBtn = document.getElementById('newSubmitRequestBtn');
        
        freshSubmitBtn.addEventListener('click', async function() {
            console.log('🆕 New submit button clicked!');
            await handleServiceRequestManual();
        });
        
        console.log('✅ New service request submit button setup complete');
    } else {
        console.error('❌ New submit button or form not found');
    }
}

    function setupModalCloseHandlers() {
        // Close buttons
        const closeEquipmentModal = document.getElementById('closeEquipmentModal');
        const closeRequestModal = document.getElementById('closeRequestModal');
        const closeCalibrationModal = document.getElementById('closeCalibrationModal');
        
        // Cancel buttons
        const cancelEquipment = document.getElementById('cancelEquipment');
        const cancelRequest = document.getElementById('cancelRequest');
        const cancelCalibration = document.getElementById('cancelCalibration');
        
        // Close modal events
        if (closeEquipmentModal) {
            closeEquipmentModal.addEventListener('click', () => closeModal('addEquipmentModal'));
        }
        if (closeRequestModal) {
            closeRequestModal.addEventListener('click', () => closeModal('newRequestModal'));
        }
        if (closeCalibrationModal) {
            closeCalibrationModal.addEventListener('click', () => closeModal('scheduleCalibrationModal'));
        }
        
        // Cancel button events
        if (cancelEquipment) {
            cancelEquipment.addEventListener('click', () => closeModal('addEquipmentModal'));
        }
        if (cancelRequest) {
            cancelRequest.addEventListener('click', () => closeModal('newRequestModal'));
        }
        if (cancelCalibration) {
            cancelCalibration.addEventListener('click', () => closeModal('scheduleCalibrationModal'));
        }
        
        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal')) {
                closeModal(e.target.id);
            }
        });
    }
    
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }


    function setupCalibrationSubmit() {
    const newSubmitBtn = document.getElementById('newSubmitCalibrationBtn');
    const calibrationForm = document.getElementById('calibrationForm');
    
    if (newSubmitBtn && calibrationForm) {
        // Remove any existing event listeners to avoid duplicates
        newSubmitBtn.replaceWith(newSubmitBtn.cloneNode(true));
        
        // Get the fresh button reference
        const freshSubmitBtn = document.getElementById('newSubmitCalibrationBtn');
        
        freshSubmitBtn.addEventListener('click', async function() {
            console.log('🆕 Calibration submit button clicked!');
            await handleCalibrationManual();
        });
        
        console.log('✅ Calibration submit button setup complete');
    } else {
        console.error('❌ Calibration submit button or form not found');
    }
}
    // ========== DATA FETCHING FUNCTIONS ==========
    
    async function fetchDashboardStats() {
    try {
        console.log('Fetching dashboard stats...');
        
        // Fetch all dashboard data in parallel
        const [statsResponse, equipmentResponse, serviceRequestsResponse, calibrationsResponse] = await Promise.all([
            fetch('{{ route("dashboard.stats") }}'),
            fetch('{{ route("equipment.index") }}'),
            fetch('{{ route("service-requests.index") }}'),
            fetch('{{ route("calibrations.index") }}')
        ]);
        
        const statsData = await statsResponse.json();
        const equipmentData = await equipmentResponse.json();
        const serviceRequestsData = await serviceRequestsResponse.json();
        const calibrationsData = await calibrationsResponse.json();
        
        if (statsData.success) {
            updateDashboardStats(statsData.stats);
            console.log('Dashboard stats loaded successfully');
        } else {
            console.error('Error fetching dashboard stats:', statsData.message);
        }
        
        if (equipmentData.success) {
            updateEquipmentHealthOverview(equipmentData.equipment);
            updateDashboardEquipmentTable(equipmentData.equipment);
            console.log('Equipment data loaded successfully for dashboard');
        } else {
            console.error('Error fetching equipment data for dashboard:', equipmentData.message);
        }
        
        // Update quick stats with all data
        updateQuickStats(
            equipmentData.success ? equipmentData.equipment : [],
            serviceRequestsData.success ? serviceRequestsData : { requests: [] },
            calibrationsData.success ? calibrationsData : { calibrations: [] }
        );
        
        // Update welcome message with all data
        updateWelcomeMessage(
            equipmentData.success ? equipmentData.equipment : [],
            serviceRequestsData.success ? serviceRequestsData : { requests: [] },
            calibrationsData.success ? calibrationsData : { calibrations: [] }
        );
        
        // Process all data for recent activities
        await updateRecentActivities();
        
    } catch (error) {
        console.error('Error fetching dashboard stats:', error);
        
        // Show error in welcome message
        const welcomeMessage = document.getElementById('welcomeMessage');
        if (welcomeMessage) {
            welcomeMessage.innerHTML = `
                <span class="text-red-500">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    Unable to load dashboard data. Please try refreshing the page.
                </span>
            `;
        }
    }
}
function refreshWelcomeMessage() {
    console.log('🔄 Refreshing welcome message...');
    // This will be called automatically when fetchDashboardStats is called
}   
function refreshQuickStats() {
    console.log('🔄 Refreshing quick stats...');
    // This will be called automatically when fetchDashboardStats is called
}

    async function fetchEquipmentData() {
        try {
            showLoading('equipmentGrid', 'Loading equipment...');
            console.log('Fetching equipment data...');
            
            const response = await fetch('{{ route("equipment.index") }}');
            const data = await response.json();
            
            if (data.success) {
                updateEquipmentUI(data.equipment);
                updateEquipmentStats(data.stats);
                console.log('Equipment data loaded successfully');
            } else {
                console.error('Error fetching equipment:', data.message);
                showError('equipmentGrid', 'Failed to load equipment data');
            }
        } catch (error) {
            console.error('Error fetching equipment:', error);
            showError('equipmentGrid', 'Failed to load equipment data');
        }
    }
    
    async function fetchServiceRequests() {
        try {
            showLoading('serviceRequestsTableBody', 'Loading service requests...');
            console.log('Fetching service requests...');
            
            const response = await fetch('{{ route("service-requests.index") }}');
            const data = await response.json();
            
            if (data.success) {
                updateServiceRequestsUI(data.requests);
                updateServiceRequestsStats(data.stats);
                console.log('Service requests loaded successfully');
            } else {
                console.error('Error fetching service requests:', data.message);
                showError('serviceRequestsTableBody', 'Failed to load service requests');
            }
        } catch (error) {
            console.error('Error fetching service requests:', error);
            showError('serviceRequestsTableBody', 'Failed to load service requests');
        }
    }
    
    async function fetchCalibrations() {
        try {
            showLoading('calibrationsTableBody', 'Loading calibrations...');
            console.log('Fetching calibrations...');
            
            const response = await fetch('{{ route("calibrations.index") }}');
            const data = await response.json();
            
            if (data.success) {
                updateCalibrationsUI(data.calibrations);
                updateCalibrationsStats(data.stats);
                console.log('Calibrations loaded successfully');
            } else {
                console.error('Error fetching calibrations:', data.message);
                showError('calibrationsTableBody', 'Failed to load calibration data');
            }
        } catch (error) {
            console.error('Error fetching calibrations:', error);
            showError('calibrationsTableBody', 'Failed to load calibration data');
        }
    }
    
    async function loadEquipmentOptions() {
    try {
        console.log('Loading equipment options for dropdowns...');
        
        // Use the existing equipment index route instead of a special options route
        const response = await fetch('{{ route("equipment.index") }}');
        const data = await response.json();
        
        if (data.success && data.equipment) {
            // Update equipment dropdowns in all modals
            const equipmentSelects = document.querySelectorAll('select[name="equipment_id"]');
            
            equipmentSelects.forEach((select) => {
                // Clear existing options except the first one
                select.innerHTML = '<option value="">Choose equipment...</option>';
                
                data.equipment.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = `${item.name} - ${item.model} (${item.serial_number})`;
                    select.appendChild(option);
                });
            });
            
            console.log(`Equipment options loaded successfully: ${data.equipment.length} items`);
        } else {
            console.error('Error loading equipment options:', data.message);
            // Fallback: show error in dropdowns
            const equipmentSelects = document.querySelectorAll('select[name="equipment_id"]');
            equipmentSelects.forEach(select => {
                select.innerHTML = '<option value="">Error loading equipment</option>';
            });
        }
    } catch (error) {
        console.error('Error loading equipment options:', error);
        // Fallback on error
        const equipmentSelects = document.querySelectorAll('select[name="equipment_id"]');
        equipmentSelects.forEach(select => {
            select.innerHTML = '<option value="">Failed to load equipment</option>';
        });
    }
}
async function viewServiceRequest(requestId) {
    try {
        console.log('Viewing service request details:', requestId);
        
        const response = await fetch(`/service-requests/${requestId}/edit`);
        const data = await response.json();
        
        if (data.success) {
            const request = data.request;
            
            // Populate the view modal
            document.getElementById('view_request_id').textContent = `Request #${request.request_id || request.id}`;
            document.getElementById('view_request_created').textContent = `Created: ${formatDateTime(request.created_at)}`;
            
            // Status and priority badges
            const statusBadge = document.getElementById('view_request_status');
            statusBadge.textContent = formatStatus(request.status);
            statusBadge.className = `status-badge text-sm ${getStatusBadgeClass(request.status)}`;
            
            const priorityBadge = document.getElementById('view_request_priority');
            priorityBadge.textContent = formatPriority(request.priority);
            priorityBadge.className = `priority-badge text-sm ${getPriorityBadgeClass(request.priority)}`;
            
            // Equipment details
            document.getElementById('view_equipment_name').textContent = request.equipment?.name || 'N/A';
            document.getElementById('view_equipment_details').textContent = 
                request.equipment ? `${request.equipment.model} - ${request.equipment.serial_number}` : 'No equipment details';
            
            // Request details
            document.getElementById('view_issue_type').textContent = formatIssueType(request.issue_type);
            document.getElementById('view_issue_start').textContent = formatDateTime(request.issue_start_time);
            document.getElementById('view_contact_person').textContent = request.contact_person;
            document.getElementById('view_contact_phone').textContent = request.contact_phone;
            document.getElementById('view_problem_description').textContent = request.problem_description;
            document.getElementById('view_updated_at').textContent = formatDateTime(request.updated_at);
            document.getElementById('view_created_at').textContent = formatDateTime(request.created_at);
            document.getElementById('view_last_updated').textContent = formatDateTime(request.updated_at);
            
            // Set up the edit button in the view modal
            setupViewModalEditButton(requestId);
            
            // Open the view modal
            openModal('viewRequestModal');
            
        } else {
            alert('Error loading service request details: ' + data.message);
        }
    } catch (error) {
        console.error('Error loading service request details:', error);
        alert('Error loading service request details');
    }
}

async function viewEquipment(equipmentId) {
    try {
        console.log('Viewing equipment details:', equipmentId);
        
        const response = await fetch(`/equipment/${equipmentId}/edit`);
        const data = await response.json();
        
        if (data.success) {
            const equipment = data.equipment;
            
            // Populate the view modal
            document.getElementById('view_equipment_name').textContent = equipment.name;
            document.getElementById('view_equipment_model').textContent = `Model: ${equipment.model}`;
            document.getElementById('view_equipment_serial').textContent = `Serial: ${equipment.serial_number}`;
            
            // Status badge
            const statusBadge = document.getElementById('view_equipment_status');
            statusBadge.textContent = formatStatus(equipment.status);
            statusBadge.className = `status-badge text-sm ${getStatusBadgeClass(equipment.status)}`;
            
            // Equipment details
            document.getElementById('view_equipment_manufacturer').textContent = equipment.manufacturer || 'Not specified';
            document.getElementById('view_equipment_location').textContent = equipment.location_department || 'Not specified';
            document.getElementById('view_equipment_purchase_date').textContent = formatDate(equipment.purchase_date) || 'Not specified';
            document.getElementById('view_equipment_warranty').textContent = formatDate(equipment.warranty_expiry) || 'No warranty';
            document.getElementById('view_equipment_type').textContent = equipment.type || 'General Equipment';
            document.getElementById('view_equipment_last_service').textContent = equipment.last_service_date ? formatDate(equipment.last_service_date) : 'No service recorded';
            document.getElementById('view_equipment_notes').textContent = equipment.notes || 'No additional notes provided.';
            
            // Equipment health
            document.getElementById('view_health_status').textContent = formatStatus(equipment.status);
            const healthBar = document.getElementById('view_health_bar');
            healthBar.className = `h-2 rounded-full ${getHealthBarClass(equipment.status)}`;
            healthBar.style.width = getHealthBarWidth(equipment.status);
            
            // Quick stats (you can enhance these with real data later)
            document.getElementById('view_service_requests').textContent = '0'; // Placeholder
            document.getElementById('view_calibrations').textContent = '0'; // Placeholder
            document.getElementById('view_uptime').textContent = '98%'; // Placeholder
            
            // Timeline
            document.getElementById('view_created_at').textContent = formatDateTime(equipment.created_at);
            document.getElementById('view_updated_at').textContent = formatDateTime(equipment.updated_at);
            
            // Set up the edit button in the view modal
            setupEquipmentViewModalEditButton(equipmentId);
            
            // Open the view modal
            openModal('viewEquipmentModal');
            
        } else {
            alert('Error loading equipment details: ' + data.message);
        }
    } catch (error) {
        console.error('Error loading equipment details:', error);
        alert('Error loading equipment details');
    }
}

// Helper functions for equipment health display
function getHealthBarClass(status) {
    const classes = {
        'operational': 'bg-green-500',
        'maintenance': 'bg-yellow-500',
        'attention': 'bg-red-500'
    };
    return classes[status] || 'bg-gray-500';
}

function getHealthBarWidth(status) {
    const widths = {
        'operational': '90%',
        'maintenance': '60%',
        'attention': '30%'
    };
    return widths[status] || '50%';
}

function setupEquipmentViewModalEditButton(equipmentId) {
    const editBtn = document.getElementById('editEquipmentFromViewBtn');
    if (editBtn) {
        // Remove existing listeners
        editBtn.replaceWith(editBtn.cloneNode(true));
        const freshEditBtn = document.getElementById('editEquipmentFromViewBtn');
        
        freshEditBtn.addEventListener('click', function() {
            closeModal('viewEquipmentModal');
            // Small delay to ensure modal is closed before opening edit modal
            setTimeout(() => {
                editEquipment(equipmentId);
            }, 300);
        });
    }
}
function setupViewModalEditButton(requestId) {
    const editBtn = document.getElementById('editFromViewBtn');
    if (editBtn) {
        // Remove existing listeners
        editBtn.replaceWith(editBtn.cloneNode(true));
        const freshEditBtn = document.getElementById('editFromViewBtn');
        
        freshEditBtn.addEventListener('click', function() {
            closeModal('viewRequestModal');
            // Small delay to ensure modal is closed before opening edit modal
            setTimeout(() => {
                editServiceRequest(requestId);
            }, 300);
        });
    }
}
// Helper function for time slot formatting
function formatTimeSlot(time) {
    const times = {
        'morning': 'Morning (8 AM - 12 PM)',
        'afternoon': 'Afternoon (12 PM - 4 PM)',
        'evening': 'Evening (4 PM - 7 PM)'
    };
    return times[time] || time;
}
// Calendar helper functions
function goToToday() {
    currentDate = new Date();
    renderCalendar();
}

function exportCalendar() {
    // Simple export functionality - you can enhance this later
    const calendarTitle = document.getElementById('calendarTitle').textContent;
    alert(`Exporting calendar for ${calendarTitle}\nThis feature can be enhanced to generate PDF/Excel reports.`);
}

function showQuickAddEvent() {
    // Simple quick add - you can create a modal for this later
    const choice = confirm('What would you like to schedule?\nClick OK for Service Request, Cancel for Calibration');
    if (choice) {
        openModal('newRequestModal');
    } else {
        openModal('scheduleCalibrationModal');
    }
}

// Update event type styling in your CSS
const calendarEventStyles = `
    .calendar-event.service-request {
        background: #e8a00f;
        color: white;
    }
    .calendar-event.service-update {
        background: #10b981;
        color: white;
    }
    .calendar-event.calibration {
        background: #3b82f6;
        color: white;
    }
    .calendar-event.calibration-due {
        background: #ef4444;
        color: white;
    }
    .calendar-event {
        font-size: 11px;
        padding: 2px 4px;
        margin: 1px 0;
        border-radius: 3px;
        cursor: pointer;
        line-height: 1.2;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
`;

// Add the styles to the document
const styleSheet = document.createElement('style');
styleSheet.textContent = calendarEventStyles;
document.head.appendChild(styleSheet);
    // ========== UI UPDATE FUNCTIONS ==========
    
    function updateDashboardStats(stats) {
        if (stats) {
            // Update the stat cards in dashboard
            const statValues = document.querySelectorAll('.stat-card .stat-value');
            if (statValues.length >= 3) {
                statValues[0].textContent = stats.total_equipment || 0;
                statValues[1].textContent = stats.active_requests || 0;
                statValues[2].textContent = stats.upcoming_calibrations || 0;
            }
        }
    }
    
    function updateEquipmentUI(equipment) {
        const equipmentGrid = document.getElementById('equipmentGrid');
        
        if (!equipmentGrid) return;
        
        hideLoading('equipmentGrid');
        
        if (!equipment || equipment.length === 0) {
            equipmentGrid.innerHTML = `
                <div class="col-span-3 text-center py-8 text-gray-500">
                    <i class="fas fa-microscope fa-2x mb-2"></i>
                    <p>No equipment found</p>
                    <button class="btn btn-primary btn-sm mt-2" onclick="openModal('addEquipmentModal')">
                        <i class="fas fa-plus mr-1"></i>
                        Add Your First Equipment
                    </button>
                </div>
            `;
            return;
        }
        
        equipmentGrid.innerHTML = equipment.map(item => `
            <div class="card">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 ${getEquipmentIconColor(item.status)} rounded-lg flex items-center justify-center mr-3">
                        <i class="${getEquipmentIcon(item.type)} ${getEquipmentIconColorClass(item.status)}"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold">${item.name}</h3>
                        <p class="text-sm text-gray-500">${item.model}</p>
                        <p class="text-xs text-gray-400">${item.serial_number}</p>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <span class="status-badge ${getStatusBadgeClass(item.status)}">${formatStatus(item.status)}</span>
                    <div class="flex gap-1">
                        <button class="btn btn-outline btn-sm view-equipment" data-id="${item.id}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-outline btn-sm edit-equipment" data-id="${item.id}">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    }
    
    function updateServiceRequestsUI(requests) {
    const tableBody = document.getElementById('serviceRequestsTableBody');
    
    if (!tableBody) return;
    
    hideLoading('serviceRequestsTableBody');
    
    if (!requests || requests.length === 0) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="9" class="text-center py-8 text-gray-500">
                    <i class="fas fa-tools fa-2x mb-2"></i>
                    <p>No service requests found</p>
                    <button class="btn btn-primary btn-sm mt-2" onclick="openModal('newRequestModal')">
                        <i class="fas fa-plus mr-1"></i>
                        Create Your First Request
                    </button>
                </td>
            </tr>
        `;
        return;
    }
    
    tableBody.innerHTML = requests.map(request => `
        <tr>
            <td class="font-medium">${request.request_id || 'N/A'}</td>
            <td>${request.equipment?.name || 'N/A'}</td>
            <td>${formatIssueType(request.issue_type)}</td>
            <td class="max-w-xs truncate" title="${request.problem_description}">${request.problem_description}</td>
            <td><span class="priority-badge ${getPriorityBadgeClass(request.priority)}">${formatPriority(request.priority)}</span></td>
            <td><span class="status-badge ${getStatusBadgeClass(request.status)}">${formatStatus(request.status)}</span></td>
            <td>${formatDateTime(request.created_at)}</td>
            <td>${formatDateTime(request.updated_at)}</td>
            <td>
                <div class="flex gap-1">
                    <button class="btn btn-outline btn-sm view-request" data-id="${request.id}" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-outline btn-sm edit-request" data-id="${request.id}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-outline btn-sm delete-request" data-id="${request.id}" data-title="Request ${request.request_id}" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
    
    // Add event listeners for service request buttons
    attachServiceRequestEventListeners();
}
    
    function updateCalibrationsUI(calibrations) {
    const tableBody = document.getElementById('calibrationsTableBody');
    
    if (!tableBody) return;
    
    hideLoading('calibrationsTableBody');
    
    if (!calibrations || calibrations.length === 0) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center py-8 text-gray-500">
                    <i class="fas fa-ruler-combined fa-2x mb-2"></i>
                    <p>No calibrations scheduled</p>
                    <button class="btn btn-primary btn-sm mt-2" onclick="openModal('scheduleCalibrationModal')">
                        <i class="fas fa-plus mr-1"></i>
                        Schedule First Calibration
                    </button>
                </td>
            </tr>
        `;
        return;
    }
    
    tableBody.innerHTML = calibrations.map(calibration => `
        <tr>
            <td class="font-medium">${calibration.equipment?.name || 'N/A'}</td>
            <td>${formatCalibrationType(calibration.calibration_type)}</td>
            <td>${formatDate(calibration.last_calibration_date)}</td>
            <td>${formatDate(calibration.next_calibration_date)}</td>
            <td><span class="status-badge ${getCalibrationStatusBadgeClass(calibration.status)}">${formatCalibrationStatus(calibration.status)}</span></td>
            <td>${calibration.technician || 'Not assigned'}</td>
            <td>${calibration.certificate_number || 'N/A'}</td>
            <td>
                <div class="flex gap-1">
                    <button class="btn btn-outline btn-sm view-calibration" data-id="${calibration.id}" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-outline btn-sm edit-calibration" data-id="${calibration.id}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-outline btn-sm delete-calibration" data-id="${calibration.id}" data-name="${calibration.equipment?.name || 'Calibration'}" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
    
    // Add event listeners for calibration buttons
    attachCalibrationEventListeners();
}
    
    function updateEquipmentStats(stats) {
        if (stats) {
            const totalEl = document.getElementById('totalEquipmentCount');
            const operationalEl = document.getElementById('operationalEquipmentCount');
            const maintenanceEl = document.getElementById('maintenanceEquipmentCount');
            const attentionEl = document.getElementById('attentionEquipmentCount');
            
            if (totalEl) totalEl.textContent = stats.total || 0;
            if (operationalEl) operationalEl.textContent = stats.operational || 0;
            if (maintenanceEl) maintenanceEl.textContent = stats.maintenance || 0;
            if (attentionEl) attentionEl.textContent = stats.attention || 0;
        }
    }
    
    function updateServiceRequestsStats(stats) {
        if (stats) {
            const totalEl = document.getElementById('totalRequestsCount');
            const pendingEl = document.getElementById('pendingRequestsCount');
            const inProgressEl = document.getElementById('inProgressRequestsCount');
            const completedEl = document.getElementById('completedRequestsCount');
            
            if (totalEl) totalEl.textContent = stats.total || 0;
            if (pendingEl) pendingEl.textContent = stats.pending || 0;
            if (inProgressEl) inProgressEl.textContent = stats.in_progress || 0;
            if (completedEl) completedEl.textContent = stats.completed || 0;
        }
    }
    
    function updateCalibrationsStats(stats) {
        if (stats) {
            const totalEl = document.getElementById('totalCalibrationsCount');
            const dueSoonEl = document.getElementById('dueSoonCalibrationsCount');
            const overdueEl = document.getElementById('overdueCalibrationsCount');
            const completedEl = document.getElementById('completedCalibrationsCount');
            
            if (totalEl) totalEl.textContent = stats.total || 0;
            if (dueSoonEl) dueSoonEl.textContent = stats.due_soon || 0;
            if (overdueEl) overdueEl.textContent = stats.overdue || 0;
            if (completedEl) completedEl.textContent = stats.completed || 0;
        }
    }


   function attachServiceRequestEventListeners() {
    // View service request buttons - now opens details modal
    document.querySelectorAll('.view-request').forEach(button => {
        button.addEventListener('click', function() {
            const requestId = this.getAttribute('data-id');
            viewServiceRequest(requestId);
        });
    });
    
    // Edit service request buttons
    document.querySelectorAll('.edit-request').forEach(button => {
        button.addEventListener('click', function() {
            const requestId = this.getAttribute('data-id');
            editServiceRequest(requestId);
        });
    });
    
    // Delete service request buttons
    document.querySelectorAll('.delete-request').forEach(button => {
        button.addEventListener('click', function() {
            const requestId = this.getAttribute('data-id');
            const requestTitle = this.getAttribute('data-title');
            deleteServiceRequest(requestId, requestTitle);
        });
    });
}

async function editServiceRequest(requestId) {
    try {
        console.log('Editing service request:', requestId);
        
        const response = await fetch(`/service-requests/${requestId}/edit`);
        const data = await response.json();
        
        if (data.success) {
            const request = data.request;
            
            // First load equipment options, THEN set the value
            await loadEquipmentOptionsForEdit();
            
            // Now populate the form with the request data
            document.getElementById('edit_request_id').value = request.id;
            document.getElementById('edit_request_equipment').value = request.equipment_id; // This should now work
            document.getElementById('edit_request_issue_type').value = request.issue_type;
            document.getElementById('edit_request_priority').value = request.priority;
            document.getElementById('edit_request_description').value = request.problem_description;
            
            // Format datetime for input (YYYY-MM-DDTHH:MM)
            if (request.issue_start_time) {
                const issueStartTime = new Date(request.issue_start_time);
                const timezoneOffset = issueStartTime.getTimezoneOffset() * 60000;
                const localTime = new Date(issueStartTime.getTime() - timezoneOffset);
                const formattedTime = localTime.toISOString().slice(0, 16);
                document.getElementById('edit_request_start_time').value = formattedTime;
            }
            
            document.getElementById('edit_request_contact_person').value = request.contact_person;
            document.getElementById('edit_request_contact_phone').value = request.contact_phone;
            document.getElementById('edit_request_status').value = request.status;
            
            // Open the edit modal
            openModal('editRequestModal');
            
            // Setup update button
            setupServiceRequestUpdate();
            
        } else {
            alert('Error loading service request data: ' + data.message);
        }
    } catch (error) {
        console.error('Error loading service request for edit:', error);
        alert('Error loading service request data');
    }
}

async function loadEquipmentOptionsForEdit() {
    try {
        const response = await fetch('{{ route("equipment.options") }}');
        const equipment = await response.json();
        
        const select = document.getElementById('edit_request_equipment');
        select.innerHTML = '<option value="">Choose equipment...</option>';
        
        equipment.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = `${item.name} - ${item.model}`;
            select.appendChild(option);
        });
        
    } catch (error) {
        console.error('Error loading equipment options for edit:', error);
    }
}

function setupServiceRequestUpdate() {
    const updateBtn = document.getElementById('updateRequestBtn');
    const form = document.getElementById('editRequestForm');
    
    if (updateBtn && form) {
        // Remove existing listeners
        updateBtn.replaceWith(updateBtn.cloneNode(true));
        const freshUpdateBtn = document.getElementById('updateRequestBtn');
        
        freshUpdateBtn.addEventListener('click', async function() {
            await updateServiceRequest();
        });
    }
}

async function updateServiceRequest() {
    const form = document.getElementById('editRequestForm');
    const updateBtn = document.getElementById('updateRequestBtn');
    const requestId = document.getElementById('edit_request_id').value;
    
    if (!form || !updateBtn || !requestId) {
        alert('Error: Form data missing');
        return;
    }
    
    const originalText = updateBtn.innerHTML;
    updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
    updateBtn.disabled = true;
    
    try {
        const formData = {
            equipment_id: document.getElementById('edit_request_equipment').value,
            issue_type: document.getElementById('edit_request_issue_type').value,
            priority: document.getElementById('edit_request_priority').value,
            problem_description: document.getElementById('edit_request_description').value,
            issue_start_time: document.getElementById('edit_request_start_time').value,
            contact_person: document.getElementById('edit_request_contact_person').value,
            contact_phone: document.getElementById('edit_request_contact_phone').value,
            status: document.getElementById('edit_request_status').value,
        };
        
        console.log('Updating service request:', requestId, formData);
        
        const response = await fetch(`/service-requests/${requestId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-HTTP-Method-Override': 'PUT'
            },
            body: JSON.stringify(formData)
        });
        
        const data = await response.json();
        
        if (data.success) {
            alert('Service request updated successfully!');
            closeModal('editRequestModal');
            
            // Refresh both service requests list AND calendar
            fetchServiceRequests();
            refreshCalendar();
            
        } else {
            if (data.errors) {
                let errorMessage = 'Please fix the following errors:\n';
                for (const field in data.errors) {
                    errorMessage += `- ${data.errors[field][0]}\n`;
                }
                alert(errorMessage);
            } else {
                alert(data.message || 'Error updating service request');
            }
        }
    } catch (error) {
        console.error('Error updating service request:', error);
        alert('Error updating service request');
    } finally {
        updateBtn.innerHTML = originalText;
        updateBtn.disabled = false;
    }
}
async function viewCalibration(calibrationId) {
    try {
        console.log('Viewing calibration details:', calibrationId);
        
        const response = await fetch(`/calibrations/${calibrationId}/edit`);
        const data = await response.json();
        
        if (data.success) {
            const calibration = data.calibration;
            
            // Populate the view modal
            document.getElementById('view_calibration_equipment').textContent = calibration.equipment?.name || 'N/A';
            document.getElementById('view_calibration_type').textContent = `Calibration Type: ${formatCalibrationType(calibration.calibration_type)}`;
            
            // Status and priority badges
            const statusBadge = document.getElementById('view_calibration_status');
            statusBadge.textContent = formatCalibrationStatus(calibration.status);
            statusBadge.className = `status-badge text-sm ${getCalibrationStatusBadgeClass(calibration.status)}`;
            
            const priorityBadge = document.getElementById('view_calibration_priority');
            priorityBadge.textContent = formatPriority(calibration.priority);
            priorityBadge.className = `priority-badge text-sm ${getPriorityBadgeClass(calibration.priority)}`;
            
            // Calibration details
            document.getElementById('view_calibration_date').textContent = formatDate(calibration.preferred_date) || 'Not specified';
            document.getElementById('view_calibration_time').textContent = formatTimeSlot(calibration.preferred_time);
            document.getElementById('view_last_calibration').textContent = formatDate(calibration.last_calibration_date) || 'No previous calibration';
            document.getElementById('view_next_due').textContent = formatDate(calibration.next_calibration_date) || 'Not scheduled';
            document.getElementById('view_calibration_technician').textContent = calibration.preferred_technician || 'Not assigned';
            document.getElementById('view_certificate_number').textContent = calibration.certificate_number || 'No certificate';
            document.getElementById('view_special_requirements').textContent = calibration.special_requirements || 'No special requirements specified.';
            
            // Urgent flag
            const urgentIcon = document.getElementById('view_urgent_icon');
            const urgentText = document.getElementById('view_urgent_text');
            const urgentDescription = document.getElementById('view_urgent_description');
            
            if (calibration.is_urgent) {
                urgentIcon.className = 'fas fa-exclamation-triangle text-red-500 mr-3';
                urgentText.textContent = 'Urgent Calibration';
                urgentText.className = 'font-medium text-red-600';
                urgentDescription.textContent = 'This calibration requires immediate attention';
            } else {
                urgentIcon.className = 'fas fa-flag text-gray-500 mr-3';
                urgentText.textContent = 'Standard Priority';
                urgentText.className = 'font-medium text-gray-600';
                urgentDescription.textContent = 'Routine calibration schedule';
            }
            
            // Timeline
            document.getElementById('view_created_at').textContent = formatDateTime(calibration.created_at);
            document.getElementById('view_updated_at').textContent = formatDateTime(calibration.updated_at);
            document.getElementById('view_completed_at').textContent = calibration.completed_at ? formatDateTime(calibration.completed_at) : 'Not completed';
            document.getElementById('view_scheduled_date').textContent = formatDateTime(calibration.created_at);
            document.getElementById('view_status_updated').textContent = formatDateTime(calibration.updated_at);
            
            // Set up the edit button in the view modal
            setupCalibrationViewModalEditButton(calibrationId);
            
            // Open the view modal
            openModal('viewCalibrationModal');
            
        } else {
            alert('Error loading calibration details: ' + data.message);
        }
    } catch (error) {
        console.error('Error loading calibration details:', error);
        alert('Error loading calibration details');
    }
}

// Helper function for time slot formatting
function formatTimeSlot(time) {
    const times = {
        'morning': 'Morning (8 AM - 12 PM)',
        'afternoon': 'Afternoon (12 PM - 4 PM)',
        'evening': 'Evening (4 PM - 7 PM)'
    };
    return times[time] || time;
}

function setupCalibrationViewModalEditButton(calibrationId) {
    const editBtn = document.getElementById('editCalibrationFromViewBtn');
    if (editBtn) {
        // Remove existing listeners
        editBtn.replaceWith(editBtn.cloneNode(true));
        const freshEditBtn = document.getElementById('editCalibrationFromViewBtn');
        
        freshEditBtn.addEventListener('click', function() {
            closeModal('viewCalibrationModal');
            // Small delay to ensure modal is closed before opening edit modal
            setTimeout(() => {
                editCalibration(calibrationId);
            }, 300);
        });
    }
}
function attachCalibrationEventListeners() {
    // View calibration buttons - now opens details modal
    document.querySelectorAll('.view-calibration').forEach(button => {
        button.addEventListener('click', function() {
            const calibrationId = this.getAttribute('data-id');
            viewCalibration(calibrationId);
        });
    });
    
    // Edit calibration buttons
    document.querySelectorAll('.edit-calibration').forEach(button => {
        button.addEventListener('click', function() {
            const calibrationId = this.getAttribute('data-id');
            editCalibration(calibrationId);
        });
    });
    
    // Delete calibration buttons
    document.querySelectorAll('.delete-calibration').forEach(button => {
        button.addEventListener('click', function() {
            const calibrationId = this.getAttribute('data-id');
            const calibrationName = this.getAttribute('data-name');
            deleteCalibration(calibrationId, calibrationName);
        });
    });
    
    // REMOVED: Reschedule calibration buttons
}
async function editCalibration(calibrationId) {
    try {
        console.log('Editing calibration:', calibrationId);
        
        const response = await fetch(`/calibrations/${calibrationId}/edit`);
        const data = await response.json();
        
        if (data.success) {
            const calibration = data.calibration;
            
            // First load equipment options, THEN set the value
            await loadEquipmentOptionsForCalibrationEdit();
            
            // Now populate the form with the calibration data
            document.getElementById('edit_calibration_id').value = calibration.id;
            document.getElementById('edit_calibration_equipment').value = calibration.equipment_id; // This should now work
            document.getElementById('edit_calibration_type').value = calibration.calibration_type;
            document.getElementById('edit_calibration_priority').value = calibration.priority;
            
            // Format date for input (YYYY-MM-DD)
            if (calibration.preferred_date) {
                const preferredDate = new Date(calibration.preferred_date);
                const formattedDate = preferredDate.toISOString().split('T')[0];
                document.getElementById('edit_calibration_date').value = formattedDate;
            }
            
            document.getElementById('edit_calibration_time').value = calibration.preferred_time;
            document.getElementById('edit_calibration_requirements').value = calibration.special_requirements || '';
            document.getElementById('edit_calibration_technician').value = calibration.preferred_technician || '';
            document.getElementById('edit_calibration_status').value = calibration.status;
            
            // Handle checkbox
            const urgentCheckbox = document.getElementById('edit_urgent_calibration');
            if (urgentCheckbox) {
                urgentCheckbox.checked = calibration.is_urgent == 1;
            }
            
            // Open the edit modal
            openModal('editCalibrationModal');
            
            // Setup update button
            setupCalibrationUpdate();
            
        } else {
            alert('Error loading calibration data: ' + data.message);
        }
    } catch (error) {
        console.error('Error loading calibration for edit:', error);
        alert('Error loading calibration data');
    }
}

async function loadEquipmentOptionsForCalibrationEdit() {
    try {
        const response = await fetch('{{ route("equipment.options") }}');
        const equipment = await response.json();
        
        const select = document.getElementById('edit_calibration_equipment');
        select.innerHTML = '<option value="">Choose equipment...</option>';
        
        equipment.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = `${item.name} - ${item.model}`;
            select.appendChild(option);
        });
        
    } catch (error) {
        console.error('Error loading equipment options for calibration edit:', error);
    }
}

function setupCalibrationUpdate() {
    const updateBtn = document.getElementById('updateCalibrationBtn');
    const form = document.getElementById('editCalibrationForm');
    
    if (updateBtn && form) {
        // Remove existing listeners
        updateBtn.replaceWith(updateBtn.cloneNode(true));
        const freshUpdateBtn = document.getElementById('updateCalibrationBtn');
        
        freshUpdateBtn.addEventListener('click', async function() {
            await updateCalibration();
        });
    }
}

async function updateCalibration() {
    const form = document.getElementById('editCalibrationForm');
    const updateBtn = document.getElementById('updateCalibrationBtn');
    const calibrationId = document.getElementById('edit_calibration_id').value;
    
    if (!form || !updateBtn || !calibrationId) {
        alert('Error: Form data missing');
        return;
    }
    
    const originalText = updateBtn.innerHTML;
    updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
    updateBtn.disabled = true;
    
    try {
        const formData = {
            equipment_id: document.getElementById('edit_calibration_equipment').value,
            calibration_type: document.getElementById('edit_calibration_type').value,
            priority: document.getElementById('edit_calibration_priority').value,
            preferred_date: document.getElementById('edit_calibration_date').value,
            preferred_time: document.getElementById('edit_calibration_time').value,
            special_requirements: document.getElementById('edit_calibration_requirements').value,
            preferred_technician: document.getElementById('edit_calibration_technician').value,
            status: document.getElementById('edit_calibration_status').value,
            is_urgent: document.getElementById('edit_urgent_calibration').checked ? 1 : 0,
        };
        
        console.log('Updating calibration:', calibrationId, formData);
        
        const response = await fetch(`/calibrations/${calibrationId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-HTTP-Method-Override': 'PUT'
            },
            body: JSON.stringify(formData)
        });
        
        const data = await response.json();
        
        if (data.success) {
            alert('Calibration updated successfully!');
            closeModal('editCalibrationModal');
            
            // Refresh both calibrations list AND calendar
            fetchCalibrations();
            refreshCalendar(); // ADD THIS LINE
            
        } else {
            if (data.errors) {
                let errorMessage = 'Please fix the following errors:\n';
                for (const field in data.errors) {
                    errorMessage += `- ${data.errors[field][0]}\n`;
                }
                alert(errorMessage);
            } else {
                alert(data.message || 'Error updating calibration');
            }
        }
    } catch (error) {
        console.error('Error updating calibration:', error);
        alert('Error updating calibration');
    } finally {
        updateBtn.innerHTML = originalText;
        updateBtn.disabled = false;
    }
}

// Additional helper functions for calibration actions
async function completeCalibration(calibrationId) {
    if (confirm('Mark this calibration as completed?')) {
        try {
            const response = await fetch(`/calibrations/${calibrationId}/complete`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                alert('Calibration marked as completed!');
                fetchCalibrations(); // Refresh the list
            } else {
                alert(data.message || 'Error completing calibration');
            }
        } catch (error) {
            console.error('Error completing calibration:', error);
            alert('Error completing calibration');
        }
    }
}

async function rescheduleCalibration(calibrationId) {
    // For now, we'll just open the edit modal for rescheduling
    // You could create a dedicated reschedule modal if needed
    editCalibration(calibrationId);
}
    // ========== FORM SUBMISSION HANDLERS ==========
    
    function setupFormSubmissions() {
    console.log('🔧 Setting up form submissions...');
    
    // Service Request Form Submission
    const requestForm = document.getElementById('requestForm');
    if (requestForm) {
        console.log('✅ Service request form found');
        
        // Remove any existing event listeners to avoid duplicates
        requestForm.removeEventListener('submit', handleServiceRequestSubmit);
        
        // Add the event listener
        requestForm.addEventListener('submit', handleServiceRequestSubmit);
        console.log('✅ Service request form handler attached');
        
        // Debug: Check if form elements exist
        console.log('📋 Form elements found:');
        console.log('- equipment_id:', requestForm.elements['equipment_id']);
        console.log('- issue_type:', requestForm.elements['issue_type']);
        console.log('- priority:', requestForm.elements['priority']);
        console.log('- problem_description:', requestForm.elements['problem_description']);
        console.log('- issue_start_time:', requestForm.elements['issue_start_time']);
        console.log('- contact_person:', requestForm.elements['contact_person']);
        console.log('- contact_phone:', requestForm.elements['contact_phone']);
        
    } else {
        console.error('❌ Service request form not found!');
    }
    
    // Equipment Form Submission (keep this as is)
    const equipmentForm = document.getElementById('equipmentForm');
    if (equipmentForm) {
        equipmentForm.addEventListener('submit', handleEquipmentSubmit);
        console.log('✅ Equipment form handler attached');
    }
    
    // Calibration Form Submission
    const calibrationForm = document.getElementById('calibrationForm');
    if (calibrationForm) {
        calibrationForm.addEventListener('submit', handleCalibrationSubmit);
        console.log('✅ Calibration form handler attached');
    }
// Add to setupModalCloseHandlers function
const closeViewRequestModal = document.getElementById('closeViewRequestModal');
const closeViewRequestBtn = document.getElementById('closeViewRequestBtn');

if (closeViewRequestModal) {
    closeViewRequestModal.addEventListener('click', () => closeModal('viewRequestModal'));
}
if (closeViewRequestBtn) {
    closeViewRequestBtn.addEventListener('click', () => closeModal('viewRequestModal'));
}
// Add to setupModalCloseHandlers function
const closeEditCalibrationModal = document.getElementById('closeEditCalibrationModal');
const cancelEditCalibration = document.getElementById('cancelEditCalibration');

if (closeEditCalibrationModal) {
    closeEditCalibrationModal.addEventListener('click', () => closeModal('editCalibrationModal'));
}
if (cancelEditCalibration) {
    cancelEditCalibration.addEventListener('click', () => closeModal('editCalibrationModal'));
}
    // Add to setupModalCloseHandlers function
const closeEditRequestModal = document.getElementById('closeEditRequestModal');
const cancelEditRequest = document.getElementById('cancelEditRequest');

if (closeEditRequestModal) {
    closeEditRequestModal.addEventListener('click', () => closeModal('editRequestModal'));
}
if (cancelEditRequest) {
    cancelEditRequest.addEventListener('click', () => closeModal('editRequestModal'));
}
}
// Add to setupModalCloseHandlers function
const closeViewEquipmentModal = document.getElementById('closeViewEquipmentModal');
const closeViewEquipmentBtn = document.getElementById('closeViewEquipmentBtn');

if (closeViewEquipmentModal) {
    closeViewEquipmentModal.addEventListener('click', () => closeModal('viewEquipmentModal'));
}
if (closeViewEquipmentBtn) {
    closeViewEquipmentBtn.addEventListener('click', () => closeModal('viewEquipmentModal'));
}

// Add to setupModalCloseHandlers function
const closeViewCalibrationModal = document.getElementById('closeViewCalibrationModal');
const closeViewCalibrationBtn = document.getElementById('closeViewCalibrationBtn');

if (closeViewCalibrationModal) {
    closeViewCalibrationModal.addEventListener('click', () => closeModal('viewCalibrationModal'));
}
if (closeViewCalibrationBtn) {
    closeViewCalibrationBtn.addEventListener('click', () => closeModal('viewCalibrationModal'));
}

// Add to setupModalCloseHandlers function
const closeEditEquipmentModal = document.getElementById('closeEditEquipmentModal');
const cancelEditEquipment = document.getElementById('cancelEditEquipment');

if (closeEditEquipmentModal) {
    closeEditEquipmentModal.addEventListener('click', () => closeModal('editEquipmentModal'));
}
if (cancelEditEquipment) {
    cancelEditEquipment.addEventListener('click', () => closeModal('editEquipmentModal'));
}

// In handleEquipmentSubmit, after successful equipment addition:
if (data.success) {
    alert('Equipment added successfully!');
    closeModal('addEquipmentModal');
    form.reset();
    fetchEquipmentData();
    refreshRecentActivities(); // Add this line
}

// In handleServiceRequestManual, after successful service request:
if (data.success) {
    alert(`Service request submitted successfully! Request ID: ${data.request_id}`);
    closeModal('newRequestModal');
    form.reset();
    fetchServiceRequests();
    refreshRecentActivities(); // Add this line
}

// In handleCalibrationManual, after successful calibration:
if (data.success) {
    alert('Calibration scheduled successfully!');
    closeModal('scheduleCalibrationModal');
    form.reset();
    fetchCalibrations();
    refreshRecentActivities(); // Add this line
}

async function handleServiceRequestManual() {
    console.log('🔧 Manual service request submission triggered');
    
    const form = document.getElementById('requestForm');
    const submitBtn = document.getElementById('newSubmitRequestBtn');
    
    if (!form || !submitBtn) {
        console.error('❌ Form or submit button not found!');
        alert('Error: Form elements not found');
        return;
    }
    
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
    submitBtn.disabled = true;
    
    try {
        // Get form values using querySelector to be safe
        const formData = {
            equipment_id: form.querySelector('[name="equipment_id"]').value,
            issue_type: form.querySelector('[name="issue_type"]').value,
            priority: form.querySelector('[name="priority"]').value,
            problem_description: form.querySelector('[name="problem_description"]').value,
            issue_start_time: form.querySelector('[name="issue_start_time"]').value,
            contact_person: form.querySelector('[name="contact_person"]').value,
            contact_phone: form.querySelector('[name="contact_phone"]').value,
        };
        
        console.log('📦 Manual Service Request Form Data:', formData);
        
        // Validate required fields
        if (!formData.equipment_id) {
            alert('Please select equipment');
            return;
        }
        if (!formData.issue_type) {
            alert('Please select issue type');
            return;
        }
        if (!formData.problem_description) {
            alert('Please enter problem description');
            return;
        }
        if (!formData.issue_start_time) {
            alert('Please select when the issue started');
            return;
        }
        if (!formData.contact_person) {
            alert('Please enter contact person name');
            return;
        }
        if (!formData.contact_phone) {
            alert('Please enter contact phone number');
            return;
        }
        
        console.log('🚀 Sending manual service request to:', '{{ route("service-requests.store") }}');
        
        const response = await fetch('{{ route("service-requests.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: JSON.stringify(formData)
        });
        
        console.log('📨 Response status:', response.status);
        
        const data = await response.json();
        console.log('📊 Response data:', data);
        
        if (data.success) {
            alert(`Service request submitted successfully! Request ID: ${data.request_id}`);
            closeModal('newRequestModal');
            form.reset();
            fetchServiceRequests(); // Refresh service requests list
        } else {
            if (data.errors) {
                let errorMessage = 'Please fix the following errors:\n';
                for (const field in data.errors) {
                    errorMessage += `- ${data.errors[field][0]}\n`;
                }
                alert(errorMessage);
            } else {
                alert(data.message || 'Error submitting request');
            }
        }
    } catch (error) {
        console.error('❌ Manual Service Request Error:', error);
        console.error('Error details:', error);
        alert('Error submitting service request. Please check console for details.');
    } finally {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }
}
    
    async function handleEquipmentSubmit(e) {
    e.preventDefault();
    
    const form = e.target;
    const submitBtn = document.getElementById('submitEquipment');
    const originalText = submitBtn.innerHTML;
    
    // Show loading state
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding...';
    submitBtn.disabled = true;
    
    try {
        const formData = new FormData(form);
        
        // Debug: Log form data
        console.log('📦 Equipment Form Data:');
        for (let [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }
        
        console.log('🚀 Sending request to:', '{{ route("equipment.store") }}');
        
        const response = await fetch('{{ route("equipment.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        });
        
        console.log('📨 Response status:', response.status);
        console.log('📨 Response OK:', response.ok);
        
        const data = await response.json();
        console.log('📊 Response data:', data);
        
        if (data.success) {
            alert('Equipment added successfully!');
            closeModal('addEquipmentModal');
            form.reset();
            fetchEquipmentData(); // Refresh equipment list
        } else {
            if (data.errors) {
                let errorMessage = 'Please fix the following errors:\n';
                for (const field in data.errors) {
                    errorMessage += `- ${data.errors[field][0]}\n`;
                }
                alert(errorMessage);
            } else {
                alert(data.message || 'Error adding equipment');
            }
        }
    } catch (error) {
        console.error('❌ Equipment Error:', error);
        console.error('Error name:', error.name);
        console.error('Error message:', error.message);
        alert('Network error occurred. Please check console for details and try again.');
    } finally {
        // Reset button state
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }
}
    
   async function handleServiceRequestSubmit(e) {
    e.preventDefault();
    console.log('🔧 Service Request form submission triggered');
    
    const form = e.target;
    const submitBtn = document.getElementById('submitRequest');
    
    if (!submitBtn) {
        console.error('❌ Submit button not found!');
        alert('Error: Submit button not found');
        return;
    }
    
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
    submitBtn.disabled = true;
    
    try {
        // Debug: Log all form values before creating the object
        console.log('📋 Current form values:');
        console.log('- equipment_id:', form.elements['equipment_id'].value);
        console.log('- issue_type:', form.elements['issue_type'].value);
        console.log('- priority:', form.elements['priority'].value);
        console.log('- problem_description:', form.elements['problem_description'].value);
        console.log('- issue_start_time:', form.elements['issue_start_time'].value);
        console.log('- contact_person:', form.elements['contact_person'].value);
        console.log('- contact_phone:', form.elements['contact_phone'].value);
        
        // Collect form data as object - using the actual form values
        const formData = {
            equipment_id: form.elements['equipment_id'].value,
            issue_type: form.elements['issue_type'].value,
            priority: form.elements['priority'].value,
            problem_description: form.elements['problem_description'].value,
            issue_start_time: form.elements['issue_start_time'].value,
            contact_person: form.elements['contact_person'].value,
            contact_phone: form.elements['contact_phone'].value,
        };
        
        console.log('📦 Service Request Form Data (Actual Input):', formData);
        
        // Validate that we have actual data (not empty)
        if (!formData.equipment_id) {
            alert('Please select equipment');
            return;
        }
        if (!formData.problem_description) {
            alert('Please enter problem description');
            return;
        }
        
        console.log('🚀 Sending service request to:', '{{ route("service-requests.store") }}');
        
        const response = await fetch('{{ route("service-requests.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: JSON.stringify(formData)
        });
        
        console.log('📨 Response status:', response.status);
        
        const data = await response.json();
        console.log('📊 Response data:', data);
        
        if (data.success) {
            alert(`Service request submitted successfully! Request ID: ${data.request_id}`);
            closeModal('newRequestModal');
            form.reset();
            fetchServiceRequests(); // Refresh service requests list
        } else {
            if (data.errors) {
                let errorMessage = 'Please fix the following errors:\n';
                for (const field in data.errors) {
                    errorMessage += `- ${data.errors[field][0]}\n`;
                }
                alert(errorMessage);
            } else {
                alert(data.message || 'Error submitting request');
            }
        }
    } catch (error) {
        console.error('❌ Service Request Error:', error);
        console.error('Error details:', error);
        alert('Error submitting service request. Please check console for details.');
    } finally {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }
}
   async function deleteEquipment(equipmentId, equipmentName) {
    if (!confirm(`Are you sure you want to delete "${equipmentName}"? This action cannot be undone.`)) {
        return;
    }

    try {
        console.log('Deleting equipment:', equipmentId);
        
        const response = await fetch(`/equipment/${equipmentId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-HTTP-Method-Override': 'DELETE'
            }
        });

        const data = await response.json();

        if (data.success) {
            alert('Equipment deleted successfully!');
            fetchEquipmentData(); // Refresh the equipment list
        } else {
            alert(data.message || 'Error deleting equipment');
        }
    } catch (error) {
        console.error('Error deleting equipment:', error);
        alert('Error deleting equipment');
    }
}
async function deleteServiceRequest(requestId, requestTitle) {
    if (!confirm(`Are you sure you want to delete ${requestTitle}? This action cannot be undone.`)) {
        return;
    }

    try {
        console.log('Deleting service request:', requestId);
        
        const response = await fetch(`/service-requests/${requestId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-HTTP-Method-Override': 'DELETE'
            }
        });

        const data = await response.json();

        if (data.success) {
            alert('Service request deleted successfully!');
            fetchServiceRequests(); // Refresh the service requests list
        } else {
            alert(data.message || 'Error deleting service request');
        }
    } catch (error) {
        console.error('Error deleting service request:', error);
        alert('Error deleting service request');
    }
}

async function deleteCalibration(calibrationId, calibrationName) {
    if (!confirm(`Are you sure you want to delete the calibration for "${calibrationName}"? This action cannot be undone.`)) {
        return;
    }

    try {
        console.log('Deleting calibration:', calibrationId);
        
        const response = await fetch(`/calibrations/${calibrationId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-HTTP-Method-Override': 'DELETE'
            }
        });

        const data = await response.json();

        if (data.success) {
            alert('Calibration deleted successfully!');
            fetchCalibrations(); // Refresh the calibrations list
        } else {
            alert(data.message || 'Error deleting calibration');
        }
    } catch (error) {
        console.error('Error deleting calibration:', error);
        alert('Error deleting calibration');
    }
}

    // Add this function to handle calibration submission
async function handleCalibrationManual() {
    console.log('🔧 Manual calibration submission triggered');
    
    const form = document.getElementById('calibrationForm');
    const submitBtn = document.getElementById('newSubmitCalibrationBtn');
    
    if (!form || !submitBtn) {
        console.error('❌ Calibration form or submit button not found!');
        alert('Error: Form elements not found');
        return;
    }
    
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Scheduling...';
    submitBtn.disabled = true;
    
    try {
        // Get form values
        const formData = {
            equipment_id: form.querySelector('[name="equipment_id"]').value,
            calibration_type: form.querySelector('[name="calibration_type"]').value,
            priority: form.querySelector('[name="priority"]').value,
            preferred_date: form.querySelector('[name="preferred_date"]').value,
            preferred_time: form.querySelector('[name="preferred_time"]').value,
            special_requirements: form.querySelector('[name="special_requirements"]').value,
            preferred_technician: form.querySelector('[name="preferred_technician"]').value,
            is_urgent: form.querySelector('[name="is_urgent"]').checked ? 1 : 0,
        };
        
        console.log('📦 Calibration Form Data:', formData);
        
        // Validate required fields
        if (!formData.equipment_id) {
            alert('Please select equipment');
            return;
        }
        if (!formData.calibration_type) {
            alert('Please select calibration type');
            return;
        }
        if (!formData.preferred_date) {
            alert('Please select preferred date');
            return;
        }
        if (!formData.preferred_time) {
            alert('Please select preferred time');
            return;
        }
        
        console.log('🚀 Sending calibration request to:', '{{ route("calibrations.store") }}');
        
        const response = await fetch('{{ route("calibrations.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: JSON.stringify(formData)
        });
        
        console.log('📨 Response status:', response.status);
        
        const data = await response.json();
        console.log('📊 Response data:', data);
        
        if (data.success) {
            alert('Calibration scheduled successfully!');
            closeModal('scheduleCalibrationModal');
            form.reset();
            fetchCalibrations(); // Refresh calibrations list
        } else {
            if (data.errors) {
                let errorMessage = 'Please fix the following errors:\n';
                for (const field in data.errors) {
                    errorMessage += `- ${data.errors[field][0]}\n`;
                }
                alert(errorMessage);
            } else {
                alert(data.message || 'Error scheduling calibration');
            }
        }
    } catch (error) {
        console.error('❌ Calibration Error:', error);
        console.error('Error details:', error);
        alert('Error scheduling calibration. Please check console for details.');
    } finally {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }
}

// Update the existing handleCalibrationSubmit function
async function handleCalibrationSubmit(e) {
    e.preventDefault();
    console.log('🔧 Calibration form submission triggered');
    
    const form = e.target;
    const submitBtn = document.getElementById('submitCalibration');
    
    if (!submitBtn) {
        console.error('❌ Calibration submit button not found!');
        // Fall back to manual submission
        await handleCalibrationManual();
        return;
    }
    
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Scheduling...';
    submitBtn.disabled = true;
    
    try {
        const formData = new FormData(form);
        // Handle checkbox separately
        const isUrgentCheckbox = document.getElementById('urgentCalibration');
        if (isUrgentCheckbox) {
            formData.set('is_urgent', isUrgentCheckbox.checked ? '1' : '0');
        }
        
        console.log('📦 Calibration FormData:', Object.fromEntries(formData.entries()));
        
        const response = await fetch('{{ route("calibrations.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        });
        
        console.log('📨 Response status:', response.status);
        
        const data = await response.json();
        console.log('📊 Response data:', data);
        
        if (data.success) {
            alert('Calibration scheduled successfully!');
            closeModal('scheduleCalibrationModal');
            form.reset();
            fetchCalibrations();
        } else {
            if (data.errors) {
                let errorMessage = 'Please fix the following errors:\n';
                for (const field in data.errors) {
                    errorMessage += `- ${data.errors[field][0]}\n`;
                }
                alert(errorMessage);
            } else {
                alert(data.message || 'Error scheduling calibration');
            }
        }
    } catch (error) {
        console.error('❌ Calibration Error:', error);
        alert('Error scheduling calibration: ' + error.message);
    } finally {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }
}

    // ========== HELPER FUNCTIONS ==========
    
    function getEquipmentIcon(type) {
        const icons = {
            'analyzer': 'fas fa-microscope',
            'centrifuge': 'fas fa-cogs',
            'monitor': 'fas fa-heartbeat',
            'ventilator': 'fas fa-wind',
            'ultrasound': 'fas fa-wave-square',
            'default': 'fas fa-cube'
        };
        return icons[type] || icons.default;
    }
    
    function getEquipmentIconColor(status) {
        const colors = {
            'operational': 'bg-green-100',
            'maintenance': 'bg-yellow-100',
            'attention': 'bg-red-100',
            'default': 'bg-blue-100'
        };
        return colors[status] || colors.default;
    }
    
    function getEquipmentIconColorClass(status) {
        const colors = {
            'operational': 'text-green-600',
            'maintenance': 'text-yellow-600',
            'attention': 'text-red-600',
            'default': 'text-blue-600'
        };
        return colors[status] || colors.default;
    }
    
    function getStatusBadgeClass(status) {
        const classes = {
            'operational': 'status-operational',
            'maintenance': 'status-maintenance',
            'attention': 'status-attention',
            'pending': 'status-attention',
            'in_progress': 'status-maintenance',
            'completed': 'status-operational',
            'scheduled': 'status-maintenance',
            'due_soon': 'status-attention',
            'overdue': 'status-attention'
        };
        return classes[status] || 'status-attention';
    }
    
    function formatStatus(status) {
        const statusMap = {
            'operational': 'Operational',
            'maintenance': 'Under Maintenance',
            'attention': 'Needs Attention',
            'pending': 'Pending',
            'in_progress': 'In Progress',
            'completed': 'Completed',
            'scheduled': 'Scheduled',
            'due_soon': 'Due Soon',
            'overdue': 'Overdue'
        };
        return statusMap[status] || status;
    }
    
    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        try {
            return new Date(dateString).toLocaleDateString();
        } catch (e) {
            return 'N/A';
        }
    }
    
    function formatDateTime(dateString) {
        if (!dateString) return 'N/A';
        try {
            return new Date(dateString).toLocaleString();
        } catch (e) {
            return 'N/A';
        }
    }
    
    function formatIssueType(issueType) {
        const types = {
            'mechanical': 'Mechanical Failure',
            'electrical': 'Electrical Issue',
            'software': 'Software Problem',
            'calibration': 'Calibration Required',
            'performance': 'Performance Issue',
            'other': 'Other'
        };
        return types[issueType] || issueType;
    }
    
    function formatPriority(priority) {
        return priority.charAt(0).toUpperCase() + priority.slice(1);
    }
    
    function getPriorityBadgeClass(priority) {
        const classes = {
            'low': 'status-operational',
            'medium': 'status-maintenance',
            'high': 'status-attention',
            'urgent': 'status-attention'
        };
        return classes[priority] || 'status-attention';
    }
    
    function formatCalibrationType(type) {
        const types = {
            'routine': 'Routine Calibration',
            'preventive': 'Preventive Maintenance',
            'corrective': 'Corrective Calibration',
            'certification': 'Certification Calibration'
        };
        return types[type] || type;
    }
    
    function formatCalibrationStatus(status) {
        const statusMap = {
            'scheduled': 'Scheduled',
            'in_progress': 'In Progress',
            'completed': 'Completed',
            'due_soon': 'Due Soon',
            'overdue': 'Overdue'
        };
        return statusMap[status] || status;
    }
    
    function getCalibrationStatusBadgeClass(status) {
        const classes = {
            'scheduled': 'status-maintenance',
            'in_progress': 'status-maintenance',
            'completed': 'status-operational',
            'due_soon': 'status-attention',
            'overdue': 'status-attention'
        };
        return classes[status] || 'status-attention';
    }
    
    function showLoading(elementId, message = 'Loading...') {
        const element = document.getElementById(elementId);
        if (element) {
            element.innerHTML = `
                <div class="text-center py-4 text-gray-500">
                    <i class="fas fa-spinner fa-spin mr-2"></i>
                    ${message}
                </div>
            `;
        }
    }
    
    function hideLoading(elementId) {
        // Loading will be replaced by actual content
    }
    
    function showError(elementId, message) {
        const element = document.getElementById(elementId);
        if (element) {
            element.innerHTML = `
                <div class="text-center py-4 text-red-500">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    ${message}
                </div>
            `;
        }
    }

    // ========== ANIMATION AND RESPONSIVE HANDLING ==========
    
    function initializeAnimations() {
        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe elements with animation classes
        const animatedElements = document.querySelectorAll('.slide-up, .fade-in');
        animatedElements.forEach(el => {
            // Set animation to paused initially
            el.style.animationPlayState = 'paused';
            observer.observe(el);
        });
    }
    
    function setupResponsiveHandling() {
        window.addEventListener('resize', handleResize);
    }
    
    function handleResize() {
        if (window.innerWidth >= 1024) {
            closeMobileSidebar();
        }
    }

    // ========== GLOBAL FUNCTIONS (for HTML onclick handlers) ==========
    
    // Make these functions available globally for onclick handlers
    window.openModal = openModal;
    window.closeModal = closeModal;

    console.log('✅ Dashboard JavaScript loaded successfully');

    // Temporary test function - remove after debugging
async function testServiceRequestSubmission() {
    console.log('🧪 Testing service request submission...');
    
    const form = document.getElementById('requestForm');
    if (!form) {
        console.error('❌ Service request form not found for test');
        return;
    }
    
    // Fill with test data
    form.elements['equipment_id'].value = '1'; // Use an existing equipment ID
    form.elements['issue_type'].value = 'mechanical';
    form.elements['priority'].value = 'medium';
    form.elements['problem_description'].value = 'Test problem description';
    form.elements['issue_start_time'].value = '2024-01-23T10:00';
    form.elements['contact_person'].value = 'Test User';
    form.elements['contact_phone'].value = '123-456-7890';
    
    console.log('✅ Test data filled, triggering submission...');
    
    // Trigger form submission
    const submitEvent = new Event('submit', { cancelable: true });
    form.dispatchEvent(submitEvent);
}

function updateEquipmentUI(equipment) {
    const equipmentGrid = document.getElementById('equipmentGrid');
    
    if (!equipmentGrid) return;
    
    hideLoading('equipmentGrid');
    
    if (!equipment || equipment.length === 0) {
        equipmentGrid.innerHTML = `
            <div class="col-span-3 text-center py-8 text-gray-500">
                <i class="fas fa-microscope fa-2x mb-2"></i>
                <p>No equipment found</p>
                <button class="btn btn-primary btn-sm mt-2" onclick="openModal('addEquipmentModal')">
                    <i class="fas fa-plus mr-1"></i>
                    Add Your First Equipment
                </button>
            </div>
        `;
        return;
    }
    
    equipmentGrid.innerHTML = equipment.map(item => `
        <div class="card">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 ${getEquipmentIconColor(item.status)} rounded-lg flex items-center justify-center mr-3">
                    <i class="${getEquipmentIcon(item.type)} ${getEquipmentIconColorClass(item.status)}"></i>
                </div>
                <div>
                    <h3 class="font-semibold">${item.name}</h3>
                    <p class="text-sm text-gray-500">${item.model}</p>
                    <p class="text-xs text-gray-400">${item.serial_number}</p>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="status-badge ${getStatusBadgeClass(item.status)}">${formatStatus(item.status)}</span>
                <div class="flex gap-1">
                    <button class="btn btn-outline btn-sm view-equipment" data-id="${item.id}" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-outline btn-sm edit-equipment" data-id="${item.id}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-outline btn-sm delete-equipment" data-id="${item.id}" data-name="${item.name}" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `).join('');
    
    // Add event listeners for equipment buttons
    attachEquipmentEventListeners();
}

function attachEquipmentEventListeners() {
    // View equipment buttons - now opens details modal
    document.querySelectorAll('.view-equipment').forEach(button => {
        button.addEventListener('click', function() {
            const equipmentId = this.getAttribute('data-id');
            viewEquipment(equipmentId);
        });
    });
    
    // Edit equipment buttons
    document.querySelectorAll('.edit-equipment').forEach(button => {
        button.addEventListener('click', function() {
            const equipmentId = this.getAttribute('data-id');
            editEquipment(equipmentId);
        });
    });
    
    // Delete equipment buttons
    document.querySelectorAll('.delete-equipment').forEach(button => {
        button.addEventListener('click', function() {
            const equipmentId = this.getAttribute('data-id');
            const equipmentName = this.getAttribute('data-name');
            deleteEquipment(equipmentId, equipmentName);
        });
    });
}

async function editEquipment(equipmentId) {
    try {
        console.log('Editing equipment:', equipmentId);
        
        const response = await fetch(`/equipment/${equipmentId}/edit`);
        const data = await response.json();
        
        if (data.success) {
            const equipment = data.equipment;
            
            // Populate the edit form
            document.getElementById('edit_equipment_id').value = equipment.id;
            document.getElementById('edit_equipment_name').value = equipment.name;
            document.getElementById('edit_equipment_model').value = equipment.model;
            document.getElementById('edit_equipment_serial').value = equipment.serial_number;
            document.getElementById('edit_equipment_manufacturer').value = equipment.manufacturer;
            
            // Format dates for HTML input (YYYY-MM-DD)
            if (equipment.purchase_date) {
                const purchaseDate = new Date(equipment.purchase_date);
                const formattedPurchaseDate = purchaseDate.toISOString().split('T')[0];
                document.getElementById('edit_equipment_purchase_date').value = formattedPurchaseDate;
            }
            
            if (equipment.warranty_expiry) {
                const warrantyDate = new Date(equipment.warranty_expiry);
                const formattedWarrantyDate = warrantyDate.toISOString().split('T')[0];
                document.getElementById('edit_equipment_warranty').value = formattedWarrantyDate;
            }
            
            document.getElementById('edit_equipment_location').value = equipment.location_department;
            document.getElementById('edit_equipment_status').value = equipment.status;
            document.getElementById('edit_equipment_notes').value = equipment.notes || '';
            
            // Open the edit modal
            openModal('editEquipmentModal');
            
            // Setup update button
            setupEquipmentUpdate();
            
        } else {
            alert('Error loading equipment data: ' + data.message);
        }
    } catch (error) {
        console.error('Error loading equipment for edit:', error);
        alert('Error loading equipment data');
    }
}

async function editServiceRequest(requestId) {
    try {
        console.log('🔄 Editing service request:', requestId);
        
        const response = await fetch(`/service-requests/${requestId}/edit`);
        const data = await response.json();
        
        console.log('📦 Service request data received:', data);
        
        if (data.success) {
            const request = data.request;
            console.log('🔧 Request equipment_id:', request.equipment_id);
            
            // Load equipment options FIRST and wait for completion
            console.log('📥 Loading equipment options...');
            await loadEquipmentOptionsForEdit();
            console.log('✅ Equipment options loaded');
            
            // Now populate the form
            console.log('🔄 Populating form fields...');
            document.getElementById('edit_request_id').value = request.id;
            
            // Set equipment value AFTER options are loaded
            const equipmentSelect = document.getElementById('edit_request_equipment');
            console.log('🎯 Equipment select element:', equipmentSelect);
            console.log('🎯 Equipment options count:', equipmentSelect.options.length);
            
            equipmentSelect.value = request.equipment_id;
            console.log('🎯 Equipment value set to:', equipmentSelect.value);
            
            document.getElementById('edit_request_issue_type').value = request.issue_type;
            document.getElementById('edit_request_priority').value = request.priority;
            document.getElementById('edit_request_description').value = request.problem_description;
            
            // Format datetime
            if (request.issue_start_time) {
                const issueStartTime = new Date(request.issue_start_time);
                const timezoneOffset = issueStartTime.getTimezoneOffset() * 60000;
                const localTime = new Date(issueStartTime.getTime() - timezoneOffset);
                const formattedTime = localTime.toISOString().slice(0, 16);
                document.getElementById('edit_request_start_time').value = formattedTime;
            }
            
            document.getElementById('edit_request_contact_person').value = request.contact_person;
            document.getElementById('edit_request_contact_phone').value = request.contact_phone;
            document.getElementById('edit_request_status').value = request.status;
            
            console.log('✅ Form populated successfully');
            
            // Open the edit modal
            openModal('editRequestModal');
            setupServiceRequestUpdate();
            
        } else {
            alert('Error loading service request data: ' + data.message);
        }
    } catch (error) {
        console.error('❌ Error loading service request for edit:', error);
        alert('Error loading service request data');
    }
}

function setupEquipmentUpdate() {
    const updateBtn = document.getElementById('updateEquipmentBtn');
    const form = document.getElementById('editEquipmentForm');
    
    if (updateBtn && form) {
        // Remove existing listeners
        updateBtn.replaceWith(updateBtn.cloneNode(true));
        const freshUpdateBtn = document.getElementById('updateEquipmentBtn');
        
        freshUpdateBtn.addEventListener('click', async function() {
            await updateEquipment();
        });
    }
}

async function updateEquipment() {
    const form = document.getElementById('editEquipmentForm');
    const updateBtn = document.getElementById('updateEquipmentBtn');
    const equipmentId = document.getElementById('edit_equipment_id').value;
    
    if (!form || !updateBtn || !equipmentId) {
        alert('Error: Form data missing');
        return;
    }
    
    const originalText = updateBtn.innerHTML;
    updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
    updateBtn.disabled = true;
    
    try {
        const formData = new FormData(form);
        
        console.log('Updating equipment:', equipmentId);
        
        const response = await fetch(`/equipment/${equipmentId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-HTTP-Method-Override': 'PUT'
            },
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            alert('Equipment updated successfully!');
            closeModal('editEquipmentModal');
            fetchEquipmentData(); // Refresh the list
        } else {
            if (data.errors) {
                let errorMessage = 'Please fix the following errors:\n';
                for (const field in data.errors) {
                    errorMessage += `- ${data.errors[field][0]}\n`;
                }
                alert(errorMessage);
            } else {
                alert(data.message || 'Error updating equipment');
            }
        }
    } catch (error) {
        console.error('Error updating equipment:', error);
        alert('Error updating equipment');
    } finally {
        updateBtn.innerHTML = originalText;
        updateBtn.disabled = false;
    }
}

async function viewEquipment(equipmentId) {
    try {
        console.log('Viewing equipment details:', equipmentId);
        
        const response = await fetch(`/equipment/${equipmentId}/edit`);
        const data = await response.json();
        
        if (data.success) {
            const equipment = data.equipment;
            
            // Populate the view modal
            document.getElementById('view_equipment_name').textContent = equipment.name;
            document.getElementById('view_equipment_model').textContent = `Model: ${equipment.model}`;
            document.getElementById('view_equipment_serial').textContent = `Serial: ${equipment.serial_number}`;
            
            // Status badge
            const statusBadge = document.getElementById('view_equipment_status');
            statusBadge.textContent = formatStatus(equipment.status);
            statusBadge.className = `status-badge text-sm ${getStatusBadgeClass(equipment.status)}`;
            
            // Equipment details
            document.getElementById('view_equipment_manufacturer').textContent = equipment.manufacturer || 'Not specified';
            document.getElementById('view_equipment_location').textContent = equipment.location_department || 'Not specified';
            document.getElementById('view_equipment_purchase_date').textContent = formatDate(equipment.purchase_date) || 'Not specified';
            document.getElementById('view_equipment_warranty').textContent = formatDate(equipment.warranty_expiry) || 'No warranty';
            document.getElementById('view_equipment_type').textContent = equipment.type || 'General Equipment';
            document.getElementById('view_equipment_last_service').textContent = equipment.last_service_date ? formatDate(equipment.last_service_date) : 'No service recorded';
            document.getElementById('view_equipment_notes').textContent = equipment.notes || 'No additional notes provided.';
            
            // Equipment health
            document.getElementById('view_health_status').textContent = formatStatus(equipment.status);
            const healthBar = document.getElementById('view_health_bar');
            healthBar.className = `h-2 rounded-full ${getHealthBarClass(equipment.status)}`;
            healthBar.style.width = getHealthBarWidth(equipment.status);
            
            // Quick stats (you can enhance these with real data later)
            document.getElementById('view_service_requests').textContent = '0'; // Placeholder
            document.getElementById('view_calibrations').textContent = '0'; // Placeholder
            document.getElementById('view_uptime').textContent = '98%'; // Placeholder
            
            // Timeline
            document.getElementById('view_created_at').textContent = formatDateTime(equipment.created_at);
            document.getElementById('view_updated_at').textContent = formatDateTime(equipment.updated_at);
            
            // Set up the edit button in the view modal
            setupEquipmentViewModalEditButton(equipmentId);
            
            // Open the view modal
            openModal('viewEquipmentModal');
            
        } else {
            alert('Error loading equipment details: ' + data.message);
        }
    } catch (error) {
        console.error('Error loading equipment details:', error);
        alert('Error loading equipment details');
    }
}
function navigateToEquipment() {
    // Find the equipment menu item and click it
    const equipmentMenuItem = document.querySelector('.menu-item[data-section="equipment"]');
    if (equipmentMenuItem) {
        equipmentMenuItem.click();
    }
}

function updateEquipmentHealthOverview(equipmentData) {
    if (!equipmentData || !Array.isArray(equipmentData)) return;
    
    // Count equipment by status
    const statusCounts = {
        operational: 0,
        attention: 0,
        maintenance: 0
    };
    
    const criticalAlerts = [];
    
    equipmentData.forEach(equipment => {
        // Count by status
        if (equipment.status === 'operational') {
            statusCounts.operational++;
        } else if (equipment.status === 'attention') {
            statusCounts.attention++;
        } else if (equipment.status === 'maintenance') {
            statusCounts.maintenance++;
        }
        
        // Check for critical alerts (equipment that needs attention or maintenance)
        if (equipment.status === 'attention' || equipment.status === 'maintenance') {
            criticalAlerts.push({
                name: equipment.name,
                model: equipment.model,
                status: equipment.status,
                issue: equipment.status === 'attention' ? 'Needs Attention' : 'Under Maintenance',
                lastService: equipment.last_service_date
            });
        }
    });
    
    const totalEquipment = equipmentData.length;
    
    // Update the counts
    document.getElementById('operationalCount').textContent = statusCounts.operational;
    document.getElementById('attentionCount').textContent = statusCounts.attention;
    document.getElementById('maintenanceCount').textContent = statusCounts.maintenance;
    
    // Update the health bars with percentages
    if (totalEquipment > 0) {
        const operationalPercent = (statusCounts.operational / totalEquipment) * 100;
        const attentionPercent = (statusCounts.attention / totalEquipment) * 100;
        const maintenancePercent = (statusCounts.maintenance / totalEquipment) * 100;
        
        document.getElementById('operationalHealthBar').style.width = `${operationalPercent}%`;
        document.getElementById('attentionHealthBar').style.width = `${attentionPercent}%`;
        document.getElementById('maintenanceHealthBar').style.width = `${maintenancePercent}%`;
    }
    
    // Update critical alerts
    updateCriticalAlerts(criticalAlerts);
}

function updateCriticalAlerts(alerts) {
    const container = document.getElementById('criticalAlertsContainer');
    
    if (!alerts || alerts.length === 0) {
        container.innerHTML = `
            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-3">
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <div>
                        <div class="font-medium text-green-800 dark:text-green-200">All equipment is operational</div>
                        <div class="text-sm text-green-600 dark:text-green-300 mt-1">No critical alerts at this time</div>
                    </div>
                </div>
            </div>
        `;
        return;
    }
    
    // Show only the first 3 critical alerts
    const displayAlerts = alerts.slice(0, 3);
    
    container.innerHTML = displayAlerts.map(alert => {
        // Determine styling based on status
        const isAttention = alert.status === 'attention';
        const bgColor = isAttention ? 'red' : 'yellow';
        const icon = isAttention ? 'fa-exclamation-circle' : 'fa-tools';
        const issueText = isAttention ? 'Needs Attention' : 'Under Maintenance';
        
        return `
        <div class="bg-${bgColor}-50 dark:bg-${bgColor}-900/20 border border-${bgColor}-200 dark:border-${bgColor}-800 rounded-lg p-3 mb-3">
            <div class="flex items-start">
                <i class="fas ${icon} text-${bgColor}-500 mt-1 mr-2"></i>
                <div>
                    <div class="font-medium text-${bgColor}-800 dark:text-${bgColor}-200">${alert.name} (${alert.model}) ${issueText}</div>
                    <div class="text-sm text-${bgColor}-600 dark:text-${bgColor}-300 mt-1">
                        Status: ${formatStatus(alert.status)}${alert.lastService ? ` | Last Service: ${formatDate(alert.lastService)}` : ''}
                    </div>
                </div>
            </div>
        </div>
        `;
    }).join('');
    
    // Show "show more" if there are more alerts
    if (alerts.length > 3) {
        container.innerHTML += `
            <div class="text-center mt-2">
                <button class="text-sm text-dexomed-500 hover:text-dexomed-600 font-medium" onclick="navigateToEquipment()">
                    +${alerts.length - 3} more critical alerts
                </button>
            </div>
        `;
    }
}

function updateDashboardEquipmentTable(equipmentData) {
    const tableBody = document.getElementById('dashboardEquipmentTableBody');
    
    if (!tableBody) return;
    
    if (!equipmentData || equipmentData.length === 0) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center py-8 text-gray-500">
                    <i class="fas fa-microscope fa-2x mb-2"></i>
                    <p>No equipment found</p>
                    <button class="btn btn-primary btn-sm mt-2" onclick="openModal('addEquipmentModal')">
                        <i class="fas fa-plus mr-1"></i>
                        Add Your First Equipment
                    </button>
                </td>
            </tr>
        `;
        return;
    }
    
    // Show only the first 5 equipment items for the dashboard
    const displayEquipment = equipmentData.slice(0, 5);
    
    tableBody.innerHTML = displayEquipment.map(equipment => `
        <tr>
            <td class="font-medium">${equipment.name}</td>
            <td>${equipment.model}</td>
            <td>${equipment.serial_number}</td>
            <td><span class="status-badge ${getStatusBadgeClass(equipment.status)}">${formatStatus(equipment.status)}</span></td>
            <td>${equipment.last_service_date ? formatDate(equipment.last_service_date) : 'No service recorded'}</td>
            <td>
                <button class="btn btn-outline btn-sm view-equipment-dashboard" data-id="${equipment.id}">
                    <i class="fas fa-eye"></i>
                </button>
            </td>
        </tr>
    `).join('');
    
    // Add event listeners for the view buttons
    attachDashboardEquipmentEventListeners();
}

function attachDashboardEquipmentEventListeners() {
    // View equipment buttons in dashboard
    document.querySelectorAll('.view-equipment-dashboard').forEach(button => {
        button.addEventListener('click', function() {
            const equipmentId = this.getAttribute('data-id');
            viewEquipment(equipmentId);
        });
    });
}

function navigateToActivityLog() {
    // You can implement navigation to a full activity log page here
    // For now, let's just show an alert
    alert('Full activity log feature coming soon!');
}

async function updateRecentActivities() {
    try {
        console.log('Fetching recent activities...');
        
        // Fetch activities from multiple sources
        const [equipmentResponse, serviceRequestsResponse, calibrationsResponse] = await Promise.all([
            fetch('{{ route("equipment.index") }}'),
            fetch('{{ route("service-requests.index") }}'),
            fetch('{{ route("calibrations.index") }}')
        ]);
        
        const equipmentData = await equipmentResponse.json();
        const serviceRequestsData = await serviceRequestsResponse.json();
        const calibrationsData = await calibrationsResponse.json();
        
        const activities = [];
        
        // Process equipment activities (new equipment added)
        if (equipmentData.success && equipmentData.equipment) {
            equipmentData.equipment.forEach(equipment => {
                activities.push({
                    type: 'equipment_added',
                    title: `New equipment registered: ${equipment.name}`,
                    description: `${equipment.model} - ${equipment.serial_number}`,
                    timestamp: equipment.created_at,
                    icon: 'fas fa-shipping-fast',
                    color: 'text-blue-500'
                });
            });
        }
        
        // Process service request activities
        if (serviceRequestsData.success && serviceRequestsData.requests) {
            serviceRequestsData.requests.forEach(request => {
                let title = '';
                let icon = 'fas fa-tools';
                let color = 'text-orange-500';
                
                if (request.status === 'completed') {
                    title = `Service request #${request.request_id || request.id} completed`;
                    icon = 'fas fa-check-circle';
                    color = 'text-green-500';
                } else if (request.status === 'in_progress') {
                    title = `Service request #${request.request_id || request.id} in progress`;
                    icon = 'fas fa-tools';
                    color = 'text-yellow-500';
                } else {
                    title = `Service request #${request.request_id || request.id} submitted`;
                    icon = 'fas fa-tools';
                    color = 'text-orange-500';
                }
                
                activities.push({
                    type: 'service_request',
                    title: title,
                    description: `Equipment: ${request.equipment?.name || 'Unknown'}`,
                    timestamp: request.status === 'completed' ? request.updated_at : request.created_at,
                    icon: icon,
                    color: color
                });
            });
        }
        
        // Process calibration activities
        if (calibrationsData.success && calibrationsData.calibrations) {
            calibrationsData.calibrations.forEach(calibration => {
                let title = '';
                let icon = 'fas fa-ruler-combined';
                let color = 'text-purple-500';
                
                if (calibration.status === 'completed') {
                    title = `Calibration completed for ${calibration.equipment?.name || 'Unknown Equipment'}`;
                    icon = 'fas fa-check-circle';
                    color = 'text-green-500';
                } else if (calibration.status === 'overdue') {
                    title = `Calibration overdue for ${calibration.equipment?.name || 'Unknown Equipment'}`;
                    icon = 'fas fa-exclamation-triangle';
                    color = 'text-red-500';
                } else if (calibration.status === 'due_soon') {
                    title = `Calibration due soon for ${calibration.equipment?.name || 'Unknown Equipment'}`;
                    icon = 'fas fa-clock';
                    color = 'text-yellow-500';
                } else {
                    title = `Calibration scheduled for ${calibration.equipment?.name || 'Unknown Equipment'}`;
                    icon = 'fas fa-ruler-combined';
                    color = 'text-purple-500';
                }
                
                activities.push({
                    type: 'calibration',
                    title: title,
                    description: `Type: ${formatCalibrationType(calibration.calibration_type)}`,
                    timestamp: calibration.status === 'completed' ? calibration.updated_at : calibration.created_at,
                    icon: icon,
                    color: color
                });
            });
        }
        
        // Sort activities by timestamp (newest first) and take only 6
        activities.sort((a, b) => new Date(b.timestamp) - new Date(a.timestamp));
        const recentActivities = activities.slice(0, 6);
        
        // Update the UI
        updateRecentActivitiesUI(recentActivities);
        
    } catch (error) {
        console.error('Error fetching recent activities:', error);
        showError('recentActivityFeed', 'Failed to load recent activities');
    }
}

function updateRecentActivitiesUI(activities) {
    const activityFeed = document.getElementById('recentActivityFeed');
    
    if (!activities || activities.length === 0) {
        activityFeed.innerHTML = `
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-info-circle text-gray-400"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">No recent activities</div>
                    <div class="activity-time">Activities will appear here</div>
                </div>
            </div>
        `;
        return;
    }
    
    activityFeed.innerHTML = activities.map(activity => `
        <div class="activity-item">
            <div class="activity-icon" style="color: ${getComputedStyle(document.documentElement).getPropertyValue('--' + activity.color.split('-')[1]) || '#6b7280'};">
                <i class="${activity.icon}"></i>
            </div>
            <div class="activity-content">
                <div class="activity-title">${activity.title}</div>
                <div class="activity-time">${formatRelativeTime(activity.timestamp)}</div>
            </div>
        </div>
    `).join('');
}

function formatRelativeTime(timestamp) {
    if (!timestamp) return 'Unknown time';
    
    const now = new Date();
    const activityTime = new Date(timestamp);
    const diffInSeconds = Math.floor((now - activityTime) / 1000);
    const diffInMinutes = Math.floor(diffInSeconds / 60);
    const diffInHours = Math.floor(diffInMinutes / 60);
    const diffInDays = Math.floor(diffInHours / 24);
    
    if (diffInSeconds < 60) {
        return 'Just now';
    } else if (diffInMinutes < 60) {
        return `${diffInMinutes} minute${diffInMinutes > 1 ? 's' : ''} ago`;
    } else if (diffInHours < 24) {
        return `${diffInHours} hour${diffInHours > 1 ? 's' : ''} ago`;
    } else if (diffInDays < 7) {
        return `${diffInDays} day${diffInDays > 1 ? 's' : ''} ago`;
    } else {
        return activityTime.toLocaleDateString();
    }
}

function refreshRecentActivities() {
    console.log('🔄 Refreshing recent activities...');
    updateRecentActivities();
}

function updateWelcomeMessage(equipmentData, serviceRequestsData, calibrationsData) {
    const welcomeMessage = document.getElementById('welcomeMessage');
    
    if (!welcomeMessage) return;
    
    // Calculate counts
    const totalEquipment = equipmentData?.length || 0;
    
    // Count pending service requests
    const pendingRequests = serviceRequestsData?.requests?.filter(request => 
        request.status === 'pending' || request.status === 'in_progress'
    ).length || 0;
    
    // Count calibrations due this week
    const calibrationsDueThisWeek = calibrationsData?.calibrations?.filter(calibration => {
        if (!calibration.next_calibration_date) return false;
        
        const nextCalibrationDate = new Date(calibration.next_calibration_date);
        const today = new Date();
        const oneWeekFromNow = new Date(today);
        oneWeekFromNow.setDate(today.getDate() + 7);
        
        return nextCalibrationDate >= today && nextCalibrationDate <= oneWeekFromNow;
    }).length || 0;
    
    // Generate appropriate message based on the data
    let message = "Here's an overview of your equipment and recent activities. ";
    
    if (totalEquipment === 0) {
        message += "Get started by adding your first equipment to the system.";
    } else {
        message += `You have <span class="font-semibold text-dexomed-500">${totalEquipment} equipment item${totalEquipment !== 1 ? 's' : ''}</span>`;
        
        if (pendingRequests > 0) {
            message += ` with <span class="font-semibold text-dexomed-500">${pendingRequests} pending service request${pendingRequests !== 1 ? 's' : ''}</span>`;
        }
        
        if (calibrationsDueThisWeek > 0) {
            if (pendingRequests > 0) {
                message += ` and <span class="font-semibold text-dexomed-500">${calibrationsDueThisWeek} calibration${calibrationsDueThisWeek !== 1 ? 's' : ''} due</span> this week`;
            } else {
                message += ` and <span class="font-semibold text-dexomed-500">${calibrationsDueThisWeek} calibration${calibrationsDueThisWeek !== 1 ? 's' : ''} due</span> this week`;
            }
        } else {
            message += " and no upcoming calibrations this week";
        }
        
        message += ".";
    }
    
    welcomeMessage.innerHTML = message;
}


function updateQuickStats(equipmentData, serviceRequestsData, calibrationsData) {
    // Calculate Total Equipment
    const totalEquipment = equipmentData?.length || 0;
    document.getElementById('totalEquipmentStat').textContent = totalEquipment;
    
    // Calculate Active Service Requests (pending + in_progress)
    const activeServiceRequests = serviceRequestsData?.requests?.filter(request => 
        request.status === 'pending' || request.status === 'in_progress'
    ).length || 0;
    document.getElementById('activeServiceRequestsStat').textContent = activeServiceRequests;
    
    // Calculate Upcoming Calibrations - SIMPLIFIED AND GUARANTEED TO WORK
    let upcomingCalibrations = 0;
    
    if (calibrationsData?.calibrations && Array.isArray(calibrationsData.calibrations)) {
        const today = new Date();
        
        upcomingCalibrations = calibrationsData.calibrations.filter(calibration => {
            // Count ALL calibrations that are not completed or cancelled
            return calibration.status !== 'completed' && calibration.status !== 'cancelled';
        }).length;
    }
    
    document.getElementById('upcomingCalibrationsStat').textContent = upcomingCalibrations;
    
    // Calculate Under Maintenance Equipment
    const underMaintenance = equipmentData?.filter(equipment => 
        equipment.status === 'maintenance'
    ).length || 0;
    document.getElementById('underMaintenanceStat').textContent = underMaintenance;
    
    console.log('📊 Quick Stats Updated:', {
        totalEquipment,
        activeServiceRequests,
        upcomingCalibrations,
        underMaintenance
    });
}


</script>
</body>
</html>