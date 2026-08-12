<?php

require __DIR__ . '/vendor/autoload.php';

$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;

$email = 'test' . time() . '@example.com';
$user = User::create([
    'name' => 'Test User',
    'email' => $email,
    'password' => bcrypt('password123'),
    'role' => 'admin',
]);

echo $user ? "CREATED: {$user->id},{$user->email},{$user->role}\n" : "FAILED\n";
