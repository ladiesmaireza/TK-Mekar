<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Registrasi Pengguna - TK Mekar Tigo Jangko
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;

            font-family: Arial, sans-serif;

            background-color: #f5f5f5;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        .register-container {

            width: 675px;

            max-width: 90%;

            background: white;

            border-radius: 9px;

            overflow: hidden;

            box-shadow:
                0 5px 15px rgba(0, 0, 0, 0.20);
        }


        .register-header {

            background-color: #176df5;

            color: white;

            text-align: center;

            padding: 20px;
        }


        .register-header h1 {

            margin: 0;

            font-size: 36px;

            font-weight: normal;
        }


        .register-header p {

            margin: 12px 0 0;

            font-size: 20px;
        }


        .register-body {

            padding: 30px 24px 25px;
        }


        .form-group {

            margin-bottom: 22px;
        }


        .form-group label {

            display: block;

            font-size: 19px;

            margin-bottom: 7px;

            color: #222;

            font-weight: 500;
        }


        .form-group input {

            width: 100%;

            height: 54px;

            padding: 10px 18px;

            border: 1px solid #d5dbe2;

            border-radius: 8px;

            font-size: 18px;

            color: #444;

            outline: none;

            transition: 0.2s;
        }


        .form-group input:focus {

            border-color: #176df5;

            box-shadow:
                0 0 0 3px rgba(23, 109, 245, 0.10);
        }


        .form-group input::placeholder {

            color: #777;
        }


        .btn-register {

            width: 100%;

            height: 54px;

            border: none;

            border-radius: 8px;

            background-color: #176df5;

            color: white;

            font-size: 20px;

            cursor: pointer;

            margin-top: 5px;

            transition: 0.2s;
        }


        .btn-register:hover {

            background-color: #0d5ed7;
        }


        .login-link {

            text-align: center;

            margin-top: 20px;

            font-size: 16px;

            color: #555;
        }


        .login-link a {

            color: #176df5;

            text-decoration: none;

            font-weight: 500;
        }


        .login-link a:hover {

            text-decoration: underline;
        }


        .error-message {

            background-color: #f8d7da;

            color: #842029;

            border: 1px solid #f5c2c7;

            padding: 12px 15px;

            border-radius: 6px;

            margin-bottom: 20px;

            font-size: 15px;
        }


        .error-message ul {

            margin: 0;

            padding-left: 20px;
        }


        .success-message {

            background-color: #d1e7dd;

            color: #0f5132;

            border: 1px solid #badbcc;

            padding: 12px 15px;

            border-radius: 6px;

            margin-bottom: 20px;

            font-size: 15px;
        }


        @media (max-width: 600px) {

            .register-container {

                max-width: 94%;
            }


            .register-header h1 {

                font-size: 28px;
            }


            .register-header p {

                font-size: 17px;
            }


            .form-group label {

                font-size: 17px;
            }


            .form-group input {

                font-size: 17px;
            }


            .btn-register {

                font-size: 18px;
            }
        }

    </style>

</head>


<body>


    <div class="register-container">


        {{-- HEADER --}}

        <div class="register-header">

            <h1>
                Registrasi Akun Pengguna
            </h1>

            <p>
                TK Mekar Tigo Jangko
            </p>

        </div>


        {{-- BODY --}}

        <div class="register-body">


            {{-- ERROR VALIDATION --}}

            @if ($errors->any())

                <div class="error-message">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- SUCCESS MESSAGE --}}

            @if (session('success'))

                <div class="success-message">

                    {{ session('success') }}

                </div>

            @endif


            {{-- REGISTER FORM --}}

            <form method="POST"
                  action="{{ route('register.store') }}">

                @csrf


                {{-- NAMA --}}

                <div class="form-group">

                    <label for="name">
                        Nama
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                        autofocus
                    >

                </div>


                {{-- EMAIL --}}

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan alamat email"
                        required
                    >

                </div>


                {{-- PASSWORD --}}

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >

                </div>


                {{-- KONFIRMASI PASSWORD --}}

                <div class="form-group">

                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Masukkan kembali password"
                        required
                    >

                </div>


                {{-- BUTTON --}}

                <button
                    type="submit"
                    class="btn-register">

                    Daftar Akun Pengguna

                </button>

            </form>


            {{-- LOGIN --}}

            <div class="login-link">

                Sudah memiliki akun?

                <a href="{{ route('login') }}">
                    Login di sini
                </a>

            </div>


        </div>

    </div>


</body>

</html>
