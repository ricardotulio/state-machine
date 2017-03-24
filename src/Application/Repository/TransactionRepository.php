<?php

namespace Application\Repository;

use Application\Entity\Transaction;
use Doctrine\DBAL\Connection;

final class TransactionRepository
{
    private $connection;

    private $tableName = 'transaction';

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function persist(Transaction $transaction): Transaction
    {
        $transaction->withId(md5(uniqid(rand(), true)))
            ->withCreated(new \DateTime('NOW'));

        $this->connection->insert(
            $this->tableName,
            [
                'transaction_id' => $transaction->getId(),
                'type' => $transaction->getType(),
                'status' => $transaction->getStatus(),
                'created' => $transaction->getCreated()->format('Y-m-d H:i:s')
            ]
        );

        return $transaction;
    }
}
