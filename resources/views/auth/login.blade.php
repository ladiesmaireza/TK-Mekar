<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - TK Mekar Tigo Jangko</title>

    <link href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
        }

        .login-card {
            border: none;
            border-radius: 8px;
        }

        .login-logo {
            width: 90px;
            height: 90px;
            object-fit: contain;
        }

        .popup-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 360px;
            max-width: calc(100% - 40px);
            z-index: 9999;
            border: none;
            border-radius: 8px;
            padding: 15px 18px 18px 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            animation: popupMasuk 0.4s ease;
            overflow: hidden;
        }

        .popup-notification .popup-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .popup-success {
            background-color: #ffffff;
            color: #333333;
            border-left: 4px solid #198754;
        }

        .popup-success .popup-icon {
            background-color: #d1e7dd;
            color: #198754;
        }

        .popup-error {
            background-color: #ffffff;
            color: #333333;
            border-left: 4px solid #dc3545;
        }

        .popup-error .popup-icon {
            background-color: #f8d7da;
            color: #dc3545;
        }

        .popup-title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .popup-message {
            font-size: 13px;
            color: #6c757d;
            line-height: 1.4;
        }

        .popup-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            animation: progressBar 3s linear forwards;
        }

        .popup-success .popup-progress {
            background-color: #198754;
        }

        .popup-error .popup-progress {
            background-color: #dc3545;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            border: none;
            background: transparent;
            font-size: 18px;
            color: #6c757d;
            cursor: pointer;
            line-height: 1;
        }

        .popup-close:hover {
            color: #212529;
        }

        @keyframes popupMasuk {

            from {
                opacity: 0;
                transform: translateX(40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }

        }

        @keyframes progressBar {

            from {
                width: 100%;
            }

            to {
                width: 0%;
            }

        }

        .popup-hide {
            animation: popupKeluar 0.4s ease forwards;
        }

        @keyframes popupKeluar {

            from {
                opacity: 1;
                transform: translateX(0);
            }

            to {
                opacity: 0;
                transform: translateX(40px);
            }

        }

        @media (max-width: 576px) {

            .popup-notification {
                top: 15px;
                right: 15px;
                width: calc(100% - 30px);
            }

        }
    </style>

</head>

<body>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card login-card shadow-sm mt-5">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">

                            <div class="mb-3">

                                <img src="{{ asset('assets/images/logo-tk.jpg') }}" alt="Logo TK Mekar Tigo Jangko"
                                    class="login-logo">

                            </div>

                            <h4 class="fw-bold mb-1">
                                TK MEKAR TIGO JANGKO
                            </h4>

                            <hr>

                            <h5 class="mb-0">
                                Login
                            </h5>

                        </div>


                        <form action="{{ route('login') }}" method="POST">

                            @csrf

                            <div class="mb-3">

                                <label for="email" class="form-label">
                                    Username
                                </label>

                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="Masukkan email" required autofocus>

                            </div>


                            <div class="mb-3">

                                <label for="password" class="form-label">
                                    Password
                                </label>

                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Masukkan password" required>

                            </div>


                            <div class="d-grid">

                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    @if (session('logout_success'))
        <div id="popupLogout" class="popup-notification popup-success" role="alert">

            <button type="button" class="popup-close" onclick="tutupPopup('popupLogout')">
                &times;
            </button>

            <div class="d-flex align-items-center">

                <div class="popup-icon me-3">
                    ✓
                </div>

                <div class="pe-3">

                    <div class="popup-title">
                        Logout Berhasil
                    </div>

                    <div class="popup-message">
                        {{ session('logout_success') }}
                    </div>

                </div>

            </div>

            <div class="popup-progress"></div>

        </div>
    @endif


    @if (session('success'))
        <div id="popupSuccess" class="popup-notification popup-success" role="alert">

            <button type="button" class="popup-close" onclick="tutupPopup('popupSuccess')">
                &times;
            </button>

            <div class="d-flex align-items-center">

                <div class="popup-icon me-3">
                    ✓
                </div>

                <div class="pe-3">

                    <div class="popup-title">
                        Berhasil
                    </div>

                    <div class="popup-message">
                        {{ session('success') }}
                    </div>

                </div>

            </div>

            <div class="popup-progress"></div>

        </div>
    @endif


    @if (session('error'))
        <div id="popupError" class="popup-notification popup-error" role="alert">

            <button type="button" class="popup-close" onclick="tutupPopup('popupError')">
                &times;
            </button>

            <div class="d-flex align-items-center">

                <div class="popup-icon me-3">
                    !
                </div>

                <div class="pe-3">

                    <div class="popup-title">
                        Login Gagal
                    </div>

                    <div class="popup-message">
                        {{ session('error') }}
                    </div>

                </div>

            </div>

            <div class="popup-progress"></div>

        </div>
    @endif


    @if ($errors->any())
        <div id="popupValidation" class="popup-notification popup-error" role="alert">

            <button type="button" class="popup-close" onclick="tutupPopup('popupValidation')">
                &times;
            </button>

            <div class="d-flex align-items-center">

                <div class="popup-icon me-3">
                    !
                </div>

                <div class="pe-3">

                    <div class="popup-title">
                        Data Belum Lengkap
                    </div>

                    <div class="popup-message">

                        {{ $errors->first() }}

                    </div>

                </div>

            </div>

            <div class="popup-progress"></div>

        </div>
    @endif


    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        function tutupPopup(id) {

            const popup = document.getElementById(id);

            if (!popup) {
                return;
            }

            popup.classList.add('popup-hide');

            setTimeout(function() {

                popup.remove();

            }, 400);

        }


        document.addEventListener('DOMContentLoaded', function() {

            const popups =
                document.querySelectorAll('.popup-notification');

            popups.forEach(function(popup) {

                setTimeout(function() {

                    if (popup) {

                        popup.classList.add('popup-hide');

                        setTimeout(function() {

                            popup.remove();

                        }, 400);

                    }

                }, 3000);

            });

        });
    </script>

</body>

</html>
