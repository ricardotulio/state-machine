<?php

namespace Application\Entity;

final class TransactionMapper
{
    public function fromArray(array $data): Transaction
    {
        if (!is_null($data['created'])) {
            $created = \DateTime::createFromFormat(
                'Y-m-d H:i:s',
                $data['created']
            );
        }

        if (!is_null($data['updated'])) {
            $updated = \DateTime::createFromFormat(
                'Y-m-d H:i:s',
                $data['updated']
            );
        }

        $transaction = new Transaction();
        $transaction->withId($data['transaction_id'])
            ->withType($data['type'])
            ->withStatus($data['status'])
            ->withCreated($created)
            ->withUpdated($updated);

        return $transaction;
    }

    public function toArray(Transaction $transaction): array
    {
        if (!is_null($transaction->getCreated())) {
            $created = $transaction->getCreated()
                ->format('Y-m-d H:i:s');
        }

        if (!is_null($transaction->getUpdated())) {
            $updated = $transaction->getUpdated()
                ->format('Y-m-d H:i:s');
        }

        return [
            'transaction_id' => $transaction->getId(),
            'type' => $transaction->getType(),
            'status' => $transaction->getStatus(),
            'created' => $created,
            'updated' => $updated
        ];
    }
}
