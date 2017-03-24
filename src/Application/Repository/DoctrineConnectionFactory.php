<?php

namespace Application\Repository;

class DoctrineConnectionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        return \Doctrine\DBAL\DriverManager::getConnection([
            'dbname'   => $config['doctrine']['connection']['dbname'],
            'user'     => $config['doctrine']['connection']['user'],
            'password' => $config['doctrine']['connection']['password'],
            'host'     => $config['doctrine']['connection']['host'],
            'driver'   => $config['doctrine']['connection']['driver']
        ]);
    }
}
