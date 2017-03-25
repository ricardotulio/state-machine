<?php

namespace Application\Entity;

use PHPUnit\Framework\TestCase;

class TransactionMapperTest extends TestCase
{
    protected $mapper;

    public function setUp()
    {
        $this->mapper = new TransactionMapper();
    }

    public function provider()
    {
        return [
            [
                1,
                'money_transaction',
                'created',
                new \DateTime('NOW'),
                null
            ]
        ];
    }

    /**
     * @test
     * @dataProvider provider
     */
    public function mustConvertTransactionToArray(
        $id,
        $type,
        $status,
        $created,
        $updated
    ) {
        $transaction = new Transaction();
        $transaction->withId($id)
            ->withType($type)
            ->withStatus($status)
            ->withCreated($created)
            ->withUpdated($updated);

        $transactionArray = $this->mapper
            ->toArray($transaction);

        $this->assertEquals(
            $transaction->getId(),
            $transactionArray['transaction_id']
        );

        $this->assertEquals(
            $transaction->getType(),
            $transactionArray['type']
        );

        $this->assertEquals(
            $transaction->getStatus(),
            $transactionArray['status']
        );

        $this->assertEquals(
            $transaction->getCreated()->format('Y-m-d H:i:s'),
            $transactionArray['created']
        );

        $this->assertEquals(
            $transaction->getUpdated(),
            $transactionArray['updated']
        );
    }

    /**
     * @test
     * @dataProvider provider
     */
    public function mustCreateTransactionFromArray(
        $id,
        $type,
        $status,
        $created,
        $updated
    ) {
        $transactionData = [
            'transaction_id' => $id,
            'status' => $status,
            'type' => $type,
            'created' => $created->format('Y-m-d H:i:s'),
            'updated' => $updated
        ];

        $transaction = $this->mapper->fromArray($transactionData);

        $this->assertEquals(
            $transactionData['transaction_id'],
            $transaction->getId()
        );

        $this->assertEquals(
            $transactionData['type'],
            $transaction->getType()
        );

        $this->assertEquals(
            $transactionData['status'],
            $transaction->getStatus()
        );

        $this->assertEquals(
            $transactionData['created'],
            $transaction->getCreated()->format('Y-m-d H:i:s')
        );

        $this->assertEquals(
            $transactionData['updated'],
            $transaction->getUpdated()
        );
    }
}
