<?php

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'dependencies' => [
        'invokables' => [
        ],
        'factories' => [
            \Zend\Expressive\Application::class => \Zend\Expressive\Container\ApplicationFactory::class,
            \Doctrine\DBAL\Connection::class => \Application\Repository\DoctrineConnectionFactory::class,
            \Application\Action\CreateTransactionAction::class => \Application\Action\CreateTransactionActionFactory::class,
        ],
    ]
];
