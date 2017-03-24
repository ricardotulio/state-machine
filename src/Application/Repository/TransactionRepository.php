<?php

namespace Application\Repository;

use Application\Entity\Product;
use Doctrine\DBAL\Connection;

class TransactionRepository
{
    public $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function persist(Product $product)
    {
    }
}
