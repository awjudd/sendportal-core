<?php

return [
    'database' => [
        'connection' => env('SP_DB_CONNECTION', env('DB_CONNECTION', 'mysql')),
    ]
];
