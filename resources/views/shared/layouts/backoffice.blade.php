<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel - {{ config('app.name', 'SmartHealth Tracker') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('vendors/iconic-fonts/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/flat-icons/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/cryptocoins/cryptocoins.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- jQuery UI -->
    <link href="{{ asset('assets2/css/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="{{ asset('assets2/css/slick.css') }}" rel="stylesheet">

    <!-- Medjestic styles -->
    <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet">
    
    <!-- App/Module styles (Vite) -->
    @vite([
        'resources/css/app.css',
        'resources/css/sh-sidebar.css',
        'resources/css/meals-filters.css',
        'resources/css/meal-plan-forms.css',
        'resources/js/app.js',
        'resources/js/sh-sidebar.js',
        'resources/js/meal-ingredients.js'
    ])

    <!-- Page Specific CSS (Morris Charts.css) -->
    <link href="{{ asset('assets2/css/morris.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">

    <!-- Modern CSS Grid Layout System -->
    <style>
        /* CSS Variables for consistent theming */
        :root {
            --sidebar-width: 280px;
            --header-height: 65px;
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --success-color: #48bb78;
            --warning-color: #ed8936;
            --danger-color: #f56565;
            --dark-color: #2d3748;
            --light-color: #f7fafc;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
            --transition: all 0.2s ease-in-out;
        }

        /* Dark mode variables */
        [data-theme="dark"] {
            --primary-color: #7c3aed;
            --secondary-color: #a855f7;
            --dark-color: #1a202c;
            --light-color: #2d3748;
            --border-color: #4a5568;
        }

        /* Reset and base styles */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0 !important;
            padding: 0 !important;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            transition: var(--transition);
        }

        /* Override any external CSS that adds padding to body */
        .ms-body,
        .ms-aside-left-open,
        .ms-primary-theme,
        .ms-has-quickbar {
            padding-left: 0 !important;
            padding-right: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin: 0 !important;
        }

        /* Main layout grid */
        .body-content {
            display: grid !important;
            grid-template-areas:
                "sidebar header"
                "sidebar content" !important;
            grid-template-columns: var(--sidebar-width) 1fr !important;
            grid-template-rows: var(--header-height) 1fr !important;
            min-height: 100vh;
            transition: var(--transition);
            gap: 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
        }

        /* When compact, shrink CSS var so content expands */
        body.sh-compact {
            --sidebar-width: 80px;
        }

        /* Wire new sidebar to grid */
        .sh-sidebar {
            grid-area: sidebar !important;
            height: 100%;
        }

        /* Override any external CSS that adds padding */
        .ms-aside-left-open .body-content,
        .ms-body .body-content,
        body .body-content,
        main.body-content,
        .ms-aside-left-open,
        .ms-body {
            padding-left: 0 !important;
            padding-right: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
        }

        /* Force grid layout to override any external CSS */
        .ms-aside-left-open .body-content {
            display: grid !important;
            grid-template-areas:
                "sidebar header"
                "sidebar content" !important;
            grid-template-columns: var(--sidebar-width) 1fr !important;
            grid-template-rows: var(--header-height) 1fr !important;
            gap: 0 !important;
        }

        /* Ensure no container padding affects our main layout */
        .body-content .container,
        .body-content .container-fluid,
        .body-content .row {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        /* But preserve padding for content inside ms-content-wrapper */
        .ms-content-wrapper .container,
        .ms-content-wrapper .container-fluid,
        .ms-content-wrapper .row {

            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        /* Sidebar */
        .side-nav {
            grid-area: sidebar !important;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: var(--shadow-lg);
            border-right: 2px solid var(--border-color);
            z-index: 1000;
            overflow-y: auto;
            transition: var(--transition);
            position: relative;
            width: var(--sidebar-width) !important;
            margin: 0 !important;
            padding: 0 !important;
            max-width: var(--sidebar-width) !important;
        }

        /* Header */
        .ms-header {
            grid-area: header !important;
            background: #fff;
            box-shadow: var(--shadow-md);
            border-bottom: 2px solid var(--border-color);
            z-index: 999;
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            transition: var(--transition);
            position: relative;
            margin: 0 !important;
            width: 100% !important;
        }

        /* Content area */
        .ms-content-wrapper {
            margin-left: 250px;
            grid-area: content !important;
            padding: 1.5rem;
            overflow-y: auto;
            background-color: var(--light-color);
            transition: margin-left 0.3s ease;
            margin: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
        }

        /* Header styles - Improved horizontal layout */
        .ms-header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 100%;
            height: 100%;
        }

        .ms-header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex: 1;
        }

        .ms-header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-shrink: 0;
        }

        .ms-header-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            width: 100%;
        }

        .ms-header-menu-left {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .ms-header-menu-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .ms-logo-link img {
            height: 40px;
            transition: var(--transition);
        }

        .ms-user-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--border-color);
            transition: var(--transition);
        }

        .ms-user-name {
            font-weight: 600;
            color: var(--dark-color);
            margin-left: 0.5rem;
        }

        /* Search bar styles - Compact and centered */
        .ms-header-search {
            position: relative;
            max-width: 350px;
            width: 100%;
        }

        .ms-header-search-form {
            position: relative;
            display: flex;
            align-items: center;
        }

        .ms-header-search-input {
            width: 100%;
            padding: 0.6rem 1rem 0.6rem 2.25rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            font-size: 0.9rem;
            background-color: #fff;
            transition: var(--transition);
        }

        .ms-header-search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.1);
        }

        .ms-header-search-btn {
            position: absolute;
            left: 0.6rem;
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .ms-header-search-btn:hover {
            color: var(--primary-color);
        }

        /* Search dropdown */
        .search-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            z-index: 1000;
            max-height: 300px;
            overflow-y: auto;
            display: none;
        }

        .search-dropdown.show {
            display: block;
        }

        .search-result {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
            cursor: pointer;
            transition: var(--transition);
        }

        .search-result:hover {
            background-color: var(--light-color);
        }

        .search-result:last-child {
            border-bottom: none;
        }

        .search-result-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.25rem;
        }

        .search-result-description {
            font-size: 0.875rem;
            color: #6b7280;
        }

        /* Dropdown styles */
        .dropdown-menu {
            border: none;
            box-shadow: var(--shadow-lg);
            border-radius: var(--border-radius);
            padding: 0.5rem 0;
            min-width: 200px;
            background: #fff;
        }

        .dropdown-item {
            padding: 0.75rem 1rem;
            color: var(--dark-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            background-color: var(--light-color);
            color: var(--dark-color);
            text-decoration: none;
        }

        .dropdown-item i {
            width: 16px;
            text-align: center;
        }

        /* Settings panel */
        .ms-settings-toggle {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
            z-index: 1000;
            border: 3px solid #fff;
        }

        .ms-settings-toggle:hover {
            transform: scale(1.1) rotate(15deg);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .ms-settings-toggle i {
            color: #fff;
            font-size: 1.4rem;
            transition: var(--transition);
        }

        /* Settings Modal */
        .settings-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .settings-modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .settings-modal {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow: hidden;
            transform: scale(0.9) translateY(20px);
            transition: all 0.3s ease;
        }

        .settings-modal-overlay.show .settings-modal {
            transform: scale(1) translateY(0);
        }

        .settings-modal-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: #fff;
        }

        .settings-modal-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .settings-modal-close {
            background: none;
            border: none;
            color: #fff;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: var(--transition);
        }

        .settings-modal-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .settings-modal-body {
            padding: 1.5rem;
            max-height: 60vh;
            overflow-y: auto;
        }

        .settings-section {
            margin-bottom: 2rem;
        }

        .settings-section:last-child {
            margin-bottom: 0;
        }

        .settings-section-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
        }

        .settings-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            transition: var(--transition);
        }

        .settings-item:hover {
            background: #e9ecef;
        }

        .settings-item:last-child {
            margin-bottom: 0;
        }

        .settings-item-content {
            flex: 1;
        }

        .settings-item-label {
            display: block;
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 0.25rem;
        }

        .settings-item-description {
            display: block;
            font-size: 0.875rem;
            color: #6c757d;
        }

        .shortcuts-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .shortcut-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem;
            background: #f8f9fa;
            border-radius: 6px;
        }

        .shortcut-item kbd {
            background: var(--dark-color);
            color: #fff;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .shortcut-item span {
            font-size: 0.875rem;
            color: var(--dark-color);
        }

        /* Dark mode adjustments for modal */
        [data-theme="dark"] .settings-modal {
            background: var(--dark-color);
            color: #fff;
        }

        [data-theme="dark"] .settings-section-title {
            color: #fff;
            border-bottom-color: var(--border-color);
        }

        [data-theme="dark"] .settings-item {
            background: #4a5568;
        }

        [data-theme="dark"] .settings-item:hover {
            background: #2d3748;
        }

        [data-theme="dark"] .settings-item-label {
            color: #fff;
        }

        [data-theme="dark"] .settings-item-description {
            color: #a0aec0;
        }

        [data-theme="dark"] .shortcut-item {
            background: #4a5568;
        }

        [data-theme="dark"] .shortcut-item span {
            color: #fff;
        }

        /* Sidebar Menu Styles - Simplified */
        .side-nav {
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: #fff;
            padding: 1rem 0;
        }

        .menu-item {
            margin-bottom: 0.25rem;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: var(--transition);
            position: relative;
            border-radius: 0.5rem;
            margin: 0 0.75rem;
        }

        .menu-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
            text-decoration: none;
        }

        .menu-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .menu-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            font-size: 1rem;
        }

        .menu-text {
            flex: 1;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .menu-chevron {
            font-size: 0.75rem;
            transition: var(--transition);
        }

        .menu-link.has-chevron[aria-expanded="true"] .menu-chevron {
            transform: rotate(180deg);
        }

        .menu-badge {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 0.2rem 0.5rem;
            border-radius: 1rem;
            font-size: 0.7rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }

        /* Submenu Styles - Simplified */
        .submenu {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            margin: 0.5rem 0.75rem 0 0.75rem;
            overflow: hidden;
        }

        .submenu-item {
            margin-bottom: 0;
        }

        .submenu-link {
            display: flex;
            align-items: center;
            padding: 0.6rem 1rem 0.6rem 2.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.85rem;
        }

        .submenu-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
        }

        .submenu-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        .submenu-icon {
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.5rem;
            font-size: 0.8rem;
        }

        .submenu-text {
            flex: 1;
            font-weight: 400;
        }

        /* Compact sidebar styles */
        .compact-sidebar .side-nav {
            width: 80px;
        }

        .compact-sidebar .menu-text,
        .compact-sidebar .submenu-text,
        .compact-sidebar .menu-chevron,
        .compact-sidebar .menu-badge {
            display: none;
        }

        .compact-sidebar .menu-link {
            justify-content: center;
            margin: 0 0.5rem;
        }

        .compact-sidebar .menu-icon {
            margin-right: 0;
        }

        .compact-sidebar .submenu {
            position: absolute;
            left: 80px;
            top: 0;
            width: 200px;
            background: var(--primary-color);
            box-shadow: var(--shadow-lg);
            border-radius: 0.5rem;
            z-index: 1000;
            display: none;
        }

        .compact-sidebar .has-submenu:hover .submenu {
            display: block;
        }

        /* Dark mode adjustments for sidebar */
        [data-theme="dark"] .submenu {
            background: rgba(0, 0, 0, 0.3);
        }

        [data-theme="dark"] .compact-sidebar .submenu {
            background: var(--dark-color);
        }

        .section-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .ms-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .ms-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .ms-switch-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: var(--transition);
            border-radius: 24px;
        }

        .ms-switch-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: var(--transition);
            border-radius: 50%;
        }

        .ms-switch input:checked + .ms-switch-slider {
            background-color: var(--primary-color);
        }

        .ms-switch input:checked + .ms-switch-slider:before {
            transform: translateX(26px);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            :root {
                --sidebar-width: 100%;
            }

            .body-content {
                grid-template-areas:
                    "header"
                    "content";
                grid-template-columns: 1fr;
                grid-template-rows: var(--header-height) 1fr;
            }

            .side-nav {
                position: fixed;
                left: -100%;
                top: 0;
                height: 100vh;
                width: 280px;
                z-index: 1001;
                transition: left 0.3s ease;
                box-shadow: var(--shadow-lg);
            }

            .side-nav.show {
                left: 0;
            }

            .ms-content-wrapper {
                padding: 1rem;
            }

            .ms-header {
                padding: 0 1rem;
            }
        }

        @media (max-width: 480px) {
            .ms-content-wrapper {
                padding: 0.75rem;
            }

            .ms-header {
                padding: 0 0.75rem;
            }
        }

        @media (max-width: 768px) {
            .ms-header-menu {
                flex-direction: column;
                gap: 0.75rem;
            }

            .ms-header-menu-left {
                order: 2;
                width: 100%;
            }

            .ms-header-menu-right {
                order: 1;
                width: 100%;
                justify-content: space-between;
            }

            .ms-header-search {
                max-width: 100%;
            }

            .ms-settings-panel {
                width: calc(100vw - 4rem);
                right: 2rem;
                left: 2rem;
            }
        }

        /* Dark mode styles */
        [data-theme="dark"] .ms-header,
        [data-theme="dark"] .dropdown-menu,
        [data-theme="dark"] .ms-settings-panel {
            background-color: var(--light-color);
            border-color: var(--border-color);
        }

        [data-theme="dark"] .ms-header-search-input {
            background-color: var(--light-color);
            border-color: var(--border-color);
            color: #fff;
        }

        [data-theme="dark"] .search-dropdown {
            background-color: var(--light-color);
            border-color: var(--border-color);
        }

        [data-theme="dark"] .search-result:hover {
            background-color: var(--dark-color);
        }

        /* Animation for sidebar toggle */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* Modular Content Area Styles */
        .content-module {
            background: #fff;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: var(--transition);
        }

        .content-module:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .module-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .module-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .module-title i {
            color: var(--primary-color);
        }

        .module-body {
            padding: 2rem;
        }

        .module-footer {
            padding: 1rem 2rem;
            border-top: 1px solid var(--border-color);
            background: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Responsive Grid System */
        .content-grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .content-grid-2 {
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        }

        .content-grid-3 {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .content-grid-4 {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: #fff;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 1rem;
        }

        .stat-icon.primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        .stat-icon.success {
            background: linear-gradient(135deg, var(--success-color), #68d391);
        }

        .stat-icon.warning {
            background: linear-gradient(135deg, var(--warning-color), #f6ad55);
        }

        .stat-icon.danger {
            background: linear-gradient(135deg, var(--danger-color), #fc8181);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.875rem;
            color: #6b7280;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-change {
            font-size: 0.875rem;
            font-weight: 500;
            margin-top: 0.5rem;
        }

        .stat-change.positive {
            color: var(--success-color);
        }

        .stat-change.negative {
            color: var(--danger-color);
        }

        /* Enhanced Tables */
        .enhanced-table {
            background: #fff;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .enhanced-table .table {
            margin: 0;
            border-collapse: collapse;
        }

        .enhanced-table .table thead {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .enhanced-table .table thead th {
            padding: 1rem 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
            border: none;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.5px;
        }

        .enhanced-table .table tbody tr {
            transition: var(--transition);
            border-bottom: 1px solid var(--border-color);
        }

        .enhanced-table .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .enhanced-table .table tbody td {
            padding: 1rem 1.5rem;
            border: none;
            vertical-align: middle;
        }

        /* Action Buttons - Subtle Design */
        .action-buttons {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .btn-action {
            padding: 0.6rem 1.2rem;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #fff;
            color: #495057;
        }

        .btn-action:hover {
            border-color: #007bff;
            color: #007bff;
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.1);
        }

        .btn-action.primary {
            background: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .btn-action.primary:hover {
            background: #0056b3;
            border-color: #0056b3;
            color: #fff;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2);
        }

        .btn-action.secondary {
            background: #6c757d;
            color: #fff;
            border-color: #6c757d;
        }

        .btn-action.secondary:hover {
            background: #545b62;
            border-color: #545b62;
            color: #fff;
            box-shadow: 0 2px 4px rgba(108, 117, 125, 0.2);
        }

        .btn-action.success {
            background: #28a745;
            color: #fff;
            border-color: #28a745;
        }

        .btn-action.success:hover {
            background: #1e7e34;
            border-color: #1e7e34;
            color: #fff;
            box-shadow: 0 2px 4px rgba(40, 167, 69, 0.2);
        }

        .btn-action.warning {
            background: #ffc107;
            color: #212529;
            border-color: #ffc107;
        }

        .btn-action.warning:hover {
            background: #e0a800;
            border-color: #e0a800;
            color: #212529;
            box-shadow: 0 2px 4px rgba(255, 193, 7, 0.2);
        }

        .btn-action.danger {
            background: #dc3545;
            color: #fff;
            border-color: #dc3545;
        }

        .btn-action.danger:hover {
            background: #c82333;
            border-color: #c82333;
            color: #fff;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
        }

        /* Form Enhancements */
        .form-module {
            background: #fff;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .form-module .form-group {
            margin-bottom: 1.5rem;
        }

        .form-module .form-group label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-module .form-control {
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .form-module .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        /* Breadcrumb Enhancement */
        .enhanced-breadcrumb {
            background: #fff;
            border-radius: var(--border-radius);
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
        }

        .enhanced-breadcrumb .breadcrumb {
            margin: 0;
            background: none;
            padding: 0;
        }

        .enhanced-breadcrumb .breadcrumb-item {
            font-weight: 500;
        }

        .enhanced-breadcrumb .breadcrumb-item.active {
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Loading States */
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Empty States */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .empty-state p {
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        /* Dark mode enhancements */
        [data-theme="dark"] .content-module,
        [data-theme="dark"] .stat-card,
        [data-theme="dark"] .enhanced-table,
        [data-theme="dark"] .form-module,
        [data-theme="dark"] .enhanced-breadcrumb {
            background-color: var(--light-color);
            border-color: var(--border-color);
        }

        [data-theme="dark"] .module-header {
            background: linear-gradient(135deg, var(--light-color), var(--dark-color));
        }

        [data-theme="dark"] .module-footer {
            background-color: var(--dark-color);
        }

        [data-theme="dark"] .enhanced-table .table thead {
            background: linear-gradient(135deg, var(--light-color), var(--dark-color));
        }

        [data-theme="dark"] .enhanced-table .table tbody tr:hover {
            background-color: var(--dark-color);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .content-grid,
            .content-grid-2,
            .content-grid-3,
            .content-grid-4 {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .module-header,
            .module-body,
            .module-footer {
                padding: 1rem;
            }

            .enhanced-table .table thead th,
            .enhanced-table .table tbody td {
                padding: 0.75rem 1rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-action {
                justify-content: center;
            }
        }
    </style>
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
    <main class="body-content">
        <!-- Sidebar -->
        @include('shared.partials.backoffice-sidebar')

        <!-- Header -->
        @include('shared.partials.backoffice-header')

        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            @yield('content')
        </div>
    </main>

    <!-- MODALS -->
    @include('shared.partials.backoffice-modals')

    <!-- jQuery -->
    <script src="{{ asset('assets2/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets2/js/jquery-ui.min.js') }}"></script>

    <!-- Framework JavaScript -->
    <script src="{{ asset('assets2/js/framework.js') }}"></script>

    @stack('backoffice-scripts')
</body>
</html>
