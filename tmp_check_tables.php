<?php

require __DIR__ . '/vendor/autoload.php';

$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

$connection = DB::connection()->getName();
$database = DB::connection()->getDatabaseName();
$hasActivity = Schema::hasTable('activity_logs') ? 'yes' : 'no';
$hasUsers = Schema::hasTable('users') ? 'yes' : 'no';
$tables = DB::select('SHOW TABLES');
$tablesList = array_map(fn($row) => array_values((array)$row)[0], $tables);

echo "connection=$connection\n";
echo "database=$database\n";
echo "activity_logs=$hasActivity\n";
echo "users=$hasUsers\n";
echo "tables=" . implode(',', $tablesList) . "\n";
