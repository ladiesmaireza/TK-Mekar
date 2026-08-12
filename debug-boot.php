<?php

require __DIR__.'/vendor/autoload.php';

$app = require __DIR__.'/bootstrap/app.php';

try {
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();
    echo "OK - Kernel berhasil di-boot tanpa error.\n";
} catch (\Throwable $e) {
    echo "ERROR: " . get_class($e) . "\n";
    echo "Pesan : " . $e->getMessage() . "\n";
    echo "File  : " . $e->getFile() . ":" . $e->getLine() . "\n\n";
    echo $e->getTraceAsString() . "\n";
}
