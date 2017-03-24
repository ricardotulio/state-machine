<?php

namespace Application\Http\Api\V1\Rest;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Repository\DoctrineConnectionFactory;
use Application\Repository\TransactionRepository;
use Application\Entity\TransactionMapper;
use Application\Api\V1\Resource\Transaction\CreateTransactionAction;

final class TransactionControllerFactory implements FactoryInterface
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

        $mapper = new TransactionMapper();

        return new TransactionController(
            new TransactionRepository(
                \Doctrine\DBAL\DriverManager::getConnection($dbConfig),
                $mapper
            ),
            $mapper
        );
    }
}
