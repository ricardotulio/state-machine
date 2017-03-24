<?php

return [
    'routes' => [
        [
            'name' => 'transaction',
            'path' => '/transaction/[{id}]',
            'middleware' => \Application\Http\Api\V1\Rest\TransactionController::class,
            'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
        ],
    ],
];
