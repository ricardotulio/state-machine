<?php

namespace Application\Action;

use Application\Entity\Transaction;
use Application\Repository\TransactionRepository;

class CreateTransactionAction
{
    private $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($req, $res, $next)
    {
        $transaction = new Transaction();
        $transaction->fill(json_decode($req->getBody()), true);

        $this->repository->persist($transaction);

        $res->getBody()->write('Hello, world!');
        return $res;
    }
}
