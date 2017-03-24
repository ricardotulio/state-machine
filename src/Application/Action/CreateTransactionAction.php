<?php

namespace Application\Action;

use Zend\Diactoros\Response\JsonResponse;
use Application\Entity\Transaction;
use Application\Entity\TransactionMapper;
use Application\Repository\TransactionRepository;

final class CreateTransactionAction
{
    private $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($req, $res, $next)
    {
        $transactionMapper = new TransactionMapper();
        $transaction = $transactionMapper->fromArray(
            json_decode(
                $req->getBody(), 
                true)
            );

        $transaction = $this->repository->persist($transaction);

        return new JsonResponse(
            $transactionMapper->toArray($transaction)
        );
    }
}
