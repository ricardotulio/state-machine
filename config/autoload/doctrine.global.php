<?php

return [
    'doctrine' => [
        'connection' => [
            'driver'   => 'pdo_pgsql',
            'user'     => getenv('POSTGRES_USER'),
            'password' => getenv('POSTGRES_PASSWORD'),
            'host'     => getenv('POSTGRES_HOST'),
            'dbname'   => getenv('POSTGRES_DB')
        ]
    ]
];
