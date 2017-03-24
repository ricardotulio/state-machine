<?php

namespace Application\Http\Api\V1\Rest;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Application\Entity\Transaction;
use Application\Entity\TransactionMapper;
use Application\Repository\TransactionRepository;

final class TransactionController extends AbstractRestController
{
    private $repository;

    private $mapper;

    public function __construct(
        TransactionRepository $repository,
        TransactionMapper $mapper
    ) {
        $this->repository = $repository;
        $this->mapper = $mapper;
    }

    private function getRepository()
    {
        return $this->repository;
    }

    private function getMapper()
    {
        return $this->mapper;
    }

    public function get(
        ServerRequestInterface $req,
        ResponseInterface $res,
        callable $out = null
    ) {
        $transactionId = $req->getAttribute('id');
        $transaction = $this->getRepository()
            ->get($transactionId);

        return new JsonResponse(
            $this->getMapper()
                ->toArray($transaction)
        );
    }

    public function getList(
        ServerRequestInterface $req,
        ResponseInterface $res,
        callable $out = null
    ) {
        return new JsonResponse(
            [ 'lista' => true ]
        );
    }

    public function create(
        ServerRequestInterface $req,
        ResponseInterface $res,
        callable $out = null
    ) {
        $transaction = $this->getMapper()->fromArray(
            json_decode(
                $req->getBody(),
                true
            )
        );

        $transaction = $this->getRepository()->persist($transaction);

        return new JsonResponse(
            $this->getMapper()->toArray($transaction)
        );
    }
}
