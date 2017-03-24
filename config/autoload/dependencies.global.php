<?php

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'dependencies' => [
        'invokables' => [
        ],
        'factories' => [
            \Zend\Expressive\Application::class => \Zend\Expressive\Container\ApplicationFactory::class,
            \Doctrine\DBAL\Connection::class => \Application\Repository\DoctrineConnectionFactory::class,
            \Application\Http\Api\V1\Rest\TransactionController::class => \Application\Http\Api\V1\Rest\TransactionControllerFactory::class,
        ],
    ]
];
