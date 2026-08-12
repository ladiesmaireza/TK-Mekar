<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi Akun PPDB - TK Mekar Tigo Jangko</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
        }

        .register-container {
            max-width: 500px;
            margin: 60px auto;
        }

        .card {
            border: none;
            border-radius: 8px;
        }

        .card-header {
            background-color: #0d6efd;
            color: white;
            border-radius: 8px 8px 0 0 !important;
            padding: 18px 20px;
        }

        .card-header h4 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }

        .card-header small {
            font-size: 14px;
        }

        .form-label {
            font-size: 14px;
            margin-bottom: 6px;
        }

        .form-control {
            font-size: 14px;
            padding: 9px 12px;
        }

        .btn {
            font-size: 14px;
        }

        .login-text {
            font-size: 14px;
        }

        .alert {
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="register-container">

            <div class="text-center mb-4">

                <h4 class="fw-bold mb-1">
                    PPDB TK Mekar Tigo Jangko
                </h4>

                <p class="text-muted mb-0">
                    Pendaftaran Peserta Didik Baru
                </p>

            </div>

            <div class="card shadow-sm">

                <div class="card-header">

                    <h4>
                        Registrasi Akun PPDB
                    </h4>

                    <small>
                        Buat akun orang tua untuk memulai pendaftaran
                    </small>

                </div>

                <div class="card-body p-4">

                    
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">

                            <strong>Periksa kembali data berikut:</strong>

                            <ul class="mb-0 mt-2">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('orangtua.register.store')); ?>" method="POST">

                        <?php echo csrf_field(); ?>

                        
                        <div class="mb-3">

                            <label for="nama" class="form-label fw-bold">
                                Nama
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" id="nama" name="nama" class="form-control"
                                value="<?php echo e(old('nama')); ?>" placeholder="Masukkan nama" required autofocus>

                        </div>

                        
                        <div class="mb-3">

                            <label for="email" class="form-label fw-bold">
                                Email / Username
                                <span class="text-danger">*</span>
                            </label>

                            <input type="email" id="email" name="email" class="form-control"
                                value="<?php echo e(old('email')); ?>" placeholder="Masukkan email" required>

                        </div>

                        
                        <div class="mb-3">

                            <label for="password" class="form-label fw-bold">
                                Password
                                <span class="text-danger">*</span>
                            </label>

                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Masukkan password" required>

                            <small class="text-muted">
                                Password minimal 6 karakter.
                            </small>

                        </div>

                        
                        <div class="mb-4">

                            <label for="password_confirmation" class="form-label fw-bold">
                                Konfirmasi Password
                                <span class="text-danger">*</span>
                            </label>

                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="Masukkan kembali password" required>

                        </div>

                        
                        <button type="submit" class="btn btn-primary w-100">
                            Daftar Akun
                        </button>

                    </form>

                    <hr>

                    
                    <div class="text-center login-text">

                        <span class="text-muted">
                            Sudah mempunyai akun?
                        </span>

                        <a href="<?php echo e(route('orangtua.login')); ?>" class="text-decoration-none">
                            Login
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
<?php /**PATH D:\laragon\www\tk-mekar-tigo-jangko\resources\views/orangtua/register.blade.php ENDPATH**/ ?>