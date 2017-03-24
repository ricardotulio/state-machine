<?php

return [
    'routes' => [
        [
            'path' => '/',
            'middleware' => \Application\Action\CreateTransactionAction::class,
            'allowed_methods' => ['POST'],
        ],
    ],
];
