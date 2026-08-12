<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Super Admin TK Mekar Tigo Jangko')
    </title>

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tabler-icons.min.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            background: #f5f7fb;
            color: #24324a;
            font-family: "Poppins", "Segoe UI", Arial, sans-serif;
        }

        /* ==============================
           SIDEBAR
        ============================== */

        .left-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 270px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            background: #ffffff;
            border-right: 1px solid #e8edf5;
            z-index: 1000;
            overflow: hidden;
            box-shadow: 4px 0 18px rgba(30, 41, 59, 0.03);
        }

        .brand-logo {
            height: 78px;
            padding: 0 16px;
            display: flex;
            align-items: center;
            flex-shrink: 0;
            border-bottom: 1px solid #edf1f7;
            background: #ffffff;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            color: #ffffff;
            font-size: 20px;
        }

        .brand-title {
            margin-left: 10px;
            min-width: 0;
            flex: 1;
            overflow: hidden;
        }

        .brand-title strong {
            display: block;
            color: #17365d;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .brand-title span {
            display: block;
            margin-top: 3px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-profile {
            margin: 18px 15px 10px;
            padding: 14px;
            flex-shrink: 0;
            border-radius: 15px;
            background: #f4f8ff;
            border: 1px solid #e5edfb;
        }

        .profile-avatar {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 50%;
            background: #2563eb;
            color: #ffffff;
            font-size: 18px;
            font-weight: 600;
        }

        .profile-name {
            max-width: 165px;
            color: #1e293b;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .profile-role {
            display: flex;
            align-items: center;
            margin-top: 3px;
            color: #64748b;
            font-size: 11px;
        }

        .profile-role-dot {
            width: 7px;
            height: 7px;
            margin-right: 5px;
            border-radius: 50%;
            background: #22c55e;
        }

        .sidebar-nav {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: #d9e1ed;
            border-radius: 20px;
        }

        .sidebar-nav ul {
            list-style: none;
            margin: 0;
            padding: 8px 13px 25px;
        }

        .sidebar-nav li {
            margin: 3px 0;
        }

        .menu-section {
            padding: 16px 13px 7px;
            color: #a0aec0;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            min-height: 44px;
            padding: 10px 13px;
            color: #526078;
            text-decoration: none;
            border-radius: 11px;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-link i {
            width: 25px;
            margin-right: 9px;
            font-size: 18px;
            text-align: center;
            color: #8090a8;
        }

        .sidebar-link:hover {
            color: #2563eb;
            background: #f1f6ff;
        }

        .sidebar-link:hover i {
            color: #2563eb;
        }

        .sidebar-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            box-shadow: 0 7px 17px rgba(37, 99, 235, 0.20);
        }

        .sidebar-link.active i {
            color: #ffffff;
        }

        .sidebar-footer {
            padding: 13px;
            flex-shrink: 0;
            border-top: 1px solid #edf1f7;
            background: #ffffff;
        }

        .sidebar-footer small {
            display: block;
            text-align: center;
            color: #a0aec0;
            font-size: 10px;
        }

        .sidebar-logout {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-bottom: 10px;
            padding: 10px 12px;
            border: 1px solid #fee2e2;
            border-radius: 10px;
            background: #fff5f5;
            color: #dc2626;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .sidebar-logout:hover {
            background: #dc2626;
            border-color: #dc2626;
            color: #ffffff;
        }

        /* ==============================
           BODY
        ============================== */

        .body-wrapper {
            min-height: 100vh;
            margin-left: 270px;
        }

        /* ==============================
           HEADER
        ============================== */

        .app-header {
            position: fixed;
            top: 0;
            left: 270px;
            right: 0;
            height: 72px;
            background: #ffffff;
            border-bottom: 1px solid #e8edf5;
            z-index: 900;
            box-shadow: 0 2px 12px rgba(15, 23, 42, 0.03);
        }

        .header-inner {
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 28px;
        }

        .account-button {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 8px 5px 12px;
            border: 1px solid transparent;
            border-radius: 13px;
            background: #ffffff;
            color: #1e293b;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .account-button:hover,
        .account-button:focus,
        .account-button.show {
            background: #f8fafc;
            border-color: #e5eaf2;
            outline: none;
        }

        .account-info {
            min-width: 110px;
            text-align: right;
        }

        .account-name {
            color: #1e293b;
            font-size: 13px;
            font-weight: 700;
        }

        .account-role {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 11px;
        }

        .account-avatar {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
        }

        .account-dropdown {
            width: 280px;
            margin-top: 10px !important;
            padding: 10px;
            border: 1px solid #e7edf5;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
        }

        .account-dropdown-header {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 9px 12px;
        }

        .account-dropdown-avatar {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: #eff6ff;
            color: #2563eb;
            font-weight: 700;
        }

        .account-dropdown-header strong {
            display: block;
            color: #1e293b;
            font-size: 13px;
        }

        .account-dropdown-header small {
            display: block;
            margin-top: 3px;
            color: #94a3b8;
            font-size: 11px;
        }

        /* ==============================
           CONTENT
        ============================== */

        .main-content {
            min-height: 100vh;
            padding: 78px 30px 35px;
        }

        .main-content>*:first-child {
            margin-top: 0 !important;
        }

        .main-content>.card:first-child {
            margin-top: 0 !important;
        }

        .main-content>.container:first-child,
        .main-content>.container-fluid:first-child {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
        }

        .form-control,
        .form-select,
        textarea {
            background-color: #ffffff !important;
            pointer-events: auto !important;
        }

        /* ==============================
           ALERT
        ============================== */

        .system-alert {
            position: relative;
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
            padding: 15px 18px;
            border: 1px solid transparent;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.06);
            animation: alertSlideDown 0.35s ease-out;
        }

        .system-alert-error {
            background: #fef2f2;
            border-color: #fecaca;
        }

        .system-alert-validation {
            background: #fff7ed;
            border-color: #fed7aa;
        }

        .system-alert-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 22px;
        }

        .system-alert-error .system-alert-icon {
            background: #fee2e2;
            color: #dc2626;
        }

        .system-alert-validation .system-alert-icon {
            background: #ffedd5;
            color: #ea580c;
        }

        .system-alert-content {
            flex: 1;
            min-width: 0;
        }

        .system-alert-title {
            margin-bottom: 2px;
            color: #1e293b;
            font-size: 13px;
            font-weight: 700;
        }

        .system-alert-message {
            color: #64748b;
            font-size: 12px;
            line-height: 1.5;
        }

        .system-alert-close {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            padding: 0;
            border: 0;
            border-radius: 8px;
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
        }

        .system-alert-close:hover {
            background: rgba(15, 23, 42, 0.06);
            color: #475569;
        }

        .system-alert-list {
            margin: 6px 0 0;
            padding-left: 18px;
            color: #64748b;
            font-size: 12px;
        }

        @keyframes alertSlideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ==============================
           SUCCESS TOAST
        ============================== */

        .success-toast {
            position: fixed;
            top: 88px;
            right: 28px;
            z-index: 99999;
            width: 360px;
            min-height: 76px;
            display: flex;
            align-items: center;
            padding: 13px 15px;
            background: #ffffff;
            border: 1px solid #e7edf5;
            border-radius: 14px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.15);
            animation: toastSlideIn .45s ease forwards;
        }

        .success-toast.hide {
            animation: toastSlideOut .4s ease forwards;
        }

        .success-toast-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 11px;
            border-radius: 50%;
            background: #dcfce7;
            color: #16a34a;
            font-size: 20px;
        }

        .success-toast-content {
            flex: 1;
            min-width: 0;
        }

        .success-toast-title {
            color: #166534;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.4;
        }

        .success-toast-message {
            margin-top: 2px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.5;
            word-break: break-word;
        }

        .success-toast-close {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 8px;
            padding: 0;
            border: none;
            border-radius: 7px;
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
        }

        .success-toast-close:hover {
            background: #f1f5f9;
            color: #475569;
        }

        .success-toast-progress {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 100%;
            border-radius: 0 0 14px 14px;
            background: #22c55e;
            animation: toastProgress 4s linear forwards;
        }

        @keyframes toastSlideIn {
            from {
                opacity: 0;
                transform: translateX(120%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes toastSlideOut {
            from {
                opacity: 1;
                transform: translateX(0);
            }

            to {
                opacity: 0;
                transform: translateX(120%);
            }
        }

        @keyframes toastProgress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 992px) {

            .left-sidebar {
                width: 240px;
            }

            .body-wrapper {
                margin-left: 240px;
            }

            .app-header {
                left: 240px;
            }

            .main-content {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        @media (max-width: 768px) {

            .left-sidebar {
                width: 220px;
            }

            .body-wrapper {
                margin-left: 220px;
            }

            .app-header {
                left: 220px;
            }

            .account-info {
                display: none;
            }
        }

        @media (max-width: 576px) {

            .left-sidebar {
                width: 200px;
            }

            .body-wrapper {
                margin-left: 200px;
            }

            .app-header {
                left: 200px;
            }

            .brand-title strong {
                font-size: 12px;
            }

            .brand-title span {
                display: none;
            }

            .main-content {
                padding: 95px 15px 25px;
            }

            .header-inner {
                padding: 0 15px;
            }

            .system-alert {
                padding: 13px;
            }

            .system-alert-icon {
                width: 38px;
                height: 38px;
                min-width: 38px;
                font-size: 20px;
            }

            .success-toast {
                top: 82px;
                right: 15px;
                left: 15px;
                width: auto;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    <div class="body-wrapper">

        {{-- HEADER --}}
        <header class="app-header">

            <div class="header-inner">

                @auth

                    <div class="dropdown">

                        <button type="button" class="account-button dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <div class="account-info">

                                <div class="account-name">
                                    {{ auth()->user()->name }}
                                </div>

                                <div class="account-role">

                                    @if (auth()->user()->role === 'super_admin')
                                        Super Admin
                                    @elseif (auth()->user()->role === 'admin')
                                        Admin
                                    @else
                                        {{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}
                                    @endif

                                </div>

                            </div>

                            <div class="account-avatar">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                            </div>

                        </button>


                        {{-- DROPDOWN ACCOUNT --}}
                        <div class="dropdown-menu dropdown-menu-end account-dropdown">

                            <div class="account-dropdown-header">

                                <div class="account-dropdown-avatar">
                                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                                </div>

                                <div>

                                    <strong>
                                        {{ auth()->user()->name }}
                                    </strong>

                                    <small>

                                        @if (auth()->user()->role === 'super_admin')
                                            Super Admin
                                        @elseif (auth()->user()->role === 'admin')
                                            Admin
                                        @else
                                            {{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}
                                        @endif

                                    </small>

                                </div>

                            </div>


                            <div class="dropdown-divider"></div>


                            {{-- ROLE --}}
                            <div class="px-3 py-2">

                                <div class="text-muted small mb-1">
                                    Hak Akses
                                </div>

                                <div class="fw-semibold">

                                    @if (auth()->user()->role === 'super_admin')
                                        Super Admin
                                    @elseif (auth()->user()->role === 'admin')
                                        Admin
                                    @else
                                        {{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}
                                    @endif

                                </div>

                            </div>


                            <div class="dropdown-divider"></div>


                            {{-- LOGOUT --}}
                            <form action="{{ route('logout') }}" method="POST">

                                @csrf

                                <button type="submit" class="dropdown-item text-danger">

                                    <i class="ti ti-logout me-2"></i>

                                    Keluar

                                </button>

                            </form>

                        </div>

                    </div>

                @endauth

            </div>

        </header>


        {{-- MAIN CONTENT --}}
        <main class="main-content">

            {{-- SUCCESS --}}
            @if (session('success'))
                <div id="successToast" class="success-toast" role="alert">

                    <div class="success-toast-icon">
                        <i class="ti ti-check"></i>
                    </div>

                    <div class="success-toast-content">

                        <div class="success-toast-title">
                            Berhasil
                        </div>

                        <div class="success-toast-message">
                            {{ session('success') }}
                        </div>

                    </div>

                    <button type="button" class="success-toast-close" onclick="closeSuccessToast()">

                        <i class="ti ti-x"></i>

                    </button>

                    <div class="success-toast-progress"></div>

                </div>
            @endif


            {{-- ERROR --}}
            @if (session('error'))
                <div class="system-alert system-alert-error" role="alert">

                    <div class="system-alert-icon">
                        <i class="ti ti-alert-circle"></i>
                    </div>

                    <div class="system-alert-content">

                        <div class="system-alert-title">
                            Tidak Berhasil
                        </div>

                        <div class="system-alert-message">
                            {{ session('error') }}
                        </div>

                    </div>

                    <button type="button" class="system-alert-close" aria-label="Tutup">

                        <i class="ti ti-x"></i>

                    </button>

                </div>
            @endif


            {{-- VALIDATION --}}
            @if ($errors->any())

                <div class="system-alert system-alert-validation" role="alert">

                    <div class="system-alert-icon">
                        <i class="ti ti-alert-triangle"></i>
                    </div>

                    <div class="system-alert-content">

                        <div class="system-alert-title">
                            Periksa Kembali Data
                        </div>

                        <div class="system-alert-message">
                            Terdapat beberapa data yang perlu diperbaiki.
                        </div>

                        <ul class="system-alert-list">

                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach

                        </ul>

                    </div>

                    <button type="button" class="system-alert-close" aria-label="Tutup">

                        <i class="ti ti-x"></i>

                    </button>

                </div>

            @endif


            {{-- HALAMAN --}}
            @yield('content')

        </main>

    </div>


    {{-- JAVASCRIPT --}}
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>


    {{-- SUCCESS TOAST --}}
    <script>
        function closeSuccessToast() {

            const toast = document.getElementById('successToast');

            if (!toast) {
                return;
            }

            toast.classList.add('hide');

            setTimeout(function() {

                toast.remove();

            }, 400);
        }


        document.addEventListener('DOMContentLoaded', function() {

            const toast = document.getElementById('successToast');

            if (!toast) {
                return;
            }

            setTimeout(function() {

                closeSuccessToast();

            }, 4000);

        });
    </script>


    {{-- ALERT CLOSE --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const alerts = document.querySelectorAll('.system-alert');

            alerts.forEach(function(alert) {

                const closeButton =
                    alert.querySelector('.system-alert-close');

                if (closeButton) {

                    closeButton.addEventListener('click', function() {

                        alert.style.opacity = '0';

                        alert.style.transform = 'translateY(-8px)';

                        alert.style.transition = 'all 0.25s ease';

                        setTimeout(function() {

                            alert.remove();

                        }, 250);

                    });

                }

            });

        });
    </script>


    @stack('scripts')

    @yield('scripts')

</body>

</html>

