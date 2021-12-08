<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sales\SaleRequest;
use App\Repositories\SaleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SalesController extends Controller
{
    private $repository;

    public function __construct(SaleRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    public function store(SaleRequest $request): JsonResponse
    {
        $parameters = $request->all();
        $items = $parameters['items'];

        $saleParameters = [
            'client_name' => $parameters['client_name'],
            'client_cpf' => $parameters['client_cpf'],
            'total' => $parameters['total'],
            'user_id' => 2 //Auth::user()->id
        ];

        $sale = $this->repository->create($saleParameters);

        foreach ($items as &$item) {
            $item['sale_id'] = $sale->id;
        }

        $sale->items()->insert($items);

        return $this->successResponse(
            'created',
            $sale->load('items'),
            Response::HTTP_CREATED
        );
    }
}
