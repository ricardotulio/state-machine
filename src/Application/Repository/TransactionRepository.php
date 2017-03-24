<?php

namespace Application\Repository;

use Application\Entity\Transaction;
use Application\Entity\TransactionMapper;
use Doctrine\DBAL\Connection;

final class TransactionRepository
{
    private $connection;

    private $mapper;

    private $tableName = 'transaction';

    public function __construct(
        Connection $connection,
        TransactionMapper $mapper
    ) {
        $this->connection = $connection;
        $this->mapper = $mapper;
    }

    private function getConnection()
    {
        return $this->connection;
    }

    private function getMapper()
    {
        return $this->mapper;
    }

    public function get($id)
    {
        $stmt = $this->getConnection()->prepare("SELECT * FROM transaction WHERE transaction_id = :transaction_id");
        $stmt->bindValue("transaction_id", $id);
        $stmt->execute();

        if (($transactionData = $stmt->fetch()) == false) {
            throw new \Exception('Não encontrado!');
        }

        return $this->getMapper()->fromArray($transactionData);
    }

    public function persist(Transaction $transaction): Transaction
    {
        $transaction->withId(md5(uniqid(rand(), true)))
            ->withCreated(new \DateTime('NOW'));

        $this->getConnection()->insert(
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
