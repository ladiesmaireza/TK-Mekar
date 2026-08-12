<?php

require __DIR__ . '/vendor/autoload.php';

$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;

$user = User::where('email', 'admin@gmail.com')->first();
if ($user) {
    $user->role = 'super_admin';
    $user->save();
    echo "updated:" . $user->role;
} else {
    echo 'user missing';
}
