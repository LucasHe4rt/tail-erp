<?php

namespace App\Http\Controllers;

use App\Http\Requests\Stocks\StockRequest;
use App\Repositories\Eloquent\StockRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StocksController extends Controller
{
    private $repository;

    public function __construct(StockRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    public function store(StockRequest $request): JsonResponse
    {
        return $this->successResponse(
            'created',
            $this->repository->create($request->all()),
            Response::HTTP_CREATED
        );
    }

    public function update(StockRequest $request, int $id): JsonResponse
    {
        return  $this->successResponse(
            'updated',
            $this->repository->updateById($request->all(), $id)
        );
    }
}
