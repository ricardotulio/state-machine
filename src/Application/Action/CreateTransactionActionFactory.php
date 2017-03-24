<?php

namespace Application\Action;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Repository\DoctrineConnectionFactory;
use Application\Repository\TransactionRepository;
use Application\Action\CreateTransactionAction;

class CreateTransactionActionFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return TransactionRepositoryon
     */
    public function __invoke(
        ContainerInterface $container, 
        $requestedName, 
        array $options = null
    ) {
        $config = $container->get('config');
        $dbConfig = $config['doctrine']['connection'];

        return new CreateTransactionAction(
            new TransactionRepository(
                \Doctrine\DBAL\DriverManager::getConnection($dbConfig)
            )
        );
    }
}
