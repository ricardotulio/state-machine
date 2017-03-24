<?php

namespace Application\Entity;

final class TransactionMapper
{
    public function fromArray(array $data): Transaction
    {
        $transaction = new Transaction();
        $transaction->withId($data['id'])
            ->withType($data['type'])
            ->withStatus($data['status']);

        return $transaction;
    }

    public function toArray(Transaction $transaction): array
    {
        return [
            'transaction_id' => $transaction->getId(),
            'type' => $transaction->getType(),
            'status' => $transaction->getStatus(),
            'created' => $transaction->getCreated()->format('Y-m-d H:i:s'),
            'updated' => $transaction->getUpdated()
        ];
    }
}
