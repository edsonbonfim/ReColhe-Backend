<?php

use Sketch\Database\DB;

DB::config([
    'driver' => 'mysql',
    'host'   => 'localhost',
    'dbname' => 'recolhe',
    'user'   => 'root',
    'pass'   => ''
]);

DB::conn();
