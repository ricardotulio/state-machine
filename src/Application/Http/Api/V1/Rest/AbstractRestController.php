<?php

namespace Application\Http\Api\V1\Rest;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Stratigility\MiddlewareInterface;

abstract class AbstractRestController implements MiddlewareInterface
{
    const IDENTIFIER_NAME = 'id';

    /**
     * @param Request $request
     * @param Response $response
     * @param null|callable $out
     * @return null|Response
     */
    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        $requestMethod = strtoupper($request->getMethod());
        $id = $request->getAttribute(static::IDENTIFIER_NAME);

        switch ($requestMethod) {
            case 'GET':
                return isset($id)
                    ? $this->get($request, $response, $out)
                    : $this->getList($request, $response, $out);
            case 'POST':
                return $this->create($request, $response, $out);
            case 'PUT':
                return $this->update($request, $response, $out);
            case 'DELETE':
                return isset($id)
                    ? $this->delete($request, $response, $out)
                    : $this->deleteList($request, $response, $out);
            case 'HEAD':
                return $this->head($request, $response, $out);
            case 'OPTIONS':
                return $this->options($request, $response, $out);
            case 'PATCH':
                return $this->patch($request, $response, $out);
            default:
                return $out($request, $response);
        }
    }

    public function get(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        return $this->createResponse(['content' => 'Method not allowed'], 405);
    }

    public function getList(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        return $this->createResponse(['content' => 'Method not allowed'], 405);
    }

    public function create(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        return $this->createResponse(['content' => 'Method not allowed'], 405);
    }

    public function update(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        return $this->createResponse(['content' => 'Method not allowed'], 405);
    }

    public function delete(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        return $this->createResponse(['content' => 'Method not allowed'], 405);
    }

    public function deleteList(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        return $this->createResponse(['content' => 'Method not allowed'], 405);
    }

    public function head(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        return $this->createResponse(['content' => 'Method not allowed'], 405);
    }

    public function options(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        return $this->createResponse(['content' => 'Method not allowed'], 405);
    }

    public function patch(
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        callable $out = null
    ) {
        return $this->createResponse(['content' => 'Method not allowed'], 405);
    }

    final protected function createResponse($data, $status = 200)
    {
        return new JsonResponse($data, $status);
    }
}
